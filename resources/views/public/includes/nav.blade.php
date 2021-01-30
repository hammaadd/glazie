@section("nav")
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('installerlist')}}">Installer</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             WebSite Content 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownlink">
           
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          
          <a href="{{'productcart'}}" class="nav-link"><i class="fas fa-shopping-cart" id="shopping_cart"> <sup class="badge badge-warning rounded-circle" id="cart_items"></sup></i></a>
        
        </li>
        
      </ul>
      
    </div>
  </nav>

  