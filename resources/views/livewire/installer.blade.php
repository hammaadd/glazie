<div>
    
     
           <div class="row mt-3">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   <input type="search" class="form-control" wire:model.debounce.500ms="name" placeholder="Write Something..">
                   
               </div>
               <div class="col-md-2">
                   <button class="btn btn-outline-info" wire:click="ascending"><i class="fas fa-sort-amount-down-alt"></i></button>
                   <button class="btn btn-outline-info" wire:click="descending"><i class="fas fa-sort-amount-up"></i></button>
               </div>
             </div>
             <div class="row">
                 @if(count($installers)>0)
                     @foreach ($installers as $installer)
                         <div class="col-md-6 mt-3">
                             <div class="card">
                                 <div class="card-body text-center">
                                     <h1>{{$installer->name}}</h1>
                                     <p>{{$installer->email}}</p>
                                     <p>{{$installer->contact_no}}</p>
                                     <a href="{{url('installerdetails/'.$installer->id)}}" class="btn btn-outline-info"><i class="fa fa-eye"></i> Details</a>
                                 </div>
                             </div>
                         </div>                
                     @endforeach
                 @else
                     <div class="col-md-12 mt-3">
                         <div class="alert alert-danger"><b>No Search Result Found</b></div>
                     </div>
                 @endif 
     
             </div>
        </div>

     

