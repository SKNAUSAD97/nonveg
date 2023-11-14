<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use DataTables;


class productController extends Controller
{
    //index
    public $products;
    public function __construct()
    {
        $this->products = new Product();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->products->getproducts();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('product_image', function ($row) {
                        $url = url('/') . '/admin/products/images/' .$row->product_image; 
                        return '<a href="'.$url.'" target="_blank"><img src='.$url.' border="0" width="40" class="img-rounded" align="center" /></a>'; 
                    })
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("product/create?id=$row->id").'"  class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="productDelete('.$row->id.')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action', 'product_image'])
                    ->make(true);
        }
        return view('admin/pages/products/index');
    }

    //get subcategory
    public function getSubcat(Request $request){
        $category_id = $request->category_id;
        $getsub_cat = Subcategory::where('category_id', $category_id)->get();
        $subcategory_options = '<option value="">Select</option>';
        foreach ($getsub_cat as $key => $value) {
            $subcategory_options .= '<option  value="'. $value["id"] .'" >'. $value["subcategory_name"] .'</option>';
        }
        return $subcategory_options;
    }


    //Add Subcategory
    public function create(Request $request){
        // return $request;
        // $existing_product = [];
        $selected = [
            'id' => null,
            'category_id' => null,
            'subcategory_id' => null,
            'product_name' => null,
            'product_image' => null,
            'product_gallery' => null,
            'quantity' => null,
            'product_price' => null,
            'special_price' => null,
            'is_trending' => null,
            'is_popular' => null
        ];
        $categories = Category::all();
        $subcategories = [];
        if($request->isMethod('post')){
            if($request->hasFile('product_image')){
                $imageName = time().'.'.$request->product_image->extension();
                $request->product_image->move(public_path('admin/products/images'), $imageName);
            }else{
                if($request->input('id') > 0){
                    $existing_product = Product::find($request->input('id'));
                    $imageName = $existing_product->product_image;
                }else{
                    $imageName = "no-image.png";
                }
            }

            $images = $request->product_gallery;
            $images_Gallery = [];
            // return $images;
            if($request->hasFile('product_gallery')){
                foreach($images as $item){
                    $imageGallery = rand(10000, 99999).'_'.time().'.'.$item->extension();
                    $item->move(public_path('admin/products/images'), $imageGallery);
                    $images_Gallery[]= $imageGallery;
                }
            }else{
                if($request->input('id') > 0){
                    $existing_product = Product::find($request->input('id'));
                    $imageName = $existing_product->images_Gallery;
                }else{
                    $imageName = "no-image.png";
                }
            }
            $product = [
                "category_id" => $request->category_id,
                "subcategory_id" => $request->subcategory_id,
                "product_name" => $request->product_name,
                "product_image" => $imageName,
                "product_gallery" =>json_encode($images_Gallery),
                "quantity" => $request->quantity,
                "product_price" => $request->product_price,
                "special_price" => $request->special_price,
                "is_trending" => $request->is_trending,
                "is_popular" => $request->is_popular
            ];
            // return $product;
            if($request->input('id') > 0){
                $message = "Updated";
                Product::find($request->input('id'))->update($product);
            }else{
                $message = "Created";
                Product::create($product);
            }
            return response()->json(['status' => 200, 'message' => 'Product '.$message.' successfuly']);
        }
        if($request->input('id')){
            $product = Product::find($request->input('id'));

            $selected['id'] = $product->id;
            $selected['category_id'] = $product->category_id;
            $selected['subcategory_id'] = $product->subcategory_id;
            $selected['product_name'] = $product->product_name;
            $selected['product_image'] = $product->product_image;
            $selected['product_gallery'] = json_decode($product->product_gallery);
            $selected['quantity'] = $product->quantity;
            $selected['product_price'] = $product->product_price;
            $selected['special_price'] = $product->special_price;
            $selected['is_trending'] = $product->is_trending;
            $selected['is_popular'] = $product->is_popular;

            $subcategories = Subcategory::where('category_id', $selected['category_id'])->get();
        }
        return view("admin/pages/products/create",compact('categories','subcategories','selected'));
    }
}
