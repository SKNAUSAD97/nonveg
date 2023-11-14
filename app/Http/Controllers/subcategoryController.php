<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use DataTables;

class subcategoryController extends Controller
{
    public $subcategories;
    public function __construct()
    {
        $this->subcategories = new Subcategory();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->subcategories->getsubCategories();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('subcategory_image', function ($row) {
                        $url = url('/') . '/admin/subcategories/images/' .$row->subcategory_image; 
                        return '<a href="'.$url.'" target="_blank"><img src='.$url.' border="0" width="40" class="img-rounded" align="center" /></a>'; 
                    })
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("sub-category/create?id=$row->id").'"  class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="subcategoryDelete('.$row->id.')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action', 'subcategory_image'])
                    ->make(true);
        }
        return view('admin/pages/sub_categories/index');
    }

    //Add Subcategory
    public function create(Request $request){
        // return $request;
        $existing_subcategory = [];
        $selected = [
            'id' => null,
            'category_id' => null,
            'subcategory_name' => null,
            'subcategory_image' => null,
            'offer_dis' => null
        ];
        $categories = Category::all();
        if($request->isMethod('post')){
            if($request->hasFile('subcategory_image')){
                $imageName = time().'.'.$request->subcategory_image->extension();
                $request->subcategory_image->move(public_path('admin/subcategories/images'), $imageName);
            }else{
                if($request->input('id') > 0){
                    $existing_subcategory = Subcategory::find($request->input('id'));
                    $imageName = $existing_subcategory->subcategory_image;
                }else{
                    $imageName = "no-image.png";
                }
            }
            $subcategory = [
                "category_id" => $request->category_id,
                "subcategory_name" => $request->subcategory_name,
                "subcategory_image" => $imageName,
                "offer_dis" => $request->offer_dis
            ];

            if($request->input('id') > 0){
                $message = "Updated";
                Subcategory::find($request->input('id'))->update($subcategory);
            }else{
                $message = "Created";
                Subcategory::create($subcategory);
            }

            return response()->json(['status' => 200, 'message' => 'SubCategory '.$message.' successfuly']);
        }
        if($request->input('id')){
            $subcategory = Subcategory::find($request->input('id'));

            $selected['id'] = $subcategory->id;
            $selected['category_id'] = $subcategory->category_id;
            $selected['subcategory_name'] = $subcategory->subcategory_name;
            $selected['subcategory_image'] = $subcategory->subcategory_image;
            $selected['offer_dis'] = $subcategory->offer_dis;

        }
        return view("admin/pages/sub_categories/create", compact('categories', 'selected'));
    }

    //delete
    public function delete($id){
        Subcategory::find($id)->delete();
        return response()->json(['status' => 200, 'message' => 'Subcategory Deleted
         successfuly']);
    }
}
