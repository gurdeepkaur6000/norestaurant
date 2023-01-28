<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableNumber;

class TablenumberController extends Controller
{
    //

    public function showTNData()
    {
    	// Read value from Model method
	    $tablenameData = TableNumber::getTNData();

	    // Pass to view
	    return view('backend.tablename')->with("tablenameData",$tablenameData);
    }

    public function showCreateTN()
    {
        return view('backend.add-tablename');
    }

    public function createTNData(Request $request)
    {
    	$tablename = new TableNumber;
 
		$tablename->table_name = $request->input('table_name');;
		
		$tablename->save();

	    // Pass to view
	    return redirect()->back()->with('status','Table name Created Successfully');
    }

    public function showEditTN($id)
    {
        $tablenameData = TableNumber::find($id);
        return view('backend.edit-tablename')->with("tablenameData",$tablenameData);;
    }

    public function updateTNData(Request $request, $id)
    {
        $tablenameData = TableNumber::find($id);

        $tablenameData->table_name = $request->input('table_name');
        
        $tablenameData->update();

        return redirect()->back()->with('status','Table name Updated Successfully');
    }

    public function showDeleteTN($id)
    {
    	
    	TableNumber::deleteTNData($id);

    	return redirect('/tablename');
    	
    }
}
