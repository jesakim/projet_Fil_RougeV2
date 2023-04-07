<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Assurance;

class DashboardController extends Controller
{
    public function index(){
        $patients = Patient::all();
        $assurances = Assurance::all();
        return view('pages.dashboard',compact('patients','assurances'));
    }
}
