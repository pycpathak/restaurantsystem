

@extends('admin.adminlayouts.main')

@section('main-section')



<div class="main-panel">
    <div class="content-wrapper">
        
        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"> </button>
        </div>
        @endif

        <div class="page-header">
        <h3 class="page-title"> Users Data</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
            </ol>
        </nav>
        </div>
        <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title"> Users </h4>
                
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Email </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td> {{ $dt->name }} </td>
                            <td> {{ $dt->email }} </td>
                            @if ($dt->usertype != 1)
                            <td>
                                <label class="badge badge-warning"> <a href="{{url('/deleteuser', $dt->id)}}"> Delete </a></label>
                            </td>
                            @else
                            <td>
                                <label class="badge badge-info"> Not Allowed </label>
                            </td>
                            @endif
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