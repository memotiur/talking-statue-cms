@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View CMS Users</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View CMS Users</a></li>
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
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/admin/new-cms-users" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New User</a><br><br>
                        </div>

                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Phone</th>
                  {{--          <th>Status</th>--}}
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $res)
                            <tr>
                                <td>{{$res->name}}</td>
                                <td>{{$res->email}}</td>
                                <td>{{$res->age}}</td>
                                <td>{{$res->city}}</td>
                                <td>{{$res->mobile_number}}</td>
                               {{-- <td>
                                    @if($res->status==1)
                                        <span class="label label-info">Active</span>
                                        --}}{{--<button type="button" class="btn btn-info btn-xs">Active</button>--}}{{--
                                    @else
                                        <span class="label label-danger">Deactivate</span>
                                        --}}{{-- <button type="button" class="btn btn-danger btn-xs">Deactive</button>--}}{{--
                                    @endif
                                </td>--}}
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/edit-cms-user/{{$res->id}}" class="btn btn-info"
                                           href="#"><i class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/delete-cms-user/{{$res->id}}" class="btn btn-warning"
                                           onclick="return checkDelete()"><i class="fa fa-lg fa-trash"></i></a>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection