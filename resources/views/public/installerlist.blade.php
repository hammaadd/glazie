@extends('public/layouts/layouts')
@section('title','Installer List')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->
<div class="container">
        
    @livewireStyles


          <livewire:installer  />
          @livewireScripts
       
          @if (session('info'))
          <script type="text/javascript">toastr.success("{{session('info')}}");</script>
          @endif 
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
                console.log(result);
              $('#data_records').html(result);  
            }
            });

    });
});
function fetchrecord(sortype){
    $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
    var installer =  $('#installer').val();
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('installerbyamount')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                installer:installer,
                sortype:sortype
               
            },
            success:function(result){
                //console.log(result);
              $('#data_records').html(result);  
            }
            });

}

</script>
@endsection


