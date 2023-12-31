

 

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title> Login </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 </head>
 <body>

@if($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show text-center">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
     {{ $message }}
  </div>
@endif
   <div class="container-fluid pt-5" style="background-color: #eee;">
    <section class="vh-100 " >
        <div class="container h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Login </p>
      
                      <form method="post"  action="{{url('/login')}}" class="mx-1 mx-md-4" >
                        @csrf 
      
                        
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="email" >Your Email</label> 
                            <span class="text-danger"> * </span>
                            <span class="text-danger">
                              @error('email')
                                  {{ $message }}
                              @enderror
                            </span>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" />
                           
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label"  for="pwd">Password</label> 
                            <span class="text-danger"> * </span>
                            <span class="text-danger">
                              @error('pwd')
                                  {{ $message }}
                              @enderror
                            </span>
                            <input type="password" name="pwd" id="pwd" class="form-control" />
                            
                          </div>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg"> Login </button>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">  
                            <a href="{{url('/register')}}" > Register </a>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   </div>
 
 </body>
 </html>