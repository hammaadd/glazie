@if(count($handles)>0)

<section class="section product-section">
    <div class="title-box">
        <div class="container">
            <!--Sec Title-->
            <div class="sec-title text-center">
                <div class="title-inner">
                    <h2>Choose Your <span class="theme_color">Handel </span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-section pt-0">
        <div class="lower-inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="owl-handles" class="owl-builder owl-carousel owl-theme">
                            @foreach ($handles as $key => $handel)
                            
                            <li class="item list-unstyled text-center selectable_ext" >
                                
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onmouseover="getprice({{$handel->id}},{{$handel->price}},8)">
                                    <div class="door">
                                         <img class="door-image" id="handel{{$handel->id}}" src="{{asset('admin-assets/addon/furniture/'.$handel->image)}}" align="">
                                    </div>
                                </button>
                            </li>
                            @endforeach
                        </div>
                        <input type="text" id="handelid">
                        <input type="text" id="price">
                        
                        <div class="customNavigation">
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="framglass()">Prev</a>
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="getknocker()">Next</a>
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
      
        $('.owl-builder li button').on('click', function(){
            $('li button.selected').removeClass('selected');
            $(this).addClass('selected');
        });
        function getprice(id,price,index)
        {
            $('#handelid').val(id);
            $('#price').val(price);

            
        }
        function getDataUrl(img) {
        // Create canvas
        console.log(img);
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        // Set width and height
        console.log(img.width);
        canvas.width = img.width;
        canvas.height = img.height;
        // Draw the image
        ctx.drawImage(img, 0, 0);
        return canvas.toDataURL('image/png');
        }

// Select the image
        var handleid = $('#hadelid').val();
        
        if(handelid!=null || handleid!='')
        {
            
        const img = document.querySelector('#handel15');

       // console.log(img);
        img.addEventListener('click', function (event) {
            var handleid = $('#hadelid').val();
           //console.log(document.getElementById('#handel14'));
        const dataUrl = getDataUrl(event.currentTarget);
        console.log(dataUrl);
        });
        }


    </script>
      @else
      <h3 class="text-center">No handles are available for selected model </h3>
      @endif