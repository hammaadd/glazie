@if(count($letterboxs)>0)

<section class="section product-section">
    <div class="title-box">
        <div class="container">
            <!--Sec Title-->
            <div class="sec-title text-center">
                <div class="title-inner">
                    <h2>Choose Your <span class="theme_color">Door Letter Box </span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-section pt-0">
        <div class="lower-inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="owl-letterbox" class="owl-builder owl-carousel owl-theme">
                            @foreach ($letterboxs as $letterbox)
                            
                            <li class="item list-unstyled text-center selectable_ext" >
                                
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100"  onclick="setprice({{$letterbox->id}},{{$letterbox->price}},10);setLetterBox('{{$letterbox->image}}');getdoor();">
                                    <div class="door">
                                         <img class="door-image" src="{{asset('admin-assets/addon/furniture/'.$letterbox->image)}}" align="">
                                    </div>
                                </button>
                            </li>
                            @endforeach
                            <input type="hidden" name="baseletterbox" id="baseletterbox" value="">
                        </div>
                        <div class="customNavigation">
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="getknocker()">Prev</a>
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="framglass()">Next</a>
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
      var base64Val;
        $('.owl-builder li button').on('click', function(){
            $('li button.selected').removeClass('selected');
            $(this).addClass('selected');
        });

        function toDataURL(src, callback) {
            var img = new Image();
            img.crossOrigin = 'Anonymous';
            img.onload = function() {
                var canvas = document.createElement('CANVAS');
                var ctx = canvas.getContext('2d');
                var dataURL;
                canvas.height = this.naturalHeight;
                canvas.width = this.naturalWidth;
                ctx.drawImage(this, 0, 0);
                dataURL = canvas.toDataURL();
                callback(dataURL);
            };
            img.src = src;
            if (img.complete || img.complete === undefined) {
                img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                img.src = src;
            }
        }

        function setLetterBox(image){
            var image_name = "<?php echo asset('admin-assets/addon/furniture'); ?>"+'/'+image;
            var test = toDataURL(
                image_name,
                function(dataUrl) {
                    $("#baseletterbox").attr("value", dataUrl);
                }
            )
            
            //var test = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
            
            var a = document.getElementById("main_image");
            var mainsvgDoc = a.contentDocument;
            var svgItems = mainsvgDoc.getElementById("letterbox");
            if (svgItems.hasChildNodes()) {
                var st = svgItems.removeChild(svgItems.childNodes[0]);
            }
            setTimeout(function() {
                baseval = $("#baseletterbox").val();
                var x = document.createElementNS("http://www.w3.org/2000/svg","image");
                x.setAttributeNS('http://www.w3.org/1999/xlink',"xlink:href",baseval);
                x.setAttributeNS(null,"class","cls-22");
                x.setAttributeNS(null,"x","142.4");
                x.setAttributeNS(null,"y","500.6");
                x.setAttributeNS(null,"width","126");
                x.setAttributeNS(null,"height","210");
                svgItems = svgItems.appendChild(x);
            }, 500);
        }
        function getdoor(){
            var fdoor = document.getElementById("main_image");
            var mainsvgFDoc = fdoor.contentDocument;
            var fdoor = mainsvgFDoc.getElementById("Layer_1");
            var $button = $(fdoor).clone();
            $('#finalDoor').html($button);
        }
    </script>
      @else
      <h3 class="text-center">No LetterBox  available for selected model</h3>
      @endif