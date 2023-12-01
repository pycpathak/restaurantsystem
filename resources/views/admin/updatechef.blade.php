
<base href="/public">  
@extends('admin.adminlayouts.main')

@section('main-section')



 
<div class="main-panel">
  <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title"> Update Chef Data  </h3>
    
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

                <form class="forms-sample" action="{{url('/updatefoodchef',$data->id )}}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-group row">
                    <label for="name" class="col-sm-12 col-form-label"> Update Name <span class="text-danger"> * </span>
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                    </label>
                    
                    
                    <div class="col-sm-9"> 
                      <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="speciality" class="col-sm-12 col-form-label"> Update Speciality <span class="text-danger"> * </span>
                    <span class="text-danger">
                        @error('speciality')
                            {{ $message }}
                        @enderror
                    </span>
                     </label>
                    
                    <div class="col-sm-9">
                      <input type="text" name="speciality" class="form-control" id="speciality" value="{{$data->speciality}}" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label> Old Image </label> <br> 
                    <img src="chefimage/{{$data->image}}" style="height:200px; width:200px; " alt="image">
                  </div>
                  <div class="form-group row">
                    <label for="image" class="col-sm-12 col-form-label"> Update Image <span class="text-danger"> * </span>
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                    </label>
                    
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                  </div>
                
                  <button type="submit" class="btn btn-primary mr-2"> Update Chef </button>
                  
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
