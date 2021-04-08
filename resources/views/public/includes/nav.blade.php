@section("nav")
<header class="header">
  <!-- header top -->
  <div class="header-top">
    <div class="container">
      <div class="row align-items-md-center">
        <div class="col-md-6">
          <div class="wl-msg text-center text-md-start mb-3 mb-md-0">
            <p>Welcome to Glazie</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="float-md-end text-center text-md-end">
            <ul class="dt-sc-sociable list-inline mb-0">
              <li class="d-inline px-2">
                <a href="#" title="Facebook" target="_blank">
                  <i class='bx bxl-facebook'></i>
                </a>
              </li>
              <li class="d-inline px-2">
                <a href="#" title="Linkedin" target="_blank">
                  <i class='bx bxl-linkedin'></i>
                </a>
              </li>
              <li class="d-inline px-2">
                <a href="#" title="Twitter" target="_blank">
                  <i class='bx bxl-twitter'></i>
                </a>
              </li>
              <li class="d-inline px-2">
                <a href="#" title="Instagram" target="_blank">
                  <i class='bx bxl-instagram'></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @php
      $url = str_replace("/glazieltd/","", $_SERVER["REQUEST_URI"]);
  @endphp
  
  <!-- header middle -->
  <div class="header-middle">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-3 col-md-2 col-sm-6">
          <div class="logo">
            <a href="{{url('')}}">
              <img src="{{asset('assets/media/logo.png')}}" alt="Double Glaze Windows and Doors">
            </a>
          </div>
        </div>
        <div class="col-xl-9 col-md-10 col-sm-6">
          <div class="row">
            <div class="col-lg-9 d-none d-lg-block">
              <div class="row">
                <div class="col-sm-4 offset-sm-4">
                  <div class="column-inner">
                    <div class="dt-sc-contact-info">
                      <a id="phone_link">
                        <i class='bx bx-phone'></i>
                        <h6>Phone</h6>
                        <p id="phoneno"></p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="column-inner">
                    <div class="dt-sc-contact-info">
                      <a id="mail_link" >
                        <i class='bx bx-paper-plane'></i>
                        <h6>Email</h6>
                        <p id="adminmail"></p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-12">
              <ul class="navbar-nav attr-nav align-items-center justify-content-sm-end">
                @if(!empty(Auth::id()))
                <li>
                  <a class="nav-link cart_trigger" href="{{url('product/wishlist')}}" data-toggle="dropdown">
                    <i class='bx bx-heart'></i>
                    @php
                    $count = 0;
                    if(Session::get('wish')){
                        $count = count(Session::get('wish'));
                    }
                    @endphp
                    
                    <span class="cart_count" id="wishitem" @if($count==0)  style="display:none;" @endif>{{$count}}</span>
                    
                  </a>
                  
                </li>
                @endif
                <li class="dropdown login_dropdown">
                  <a href="{{url('login')}}" class="nav-link open-login">
                    <i class='bx bx-user'></i>
                  </a>
                  {{-- <div class="login-wrapper dropdown-menu dropdown-menu-right">
                    <div class="h5">Sign in</div>
                    {{-- <form>
                      <div class="form-group mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group mb-3">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group mb-3">
                        <a href="#" class="btn btn-main btn-sm">Forgot password?</a>
                        <br>
                        <a href="#" class="btn btn-main btn-sm">Don't have an account?</a>
                      </div>
                      <div class="d-grid">
                        <button type="submit" class="btn btn-outline-themecolor">Submit</button>
                      </div>
                    </form>
                  </div> --}}
                </li>
                {{-- <li>
                  <a href="javascript:void(0);" class="nav-link search_trigger">
                    <i class='bx bx-search'></i>
                  </a>
                  <div class="search_wrap">
                    <span class="close-search">
                      <i class="bx bx-x"></i>
                    </span>
                    <form>
                      <input type="text" placeholder="Search" class="form-control" id="search_input">
                      {{-- <button type="submit" class="search_icon">
                        <i class='bx bx-search'></i>
                      </button> --}}
                    </form>
                  {{-- </div>
                  <div class="search_overlay"></div>
                  <div class="search_overlay"></div>
                </li>  --}}
                <li class="dropdown cart_dropdown">
                  <a class="nav-link cart_trigger" href="{{url('productcart')}}" data-toggle="dropdown">
                    <i class='bx bx-cart-alt'></i>
                    <span class="cart_count" id="cart_items"></span>
                  </a>
                  
                </li>
                <li class="d-xl-none">
                  <button class="nav-link menu-trigger navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class='bx bx-menu'></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- header bottom -->
  <div class="header-bottom">
    <nav class="navbar navbar-expand-xl">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item @if($url=='') active @endif">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item @if($url=='products') active @endif">
              <a class="nav-link" href="{{url('products')}}">Products</a>
            </li>
            <li class="nav-item @if($url=='composite/door') active @endif">
              <a class="nav-link " href="{{url('composite/door')}}">Composite Doors</a>
            </li>
            <li class="nav-item  @if($url=='alumenium/door') active @endif">
              <a class="nav-link" href="{{url('alumenium/door')}}">Aluminium Bifold Doors</a>
              {{-- <div class="dropdown-menu" >
                <ul>
                  <li>
                    <a class="dropdown-item nav-link nav_item" href="#">Bifold Door Designer</a>
                  </li>
                </ul> --}}
              {{-- </div> --}}
            </li>
            <li class="nav-item @if($url=='installerlist') active @endif ">
              <a class="nav-link" href="{{url('installerlist')}}">Fitting Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Our Guarantee</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li> --}}
            <li class="nav-item @if($url=='contact-us') active @endif">
              <a class="nav-link" href="{{url('contact-us')}}">Contact us</a>
            </li>
            <li class="nav-item @if($url=='blog/posts') active @endif">
              <a class="nav-link" href="{{url('blog/posts')}}">Blog Post</a>
            </li>
            <li class="nav-item dropdown " id="sitecontent" >
              <a class="nav-link" href="#">Site Content</a>
              <div class="dropdown-menu" >
                <ul id="dropdownlink">
                  
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>

  