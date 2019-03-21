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
   		]);

   		if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
            ]))
            {
                return  redirect('/admin/main');
            }
         return redirect()->back();   
            
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
   		]);

         
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
         Auth::login($user);
   		return redirect()->route('main'); 
   }
   public function logout(){

      Auth::logout();
      return redirect('/');
   }

   public function edit($id){

      $data = User::find($id);
      return view('member.edit',['data'=>$data]);
   }

   public function update(Request $request , $id ){
      $data=$request->all();
      User::find($id)->update($data);
      return redirect()->back();
   }

   public function show($id){
      if(Auth::user()->id == $id){
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
