<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\FoodLicense;
use Storage;
use Auth;

class CompanyController extends Controller
{
    public function index(){

        $company = Company::get();
        return view('admin-view.company.index', compact('company'));
    }

    public function addCompany(){

        $license = FoodLicense::get();
        return view('admin-view.company.add_company', compact('license'));
    }

    public function createCompany(Request $request){

        $request->validate([
            'company_name' => 'required',
            'company_logo' => 'required',
            'cin_no' => 'required',
            'registered_address' => 'required',

        ],[
            'company_name.required'=>'Company Name is Required',
            'company_logo.required'=>'Company Logo is Required',
            'cin_no.required'=>'CIN No. is required',
            'registered_address.required'=>'Registered Address is required',
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->food_license_id = $request->license_no;
        $company->cin_no = $request->cin_no;
        $company->registered_address = $request->registered_address;
        $company->created_by = Auth::user()->id;
        
        if ($request->file('company_logo')) {
            $imageFileType = $request->company_logo->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/company/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->company_logo));
            $company->company_logo = $imageName;
        }

        $company->save();

        return redirect()->route('company_list')->with('success', 'Company Added Successfully!');

    }

    public function editCompany($id){

        $company = Company::find(base64_decode($id));
        $license = FoodLicense::get();
        return view('admin-view.company.edit_company', compact('company','license'));
    }

    public function updateCompany(Request $request){

        $request->validate([
            'company_name' => 'required',
            'cin_no' => 'required',
            'registered_address' => 'required',

        ],[
            'company_name.required'=>'Company Name is Required',
            'cin_no.required'=>'CIN No. is required',
            'registered_address.required'=>'Registered Address is required',
        ]);

        $id = $request->company_id;
        $company = Company::find($id);
        $company->company_name = $request->company_name;
        $company->food_license_id = $request->license_no;
        $company->cin_no = $request->cin_no;
        $company->registered_address = $request->registered_address;
        $company->created_by = Auth::user()->id;
        
        if ($request->file('company_logo')) {
            $imageFileType = $request->company_logo->getClientOriginalExtension();
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $imageFileType;
            $dir = "/upload/company/";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($request->company_logo));
            $company->company_logo = $imageName;
        }

        $company->save();

        return redirect()->route('company_list')->with('success', 'Changes saved Successfully!');
    }

    public function companyStatus(Request $request)
    {
        $size = Company::find($request->id);
        $size->is_active = $request->status;
        $size->save();
        return redirect()->back()->with('success','Company status updated!');
    }
}
