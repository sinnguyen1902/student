<?php

namespace App\Http\Controllers;
use DB;
use mongodb;
use Illuminate\Http\Request;
use Session;
session_start();
use Redirect;



class Homecontroller extends Controller
{
    
    public function index(){
   // print $data;
         
    return view('welcome');
    }
    public function view(){
        $data = DB::table('customer')->get();
        $data1 = DB::table('khoa')->get();
        //print_r($data);
        return view('view')->with('data', $data)->with('data1', $data1);
    }
    public function login(){
    return view('login');
    }
    public function khoa(){
        return view('khoa');
        }
    public function add(){
        $data = DB::table('khoa')->get();
        return view('add')->with('data', $data);
    }

    public function add1(Request $request){
		if ($request->ajax()) {
			$cities = DB::table('lop')->where('khoa',$request->khoa_id)->select('lop','_id')->get(); 

			return response()->json($cities);
		}
	}
    

    public function AuthLogin(){
        $_id = Session::get('_id');
         if($_id){
           return Redirect::to('/trangchu');
          }else{
            return Redirect::to('/login')->send();
          }
        }
    public function login_dashboard(Request $request){
    
    $customer_email = $request->username;
    $customer_password= $request->password;
    
    $result = DB::table('customer')->where('email',$customer_email)->where('password',$customer_password)->first();
    //print_r($result);
    if($result){
        Session::put ('name',$result['name']);
        Session::put('index',$result['index']);
        Session::put('_id',$result['_id']);
        Session::put('image',$result['image']);
        return Redirect::to('/trangchu');
    }else{
        Session::put ('message','Mật khẩu hoặc tài khoản bị sai.Vui lòng nhập');
        return Redirect::to('/login');
    }
}
    public function logout(){
        $this->AuthLogin();
        Session::put ('name',null);
        Session::put ('index',null);
        Session::put('_id',null);
        return Redirect::to('/login');
    }

// save
    public function save(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['index'] = $request->index;
        $data['phone'] = null;
        $data['address'] = null;
        $data['image'] = null;
        $data['mssv'] = $request->mssv;
        $data['lop'] = $request->lop;
        $data['khoa'] = $request->khoa;
        $data['dantoc'] = null;
        $data['cmnd'] = null;
        $data['namsinh'] = null;
        $data['gioitinh'] = null;
//print_r($data);
        $data1 = DB::table('customer')->where('mssv',$data['mssv'])->orwhere('email', $data['email'])
        ->first();
        if($data1){
            Session::put('message','Mssv hoặc email bị trùng! Vui lòng nhập lại!');
            return Redirect::to('add');
        }else{
        DB::table('customer')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add'); 
        }
    }
    // delete
    public function delete($_id){
        DB::table('customer')->where('_id',$_id)->delete();
        return Redirect::to('/view');
    }
    public function delete_khoa($_id){
        DB::table('customer')->where('khoa',$_id)->delete();
        DB::table('lop')->where('khoa',$_id)->delete();
        DB::table('khoa')->where('_id',$_id)->delete();
        return Redirect::to('/show-khoa');
    }
    public function delete_lop($_id){
        //DB::table('customer')->where('lop',$_id)->delete();
        DB::table('lop')->where('_id',$_id)->delete();
        
        return Redirect::to('/show-lop');
    }
    //profile

    public function profile($id){
       $data= DB::table('customer')->where('_id',$id)->first();
        return view('profile')->with('data',$data);
    }

    //update
    public function update(Request $request,$id){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['index'] = $request->index;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['mssv'] = $request->mssv;
        $data['lop'] = $request->lop;
        
        //$data['khoa'] = $request->khoa;
        $data['dantoc'] = $request->dantoc;
        $data['cmnd'] = $request->cmnd;
        $data['namsinh'] = $request->namsinh;
        $data['gioitinh'] = $request->gioitinh;

        $get_img = $request->file('image');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/backend',$new_img);
            $data['image'] = $new_img;
           DB::table('customer')->where('_id',$id)->update($data);
           Session::put('message','Thêm sản phẩm thành công');
           return Redirect::to('/trangchu');  
        }
    DB::table('customer')->where('_id',$id)->update($data);
    Session::put('message','Thêm sản phẩm thành công');
    return Redirect::to('/trangchu');
        
         
     }
     public function search(Request $request){
        
        $data2 = $request->search;
        $data = DB::table('customer')->where('mssv', 'like' , '%'.$data2.'%')->get();
        $data1 = DB::table('khoa')->get();
        return view('search')->with('data',$data)->with('data1',$data1);
     }
     public function lop(){
       
         $result = DB::table('khoa')->get();
         return view('lop')->with('data',$result);
     }
     public function save_lop(Request $request){
        $data = array();
        $data['lop'] = $request->lop;
        $data['khoa'] = $request->khoa;
        
       // print_r ($data);
       $data1 = DB::table('lop')->where('lop',$data['lop'])->first();
       if($data1){
           Session::put('message','Lớp đã tồn tại! Vui lòng nhập lại!');
           return Redirect::to('lop');
       }else{
       DB::table('lop')->insert($data);
       Session::put('message','Thêm thành công');
       return Redirect::to('lop'); 
       }
     }
     public function save_khoa(Request $request){
        $data = array();
        $data['khoa'] = $request->khoa;
        $data1 = DB::table('khoa')->where('khoa',$data['khoa'])->first();
        if($data1){
            Session::put('message','Khoa đã tồn tại! Vui lòng nhập lại!');
            return Redirect::to('khoa');
        }else{
        DB::table('khoa')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('khoa'); 
        }
         
     }

     // in danh sach
     public function in(Request $request){
        $khoa_id = $request->khoa;
        $lop = $request->lop;
        $data1 = DB::table('khoa')->get();
        $data = DB::table('customer')->where('khoa',$khoa_id)->where('lop',$lop)->get();
        //print_r ($result);
        return view('pdf')->with('data',$data)->with('data1',$data1);



     }
    public function show_student($_id){
        $data = DB::table('customer')->where('_id',$_id)->first();
       
        
        return view('show_student')->with('data',$data);

    }
    public function show_khoa(){
        $data = DB::table('khoa')->get();
        return view('show_khoa')->with('data',$data);
    }
    public function show_lop(){

        $data = DB::table('lop')
        //->join('khoa',khoa['_id'],=,lop['khoa'])
        ->get();
        
        
        //print_r($data);
        
        return view('show_lop')->with('data',$data);
    }
    
}
