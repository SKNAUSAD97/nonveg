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
              $message = "Update SubCategory";
            }else {
              $message = "Add SubCategory";
            }
          @endphp
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('sub-category/index')}}">SubCategory</a></li>
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
            <form id="form" data-action="{{ url('sub-category/create')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="hidden" class="form-control" value="{{ $selected['id'] }}" name="id">
                  <select class="form-control" required name="category_id">
                    <option value="">Select</option>
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
                <div class="form-group">
                    <label for="exampleInputEmail1">SubCategory</label>
                    <input type="text" required class="form-control" name="subcategory_name" value="{{$selected['subcategory_name']}}" placeholder="Enter SubCategory Name">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" class="form-control" name="subcategory_image">
                  <div style="margin-top: 10px">
                    @if ($selected['id'] > 0)
                      <a href="{{ url('/')}}/admin/subcategories/images/{{$selected['subcategory_image']}}" target="_blank"><img src="{{ url('/')}}/admin/subcategories/images/{{$selected['subcategory_image']}}" width="100px" height="60px"></a>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Offer Discount</label>
                    <input type="number" class="form-control" name="offer_dis" value="{{$selected['offer_dis']}}" placeholder="Enter Name">
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
<script src="{{ url('/') }}/admin/js/add-subcategory.js"></script>