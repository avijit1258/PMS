@extends('layouts.index')

@section('content')
    
       <div class="container narrow">
           <div>
                <div class="panel panel-default">
                <div class="panel-heading">
                    Add new project
                </div>
                <div class="panel-body">
                            <div class="col-sm-4">
                                <form action="/projects/" method="post" >
                                {{ csrf_field() }}
                                

                                <label for="input_project_name">Project Name</label>
                                <input type="text" name="project_name" id="input_project" class="form-control">

                                <button type="submit" class = "btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add
                                </button>

                            </form> 
                            </div>
                    </div>   
                            
                </div>
                </div>
        </div>
   

@endsection