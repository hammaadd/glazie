<table class="table table-hover" id="products">
    <thead>
        <th>Sr.#</th>
        <th>Produt Name </th>
        <th>Brand</th>
        <th>Description</th>
        <th>Available Quantity</th>
        <th>Action</th>
    </thead>
    <tbody>
    

        @if(count($products)>0)
        @foreach($products as $product)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->brand_name}}</td>

            <td>@php
                echo substr($product->short_description, 0, 30);
            @endphp</td>
            <td>
                @if ($product->quantity==0)
                <span class="text-danger">Out of stock</span>
                @else
                <span class="text-success">In stock</span>
                @endif
            </td>
            <td>
                <a href="{{url('admin/products/view/'.$product->id)}}" class="badge badge-warning"> <i class="fa fa-eye"></i> View</a>
                <a href="{{url('admin/products/edit/'.$product->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                <a href="{{url('admin/products/delete/'.$product->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
            </td>
        </tr>
        
        @endforeach
        @endif
    </tbody>
</table>