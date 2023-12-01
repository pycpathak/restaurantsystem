
<base href="/public">  
{{-- we have to write this as css is not uploading without this --}}

@extends('admin.adminlayouts.main')

@section('main-section')
 
<div class="main-panel">
 <div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title"> Update Food Menu </h3>
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
                    <h4 class="card-title">Update Items</h4><br>
                    {{-- <p class="card-description">Basic form elements</p> --}}
                    <form class="forms-sample" action="{{url('/updatefood', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title"> Title </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="text" name="title" class="form-control" id="title" value="{{$data->title}}"  />
                    </div>
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <span class="text-danger"> * </span>
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                        <textarea   name="description" class="form-control" id="description"  rows="4"  > {{$data->description}} </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="filter">Choose a tag :</label>
                    
                        <select id="filter" name="filter">
                        <option value="starters" {{$data->filter == "starters"? "selected": ""}} > Starters </option>
                        <option value="salads" {{$data->filter == "salads"? "selected": ""}} > Salads </option>
                        <option value="specialty" {{$data->filter == "specialty"? "selected": ""}} > Specialty </option>
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
                        <input type="number" name="price" class="form-control" id="price" value="{{$data->price}}"   step="any" />
                    </div>

                    <div class="form-group">
                        <label> Old Image </label>
                        <img src="foodimage/{{$data->image}}" style="height:200px; width:200px; " alt="image">

                    </div>
                    
            
                    <div class="form-group">
                        <label for="image">File upload</label>
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
    </div>
</div>


@endsection