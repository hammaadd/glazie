@extends('public/layouts/layouts')
@section('title','Installer List')
@section('content')
<style>
   #sortingicon{
       font-size: 20px;
       padding: 10px;
       color:#43A0AB;
   } 
   #sortingicon:hover{
       background-color: cadetblue;
       color: white;
       border-radius: 20%;
       pointer-events: cursor;

   }
</style>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->
<div class="container">
        
    @if (session('info'))
    <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif  
        <div class="row mt-4">    
            <div class="col-md-3">
               <h3>Installer List</h3> 
            </div>
            <div class="col-md-6 ">
                @csrf
                <input type="text" class="form-control" id="installer" placeholder="Search Installer" >
            </div>
            <div class="col-md-1"><i class="fas fa-sort-amount-down-alt" id="sortingicon"></i></div>
            <div class="col-md-1"><i class="fas fa-sort-amount-up  " id="sortingicon"></i></div>
        </div>
        <div class="row mt-4"  id="data_records">
            @foreach ($installers as $installer)
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div  class="card-body text-center">
                            <h4>{{$installer->name}}</h4>
                            <h5>{{$installer->email}}</h5>
                            <p>{{$installer->adddress}}</p>
                            <p><span class="font-weight-bold"> Phone No:</span>{{$installer->contact_no}}</p>
                            <a href="{{url('installerdetails/'.$installer->id)}}" class="btn btn-outline-info"> <i class="fa fa-eye"></i> Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        </div>
        
    </div>
    <!-- Model Start Here-->
    


@endsection
@section('script')

<!-- page js -->


    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

    



    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
$(document).ready(function(){
    $('#installer').change(function(){
        var installer =  $('#installer').val();
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('get_installer')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                installer:installer
               
            },
            success:function(result){
              $('#data_records').html(result);  
            }
            });

    });
});

</script>
@endsection


