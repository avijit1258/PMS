@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="col-md-6">
		<table class="table table-bordered table-hover ">
			<thead>
				<tr>
				<th>#</th>
				<th>Project Name</th>
				<th>Dashboard</th>
				</tr>
				
			</thead>
			
			<tbody>

				@foreach($projects as $project)
				<tr>
				<th scope="row">{{$sl++}}</th>
				<td>{{$project->project_name}}</td>
				<td><a href="/projects/{{$project->project_id}}/dashboard">Dashboard</a></td>
		
 
 				</tr>
				@endforeach
			</tbody>
			
		</table>

		<br>
		<div>
			
		</div>

	</div>
	</div>
@endsection