<?php

namespace App\Http\Controllers;

use App\Models\Proprety;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $properties = Proprety::orderBy('created_at','desc')->limit(4)->get(); 
        return view('home',['properties'=>$properties]);
    }
}
