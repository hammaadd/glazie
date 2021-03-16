@extends('public/layouts/layouts')
@section('title','Installer Deails')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="{{asset('admin-assets/js/rating.js')}}"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

<script src="{{asset('admin-assets/js/jstars.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<!-- page js -->
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: #E3E3E3">
                  <h3 class="mt-1">Installer Details</h3> 
              </div>
              <div class="card-body">
                  <div class="row " >
                      <div class="col-md-3">
                          <h5 class="text-right font-weight-bold mt-2">Installer Name:</h5>
                          <h5 class="text-right font-weight-bold mt-2">Email Address:</h5>
                          <h5 class="text-right font-weight-bold mt-2">Phoen No:</h5>
                          <h5 class="text-right font-weight-bold mt-2">Address:</h5>
                      </div>
                      <div class="col-md-6">
                          <h5 class="mt-2">{{$installer->name}}</h5>
                          <h5 class="mt-2">{{$installer->email}}</h5>
                          
                          <h5 class="mt-2">{{$installer->contact_no}}</h5>
                          <h5 class="mt-2">{{$installer->address}}</h5>
                      </div>
                      <div class="col-md-3">
                        

                      </div>
                  </div>
              </div>
          </div>
                  @if ($installer->installerinfo))
                      <div class="row mt-3">
                          <div class="col-md-12">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Experienc</th>
                                          <th>Recharge</th>
                                          <th>Skills</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($installer->installerinfo as $item)
                                          <tr>
                                              <td>{{$item->experience}}</td>
                                              <td>{{$item->recharge}}</td>
                                              <td>{!!$item->skills!!}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  @endif
                  
                  <div class="row mt-3 ">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <button class="nav-link active" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Request Hiring</button>
                              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Get A Quote</button>
                              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Testamonials</button>
                            </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
                                @if(count($errors)>0)
                                    <ul>
                                    @foreach($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    @endif
                                <form action="{{url('hirerequest')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                          <h3>Your Details</h3>
                                          <hr> 
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <label for="">First Name </label>
                                          <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                                      </div>
                                      
                                      <div class="col-md-6">
                                          
                                          <label for="">Last Name </label>
                                          <input type="text" class="form-control" name="last_name" placeholder="Last name "value="{{old('last_name')}}">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="">Email Address </label>
                                          <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{old('email')}}">
                                      </div>
                                      
                                      <div class="col-md-6">
                                          <label for="">Contact No</label>
                                          <input type="text" class="form-control" name="contact_no" placeholder="Contact No " value="{{old('cotact_no')}}">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label for="">Complete Address</label>
                                          <input type="text" class="form-control" name="address" placeholder="Complete Address" value="{{old('address')}}">
                                      </div>
                                      <div class="col-md-6">
                                          <label for="">Post Code </label>
                                          <input type="text" class="form-control" name="postcode" placeholder="Post Code ">
                                      </div>
                                  </div>
                                  <div class="row mt-3" >
                                      <div class="col-md-12" >
                                          <h3>Working Details</h3>
                                          <hr>
                                      </div>
                                  </div>
                                  
                                    <div class="row">
                                          
                                          <div class="col-md-6">
                                              <label for="">Estimated Time</label>
                                              <input type="text" class="form-control" name="estimated_time" placeholder="Enter Estimated Time" value="{{ old('estimated_time') }}">
                                              <input type="hidden" name="installer_id" value="{{$installer->id}}">
                                          </div>
                                          <div class="col-md-6">
                                              <label for="">Amount</label>
                                              <input type="number" class="form-control" name="amount" placeholder="Enter Estimated amount"  min="1"  value="{{ old('amount') }}">
                                          </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Working Details</label>
                                            <textarea name="working_details" id="summernote" class="form-control" rows="5" placeholder="Work Details"> {{ old('working_details') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out rounded-0 px-4 py-2 mt-3"> <i class="fa fa-check"></i> Submit</button>
                                            <a href="" class="btn btn-fill-out theme_bgcolor2 text-white px-4 py-2 rounded-0 mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="{{url('quoteforinstaller')}}" method="post">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <h3>Questionare For Quote</h3>
                                            <div class="form-group">
                                                @csrf
                                                <label for="">Name</label>
                                                <input type="hidden" name="installer_id" value="{{$installer->id}}">
                                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
              
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Message / Question </label>
                                                <textarea name="message"  class="form-control" rows="10"></textarea>
                                            </div>
                                            <div class="form-group mt-3 mb-3">
                                                <button class="btn btn-fill-out rounded-0 px-4 py-2"><i class="fa fa-check"></i> Submit</button>
                                                <a href="" class="btn btn-fill-out theme_bgcolor2 text-white px-4 py-2 rounded-0 ml-5"><i class="anticon anticon-close"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>   
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                               @php
                                   $total_rating = $j=0;
                               @endphp
                                @if ($installer->testmonial)
                                @foreach ($installer->testmonial as $work)
                                @php
                                    $total_rating = $total_rating + $work->rating;
                                    $j++;
                                @endphp
                                @endforeach
                               @endif
                               <div class="card">
                                   <div class="card-header">
                                    @if($j>0)
                                    <h3 class="card-title">Total Rating <div class="jstars" data-value="{{$total_rating/$j}}"></div></h3>                                          
                                    @endif
                                   </div>
                                   <div class="row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-5">
                                       
                                    </div>
                                </div>
                               </div>
                               
                                    @if ($installer->testmonial)
                                    @foreach ($installer->testmonial as $work)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                   <img src="{{asset('admin-assets/testmonial/'.$work->image)}}" alt="" width="100%">
                                                </div>
                                                <div class="col-md-10"><h3 class="card-title"><div class="jstars" data-value="{{$work->rating}}"></div></h3>
                                                    <sup><small>{{$work->created_at}}</small></sup>
                                                    <p class="text-justify">{{$work->description}}</p>
                                                </div>
                                                
                                               
                                              
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                   @endif
                                  

                            </div>
                          </div>
                    </div>
                </div>
                  
                      
        </div>
     </div>   
     
</div>


    <!-- Model Start Here-->
    
    

@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  
    $(document).ready(function() {
    $('#summernote').summernote({
    height: 200,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
    });
    
});


@endsection


