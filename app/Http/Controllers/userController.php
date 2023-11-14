<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public $Users;
    public function __construct()
    {
        $this->Users = new User();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->Users->getUsers();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("users/create?id=$row->id").'" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="userDelete('. $row->id .')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/users/index');
    }

    //ADD users
    public function create(Request $request){
        $user = [];
        $selected = [
            'id' => null,
            'name' => null,
            'email' => null,
            'password' => null
        ];
        if($request->isMethod('post')){
            $user = [
                "name" => $request->name,
                "email" => $request->email,
                "password" =>bcrypt($request->password)
            ];

            if($request->input('id') > 0){
                $message = "Updated";
                User::find($request->input('id'))->update($user);
            }else{
                $message = "Created";
                User::create($user);
            }

            return response()->json(['status' => 200, 'message' => 'User '.$message.' successfuly']);
        }
        if($request->input('id')){
            $user_val = User::find($request->input('id'));

            $selected['id'] = $user_val->id;
            $selected['name'] = $user_val->name;
            $selected['email'] = $user_val->email;
            $selected['password'] = $user_val->password;

        }
        return view("admin/pages/users/create",compact('selected'));
    }

     //delete
     public function delete($id){
        User::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'User Deleted
         successfuly']);
    }

}
