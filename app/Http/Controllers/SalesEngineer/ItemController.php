<?php

namespace App\Http\Controllers\SalesEngineer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use DB;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * ItemController constructor.
     */
    public function __construct()
    {
        $this->middleware('verify_if_user_is_sales_engineer');
    }

    public function salesEngineerProjectIndex()
    {
        $projects = Project::all();

        return view('item.project.sales_engineer.index', compact('projects'));
    }

    public function salesEngineerProjectShow(Project $project)
    {
        return view('item.project.sales_engineer.show', compact('project'));
    }
}
