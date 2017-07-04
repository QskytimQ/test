<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addUsertest;

class AddserTestController extends Controller
{
	public function register(){
    	return view("tests.adduser");
    }
	public function addUser(Request $request){
		// dd($request->all());
    $creatAuth = addUsertest::create(["auth"=>$request->auth,"passwd"=>$request->passwd]);
	return redirect()->route("routShowUser");
	}

	public function show(){
    	$show = addUsertest::orderBy('id',"asc")->get();//排列 asc:從小到大 dsc:從大到小
    	// dd($show);

    	return view("showUser",compact("show"));
    }
}
