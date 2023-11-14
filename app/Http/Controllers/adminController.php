<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use DataTables;
use Session;
use Auth;
use Mail;
use Hash;
use Schema;
use Redirect;

class adminController extends Controller
{

    public function dashboard(request $request){
        return view('admin/pages/dashboard');
    }

    public function allUsers(request $request){
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/users');
    }

    public function adminLogin(){
        return view('admin/pages/login');
    }

    public function loginSubmit(Request $request){
        // return $request;
        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        }else{
            return back()->with('error-message', 'Invalid Credentials...');
        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('admin-login')->with('success', 'Logout Successfully...');
    }

    public function forgotPassword(){
        return view('admin/pages/forgotPassword');
       }

    public function forgotPasswordSubmit(request $request){
        try {
            $admin = Admin::where('email', $request->email)->first();
            if(!$admin){
                return back()->with('error-message', 'Invalid Email Id...');
            }

            $remember_token = sha1(time());
            Admin::where('email', $request->email)->update(['remember_token' => $remember_token]);
            $link = "http://localhost:8000/reset-password/". $remember_token;
            $details = [
                'link' => $link
            ];
            Mail::to($request->email)->send(new \App\Mail\forgotPassword($details));
            return redirect()->back()->with('success-message', 'We have sent a reset password link to your email...');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    
    }

    public function resetPassword($token){
        try {
            $admin = Admin::where('remember_token', $token)->first();
            if(!$admin){
                return back()->with('error-message', 'Invalid Token Id...');
            }
    
            return view('admin/pages/resetPassword', compact('admin'));
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }

    public function upatePassword(request $request, $id){
        try {
            $password = $request->password;
            $c_password = $request->confirm_password;

            if($password !== $c_password){
                return redirect()->back()->with('error-message', 'Confirm Password does not match..');
            }

            $update = Admin::find($id)->update(['password' => bcrypt($password)]);
            if ($update) {
                return redirect('admin-login')->with('success-message', 'Your password has been changed...');
            }
            return redirect()->back()->with('error-message', 'Could not Update at the moment, Please try again..');
        } catch (\Exception $e) {
            return ($e->getMessage());
        }
    }
    
}
