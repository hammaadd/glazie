       @section("footer")
       </div>
    </div>
    
    <!-- Core Vendors JS -->
    <script src="{{ asset('toast/toastr.min.js')}}"></script>
    <script src="{{ asset('toast/jquery.min.js')}}"></script>
    <script src="{{ asset('admin-assets/js/vendors.min.js')}}"></script>

    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script>

    <script>
        function get_notification(){
            $.ajaxSetup({
                    headers:{'X-CSRF-Token':'{{csrf_token()}}'}
                });
                url = "{{url('admin/getnotification')}}";
                $.ajax({
               type:'POST',
               url:url,
               success:function(result){

                     $("#allnotification").html(result);
    }
                           
                       
                });
        }
        $(document).ready(function(){
            $.ajaxSetup({
                    headers:{'X-CSRF-Token':'{{csrf_token()}}'}
                });
                url = "{{url('admin/countnotification')}}";
                $.ajax({
               type:'POST',
               url:url,
               success:function(result){
                     if(result!=0){
                        $("#countnotification").html(result);
                     }
    }
                           
                       
                });
        });
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
      </script>
 
</body>

</html>