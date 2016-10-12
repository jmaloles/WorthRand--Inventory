<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectPricingHistory;

class Project extends Model
{
    protected $fillable = [
        'name', 'model', 'ccn_number', 'part_number', 'reference_number', 'drawing_number', 'material_number', 'serial_number', 'tag_number', 'price'
    ];

    public function after_markets()
    {
        return $this->hasMany(AfterMarket::class);
    }

    public function project_pricing_history()
    {
        return $this->hasMany(ProjectPricingHistory::class)->latest();
    }

    public function seals()
    {
        return $this->hasMany(Seal::class);
    }

    public static function createProject($createProjectRequest)
    {
        $project = new Project();
        $project->name = trim(ucwords($createProjectRequest->get('name'), " "));
        $project->model = trim(strtoupper($createProjectRequest->get('model')));
        $project->ccn_number = trim(strtoupper($createProjectRequest->get('ccn_number')));
        $project->part_number = trim(strtoupper($createProjectRequest->get('part_number')));
        $project->reference_number = trim(strtoupper($createProjectRequest->get('reference_number')));
        $project->drawing_number = trim(strtoupper($createProjectRequest->get('drawing_number')));
        $project->material_number = trim(strtoupper($createProjectRequest->get('material_number')));
        $project->serial_number = trim(strtoupper($createProjectRequest->get('serial_number')));
        $project->tag_number = trim(strtoupper($createProjectRequest->get('tag_number')));

        if ($project->save()) {
            return redirect()->back()->with('message', 'Project ['.$project->name.'] was successfully created');
        }
    }

    public static function addProjectPricingHistory($addProjectPricingHistoryRequest, $project)
    {
        $project_pricing_history = new ProjectPricingHistory();
        $project_pricing_history->project_id = $project->id;
        $project_pricing_history->po_number = $addProjectPricingHistoryRequest->get('po_number');
        $project_pricing_history->pricing_date = trim($addProjectPricingHistoryRequest->get('pricing_date'));
        $project_pricing_history->price = trim($addProjectPricingHistoryRequest->get('price'));
        $project_pricing_history->terms = trim($addProjectPricingHistoryRequest->get('terms'));
        $project_pricing_history->delivery = trim($addProjectPricingHistoryRequest->get('delivery'));
        $project_pricing_history->fpd_reference = trim(strtoupper($addProjectPricingHistoryRequest->get('fpd_reference')));
        $project_pricing_history->wpc_reference = trim(strtoupper($addProjectPricingHistoryRequest->get('wpc_reference')));

        if($project_pricing_history->save()) {
            $project = Project::find($project_pricing_history->project_id);
            $project->update(['price' => $project_pricing_history->price]);

            return redirect()->back()->with('message', 'Pricing History for Project ['.$project->name.'] was successfully saved');
        }

    }

    /*
     * JSON Section
     * */

    public static function fetchProjects()
    {
        $jsonProject = array();
        $projects = Project::all();

        foreach($projects as $project) {
            $jsonProject['suggestions'][] = [
                'data' => $project->id,
                'value' => $project->name
            ];
        }

        return json_encode($jsonProject);
    }
}
