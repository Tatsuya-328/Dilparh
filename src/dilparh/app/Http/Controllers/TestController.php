<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function next(){
        return view('next');
    }

    public function import(){
        Excel::import(new UsersImport, request()->file('file'));
        return back();
    }
}
?>
