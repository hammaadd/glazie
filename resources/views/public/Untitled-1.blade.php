<div class="row">
    <div class="col-md-2">
       
    </div>
    <div class="col-md-10"><h5 class="">{{$installer->name}}</h5></div>
    <div class="col-md-2">
        <h5>Working Details</h5>
    </div>
    <div class="col-md-10"><p class="text-justify">{{$work->working_details}}</p></div>
    <hr>
</div>
<div class="row">
    <div class="col-md-2">
        <h5>Rating</h5>
    </div>
    <div class="col-md-10">
        <div class="jstars" data-value="{{$work->rating}}"></div></h3>
    </div>
</div>
@if($work->feedback)
    <div class="row">
        <div class="col-md-2">
            <h5>Feedback</h5>
        </div>
        <div class="col-md-10">
        <span>{{$work->description}}</span>
        </div> 
    </div>
@endif