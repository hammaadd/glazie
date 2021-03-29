
    <div class="row mb-5" id="srachresult">
        @foreach ($products as $product)
        <?php $product_gallery = $product->gallery;
        $i=0;
        foreach ($product->gallery as $key => $value) {
           if ($value->is_primary=="1") {
               $image = $value->image;
               $i=1;
           }
    
       }
       if ($i==0) {
           $image = $value->image;
       }
        ?>
        
        
            <div class="col-lg-3 col-md-4 col-6">
                <div class="product">
                    @if($product->sale_price)
                    <span class="pr_flash">Sale</span>
                    @endif
                    <div class="product_img">
                        <a href="{{url('productdetails/'.$product->id)}}">
                            <img src="{{asset('productimages/'.$image)}}"
                        <?php $profile_image=""; ?>
                           > 
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                {{-- @if ($product->type=='simple')
                                {{-- <li class="add-to-cart"><a style="cursor: pointer" onclick="addtocart({{$product->id}})"><i class="bx bx-cart"></i> Add To Cart</a></li> --}}
                                {{-- @endif <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li> --}}
                                {{-- <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>--}}
                                <li><a  title="Add to wish list" onclick="addtowishlist({{$product->id}},'{{$image}}')"><i class="bx bx-heart" ></i></a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title text-center"><a href="{{url('productdetails/'.$product->id)}}">{{$product->product_name}}</a></h6>
                        <div class="product_price text-center">
                           @if($product->sale_price)
                           <span class="price "><span class="currencySymbol">£</span>{{$product->sale_price}}</span>
                           <del><span class="currencySymbol">£</span>{{$product->regular_price}}</del>
                           @else
                           <span class="price "><span class="currencySymbol">£</span>{{$product->regular_price}}</span>
                           
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $products->links('vendor/pagination/bootstrap-4') }}
        </div>
    </div>
