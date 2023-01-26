<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function showCategoryData()
    {
    	// Read value from Model method
	    $categoryData = Category::getCategoryData();

	    // Pass to view
	    return view('categories')->with("categoryData",$categoryData);
    }

    public function showCreateCategory()
    {
        return view('add-category');
    }

    public function createCategoryData(Request $request)
    {
    	$categories = new Category;
 
		$categories->title = $request->input('title');;
		$categories->description = $request->input('description');;
 
		$categories->save();

	    // Pass to view
	    return redirect()->back()->with('status','Category Created Successfully');
    }

    public function showEditCategory($id)
    {
        $categoryData = Category::find($id);
        return view('edit-category')->with("categoryData",$categoryData);;
    }

    public function updateCategoryData(Request $request, $id)
    {
        $categoryData = Category::find($id);

        $categoryData->title = $request->input('title');
        $categoryData->description = $request->input('description');
        
        $categoryData->update();

        return redirect()->back()->with('status','Category Updated Successfully');
    }

    public function showDeleteCategory($id)
    {
    	
    	Category::deleteCategoryData($id);

    	return redirect('/categories');
    	
    }
}
