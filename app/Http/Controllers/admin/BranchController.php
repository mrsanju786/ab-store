<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Region;
use App\Models\Company;
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
        $region_list = Region::get();
        $company = Company::get();
        return view('admin-view.branch.add_branch', compact('region_list','company'));
    }

    public function createBranch(Request $request){

        $request->validate([
            'branch_name' => 'required',
            'branch_code' => 'required',
            'branch_manager' => 'required',
            'contact_number' => 'required',
            'company_id' => 'required',
            'city_id' => 'required',
        ]);

        $branch = new Branch();
        $branch->name = $request->branch_name;
        $branch->branch_code = $request->branch_code;
        $branch->branch_manager = $request->branch_manager;
        $branch->contact_number = $request->contact_number;
        $branch->gst_no = $request->gst_no;
        $branch->license_no = $request->license_no;
        $branch->is_pos = $request->is_pos ?? 0;
        $branch->is_sok = $request->is_sok ?? 0;
        $branch->is_qrcode = $request->is_qrcode ?? 0;
        $branch->is_mobile_ordering = $request->is_mobile_ordering ?? 0;
        $branch->is_table_room = $request->is_table_room ?? 0;
        $branch->company_id = $request->company_id;
        $branch->city_id = $request->city_id;
        $branch->save();

        return redirect()->route('branch_list')->with('success', 'Branch Added Successfully!');

    }

    public function editBranch($id){
        $branch = Branch::find(base64_decode($id));
        $company = Company::get();
        return view('admin-view.branch.edit_branch', compact('branch','company'));
    }

    public function updateBranch(Request $request){

        $request->validate([
            'branch_name' => 'required',
            'branch_code' => 'required',
            'branch_manager' => 'required',
            'contact_number' => 'required',
            'company_id' => 'required',
            'city_id' => 'required',
        ]);

        $id = $request->branch_id;
        $branch = Branch::find($id);
        $branch->name = $request->branch_name;
        $branch->branch_code = $request->branch_code;
        $branch->branch_manager = $request->branch_manager;
        $branch->contact_number = $request->contact_number;
        $branch->gst_no = $request->gst_no;
        $branch->license_no = $request->license_no;
        $branch->is_pos = $request->is_pos ?? 0;
        $branch->is_sok = $request->is_sok ?? 0;
        $branch->is_qrcode = $request->is_qrcode ?? 0;
        $branch->is_mobile_ordering = $request->is_mobile_ordering ?? 0;
        $branch->is_table_room = $request->is_table_room ?? 0;
        $branch->company_id = $request->company_id;
        $branch->city_id = $request->city_id;
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
