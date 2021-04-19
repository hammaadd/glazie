
    <h3 class="cart-page-title">Shopping Cart</h3>
    @if (count($carts))
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        
                <div class="table-content table-responsive cart-table-content" id="tabledata">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                {{-- <th>Unit Price</th> --}}
                                <th>Unit Price</th>
                                {{-- <th title="Variation / Custom Price">Price</th> --}}
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                    $quantity =$price = $net_discount = $net_regular_price= 0;
                @endphp
                @foreach ($carts as $cart)
                @php
                        $products = $cart->product;
                        $i=0;
                        $prdimgs = $products->gallery;
                        foreach ($prdimgs as $key => $prdimg) {
                            if ($prdimg->is_primary=='1') {
                                $image = $prdimg->image;
                                $i=1;
                            }
                            
                        } 
                        if ($i!=1) {
                            $image = $prdimg->image;
                        }
                        $quantity+= $cart->quantity;
                       
                        $net_regular_price += $cart->regular_price*$cart->quantity;
                    @endphp
                            <tr>
                                <td class="product-thumbnail cart-list">
                                    <input type="hidden" value="{{$products->quantity}}" id="prdqty{{$cart->id}}">
                                    <input type="hidden" id="regular_price{{$cart->id}}" value="{{$products->regular_price}}">
                                    <input type="hidden" id="itemquantity{{$cart->id}}" value="{{$cart->price}}">
                                    <a href="#"><img src="{{asset('productimages/'.$image)}}" alt=""></a>
                                </td>
                                <td class="product-name text-center">
                                    <a href="#" class="mb-2">{{$products->product_name}}</a>
                                </td>
                                {{-- <td class="product-price-cart"><span class="amount">&#163;{{$cart->price}}</span></td> --}}
                            <td>{{$cart->price}}</td>
                                 
                                 
                                @php
                                  $variation_price=0;  
                                @endphp
                                <td class="product-quantity">
                                    @foreach ($cart->cartdetails as $cartdetails)
                                    @php
                                        $variation_price = $variation_price +$cartdetails->price;
                                    @endphp
                                 @endforeach
                                    <div class="cart-plus-minus">
                                        <div class="dec qtybutton" onclick="removeqty({{$cart->id}})">-</div>
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{$cart->quantity}}"  oninput="update_qty({{$cart->id}})" id="no_of_qty{{$cart->id}}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                                        <div class="inc qtybutton" onclick="addqty({{$cart->id}})">+</div>
                                    </div>
                                </td>
                                <td class="product-subtotal" id="item_total_price{{$cart->id}}" >&#163; {{$cart->price*$cart->quantity + $variation_price*$cart->quantity}}</td>
                                <td class="product-remove">
                                    @php
                                         $price = $price + $cart->price*$cart->quantity + $variation_price*$cart->quantity
                                    @endphp
                                    {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                    <a style="cursor: pointer;" onclick="remove({{$cart->id}})"><i class="fa fa-times"></i></a>
                               </td>
                               @php
                               $variation_price=0;
                           @endphp
                            </tr>
                            @if($cart->product->type=='variable'|| $cart->product->type=='customize')
                            <tr>
                               
                                <td colspan="6">  @if($cart->product->type=='variable')
                                    @php
                                        $cart_details = $cart->cartdetails;
                                        foreach ($cart_details as $key => $cart_detail) {
                                            # code...
                                        }
                                        $variation_data = $cart_detail->variation;
                                        $variation_price = $variation_data->price;
                                        $variation_details = $variation_data->variationdetails
                                    @endphp
                                    <input type="hidden" id="variation_price{{$cart->id}}" value="{{$variation_price}}">
                                   
                                    @foreach ($variation_details as $details)
                                    @php
                                    $a = array('primary','secondary','success','danger','warning text-dark','info text-dark','light text-dark','dark');
                                    $randindex = array_rand($a);

                                @endphp
                                        <span class="badge  bg-light text-dark">{{$details->prd_term->term->name}}</span>
                                    @endforeach
                                   
                               @endif
                               @if ($cart->product->type=='customize')
                                  
                                   @foreach ($cart->cartdetails as $cartdetails)
                                      @php
                                          $variation_price = $variation_price +$cartdetails->price;
                                      @endphp
                                   @endforeach
                                   @foreach ($cart->cartdetails as $cartdetails)
                                    @if($cartdetails->addon_type=='model')
                                    <span class="badge  text-dark" title="Model Name ">{{$cartdetails->model->model_name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='exteranal_color')
                                     <span  class="badge bg-light text-dark" title="External Color">{{$cartdetails->color->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='interanal_color')
                                    <span  class="badge bg-light text-dark" title="Internal Color">{{$cartdetails->color->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='glass')
                                      <span  class="badge bg-light text-dark" title="Glass name ">{{$cartdetails->frame->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='frame')
                                    <span  class="badge bg-light text-dark" title="Frame name ">{{$cartdetails->frame->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='frameexcolor')
                                     <span class="badge bg-light text-dark" title="Frame External Color">{{$cartdetails->framecolor->value}}</span>
                                    
                                    @endif
                                    @if($cartdetails->addon_type=='frameinternalcolor')
                                     <span class="badge bg-light text-dark" title="Frame internal Color">{{$cartdetails->framecolor->value}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='frame_glass')
                                     <span class="badge bg-light text-dark" title="Frame glass">{{$cartdetails->frameglass->glass_name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='handle')
                                     <span class="badge bg-light text-dark" title="Handle">{{$cartdetails->furniture->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='knocker')
                                     <span class="badge bg-light text-dark" title="Knocker">{{$cartdetails->furniture->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='letterbox')
                                     <span class="badge bg-light text-dark" title="Letter Box">{{$cartdetails->furniture->name}}</span>
                                    @endif
                                    @if($cartdetails->addon_type=='hinge')
                                      <span class="badge bg-light text-dark" title="Hinge">{{$cartdetails->hinge->hingeside}}</span>
                                    @endif
                                    
                                   @endforeach
                               @endif</td>
                            </tr>
                            @endif
                           @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0" href="{{url('availproducts')}}">Continue Shopping</a>
                            </div>
                            <div class="cart-clear">
                                {{-- <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 mx-3">Update Shopping Cart</button> --}}
                                <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0" href="{{url('clearcart')}}" >Clear Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="discount-code-wrapper">
                        <div class="title-wrap">
                           <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                        </div>
                        <div class="discount-code">
                            <p>Enter your coupon code if you have one.</p>
                            
                                <input type="text" required="" name="name" id="coupen" class="form-control">
                                
                                <span class="text-success text-center mb-2" style="display: none" id="discountmessage"></span>
                                <span class="text-danger text-center mb-2" style="display: none" id="coupenmessage"></span> 
                                <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end" onclick="checkcoupen()" type="button">Apply Coupon</button>
                            
                        </div>
                    </div>
                    <input type="hidden" id="net_total" value="{{$price}}">
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="cart-tax">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                        </div>
                        
                        <div class="tax-wrapper">
                            <p>Enter your destination to get a shipping estimate.</p>
                            <div class="tax-select-wrapper">
                                <div class="tax-select">
                                    <label>
                                        * Region / State
                                    </label>
                                    <input type="text">
                                </div>
                                <div class="tax-select">
                                    <label>
                                        * Zip/Postal Code
                                    </label>
                                    <input type="text">
                                </div>
                                <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end" type="submit">Get A Quote</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <div class="col-lg-6 col-md-12">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                        </div>
                        <h5>Total products <span id="total_price">&#163;{{$price}}</span></h5>
                        <h5 style="display: none" id="disrow" >Discount <span  id="discount"></span></h5>
                        <div class="total-shipping">
                            <h5>Total shipping</h5>
                            <ul>
                                @foreach ($times as $time)
                                <li><input type="radio" name="delivery_id" @if ($time->price==0)
                                    checked
                                @endif onclick="checkprice({{$time->id}},{{$time->price}})"> {{$time->name}} <span>&#163;{{$time->price}}</span></li>
                                @if($time->price==0)
                                <input type="hidden" id="checkprice" value="{{$time->id}}">
                                <input type="hidden" id="pricevalue" value="{{$time->price}}">
                                @endif
                                @endforeach
                                <input type="hidden" id="discountt" value="0">
                                <input type="hidden" id="prdquantity" value="{{$quantity}}">
                            </ul>
                        </div>
                        <h4 class="grand-totall-title" >Grand Total  <span id="grand_total">&#163;{{$price}}</span></h4>
                        <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end w-100" href="{{url('checkout')}}">Proceed to Checkout</a>
                    </div>
                </div>
                <input type="hidden" id="paidamount" value="{{$price}}">
            </div>
        </div>
    </div>
    @else 
    <h3 class="mb-3">Your Cart is empty <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 " href="{{url('products')}}"><i class="fa fa-backward"></i> Go Back </a></h3>
    @endif
