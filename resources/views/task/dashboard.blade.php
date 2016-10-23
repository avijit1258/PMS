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
          
        </div>
    </td>
    <td></td>
    <td></td>
    <td></td>

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
@endsection
