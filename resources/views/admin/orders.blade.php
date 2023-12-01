
@extends('admin.adminlayouts.main')

@section('main-section')
 

 

<div class="main-panel">
  <div class="content-wrapper">

    <form action="" method="get">
        {{-- not using action url as we are using get method --}}
        <div class="form-group">
          <input type="search" name="search" placeholder="Search by name or phone or foodname" value="{{ $search }}" style="width:32%;">
        </div>
        <button class="btn btn-primary "> Search </button>
        <a href="{{url('/orders')}}"> <button class="btn btn-primary" type="button"> Reset </button> </a>
    </form>

    <div class="page-header mt-3">
        <h3 class="page-title "> Customer Orders </h3>
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
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Address </th>
                            <th> Foodname </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Total price </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                          <tr> 
                            <td> {{$dt->name}} </td>
                           
                            <td> {{$dt->phone }} </td>
                            <td> {{$dt->address}} </td>
                            <td> {{$dt->foodname}} 
                                <img src="/foodimage/{{$dt->image}}"  style="height:50px; width:50px; border-radius:50%;" alt="image" />
                            </td>
                            <td> {{$dt->price }} </td>
                            <td> {{$dt->quantity}} </td>
                            <td> {{ $dw =  $dt->price * $dt->quantity }} </td>
                           
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
</div>

@endsection