<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Storage;
use Auth;

class BranchController extends Controller
{

    public function index(){
        $branch = Branch::get();
        return view('admin-view.branch.index', compact('branch'));
    }

    public function addBranch()
    {
        return view('admin-view.branch.add_branch');
    }

    public function createBranch(Request $request){

        $request->validate([
            'region_id' => 'required',
            'branch_name' => 'required',
            'branch_code' => 'required',
            'branch_manager' => 'required',
            'contact_number' => 'required',
            'branch_serving' => 'required',
            'serving_type' => 'required',

        ]);

        $branch = new Branch();
        $branch->region_id = $request->region_id;
        $branch->name = $request->branch_name;
        $branch->branch_code = $request->branch_name;
        $branch->branch_manager = $request->branch_manager;
        $branch->contact_number = $request->contact_number;
        $branch->branch_serving = $request->branch_serving;
        $branch->serving_type = $request->serving_type;
        $branch->save();

        return redirect()->route('branch_list')->with('success', 'Branch Added Successfully!');

    }

    public function editBranch($id){
        $branch = Branch::find(base64_decode($id));
        return view('admin-view.branch.edit_branch', compact('branch'));
    }

    public function updateBranch(Request $request){

        $request->validate([
            'region_id' => 'required',
            'branch_name' => 'required',
            'branch_code' => 'required',
            'branch_manager' => 'required',
            'contact_number' => 'required',
            'branch_serving' => 'required',
            'serving_type' => 'required',
        ]);

        $id = $request->branch_id;
        $branch = Branch::find($id);
        $branch->region_id = $request->region_id;
        $branch->name = $request->branch_name;
        $branch->branch_code = $request->branch_code;
        $branch->branch_manager = $request->branch_manager;
        $branch->contact_number = $request->contact_number;
        $branch->branch_serving = $request->branch_serving;
        $branch->serving_type = $request->serving_type;
        $branch->save();

        return redirect()->route('branch_list')->with('success', 'Changes saved Successfully!');
    }

    public function branchStatus(Request $request)
    {
        $size = Branch::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success', 'Branch status updated!');
    }
}
