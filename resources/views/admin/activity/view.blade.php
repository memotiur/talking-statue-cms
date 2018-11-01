@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View Activities</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View Activities</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <strong></strong> {{session('success')}}
                        </div>
                    @endif
                    @if(session('decline'))
                        <div class="alert alert-danger">
                            <strong></strong> {{session('decline')}}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Statue</th>
                            <th>Time</th>
                           {{-- <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0
                        @endphp
                        @foreach($result as $res)
                            @php
                                $i++
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$res->name}}</td>
                                <td>{{$res->statue_name}}</td>
                                <td>{{$res->created_at}}</td>

                               {{-- <td>
                                    <div class="btn-group">
                                        <a href="/admin/view-city/edit/{{$res->city_id}}" class="btn btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/view-city/delete/{{$res->city_id}}" class="btn btn-warning"><i
                                                    class="fa fa-lg fa-trash"></i></a>
                                    </div>
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection