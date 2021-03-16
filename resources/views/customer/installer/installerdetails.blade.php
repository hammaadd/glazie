@extends('customer.layouts.layouts')
@section('title','Installer Details')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Installer Details</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Installer Details</a>
                    
                </nav>
            </div>
        </div>
       <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #E3E3E3">
                    <h3 class="mt-1">Installer Details</h3> 
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-md-3">
                            <h5 class="text-right font-weight-bold">Installer Name:</h5>
                            <h5 class="text-right font-weight-bold">Email Address:</h5>
                            <h5 class="text-right font-weight-bold">Phoen No:</h5>
                            <h5 class="text-right font-weight-bold">Address:</h5>
                        </div>
                        <div class="col-md-9">
                            <h5>{{$installer->name}}</h5>
                            <h5>{{$installer->email}}</h5>
                            
                            <h5>{{$installer->contact_no}}</h5>
                            <h5>{{$installer->address}}</h5>
                        </div>
                    </div>
                    @if ($installer->installerinfo)
                        <div class="row">
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
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Hire this installer for work</h3>
                        </div>
                    </div>
                    @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                   <div class="row">
                       <div class="col-md-6">
                        <div class="alert alert-danger bg-danger text-light">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{$error}}
                        </div>
                       </div>
                   </div>
                    @endforeach
                    @endif
                    <form action="{{url('customer/hirerequest')}}" method="post">
                        @csrf
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
                            <div class="col-md-6">
                                <label for="">Post Code</label>
                                <input type="text" class="form-control" name="postcode" placeholder="Enter Post Code">
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
       </div>
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script><script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
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
 
    $("#installerlist").DataTable();
    </script>
    @endsection
