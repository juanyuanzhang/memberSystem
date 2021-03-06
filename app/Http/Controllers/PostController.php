<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function create() {
    	return view('post.create');
    }

    public function store(Request $request) {
    	$this->validate($request,[
    		'title'=>'required',
            'content'=>'required',]
            ,['title.required' => 'Title is required',
              'content.required' => 'Content is required',
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
    //顯示公告
    public function getMain() {
    	$posts=Post::orderBy('id')->paginate(10);
   		return view('member.main',['posts'=>$posts]);
    }
    //進入公告內容
    public function getShow($id) {
    	$post=Post::find($id);
        //利用session()方法設定點閱次數
        $post_key= "post".$id;
        if(session($post_key) != 1){ //還未點擊過此值為null 
            $add['views'] = $post->views + 1; //點後設定一個陣列儲存views+1
            $post->update($add); //更新資料庫的views值
        }
        session([$post_key=>'1']); //點擊過後設定session($post_key)=1

   		return view('post.mainshow',['post'=>$post]);
    }
    //顯示會員自己公告明細
    public function list() {
   		$posts=Post::where('user_id',auth()->user()->id)->orderBy('id')->paginate(10);

   		return view('post.list',['posts'=>$posts]);
    	
    }
    //刪除公告
    public function delete($id) {
    	Post::destroy($id);
    	return redirect()->back();
    }
    //編輯公告網頁
    public function edit($id) {
        $post=Post::find($id);
        return view('post.edit',['post'=>$post]);
    }    
    //更新公告
    public function update(Request $request, $id) {
         $this->validate($request,[
            'title'=>'required',
            'content'=>'required'],
            ['title.required' => 'Title is required',
            'content.required' => 'Content is required']
        );
        $data = $request->all();
        Post::find($id)->update($data);
        $message="更新成功";
        return redirect('admin/post/list')->with(['message'=>$message]);
    }
}
