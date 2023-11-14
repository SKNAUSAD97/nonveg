<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>PropDukan | DataTables</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/bs-stepper/css/bs-stepper.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.components.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ url('/') }}/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('/') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ url('/') }}/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
 <!-- Select2 -->
 <link rel="stylesheet" href="{{ url('/') }}/plugins/select2/css/select2.min.css">
 <link rel="stylesheet" href="{{ url('/') }}//plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- AdminLTE App -->
<script src="{{ url('/') }}/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/admin/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="{{ url('/') }}/admin/plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
</body>
</html>
<script>

    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

  $(function(){
    // BS-Stepper Init
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

  var page = 1;
  var validation = [
      {
        type : "property_type",
        error : false,
        page : 1
      },
      {
        type : "change-type",
        error : false,
        page : 1
      },
      {
        type : "properties_type",
        error : false,
        page : 1
      },
      {
        type : "city",
        error : false,
        page : 2
      },
      {
        type : "locality",
        error : false,
        page : 2
      },
      {
        type : "apartment_society",
        error : false,
        page : 2
      },
      {
        type : "Located_inside",
        error : false,
        page : 2
      },
      {
        type : "zone_type",
        error : false,
        page : 2
      },

      {
        type : "your_apartment",
        error : false,
        page : 3
      },
      {
        type : "no_of_bedrooms",
        error : false,
        page : 3
      },
      {
        type : "no_of_bathrooms",
        error : false,  
        page : 3
      },
      {
        type : "balconie",
        error : false,
        page : 3
      },
      {
        type : "floor_details",
        error : false,
        page : 3
      },
      {
        type : "floors_allowed",
        error : false,
        page : 3
      },
      {
        type : "boundary",
        error : false,
        page : 3
      },
      {
        type : "open_sides",
        error : false,
        page : 3
      },
      {
        type : "any_construction",
        error : false,
        page : 3
      },
      {
        type : "availability_status",
        error : false,
        page : 3
      },
      {
        type : "age_of_property",
        error : false,
        page : 3
      },
      {
        type : "possession",
        error : false,
        page : 3
      },
      {
        type : "date",
        error : false,
        page : 3
      },
      {
        type : "Willing",
        error : false,
        page : 3
      },
      {
        type : "brokers_contacting",
        error : false,
        page : 3
      },
      {
        type : "avaiable_type",
        error : false,
        page : 3
      },
      {
        type : "carpet_area",
        error : false,
        page : 3
      },
      {
        type : "built_area",
        error : false,
        page : 3
      },
      {
        type : "super_area",
        error : false,
        page : 3
      },
      {
        type : "property_image",
        error : false,
        page : 4
      },
      {
        type : "ownership",
        error : false,
        page : 5
      },
      {
        type : "excepted_price",
        error : false,
        page : 5
      },
      {
        type : "persft_price",
        error : false,
        page : 5
      },
      {
        type : "lease_type",
        error : false,
        page : 5
      },
      {
        type : "textarea",
        error : false,
        page : 6
      },
      {
        type : "amenitie",
        error : false,
        page : 7
      },
      {
        type : "propert_feature",
        error : false,
        page : 7
      },
      {
        type : "society_buildings",
        error : false,
        page : 7
      },
      {
        type : "additional_features",
        error : false,
        page : 7
      },
      {
        type : "water_sources",
        error : false,
        page : 7
      },
      {
        type : "overlookings",
        error : false,
        page : 7
      },
      {
        type : "power_back_up",
        error : false,
        page : 7
      },
      {
        type : "property_facing",
        error : false,
        page : 7
      },
      {
        type : "Width_of_faching",
        error : false,
        page : 7
      },
      {
        type : "type_of_flooring",
        error : false,
        page : 7
      },
      {
        type : "faching_type",
        error : false,
        page : 7
      },

      
      

  ];

// "" ,"city","","house_no","apartment_society","Located_inside",
  // "zone_type","your_apartment","no_of_bedrooms","balconie","floor_details","floors_allowed","boundary","open_sides",
  //     "any_construction","availability_status","age_of_property","possession","date","Willing","brokers_contacting",
  //     "avaiable_type","carpet_area","built_area","super_area","property_image","ownership","excepted_price","persft_price","is_parent",
  //     "additoinal_price","additoinal_price_type","width","booking","lease_type","textarea","amenitie","propert_feature","society_buildings",
  //     "additional_features","water_sources","overlookings","power_back_up","property_facing,"Width_of_faching","faching_type","type_of_flooring",
  updateValidation = (id, value="") =>{
    validation.forEach((element, key) => {
      if(element.type == id){
        var property_type = document.getElementById(`${id}`);

        if (property_type.checkValidity() == false) {
              $('.'+element.type + '_validation').text('Please Select a '+element.type+'.');
              $('.'+element.type + '_validation').show();
              validation[key]['error'] = true;
        }else{
              $('.'+element.type + '_validation').text('');
              $('.'+element.type + '_validation').hide();
              validation[key]['error'] = false;
        }
      }
    });

    if(value!=""){
      if(value =='Land'){
        $('#your_apartment').prop('required', false);
        $('#no_of_bedrooms').prop('required', false);
        $('#no_of_bathrooms').prop('required', false);
        $('#balconie').prop('required', false);
        $('#floor_details').prop('required', false);
        $('#floor_details_type').prop('required', false);
        $('#floors_allowed').prop('required', false);
      }else{
        $('#your_apartment').prop('required', true);
        $('#no_of_bedrooms').prop('required', true);
        $('#no_of_bathrooms').prop('required', true);
        $('#balconie').prop('required', true);
        $('#floor_details').prop('required', true);
        $('#floor_details_type').prop('required', true);
        $('#floors_allowed').prop('required', true);
      }
    }
  }

  previousPage = () =>{

    if(page != 1){
      stepper.previous();
      page--;
    }
    console.log('page no is ' + page);
  }

  function validateStep() {

      validation.forEach((element, key) => {
        var property_type = document.getElementById(`${element.type}`);

        if(element.page == page){
          if (property_type.checkValidity() == false) {
              $('.'+element.type + '_validation').text('Please Select a '+element.type+'.');
              $('.'+element.type + '_validation').show();
              validation[key]['error'] = true;
          }else{
                $('.'+element.type + '_validation').text('');
                $('.'+element.type + '_validation').hide();
                validation[key]['error'] = false;
          }
        }
      });

      let validation_error = validation.filter((element)=>{
        return element.error == true && page == element.page;
      });
      
      if(validation_error.length == 0){
        stepper.next();
        page++;
      }
      console.log(validation_error);
  }

  updatePropertyCategory = (val) =>{
    if(val == 2){
      $('#apartment_society').prop('required', true);
      $('#Located_inside').prop('required', true);
      $('#zone_type').prop('required', true);
    }else{
      $('#apartment_society').prop('required', false);
      $('#Located_inside').prop('required', false);
      $('#zone_type').prop('required', false);
    }
  }


</script>

