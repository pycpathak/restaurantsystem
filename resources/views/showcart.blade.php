
<!DOCTYPE html>
<html lang="en">

<head>
    
    <base href="/public">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Restaurant System </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <!-- =======================================================
  * Template Name: Delicious
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body >


  @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show text-center">
    
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"> </button>
    
    </div>
  @endif



  <!-- ======= Header ======= -->
  <header id="header" class=" d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a >Delicious</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li><a class="nav-link scrollto" >About</a></li>
          <li><a class="nav-link scrollto" >Menu</a></li>
          <li><a class="nav-link scrollto" >Specials</a></li>
          <li><a class="nav-link scrollto" >Events</a></li>
          <li><a class="nav-link scrollto" >Chefs</a></li>
          <li><a class="nav-link scrollto" >Gallery</a></li>
          <li><a class="nav-link scrollto" >Contact</a></li>
          
          @if(Session::has('user'))
            <li class="dropdown"><a class="nav-link"><span> {{ Session::get('user')->name }} </span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a class="nav-link scrollto" href="{{url('/showcart', Session::get('user')->id)}}"> Cart[{{$count}}] </a></li>
                <li><a href="{{url('/logout')}}"> Logout </a></li>
                
              </ul>
            </li>
          @else
            <li> <a href="{{ route('login') }}" class="nav-link scrollto">Log in</a> </li>
            <li>  <a href="{{ route('register') }}" class=" nav-link scrollto">Register</a> </li>
          @endif

          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  @if( $count != 0)
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="cart" class="about ">
    <div class="container-fluid">
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title text-center"> Cart details </h3>
                
              </div>
            <div class="row">
                <div class="col-lg-10 stretch-card">
                    <div class="card">
                      <div class="card-body"> 
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th> Food Name </th>
                                <th> Amount </th>
                                <th> Quantity </th>
                                <th> Total Price </th>
                              </tr>
                            </thead>
                            <tbody>

                            <form  method="POST" action="{{url('/orderconfirm')}}" class="forms-sample">

                              @php $Total = 0; @endphp

                            @foreach($data as $dt)
                              <tr class="table-info" >
                                  <td> <input type="text" name="foodname[]" value="{{$dt->title}} " hidden="">
                                     {{$dt->title}} 
                                     <input type="text" name="image[]" value="{{$dt->image}} " hidden="">
                                     <img src="foodimage/{{$dt->image}}" style="height:50px; width:50px; border-radius:50%;">
                                  </td> 

                                  <td> <input type="text" name="price[]" value="{{$dt->price}} " hidden="">
                                     {{$dt->price}} </td>

                                  <td> <input type="text" name="quantity[]" value="{{$dt->quantity}}" hidden="">
                                     {{$dt->quantity}} </td>

                                  <td> {{ $x = $dt->price * $dt->quantity }} </td>

                                       @php
                                        $Total = $Total + $x;
                                       @endphp  
                              </tr>
                            @endforeach
                            
                            <tr>
                                <th> </th>
                                <th> </th>
                                <th> Grand Total </th>
                                <th>  {{ $Total }} </th>
                            </tr>

                                
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-2 stretch-card">
                    <div class="card">
                      <div class="card-body"> 
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($data2 as $dt2)
                                <tr>
                                <td> <input type="text" name="id[]" value="{{$dt2->id}} " hidden="">
                                  <a href="{{url('/remove',$dt2->id)}}"><button type="button" class="btn btn-danger"> Remove </button> </a> </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  
        
            </div>
            </div>
        </div>

        <div class="row ">
          <div class="col-12 text-center mt-3">
            <button class="btn btn-success " type="button" id="order"> Order Now </button>
          </div>
        </div>

        <div class="row d-flex justify-content-center text-center mt-3 "  >
          <div class="col-md-6 grid-margin stretch-card " >
            <div class="card" id="appear" style="display: none;">
              <div class="card-body">
                <h4 class="card-title">Default form</h4>

                
                  @csrf
                  <div class="form-group">
                    <label for="name"> Name </label>
                    <span class="text-danger"> *
                      @error('name')
                          {{ $message }}
                      @enderror
                    </span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name " value="{{Session::get('user')->name}}"/>
                  </div>
                  <div class="form-group">
                    <label for="phone"> Phone </label>
                    <span class="text-danger"> *
                      @error('phone')
                          {{ $message }}
                      @enderror
                    </span>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number "/>
                  </div>
                  <div class="form-group">
                    <label for="address"> Address </label>
                    <span class="text-danger"> *
                      @error('address')
                          {{ $message }}
                      @enderror
                    </span>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address "/>
                  </div>
                
              </div>
                  <button type="submit" class="btn btn-primary mr-2"> Order Confirm </button>
                  <button type="reset" class="btn btn-danger" id="close" > Close </button>
                
                </form>
              </div>
            </div>
          </div>
        
    </section>
  </main>

  @else

  <div class="container-fluid">
    <div class="main-panel mt-5">
        <div class="content-wrapper ">
          <div class="page-header ">
            <h3 class="page-title text-center m-3"> Cart is empty!!! Please add some amazing items </h3>
          </div>
        </div>
    </div>
  </div>

  @endif
  
  <script type="text/javascript">

    $("#order").click(
      function()
      {
        $("#appear").show();
      }
      

    );

    $("#close").click(
      function()
      {
        $("#appear").hide();
      }
      

    );

  </script>
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>