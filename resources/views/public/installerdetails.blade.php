@extends('public/layouts/layouts')
@section('title','Installer Deails')
@section('content')
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
                      <div class="col-md-9">
                          <h5 class="mt-2">{{$installer->name}}</h5>
                          <h5 class="mt-2">{{$installer->email}}</h5>
                          
                          <h5 class="mt-2">{{$installer->contact_no}}</h5>
                          <h5 class="mt-2">{{$installer->address}}</h5>
                      </div>
                  </div>
              </div>
          </div>
                  @if (count($installer->installerinfo)>0)
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
                            <input type="text" class="form-control" name="last_name" placeholder="First Name"value="{{old('last_name')}}">
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
                              <textarea name="working_details" id="summernote" class="form-control" rows="10" placeholder="Work Details"> {{ old('working_details') }}</textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-success btn-tone mt-3"> <i class="fa fa-check"></i> Submit</button>
                              <a href="" class="btn btn-tone btn-danger mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
                          </div>
                      </div>
                  </form>
             
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


