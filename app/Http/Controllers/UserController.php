<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{

   public function logIn(Request $request){
   		$this->validate($request,[
   			'email'=>'email|required',
   			'password'=>'required',
   		],
        ['email.required' => 'Email is required',
        'password.required'  => 'Password is required']);

   		if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
            ]))
            {
                return  redirect('/admin/main');
            }
         $message="帳號密碼錯誤!";
         return redirect()->back()->with(['message'=>$message]); //使用session攜帶訊息
            
   }

   public function getSignup(){
   		return view('member.signup');
   }

   public function postSignup(Request $request){
   		$this->validate($request,[
   			'email'=>'email|required|unique:users',
   			'password'=>'required|min:6',
   			'name'=>'required|max:50',
   			'cellphone'=>'required|digits:10',
   			'birthday'=>'required|date',	
   		],
      ['email.required' => 'Email is required',
       'email.email' => 'Email is not a email',
       'email.unique' => 'Email is exist',
       'password.required'  => 'Password is required',
       'name.required' => 'Name is required',
       'cellphone.required'  => 'Cellphone is required',
       'birthday.required' => 'Birthday is required']);

        $user = new User([
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'name'=>$request->input('name'),
            'cellphone'=>$request->input('cellphone'),
            'sex'=>$request->input('sex'),
            'birthday'=>$request->input('birthday'),
        ]);
        $user->save();
            
         /*
         $user=$request->all();
         User::create($user);*/
         Auth::login($user);//註冊完直接登入
   		return redirect()->route('main'); 
   }

   public function logout(){
      Auth::logout();//登出
      return redirect('/');
   }

   public function edit($id){
      $data = User::find($id);
      return view('member.edit',['data'=>$data]);
   }

   public function update(Request $request , $id ){
      $this->validate($request,[
          'password'=>'required|min:6',
          'name'=>'required|max:50',
          'cellphone'=>'required|digits:10',
          'birthday'=>'required|date',  
        ],
        [
         'password.required'  => 'Password is required',
         'name.required' => 'Name is required',
         'cellphone.required'  => 'Cellphone is required',
         'birthday.required' => 'Birthday is required']);

      $data=$request->all();
      User::find($id)->update($data);
      $message="更新成功";
      return redirect('/admin/member/'.$id)->with(['message'=>$message]);
   }

   public function show($id){
      if(Auth::user()->id == $id){ //確定是本人才能進入
      $data = User::find($id);
      return view('member.show',['data'=>$data]);
      }
      return redirect('admin/member/system');
   }

   public function showDelete($id){
      if(Auth::user()->id == $id){
      $data = User::find($id);
      return view('member.delete',['data'=>$data]);
      }
      return redirect('admin/member/system');
   }

   public function delete($id){
      
      if(User::destroy($id)) {
         Auth::logout();
         $message="刪除成功，欲使用本系統請重新註冊，謝謝。";
         return redirect('/')->with(['message'=>$message]);
      } else {
         $message="刪除失敗";
         return redirect()->back()->with(['message'=>$message]);
      }
   }

   public function adminSystem(){

      $datas=User::all();
      return view('admin.system',['datas'=>$datas]);
   }

    public function adminDelete($id){

     if(User::destroy($id)) {
        $message="成功刪除";
     } else { 
        $message="刪除失敗";
     }

      return redirect()->route('admin.system')->with(['message'=>$message]);
     
   }
}
