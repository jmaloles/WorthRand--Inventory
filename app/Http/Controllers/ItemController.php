<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateGroupRequest;
use App\Group;
use App\Http\Requests\CreateAfterMarketRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\AfterMarket;
use App\Http\Requests\UpdateProjectInformationRequest;
use DB;
use App\Http\Requests\AddProjectPricingHistoryRequest;
use App\Http\Requests\CreateAfterMarketPricingHistoryRequest;
use App\AfterMarketPricingHistory;
use App\Http\Requests\UpdateAfterMarketInformationRequest;

class ItemController extends Controller
{

    public function index()
    {
        $groups = Group::all();

        return view('item.index', compact('groups'));
    }

    public function adminCreateGroup()
    {
        return view('item.category.admin.create');
    }

    public function adminPostGroup(CreateGroupRequest $createGroupRequest)
    {
        $create_group = Group::createGroup($createGroupRequest);

        return $create_group;
    }

    public function createAfterMarket()
    {
        return view('item.after_market.admin.create');
    }

    public function postAfterMarket(CreateAfterMarketRequest $createAfterMarketRequest)
    {
        $post_after_market = AfterMarket::postAfterMarket($createAfterMarketRequest);

        return $post_after_market;
    }

    public function createProject() {
        return view('item.project.admin.create');
    }

    public function postProject(CreateProjectRequest $createProjectRequest)  {
        $create_project = Project::createProject($createProjectRequest);

        return $create_project;
    }

    public function getProjects()
    {
        $fetch_projects = Project::fetchProjects();

        return $fetch_projects;
    }

    public function indexProject()
    {
        $projects = Project::all();

        return view('item.project.admin.index', compact('projects'));
    }

    public function showProject(Project $project)
    {
        return view('item.project.admin.show', compact('project'));
    }

    public function adminProjectInformation(Project $project)
    {
        return view('item.project.admin.information', compact('project'));
    }

    public function showAfterMarket(AfterMarket $afterMarket)
    {
        return view('item.after_market.admin.show', compact('afterMarket'));
    }

    public function adminUpdateProjectInformation(Request $request, UpdateProjectInformationRequest $updateProjectInformationRequest)
    {
        $project = Project::find($request->get('project_id'));
        $project->update($updateProjectInformationRequest->except(array('_token', '_method')));

        return redirect()->back()->with('message', 'Project ['.$project->name.'] was successfully updated');
    }

    public function adminProjectPricingHistoryIndex(Project $project)
    {
        return view('item.project.admin.pricing_history.index', compact('project'));
    }

    public function adminProjectPricingHistoryCreate(Project $project)
    {
        return view('item.project.admin.pricing_history.create', compact('project'));
    }

    public function adminPricingHistoryIndex()
    {
        return view('item.pricing_history.admin.index');
    }

    public function getItemBasedOnCategory($category)
    {
        $itemArray = array();
        $items = DB::table($category)->get();

        foreach($items as $item) {
            $pricing_history = DB::table(str_singular($category).'_pricing_histories')->where(str_singular($category).'_pricing_histories.' . str_singular($category) . '_id', '=', $item->id)->latest()->get();

            $itemArray['suggestions'][] = [
                'data' => $item->id,
                'item_id' => $item->id,
                'value' => $item->name,
                'material_number' => $item->material_number,
                'ccn_number' => $item->ccn_number,
                'part_number' => $item->part_number,
                'model' => $item->model,
                'reference_number' => $item->reference_number,
                'serial_number' => $item->serial_number,
                'drawing_number' => $item->drawing_number,
                'tag_number' => $item->tag_number,
                'table_name' => $category,
                'pricinHistoryArray' => $pricing_history
            ];
        }

        return json_encode($itemArray);
    }

    public function indexAftermarket()
    {
        $aftermarkets = AfterMarket::all();

        return view('item.after_market.admin.index', compact('aftermarkets'));
    }

    public function adminAddProjectPricingHistory(AddProjectPricingHistoryRequest $addProjectPricingHistoryRequest, Project $project)
    {
        $add_project_pricing_history = Project::addProjectPricingHistory($addProjectPricingHistoryRequest, $project);

        return $add_project_pricing_history;
    }

    public function adminAddAfterMarketPricingHistory(CreateAfterMarketPricingHistoryRequest $createAfterMarketPricingHistoryRequest, AfterMarket $afterMarket)
    {
        $add_after_market_pricing_history = AfterMarket::addAfterMarketPricingHistory($createAfterMarketPricingHistoryRequest, $afterMarket);

        return $add_after_market_pricing_history;
    }

    public function adminProjectDashboard()
    {
        $projects = Project::all();

        return view('project.admin.dashboard', compact('projects'));
    }

    public function adminAfterMarketInformation(AfterMarket $afterMarket)
    {
        return view('item.after_market.admin.edit', compact('afterMarket'));
    }

    public function adminAfterMarketPricingHistoryIndex(AfterMarket $afterMarket)
    {
        return view('item.after_market.admin.pricing_history.index', compact('afterMarket'));
    }

    public function adminUpdateAfterMarketInformation(Request $request, UpdateAfterMarketInformationRequest $updateAfterMarketInformationRequest)
    {
        $afterMarket = AfterMarket::find($request->get('aftermarket_id'));
        $afterMarket->update($updateAfterMarketInformationRequest->except(array('_token', '_method', 'aftermarket_id')));

        return redirect()->back()->with('message', 'AfterMarket ['.$afterMarket->name.'] was successfully updated');
    }

    public function adminAfterMarketPricingHistoryCreate(AfterMarket $afterMarket)
    {
        return view('item.after_market.admin.pricing_history.create', compact('afterMarket'));
    }
}
