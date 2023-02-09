<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function addBranch()
    {
        return view('admin-view.branch.add_branch');
    }
}
