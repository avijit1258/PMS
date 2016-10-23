@extends('layouts.app')



@section('content')

<style>
 th, td {
    border: 2px solid blue;
}
.b{
  padding: 2px;
}

.b1{
  background: red;
  float:left;
  border: 2px solid black;
   margin: 4px;

}

.b2{
  background: red;
  float: left;
  border: 2px solid black;
  margin: 4px;
}
.b3{
  background: red;
  float:left;
  border: 2px solid black;
  margin: 4px;
}
</style>

<div class="container-fluid">
        <div class="row">
  <div class="col-xs-1">
      
        <div class="sidebar-right ">
        @if($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2)
          <ul><a href="/project_user/{{$id}}/all_user">User List</a></ul>
          <ul><a href="/tasks/create/{{$id}}/">Add New Task</a></ul>
          <ul><a href="/project_users/create">Add new User</a></ul>
        @endif
        </div>    
     
  </div>
  
  <div class="col-xs-8">
          <div class="container">
    <h3>@foreach($project as $p)
      {{$p->project_name}}
      @endforeach</h3>

<table border="4" height="500" width="1350">
  <tr>
    <th width="216"bgcolor="olive">Module
    </th>
    <th width="216" bgcolor="yellow">ICE BOX</th>
    <th width="216" bgcolor="red">EMERGENCY</th>
    <th width="216" bgcolor="yellow">IN PROGRESS</th>
    <th width="216" bgcolor="yellow">TESTING</th>
    <th width="216" bgcolor="yellow">COMPLETE</th>
  </tr>
  
  <tr>
    <td>Cloud</td>
    <td>
        <div class="b">
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2) && $task->status_id == 1)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 1 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 1)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b">
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2) && $task->status_id == 5)
          <div class="b3">
            <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 5 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 5)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>

          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b">
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id) && $task->status_id == 2)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 2 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 2)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b">
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id || $if_admin[0]->role_id)&& $task->status_id == 3)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
           @elseif($task->status_id == 3 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 3)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>
    <td>
      <div class="b">
          @foreach($tasks as $task)
          @if(($if_admin[0]->role_id == 1 || $if_admin[0]->role_id == 2)&& $task->status_id == 4)
          <div class="b3">
            <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 4 && $task->assigned_to == $auth)
          <div class="b3">
          <a href="/tasks/{{$task->tid}}/edit/"><p>{{$task->task}}</p></a>
          </div>
          @elseif($task->status_id == 4)
          <div class="b3">
          <p>{{$task->task}}</p>
          </div>
          @endif
          @endforeach
        </div>
    </td>

  </tr>
  <tr>
    <td>Injestion Engine</td>
    <td>
      <div class="b">
          <div class="b1" >
            <p>DDesign</p>
          </div>
          <div class="b2">
            <p>DDesign</p>
          </div> 
          <div class="b3">
          <p>DDesign</p>
          </div>
        </div>
    </td>
    
    <td>
      <div class="b">
          <div class="b1" >
            <p>DDesign</p>
          </div>
          <div class="b2">
            <p>DDesign</p>
          </div> 
          
        </div>
    </td>
    </td>
    <td>
      <div class="b">
          <div class="b1" >
            <p>DDesign</p>
          </div>
          <div class="b2">
            <p>DDesign</p>
          </div> 
          
        </div>
    </td>
    </td>
    <td></td>
    <td></td>

  </tr> 
  <tr>
    <td>Compression Engine</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
      <div class="b">
          <div class="b1" >
            <p>DDesign</p>
          </div>
          
        </div>
    </td>
    </td>

  </tr>
  <tr>
    <td>File Storage Services</td>
    <td>
      <div class="b">
          <div class="b3">
          <p>DDesign</p>
          </div>
          <div class="b2">
            <p>DDesign</p>
          </div> 
          <div class="b3">
          <p>DDesign</p>
          </div>
        </div>
    </td>
    </td>
    <td></td>
    <td>
      <div class="b3">
          <p>DDesign</p>
          </div>
    </td>
    <td></td>
    <td>
      <div class="b3">
          <p>DDesign</p>
          </div>
    </td>

  </tr>     
</table>  
  </div>  
  </div>
  
</div>
  
</div>

  
@endsection
