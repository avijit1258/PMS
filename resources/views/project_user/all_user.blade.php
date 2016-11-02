@extends('layouts.app')

@section('content')



<div class="container narrow">
  <div class="panel panel-default">
    <div class="panel-header">
      {{$project_users[0]->project_name}}'s users
    </div>
    <div class="panel-body">
      <table class="table table-striped place-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>  
          </tr>          
        </thead>

        <tbody>
        @foreach($project_users as $p)
        <tr>
            <td>{{$sl++}}</td>
            <td>{{$p->name}}</td>
            <td>{{$p->role_name}}</td>
        </tr>
          
        @endforeach
          
        </tbody>

      </table>
    </div>
  </div>
  

</div>
@endsection