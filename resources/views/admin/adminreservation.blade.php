
@extends('admin.adminlayouts.main')

@section('main-section')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Reservation Lists</h3>
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
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            
                            <th> Name</th>
                            <th> Email </th>
                            <th> Phone No.</th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> People </th>
                            <th> Message </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->phone}}</td>
                            <td>{{$dt->date}}</td>
                            <td>{{$dt->time}}</td>
                            <td>{{$dt->people}}</td>
                            <td><textarea rows="3 " cols="30" disabled > {{$dt->message}} </textarea></td>
                             
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