<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testPost;
use App\User;
use App\message;
use Auth;

class TestPOController extends Controller
{
    //Fill in post
	public function viewPost(){
		return view("post");
	}
    //creat new post article
    public function createNewPost(Request $request){
        $user = Auth::user();
        $image_path = '';
        if($request->hasFile('image')){//判斷是否有圖片檔
            $filetype = $request->file('image')->getClientOriginalExtension();//取得附檔名
            $path = public_path().'/img_upload';
            $imgname = $request->title.date("Ymdh").".".$filetype;
            $request->file('image')->move($path,$imgname);//圖片上傳的位置及圖片名稱
            $image_path = "/img_upload/".$imgname;
        }
    	testPost::create(["user_id"=>$user->id,"title"=>$request->title,"article"=>$request->article,"image_path"=>$image_path]);
    	return redirect()->route("routeShowArticle");	
    }
    //show personal article title
    public function showUserArticleTitle(){
    	$user = Auth::user();
    	$show = testPost::where("user_id","=",$user->id)->orderby('id','dsc')->get();
    	return view("home",compact("show"));
    }
    //show all article title
    public function allArticle(){
        // $show = testPost::orderBy('id',"dsc")->with('user')->get();//使用資料表ONE to ONE function
         $show = testPost::orderBy('id',"dsc")->paginate(10);//分頁功能
        // foreach($show as $data) {
        //     $data->auth = User::where("id",$data->user_id)->first();
        // }
        return view("allArticle",compact("show"));
    }
    // show single article
    public function showArticle($id){
        $show = testPost::where("id","=",$id)->first();//取得文章及用hasMany的方式取得留言
        // $message = message::where("article_id",$id)->get();//取得留言
        return view("article",compact(["show","message"]));
    }
    //edit article
    public function editArticle($id){
        $show = testPost::where("id","=",$id)->first();

        return view("editPost",compact("show"));
    }
    //update article
    public function updateArticle(Request $request ,$id){
        $show = testPost::where("id",$id)->first();
        if($request->hasFile('image')){//判斷是否有圖片檔
            $filetype = $request->file('image')->getClientOriginalExtension();//取得附檔名
            $path = public_path().'/img_upload';
            $imgname = $request->title.date("Ymdh").".".$filetype;
            $request->file('image')->move($path,$imgname);//圖片上傳的位置及圖片名稱
            $image_path = "http://localhost/img_upload/".$imgname;
            $show->update(["image_path"=>$image_path]);
        }
        $show->update(["title"=>$request->title,"article"=>$request->article]);
        // dd($show);
        return redirect()->route("routeshow",$id);
    }
    //delete article
    public function deleteArticle($id){
        $show = testPost::where("id",$id)->first();
        $show->delete();
        return redirect()->route("routeArticle");
    }
    //create message
    public function createMessage(Request $request,$id){
        $user = Auth::user();
        message::create(["user_id"=>$user->id,"article_id"=>$id,"message"=>$request->message]);
        return redirect()->route("routeshow",$id);
    }
    public function sreach(Request $request){
        // dd($request->sreachKey);
        $sreach = testPost::where('title','like','%' .$request->sreachKey. '%')->get(); //sreach
        // dd($request->sreachKey);
        // dd($sreach);
        return view("sreach",compact("sreach"));
    }
}
