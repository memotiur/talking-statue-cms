@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View Sponsor Logo</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View  Sponsor Logo</a></li>
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
                            <a href="/admin/view-sponsor-logo/create" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New Sponsor Logo</a><br><br>
                        </div>

                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>URL</th>
                            <th>City Name</th>
                            <th>Action</th>
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
                                <td><img src="/images/{{$res->image_url}}" height="100px"/></td>
                                <td>{{$res->sponsor_logo_web_url}}</td>
                                <td>{{$res->name}}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/view-sponsor-logo/edit/{{$res->sponsor_logo_id}}" class="btn btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/view-sponsor-logo/delete/{{$res->sponsor_logo_id}}" class="btn btn-warning" onclick="return checkDelete()"><i
                                                    class="fa fa-lg fa-trash"></i></a>
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