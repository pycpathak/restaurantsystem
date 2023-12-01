
@extends('admin.adminlayouts.main')

@section('main-section')



 
<div class="main-panel">
  <div class="content-wrapper">
    @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show text-center">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      {{ $message }}
      
      </div>
    @endif

    @if($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show text-center">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      {{ $message }}
      
      </div>
    @endif


    <div class="page-header">
        <h3 class="page-title">Chefs  </h3>
    
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"> Add Chefs </h4>
               
                <form class="forms-sample" action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Name <span class="text-danger"> * </span> </label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" />
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="speciality" class="col-sm-3 col-form-label"> Speciality <span class="text-danger"> * </span> </label>
                    <div class="col-sm-9">
                      <input type="text" name="speciality" class="form-control" id="speciality" placeholder="Write the Speciality" />
                        <span class="text-danger">
                            @error('speciality')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="image" class="col-sm-4 col-form-label"> Upload Image <span class="text-danger"> * </span> </label>
                    <div class="col-sm-8">
                        <input type="file" name="image" class="form-control" id="image">
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                  </div>
                
                  <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                  <button type="reset" class="btn btn-light" > Cancel </button>
                </form>
              </div>
            </div>
        </div>
    
    
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> Chefs Data </h4>
            <div class="table-responsive">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th> Chef Name</th>
                    <th> Speciality </th>
                    <th> Image </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $dt)
                  <tr>
                    <td> {{$dt->name}} </td>
                    <td> {{$dt->speciality}} </td>
                    <td> <img src="chefimage/{{$dt->image}}" style="height: 100px; width:100px; " alt="image">   </td>
                    <td>
                      <button class="btn btn-info"> <a href="{{url('/updatechef', $dt->id)}}" class="text-dark"> Update </a> </button>
                      <button class="btn btn-danger"> <a href="{{url('/deletechef', $dt->id)}}" class="text-dark"> Delete </a> </button> 
                    </td>
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

@endsection