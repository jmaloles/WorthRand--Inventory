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

class ItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verify_if_user_is_admin');
    }

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

    public function showAfterMarket()
    {
        return view('item.after_market.admin.show');
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
}
