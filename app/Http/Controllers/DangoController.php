<?php

namespace App\Http\Controllers;

use App\Imports\DangoImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class DangoController extends Controller
{
    public function next(){
        return view('next');
    }

    public function import(){
        Excel::import(new DangoImport, request()->file('file'));
        return back();
    }
}
