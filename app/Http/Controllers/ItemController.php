<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Category;

class ItemController extends Controller
{
    //

    public function index()
    {
        return view('item.index');
    }

    public function adminCreateCategory()
    {
        return view('item.category.admin.create');
    }

    public function adminPostCategory(CreateCategoryRequest $createCategoryRequest)
    {
        $create_category = Category::createCategory($createCategoryRequest);

        return $create_category;
    }
}
