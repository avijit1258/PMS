@extends('layouts.app')

@section('content')

<ul class="nav nav-pills" role="tablist">
  <li role="presentation" class="active"><a href="#">Requests<span class="badge">{{count($add_requests)}}</span></a></li>
  
</ul>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(count($add_requests) <= 0)
                    <h1>Bravo You have no pending request</h1>
                    @else
                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Project</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($add_requests as $r)
                            <tr>
                                <th>{{$sl++}}</th>
                                <td>{{$r->project_name}}</td>
                                <td>{{$r->role_name}}</td>
                                <td>
                                    <form action="/project_users/{{ $r->serial }}/confirm" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="PUT">

                                                <button type="submit" id="delete-project_user" class="btn btn-success">
                                                    <i class="fa fa-btn fa-trash"></i>Confirm
                                                </button>
                                    </form>
                                    <form action="/project_users/{{ $r->serial }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-project_user" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach        
                        </tbody>
                    </table>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
