@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View FAQ</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View FAQ</a></li>
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
                            <a href="/admin/new-faq" class="btn btn-primary btn-sm pull-right" href="#"><i
                                        class="fa fa-lg fa-plus"></i>New FAQ</a><br><br>
                        </div>

                    </div>
                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
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
                                <td>{{$res->question}}</td>
                                <td>{{$res->answer}}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/view-faq/edit/{{$res->faq_id}}" class="btn btn-info"><i
                                                    class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/view-faq/delete/{{$res->faq_id}}" class="btn btn-warning" onclick="return checkDelete()"><i
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