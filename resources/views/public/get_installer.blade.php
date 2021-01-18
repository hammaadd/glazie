 @if (count($installers)>0)
 @foreach ($installers as $installer)
 <div class="col-md-6 mt-4">
     <div class="card">
         <div  class="card-body text-center">
             <h4>{{$installer->name}}</h4>
             <h5>{{$installer->email}}</h5>
             <p>{{$installer->adddress}}</p>
             <p><span class="font-weight-bold"> Phone No:</span>{{$installer->contact_no}}</p>
             <a href="{{url('installerdetails/'.$installer->id)}}" class="btn btn-outline-info"> <i class="fa fa-eye"></i> Details</a>
         </div>
     </div>
 </div>
@endforeach
@else
<div class="col-md-12">
    <div class="alert alert-danger"><b>No Search  Result Found</b></div>
</div>
 @endif
