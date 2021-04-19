@extends('public/layouts/layouts')
@section('title','Installer List')
@section('content')

{{-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet"> --}}

<!-- page js -->
<div class="container">
        
    {{-- @livewireStyles


          <livewire:installer  />
          @livewireScripts --}}
       
          @if (session('info'))
          <script type="text/javascript">toastr.success("{{session('info')}}");</script>
          @endif 
          <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{url('searchinstaller')}}" method="GET">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" placeholder="Enter name or Post Code" name="q" value="{{$search}}" >
                        <div class="input-group-text" > <button class="border-0" type="submit"><i class="fa fa-search"></i></button> </div>  
                    </div>
                    
                    </form>
                
            </div>
            <div class="col-md-1">
               <form action="{{url('sortinstaller')}}" >
                <input type="hidden" name="q" value="{{$search}}">
                   <input type="hidden" name="asc_type" value="asc">
                <button class="btn btn-outline-info float-right" ><i class="fas fa-sort-amount-down-alt"></i></button>
               </form>
                
            </div>
            <div class="col-md-1">
                <form action="{{url('sortinstaller')}}">
                    <input type="hidden" name="q" value="{{$search}}">
                    <input type="hidden" name="asc_type" value="desc">
                    <button class="btn btn-outline-info" ><i class="fas fa-sort-amount-up"></i></button>
                </form>
            </div>
          </div>
          <div class="row">
              @if(count($installers)>0)
                  @foreach ($installers as $installer)
                      <div class="col-md-6 mt-3">
                          <div class="card">
                              <div class="card-body text-center">
                                  <h1>{{$installer->name}}</h1>
                                  <p>{{$installer->email}}</p>
                                  <p>{{$installer->contact_no}}</p>
                                  <a href="{{url('installerdetails/'.$installer->id)}}" class="btn btn-outline-info"><i class="fa fa-eye"></i> Details</a>
                              </div>
                          </div>
                      </div>                
                  @endforeach
                  
              @else
                  <div class="col-md-12 mt-3">
                      <div class="alert alert-danger"><b>No Search Result Found</b></div>
                  </div>
              @endif 
  
          </div>
          @if(count($installers)>0)
          {{$installers->links('vendor/pagination/bootstrap-4')}}
          @endif
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
// $(document).ready(function(){
//     $('#installer').change(function(){
//         var installer =  $('#installer').val();
//         $.ajaxSetup({
// 				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
//             });
//             url = "{{url('get_installer')}}";
//             $.ajax({
//            type:'POST',
//            url:url,
//             data:{
//                 installer:installer
               
//             },
//             success:function(result){
//                 console.log(result);
//               $('#data_records').html(result);  
//             }
//             });

//     });
// });
// function fetchrecord(sortype){
//     $.ajaxSetup({
// 				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
//             });
//     var installer =  $('#installer').val();
//         $.ajaxSetup({
// 				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
//             });
//             url = "{{url('installerbyamount')}}";
//             $.ajax({
//            type:'POST',
//            url:url,
//             data:{
//                 installer:installer,
//                 sortype:sortype
               
//             },
//             success:function(result){
//                 //console.log(result);
//               $('#data_records').html(result);  
//             }
//             });

// }

</script>
@endsection


