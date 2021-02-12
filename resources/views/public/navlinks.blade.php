@foreach ($links as $link)
<li><a class="dropdown-item" href="{{url($link->slug)}} ">{{$link->title}}</a></li>
@endforeach