<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'model', 'ccn_number', 'part_number', 'reference_number', 'drawing_number', 'material_number', 'serial_number', 'tag_number'
    ];

    public function after_markets()
    {
        return $this->hasMany(AfterMarket::class);
    }

    public static function createProject($createProjectRequest)
    {
        $customer = new Project();
        $customer->name = $createProjectRequest->get('name');
        $customer->model = $createProjectRequest->get('model');
        $customer->ccn_number = $createProjectRequest->get('ccn_number');
        $customer->part_number = $createProjectRequest->get('part_number');
        $customer->reference_number = $createProjectRequest->get('reference_number');
        $customer->drawing_number = $createProjectRequest->get('drawing_number');
        $customer->material_number = $createProjectRequest->get('material_number');
        $customer->serial_number = $createProjectRequest->get('serial_number');
        $customer->tag_number = $createProjectRequest->get('tag_number');

        if ($customer->save()) {
            return redirect()->back()->with('message', 'Customer was successfully created');
        }
    }

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
