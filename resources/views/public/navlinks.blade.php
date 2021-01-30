@foreach ($links as $link)
<a class="dropdown-item" href="{{url('cms/'.$link->id)}} ">{{$link->title}}</a>
@endforeach