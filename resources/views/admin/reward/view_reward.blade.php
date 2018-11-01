@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Rewards</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Rewards</a></li>
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
                            <a href="/admin/new-reward" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New reward</a><br><br>
                        </div>

                    </div>

                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Reward Name</th>
                            <th>Valid Period</th>
                            <th>Image</th>
                            <th>City</th>
                            <th>URL</th>
                            <th>Active Status</th>
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
                                <td>{{$res->reward_name}}</td>
                                <td>{{$res->valid_period}}</td>
                                <td><img src="/images/{{$res->reward_image}}" height="50px"/></td>
                                <td>{{$res->name}}</td>
                                <td>{{$res->reward_url}}</td>
                                <td>
                                    @if($res->active_status==1)
                                        <button type="button " class="btn btn-primary btn-xs">Active</button> @else
                                        <button type="button " class="btn btn-danger btn-xs">Inactive</button>  @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/reward/edit/{{$res->reward_id}}" class="btn btn-sm btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/reward/delete/{{$res->reward_id}}"
                                           class="btn btn-sm btn-warning"onclick="return checkDelete()"><i
                                                    class="fa fa-lg fa-trash"></i></a>
                                        @if($res->active_status==0)
                                            <a href="/admin/reward/active/{{$res->reward_id}}/1"
                                               class="btn btn-sm btn-success">Make Active</a>
                                        @else
                                            <a href="/admin/reward/active/{{$res->reward_id}}/0" class="btn btn-sm btn-danger">
                                              Make Inactive</a>
                                        @endif

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