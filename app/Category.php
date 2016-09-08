<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public static function createCategory($createCategoryRequest)
    {
        $category = new Category();
        $category->name = $createCategoryRequest->get('name');

        if($category->save()) {
            return redirect()->back()->with('message', 'Category ' . $category->name . ' was successfully saved');
        }
    }
}
