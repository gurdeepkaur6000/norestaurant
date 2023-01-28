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
	    return view('backend.categories')->with("categoryData",$categoryData);
    }

    public function showCreateCategory()
    {
        return view('backend.add-category');
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
        return view('backend.edit-category')->with("categoryData",$categoryData);;
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

    //sub-categories starts

    public function showSubCategoryData()
    {
        // Read value from Model method
        $subcategoryData = Category::getSubCategoryData();

        // Pass to view
        return view('backend.sub-categories')->with("subcategoryData",$subcategoryData);
    }

    public function showCreateSubCategory()
    {
        $subcategoryData = Category::getCategoryData();

        return view('backend.add-sub-category')->with("subcategoryData",$subcategoryData);
    }

    public function createSubCategoryData(Request $request)
    {
        $subcategories = new Category;
 
        $subcategories->title = $request->input('title');
        $subcategories->description = $request->input('description');
        $subcategories->parent_id = $request->input('category_id');
 
        $subcategories->save();

        // Pass to view
        return redirect()->back()->with('status','Sub-category Created Successfully');
    }

    public function showEditSubCategory($id)
    {
        $subcategoryData = Category::find($id);
        $categoryData = Category::getCategoryData();
        return view('backend.edit-sub-category')->with("subcategoryData",$subcategoryData)->with("categoryData",$categoryData);
    }

    public function updateSubCategoryData(Request $request, $id)
    {
        $subcategoryData = Category::find($id);
        $subcategoryData->parent_id = $request->input('category_id');

        $subcategoryData->title = $request->input('title');
        $subcategoryData->description = $request->input('description');
        
        $subcategoryData->update();

        return redirect()->back()->with('status','Sub-category Updated Successfully');
    }

    public function showDeleteSubCategory($id)
    {
        
        Category::deleteSubCategoryData($id);

        return redirect('/sub-categories');
        
    }

    //sub-categories ends
}
