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
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('routes/index') }}">Back</a></li>
            <li class="breadcrumb-item active">Add Routes</li>
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
              <h3 class="card-title">Add Routes</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="form" data-action="{{ url('routes/create')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Label</label>
                  <input type="hidden" class="form-control" value="{{ $selected['id'] }}" name="id">
                  <input type="text" class="form-control" value="{{ $selected['label'] }}" name="label" placeholder="Enter label">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Icon</label>
                  <input type="text" class="form-control" value="{{ $selected['icon'] }}" name="icon" placeholder="Icon">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Route</label>
                  <input type="text" class="form-control parent-route" value="{{ $selected['route'] }}" id="parent-route" name="route" placeholder="Route">
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" {{ $selected['is_parents'] == 1 ? 'checked' : '' }} name="is_parents" id="is_parent">
                  <label class="form-check-label" for="exampleCheck1">Is-parents</label>
                </div>

                <table id="myTable" class="table table-bordered {{ $selected['is_parents'] == 1 ? '' : 'hide' }} mt-4">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Label</th>
                      <th>Route</th>
                      <th>
                        <a class="btn btn-sm btn-primary" type="button" onclick="addMore()">Add More</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    @foreach ($children_routes as $key=> $item)
                    <tr>
                      <th>{{ ($key + 1) }}</th>
                        <th>
                          <input type="hidden" value="{{ $item->id }}" name="data[{{ ($key+1) }}][child_id]">
                          <input type="text" class="form-control" value="{{ $item->label }}" name="data[{{ ($key+1) }}][label]" placeholder="Enter label">
                        </th>
                        <th>
                          <input type="text" class="form-control" value="{{ $item->route }}" name="data[{{ ($key+1) }}][route]" placeholder="Route">
                        </th>
                        <th>
                          <button class="btn btn-danger" id="remove">Remove</button>
                        </th>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
<script src="{{ url('/') }}/admin/js/add-route.js"></script>
