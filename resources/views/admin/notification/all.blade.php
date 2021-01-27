@foreach ($notifications as $notification)
<a href="{{url('admin/notifydetails/'.$notification->id)}}" class="dropdown-item d-block p-15 border-bottom">
    <div class="d-flex">
        <div class="avatar avatar-blue avatar-icon">
            <i class="anticon anticon-mail"></i>
        </div>
        <div class="m-l-15">
            <p class="m-b-0 text-dark">{{$notification->name}}</p>
            <p class="m-b-0"><small>{{$notification->created_at}}</small></p>
        </div>
    </div>
</a>
@endforeach