<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateGroupRequest;
use App\Group;

class ItemController extends Controller
{
    //
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
}
