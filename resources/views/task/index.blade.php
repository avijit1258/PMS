@extends('layouts.app')

@section('content')

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
				<th scope="row">{{$project->id}}</th>
				<td>{{$project->project_name}}</td>
				<td><a href="/projects/{{$project->id}}/dashboard">Dashboard</a></td>
		
 
 		</tr>
			@endforeach
			</tbody>
			
		</table>
	</div>
@endsection