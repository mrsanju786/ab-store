<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;

class CounterController extends Controller
{
    public function all_counter(){

        $counter = Counter::get();
        return view('user-view.counters', compact('counter'));
    }
}
