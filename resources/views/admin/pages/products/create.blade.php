@extends('admin.components.layout')
<style>
  .hide{
    display: none;
  }
</style>
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Dashboard</h1> --}}
        </div><!-- /.col -->
        @php
            if($selected['id'] > 0){
              $message = "Update Product";
            }else {
              $message = "Add Product";
            }
        @endphp
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product/index')}}">Products</a></li>
            <li class="breadcrumb-item active">{{$message}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="alert alert-success alert-block hide">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong class="message"></strong>
          </div>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{$message}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="form" data-action="{{ url('product/create')}}">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <input type="hidden" class="form-control" value="{{ $selected["id"] }}" name="id">
                      <select name="category_id" id="category" class="form-control">
                        <option>Select</option>
                        @foreach ($categories as $cat)
                        @php
                        $selected_cat = "";
                        if($selected['id'] > 0){
                          if($cat->id == $selected['category_id']){
                            $selected_cat = 'selected';
                          }
                        }    
                        @endphp
                        <option {{ $selected_cat }} value="{{$cat->id}}">{{ $cat->category_name }}</option>   
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category</label>
                      <select name="subcategory_id" id="subcategory" class="form-control">
                          <option value="">Select</option>
                          @foreach ($subcategories as $subcat)
                          @php
                            $selected_subcat = "";
                            if($selected['id'] > 0){
                              if($subcat->id == $selected['subcategory_id']){
                                $selected_subcat = 'selected';
                              }
                            }    
                          @endphp
                          <option {{ $selected_subcat }} value="{{$subcat->id}}">{{ $subcat->subcategory_name }}</option>   
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" class="form-control" name="product_name" value="{{ $selected["product_name"]}}" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Image</label>
                      <input type="file" class="form-control" name="product_image"  placeholder="Enter your email">
                      <div style="margin-top: 10px">
                        @if ($selected['id'] > 0)
                          <a href="{{ url('/')}}/admin/products/images/{{$selected['product_image']}}" target="_blank"><img src="{{ url('/')}}/admin/products/images/{{$selected['product_image']}}" target="_blank" width="100px" height="60px">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Image Gallery</label>
                      <input type="file" class="form-control" multiple name="product_gallery[]"  placeholder="Enter your email">
                      <div style="margin-top: 10px">
                        @if ($selected['id'] > 0)
                          @if (count($selected['product_gallery']))
                              @foreach ($selected['product_gallery'] as $image)
                              <a href="{{ url('/')}}/admin/products/images/{{$image}}" target="_blank"><img src="{{ url('/')}}/admin/products/images/{{$image}}" style="margin-top: 6px" width="100px" height="60px"></a>
                              @endforeach
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Quantity</label>
                      <input type="text" class="form-control" name="quantity" value="{{ $selected["quantity"]}}" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="text" class="form-control" name="product_price" value="{{ $selected["product_price"]}}" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Special Price</label>
                      <input type="text" class="form-control" name="special_price" value="{{ $selected["special_price"]}}" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input name="is_trending" value="1" type="checkbox" {{ $selected['is_trending'] == 1 ? 'checked' : '' }} />
                      <label for="exampleInputEmail1">Is Trending</label><br>
                      <input name="is_popular" value="1" type="checkbox" {{ $selected['is_popular'] == 1 ? 'checked' : '' }} />
                      <label for="exampleInputEmail1">Is Popular</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/admin/js/add-products.js"></script>