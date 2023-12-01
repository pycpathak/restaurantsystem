
@extends('admin.adminlayouts.main')

@section('main-section')


<div class="main-panel">
    <div class="content-wrapper">
 
      @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          {{ $message }}
        
        </div>
      @endif

      @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          {{ $message }}
        
        </div>
      @endif

        <div class="page-header">
        <h3 class="page-title">Food Menu </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
          </ol>
        </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Items</h4><br>
                    {{-- <p class="card-description">Basic form elements</p> --}}
                    <form class="forms-sample" action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="title"> Title </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" name="title" class="form-control" id="title"  placeholder="Write a title" value="{{old('title')}}"  />
                      </div>
                      <div class="form-group">
                        <label for="description"> Description </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                        <textarea   name="description" class="form-control" id="description"  rows="4"   > {{old('description')}} </textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="filter">Choose a tag :</label>
                       
                        <select id="filter" name="filter">
                          <option value="starters">Starters</option>
                          <option value="salads">Salads</option>
                          <option value="specialty">Specialty</option>
                        </select>
                        <span class="text-danger"> * </span>
                        {{-- not given error message coz starters will be going as default in option value --}}
                      </div>
                      
                      <div class="form-group">
                        <label for="price"> Price </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </span>
                     
                        <input type="number" name="price" class="form-control" id="price"  placeholder="Write the price" value="{{old('price')}}"   step="any" />
                      </div>
             
                      <div class="form-group">
                        <label for="image"> Upload Image </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="file" name="image" class="form-control" id="image" >
                      </div>
                    
                      
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button type="reset" class="btn btn-light" > Cancel </button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        <div class="page-header">
          <h3 class="page-title"> Food Data </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Food Name </th>
                        <th> Description </th>
                        <th> Price </th>
                        <th> Image </th>
                        <th> Tag </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $dt)
                      <tr>
                        <td> {{$dt->title}} </td>
                        <td> <textarea rows="3 " cols="30" disabled> {{$dt->description}} </textarea> </td>
                        <td> {{$dt->price}} </td>
                        <td> <img src="/foodimage/{{$dt->image}}" style="height:50px; width:50px; border-radius:50%;" alt="image">    </td>
                        <td> {{$dt->filter}} </td>
                        <td>
                          <label class="badge badge-info"> <a href="{{url('/updateview', $dt->id)}}" class="text-dark"> Update </a> </label> <br> <br>
                          <label class="badge badge-danger"> <a href="{{url('/deletemenu', $dt->id)}}" class="text-dark"> Delete </a> </label>
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