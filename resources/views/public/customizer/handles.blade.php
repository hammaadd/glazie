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
                            @foreach ($handles as $handel)
                            
                            <li class="item list-unstyled text-center selectable_ext" >
                                
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$handel->id}},{{$handel->price}},8);setDoorHandle('{{$handel->image}}');">
                                    <div class="door">
                                         <img class="door-image" src="{{asset('admin-assets/addon/furniture/'.$handel->image)}}" align="">
                                    </div>
                                </button>
                            </li>
                            @endforeach
                        </div>
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

        function setDoorHandle(image){
            var image_name = "<?php echo asset('admin-assets/addon/furniture/'); ?>"+image;
            // alert(image_name);
            var a = document.getElementById("main_image");
            var mainsvgDoc = a.contentDocument;
            var svgItems = mainsvgDoc.getElementById("right_handle");
            if (svgItems.hasChildNodes()) {
				var st = svgItems.removeChild(svgItems.childNodes[0]);
			}
            //var st = svgItems.removeChild();
            var x = document.createElementNS("http://www.w3.org/2000/svg","image");
            x.setAttributeNS('http://www.w3.org/1999/xlink',"xlink:href","data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAuCAYAAADDX4LFAAAACXBIWXMAAC4jAAAuIwF4pT92AAAHZGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDYwLCAyMDIwLzA1LzEyLTE2OjA0OjE3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMiAoTWFjaW50b3NoKSIgeG1wOkNyZWF0ZURhdGU9IjIwMjAtMTAtMDJUMTQ6MTU6MTErMDE6MDAiIHhtcDpNb2RpZnlEYXRlPSIyMDIwLTEwLTA4VDA5OjAxOjQzKzAxOjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDIwLTEwLTA4VDA5OjAxOjQzKzAxOjAwIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyIgcGhvdG9zaG9wOklDQ1Byb2ZpbGU9InNSR0IgSUVDNjE5NjYtMi4xIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVmMTFkYzI5LWQ1ZDItNGU4NS04ZThhLWVmMDljZmUzZGJkYiIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjc0MGZjMTgwLTgzNDItNWM0NS1iMTMyLWRmZDIyMTJlOTU5MiIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjdmNzg2YjhlLWI3OWYtNGI3MS1hYzkxLTQxODliZmE4YTM1YSI+IDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDxyZGY6QmFnPiA8cmRmOmxpPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDowMDZlODgwYi0wYTdmLWM3NGMtODFhYi1iNWVkY2EyNzc1YmI8L3JkZjpsaT4gPC9yZGY6QmFnPiA8L3Bob3Rvc2hvcDpEb2N1bWVudEFuY2VzdG9ycz4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo3Zjc4NmI4ZS1iNzlmLTRiNzEtYWM5MS00MTg5YmZhOGEzNWEiIHN0RXZ0OndoZW49IjIwMjAtMTAtMDJUMTQ6MTU6MTErMDE6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCAyMS4yIChNYWNpbnRvc2gpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplOGM3YzFhZS1hMzBiLTRhZTEtYjMwNy1lYjViNDNhYmFkZmMiIHN0RXZ0OndoZW49IjIwMjAtMTAtMDJUMTQ6MTY6MjMrMDE6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCAyMS4yIChNYWNpbnRvc2gpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1ZjExZGMyOS1kNWQyLTRlODUtOGU4YS1lZjA5Y2ZlM2RiZGIiIHN0RXZ0OndoZW49IjIwMjAtMTAtMDhUMDk6MDE6NDMrMDE6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCAyMS4yIChNYWNpbnRvc2gpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PoJulhAAAAUHSURBVFiFrZfJj1RVFIe/O7xXQ0N30QXSNERGFXBIE+OQIBCjGxfGnTFhEplEZenWjX+EW3GhS91IWCi6kTEkOMSAtMwNDV1zVVe94b57XTQNPXdVtyc5qzr57u+cc+ue88Qf336DznYhlKJ6+xblG4Mo7dGuaaUoVGvrrgwN/ehwWwUieaqn+7vtb761Vz+OspZsPk/l5r8s6epCCNEW3DnH4NV/flqaTm0UCKxzqlAu73lw7+55PTEotbSbKLeMH387Q25ZD87ND2+G0da+JV2rff1EZ3cmTXl4+GM9MTCJY9Y9/xIXr1zjh19/IZ/Pz5uBsTbzwWuvCK3UpGx831+upwZnPI+jBw7gK8W5C+fJ9fQAsx8QGWN9z2OicuccnlJmGjyOY5y17Nu9G+cc5y+cp7e3FzdHjZRSTFUuhWAaHMAkCSIM2b9nD9YmXLx0iWW53Ixgh0MphZoAxzmElDPDAWJjEFKyf89egiDg7ytXyHV3Y6dk4BwoKSfDASkEctZcgSiKiOOYQx9+xAtbtlAoFmfULh/BJ7qQcm44gDEGpRUHPzzA5ueeo16vT7tBQojpDvPDAZrNJg44dvgIzz7zDKVyadIBQqppjmhD+biyKIpQWnP44CE2bdxErVabEDCT+jaVj1ur1UJLxZGDh+jv76feqD+ByckO8zR0pgyCMCCTSvHJkaP0r+qnXKk++tUh3Fhzx03qVAqdyXTkRkqW9/Xx6WfHWbthg0NKpPbA84mNwXv0b9VJtfKxrVZeBdp4pp5YwTkymQzH3ns37xoNrXwfpKT4YJR6GOKnM+jL585+lVYdVWeSdWWzRA6stQjnaMWGG8PDbB8YQJ/6/U+EXDhcSUkzCGDCTenv6UYAetvG9V/cHim8vFBwnCS5NcvzO0xspHWWyCS8vmUzibXo59es+dKZpO3JM26elIRJwl9DQwPv79xxTgmRMrEhwZJNZ2hGMXo0DIiM6QgupSQ0hsGHI5RHm6IZhizJZtEpH08IQhMDzP4qzmZKShJrGXw4QiuK8LXGOYcxZrqIjsBCYJ3l+kiRZhyjlZrz/rYNl0LgBFwfKVILA7w2blhbcCUlIPj3YYFaEOBPGQwLho812nG9MEK11cJrEzwvXAqBEoLrhSLVVkBKd9b/WeFCCKQQ3CiWKDfHFHf0+MwGFwiUFNwslSiOjrZd43nhQgi0ltwslCg2Fg6eBheAlpLbxTIjjUZHzZsTLgBPa26XSjys1ztuXsrzWJnLsSSdfrydyXG0Voq75QrDtfqk1Ww+G3+RRoOA78+cZahSIeWN7fdSIPC1YqhS5X6lQkrrOdbO2Q84efESJ34+zVcnT1EJQsAhu9IZ7lUq3K9UHs++Ts0BSWJY0dODs5YkScaW0bPXrnG3UkUvEAyQGMMbW7fgK8WubQP0plPgHPLyzVsLKsVEE2P7OEpKstksJo5wgFyaTi8C+0i5dbTCkFKjQb0VkFg3VpbFgoUQJIkhrTUvrn2aTflewijCWvs/wBFYa0lrzb5dO1nha4wxOOs6H3PTlY99iYRxjEkSEmtxzqGcRTejaFFwk1gxdX4659DOKb2qp3tR8FYU28gYjE0mwb3AD/U72wYWBY+SZPDqnTtRLpNJjb/3zVaL/Mq+03rl6tWLgvtaN6pBcPzu/eGvpZI460j7XrF/7brP9dSvswUoZ11f34l6rfagFoRv+56qbV6//jtP6+J//846pChh+1UAAAAASUVORK5CYII");
            x.setAttributeNS(null,"class","cls-22");
            x.setAttributeNS(null,"x","331.1");
            x.setAttributeNS(null,"y","203");
            x.setAttributeNS(null,"width","64");
            x.setAttributeNS(null,"height","615");
            svgItems = svgItems.appendChild(x);
        }


    </script>
      @else
      <h3 class="text-center">No handles are available for selected model </h3>
      @endif