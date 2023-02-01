<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;

class PostController extends Controller
{
    //
    public function showPostData()
    {
    	// Read value from Model method
        $postData = Posts::getPostData();

	    // Pass to view
	    return view('backend.posts')->with("postData",$postData);
    }

    public function showCreatePost()
    {
        $categoryData = Category::getCategoryData();
        $subcategoryData = Category::getSubCategoryData();
        //$categoryData = $posts->postHasOneCategory();
        //dd($categoryData);
        
        return view('backend.add-post')->with("categoryData",$categoryData)->with("subcategoryData",$subcategoryData);
    }

    public function getallcatdata()
    {
    	$categoryData = Category::getCategoryData();
        $subcategoryData = Category::getSubCategoryData();
        
        return array('categoryData'=>$categoryData,
        	'subcategoryData'=>$subcategoryData);
    }

    public function createPostData(Request $request)
    {
    	$posts = new Posts;
 
		$posts->title = $request->input('title');
		$posts->description = $request->input('description');
        $posts->status = 1;
        $posts->category_id = $request->input('category_id');
        $posts->sub_category_id = $request->input('sub_category_id');
        $posts->price = $request->input('price');
 
		$posts->save();

		// Read value from Model method
	    $postData = Posts::getPostData();

	    // Pass to view
	    return redirect()->back()->with('status','Post Created Successfully');
    }

    public function showEditPost($id)
    {
        $postData = Posts::find($id);
        $categoryData = Category::getCategoryData();
        $subcategoryData = Category::getSubCategoryData();
        
        return view('backend.edit-post')->with("postData",$postData)->with("categoryData",$categoryData)->with("subcategoryData",$subcategoryData);
    }

    public function updatePostData(Request $request, $id)
    {
        $postData = Posts::find($id);

        $postData->title = $request->input('title');
        $postData->description = $request->input('description');
        $postData->status = $request->input('status');
        $postData->price = $request->input('price');
        $postData->category_id = $request->input('category_id');
        $postData->sub_category_id = $request->input('sub_category_id');
       
        $postData->update();

        return redirect()->back()->with('status','Post Updated Successfully');
    }

    public function deletePostData($id)
    {
        
        Posts::deletePostData($id);

        return redirect('/posts');
        
    } 

    
}
