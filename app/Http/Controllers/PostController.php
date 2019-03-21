<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function create(){
    	return view('post.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'title'=>'required',
            'content'=>'required',
    	]);
    	$post = new Post([
    		'title'=>$request->input('title'),
    		'content'=>$request->input('content'),
    		'user_id'=>auth()->user()->id,
    		'views'=>0,
    	]);
    	$post->save();
    	return redirect('/admin/main');
    }
    public function getMain(){
    	$posts=Post::orderBy('id')->paginate(10);
   		return view('member.main',['posts'=>$posts]);
    }
    public function getShow($id){
    	$post=Post::find($id);
        //利用session()方法設定點閱次數
        $post_key= "post".$id;
        if(session($post_key) != 1){
            $add['views'] = $post->views + 1;
            $post->update($add);
        }
        session([$post_key=>'1']);

   		return view('post.mainshow',['post'=>$post]);
    }

    public function list(){
   		$posts=Post::where('user_id',auth()->user()->id)->orderBy('id')->paginate(10);

   		return view('post.list',['posts'=>$posts]);
    	
    }

    public function delete($id) {
    	Post::destroy($id);
    	return redirect()->back();
    }

    public function edit($id){
        $post=Post::find($id);
        return view('post.edit',['post'=>$post]);
    }    
   
}
