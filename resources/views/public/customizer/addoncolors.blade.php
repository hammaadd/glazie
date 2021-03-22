<section class="section product-section">
    <div class="title-box">
        <div class="container">
            <!--Sec Title-->
            <div class="sec-title text-center">
                <div class="title-inner">
                    <h2>Choose Your <span class="theme_color">External Color</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-section pt-0">
        <div class="lower-inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="owl-external-color" class="owl-builder owl-carousel owl-theme">
                            @foreach ($colors as $color)
                            
                            <li class="item list-unstyled text-center selectable_ext" data-price='{{$color->price}}' onclick="getModalExtColor({{$color->id}}, {{$color->price}})">
                                <input type="hidden" value="external_color" name="type">
                                <input type="hidden" value="{{$color->id}}" name="ext_color_id">
                                <input type="hidden" value="{{$color->price}}" name="ext_color_price">
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="fun({{$color->id}})">
                                    <div class="door">
                                        <div class="door-image" style="background-color: {{$color->color_code}};height:100px;width:100px; border-radius:50%;"></div>
                                        {{-- <img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align=""> --}}
                                    </div>
                                </button>
                            </li>
                            @endforeach
                        </div>
                        <div class="customNavigation">
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnSize">Prev</a>
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btninternalColor">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JS Libraries -->
    <script src="assets2/js/jquery.min.js"></script>
    <script src="assets2/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets2/vendors/owlcarousel/js/owlcarousel.min.js"></script>
    <script src="assets2/vendors/videopopup/js/videopopup.js"></script>
    <script src="assets2/js/script.js"></script>
    <script type="text/javascript">
        function showdoortoggle(){
            $('.colorsubchild').toggle(150);
        }
        function showframetoggle(){
            $('.framecolorsubchild').toggle(150);
        }
        function showsizetoggle(){
            $('.sizesubchild').toggle(150)
        }
        $(document).ready(function() {
            $("#owl-model").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-default-size").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-external-color,#owl-internal-color").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-glass").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-frame").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-frame-color,#owl-frame-internal-color").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-frame-glass").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-furniture").owlCarousel({
                items : 6
            });
        });
        $(document).ready(function() {
            $("#owl-hing-glass").owlCarousel({
                items : 6
            });
        });
        
        $('.btnSize').click(function(e){
            e.preventDefault();
            $('.sizesubchild').show();
            $('#v-pills-tab a[href="#v-pills-model"]').tab('show');
        });
        $('.btnDefaultSize').click(function(e){
            e.preventDefault();
            $('.sizesubchild').show();
            $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
        });
        $('.btnModel').click(function(e){
            e.preventDefault();
            $('.sizesubchild').hide();
            $('#v-pills-tab a[href="#v-pills-model"]').tab('show');
        });
        $('.btnColor').click(function(e){
            e.preventDefault();
            $('.colorsubchild').show();
            $('.sizesubchild').hide();
            $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
        });
        $('.btninternalColor').click(function(e){
            e.preventDefault();
            $('.colorsubchild').show();
            $('#v-pills-tab a[href="#v-pills-internal-color"]').tab('show');
        });
        $('.btnGlass').click(function(e){
            e.preventDefault();
            $('.colorsubchild').hide();
            $('#v-pills-tab a[href="#v-pills-glass"]').tab('show');
        });
        $('.btnFrame').click(function(e){
            e.preventDefault();
            $('.framecolorsubchild').hide();
            $('#v-pills-tab a[href="#v-pills-frame"]').tab('show');
        });
        $('.btnHinge').click(function(e){
            e.preventDefault();
            $('#v-pills-tab a[href="#v-pills-hing"]').tab('show');
        });
        // $('.colortab').click(function(e){
        //     e.preventDefault();
        //      $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
        //      $('colortab').removeClass('active');
        //      $('.btnColor').addClass('active');
        // });
        $('.btnFrameGlass').click(function(e){
            e.preventDefault();
            $('.framecolorsubchild').hide();
            $('#v-pills-tab a[href="#v-pills-frame-glass"]').tab('show');
        });
        $('.btnFrameexternalColor').click(function(e){
            e.preventDefault();
            $('.framecolorsubchild').show();
            $('#v-pills-tab a[href="#v-pills-frame-external-color"]').tab('show');
        });
        $('.btninternalframecolor').click(function(e){
            e.preventDefault();
            $('.framecolorsubchild').show()
            $('#v-pills-tab a[href="#v-pills-frame-internal-color"]').tab('show');
        });
        
        $('.btnFurniture').click(function(e){
            e.preventDefault();
            $('#v-pills-tab a[href="#v-pills-furniture"]').tab('show');
        });
        $('.owl-builder li button').on('click', function(){
            $('li button.selected').removeClass('selected');
            $(this).addClass('selected');
        });
        function getexternalcolors(id)

            {
                
       
            url = "{{url('get_colors')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                "_token": "{{ csrf_token() }}",
                "id":id,  
              
           },
            success:function(result){
                $('#v-pills-external-color').html(result);
                $("#owl-external-color,#owl-internal-color").owlCarousel({
                    items : 6
                });
            }
            });
            get_internalcolors(id)
    }
    function get_internalcolors(id)

        {
        url = "{{url('get_internal_color')}}";
        console.log(url);
        $.ajax({
        type:'POST',
        url:url,

        data:{
            "_token": "{{ csrf_token() }}",
            "id":id,  
        
        },
        success:function(result){
        $('#v-pills-internal-color').html(result);
        $("#owl-internal-color").owlCarousel({
            items : 6
        });
        }
        });
        get_glasses(id)
        }
    function  get_glasses(id)
    {
        url = "{{url('get_glasses')}}";
        console.log(url);
        $.ajax({
        type:'POST',
        url:url,

        data:{
            "_token": "{{ csrf_token() }}",
            "id":id,  
        
        },
        success:function(result){
        $('#v-pills-glass').html(result);
        $("#owl-glass").owlCarousel({
                items : 6
            });
        }
        });
        get_frame(id)
    }
    function get_frame(id)
    {
        url = "{{url('get_frames')}}";
        console.log(url);
        $.ajax({
        type:'POST',
        url:url,

        data:{
            "_token": "{{ csrf_token() }}",
            "id":id,  
        
        },
        success:function(result){
        $('#v-pills-frame').html(result);
        $("#owl-frame").owlCarousel({
                items : 6
            });
        }
        });
        get_hinge(id)
    }
    function get_hinge(id)
    {
        url = "{{url('get_hinge')}}";
        console.log(url);
        $.ajax({
        type:'POST',
        url:url,

        data:{
            "_token": "{{ csrf_token() }}",
            "id":id,  
        
        },
        success:function(result){
        $('#v-pills-frame').html(result);
        $("#owl-frame").owlCarousel({
                items : 2
            });
        }
        });
    }
    function getModalExtColor(id,price){
        test = $('.selectable_ext');
        test.toggleClass('checked');
        $(".selectable_ext.checked").each(function(){
            total = product_info.total + parseInt($(this).data('price'));
        });
        product_info['ext_color_id'] = id;
        product_info['ext_color_price'] = price;
        product_info['total'] = total;
        $('#p_price').html(total);
        
    }
    // $(function(){
    //     $('.selectable_ext').click(function(){
    //         var type = $('.selectable_ext');
    //         type = type.children().first().val();
    //         alert(type);
    //         //url = "{{url('submit-query')}}";
    //     });
    // });
    </script>