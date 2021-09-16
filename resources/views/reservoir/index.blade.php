<!-- @foreach ($reservoirs as $reservoir)
  <a href="{{route('reservoir.edit',[$reservoir])}}">{{$reservoir->title}}</a>
  <form method="POST" action="{{route('reservoir.destroy', [$reservoir])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach -->



@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header" style="background-color:#87CEEB">CREATE RESERVOIR</div>
               <div class="card-body">
        <div class="table-responsive-xl">
           <table class="table">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Area</th>
                    <th scope="col">About</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                 </tr>
        </div>
<tbody>     
@foreach ($reservoirs as $reservoir)
    <tr>
        <!-- <td>{{$reservoir->reservoirMember->name}} {{$reservoir->reservoirMember->surname}}</td> -->
        <td>{{$reservoir->title}}</td>
        <td>{{$reservoir->area}}</td>
        <td>{!!$reservoir->about!!}</td>
  <!-- <a href="{{route('reservoir.edit',[$reservoir])}}">{{$reservoir->title}} {{$reservoir->reservoirMember->name}} {{$reservoir->reservoirMember->surname}}</a> -->
  <td><a class="btn btn-primary" href="{{route('reservoir.edit',[$reservoir])}}">Edit</a></td>
  <td>
  <form method="POST" action="{{route('reservoir.destroy', [$reservoir])}}">
   @csrf
   <button type="submit"class="btn btn-danger">DELETE</button>
  </form>
<td>
  <br>
@endforeach

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
