@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Update Project Information
		</div>
		<div class="panel-body">
			
			
			<form action="/projects/{{$project->id}}" method="post">
				{{ csrf_field() }}

				<input type="hidden" name="_method" value="PUT">
				<input type="text" name="project_name" placeholder="Project Name" value="{{$project->project_name}}">
				<button type="submit">UPDATE</button>
			</form>

		</div>

	</div>

@endsection