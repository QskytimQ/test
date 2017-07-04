<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewTest;

class TestController extends Controller
{
    public function testCase(){
    	return view("tests.test");
    }
    public function testCase2(Request $request){
    	// dd($request);//顯示$request 往下的程式就不會執行

    	//新增
    	$newCreate = NewTest::create(["str1"=>$request->str1]);
    	return redirect()->route("routShow");
    	//查詢
    	// $test = NewTest::where('str1','=',$request->str1)->first();
    	// dd($test);
    	//更新
    	// $test->update(["str1"=>"測試更新"]);
    	//刪除
    	// $test->delete();
    }
    public function show(){
    	$show = NewTest::orderBy('id',"asc")->get();//排列 asc:從小到大 dsc:從大到小

    	return view("show",compact("show"));
    }
}