<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;


class categoryController extends Controller
{
    public $categories;
    public function __construct()
    {
        $this->categories = new Category();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->categories->getCategories();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category_image', function ($row) {
                        $url = url('/') . '/admin/categories/images/' .$row->category_image; 
                        return '<a href="'.$url.'" target="_blank"><img src='.$url.' border="0" width="40" class="img-rounded" align="center" /></a>'; 
                    })
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("category/create?id=$row->id").'"  class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="categoryDelete('.$row->id.')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action','category_image'])
                    ->make(true);
        }
        return view('admin/pages/categories/index');
    }
    //Add category
    public function create(Request $request){
        $existing_category = [];
        $selected = [
            'id' => null,
            'category_name' => null,
            'category_image' => null
        ];
        if($request->isMethod('post')){
            if($request->hasFile('category_image')){
                $imageName = time().'.'.$request->category_image->extension();
                $request->category_image->move(public_path('admin/categories/images'), $imageName);
            }else{
                if($request->input('id') > 0){
                    $existing_category = Category::find($request->input('id'));
                    $imageName = $existing_category->category_image;
                }else{
                    $imageName = "no-image.png";
                }
            }
            $category = [
                "category_name" => $request->category_name,
                "category_image" => $imageName
            ];

            if($request->input('id') > 0){
                $message = "Updated";
                Category::find($request->input('id'))->update($category);
            }else{
                $message = "Created";
                Category::create($category);
            }

            return response()->json(['status' => 200, 'message' => 'Category '.$message.' successfuly']);
        }
        if($request->input('id')){
            $category_val = Category::find($request->input('id'));

            $selected['id'] = $category_val->id;
            $selected['category_name'] = $category_val->category_name;
            $selected['category_image'] = $category_val->category_image;

        }
        return view("admin/pages/categories/create",compact('selected'));
    }

    //delete
    public function delete($id){
        Category::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Category Deleted
         successfuly']);
    }
}
