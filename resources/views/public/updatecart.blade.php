@if (count($carts))
<div class="row">
    <div class="col-md-6">
        <h3>Product Carts</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                      
                        <th>Prodcut Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                        <th>Discount</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
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
                        $price += $cart->price*$cart->quantity;
                        $net_regular_price += $cart->regular_price*$cart->quantity;
                    @endphp
                    <tr>
                        <td>{{$products->product_name}}</td>
                        <td>
                            <input type="hidden" id="regular_price{{$cart->id}}" value="{{$products->regular_price}}">
                            <input type="hidden" id="itemquantity{{$cart->id}}" value="{{$cart->price}}">
                            <a href="{{asset($image)}}"><img src="{{asset($image)}}" width="70px" height="70px"></a>
                        </td>
                        <td><input type="number" value="{{$cart->quantity}}" class="text-center" min="1" max="{{$products->quantity}}" oninput="update_qty({{$cart->id}})" id="no_of_qty{{$cart->id}}"></td>
                           <td id="regular_prices{{$cart->id}}">{{$cart->quantity*$products->regular_price}}</td>
                           @php
                           
                               $discount = $cart->quantity*$products->regular_price-$cart->quantity*$products->sale_price;
                               $net_discount = $net_discount +$discount;
                           @endphp
                           <td id="discounts{{$cart->id}}">{{$discount}}</td> 
                        <td id="item_total_price{{$cart->id}}">{{$cart->price*$cart->quantity}}</td>
                        <td > <span class="badge badge-secondary m-3" onclick="remove({{$cart->id}})"><i class="fa fa-times" title="Remove this product from Cart" ></i></span></td></td>
                    </tr>
                @endforeach
            </table>
            <input type="hidden" id="quantity" value="<?= $quantity ?>">
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <table class="table">
            <tr>
                <th><b>Quantity:</b></th>
                <td id="total_qty"><?= $quantity ?></td>
            </tr>

            <tr>
                <th>Total Amount</th>
                <td id="net_regular_price">{{$net_regular_price}}</td>
            </tr>
            
            <tr>
                <th>Discount</th>
                <td id="net_discounts">{{$net_discount}}</td>
            </tr>
            
            <tr>
                <th><b>Price:</b></th>
                <td id="total_price"><?= $price ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <a class="btn btn-success" href="{{url('checkout')}}"> <i class="fa fa-check"></i> CheckOut</a>
    </div>
</div>
@else
    <div class="row">
        <div class="col-md-8">
            <h3>Your Cart is empty <u> <a href="{{url('/')}}" class="btn btn-light"><i class="fa fa-backward"></i> Go Back </a></u></h3>
        </div>
    </div>
@endif