
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header" style="background-color:#87CEEB">MEMBERS LIST</div>
               <div class="card-body">
        <div class="table-responsive-xl">
           <table class="table">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Live</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Registered</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                 </tr>
        </div>
<tbody>
               @foreach ($members as $member)
<tr>
        <td>{{$member->name}}</td>
        <td>{{$member->surname}}</td>
        <td>{{$member->live}}</td>
        <td>{{$member->experience}}</td>
        <td>{{$member->registered}}</td>
  <!-- <a href="{{route('member.edit',[$member])}}">{{$member->name}} {{$member->surname}} {{$member->live}} {{$member->experience}} {{$member->registered}}</a> -->
  <td><a class="btn btn-primary" href="{{route('member.edit',[$member])}}">Edit</a></td>
  <td>
     <form method="POST" action="{{route('member.destroy', $member)}}">
         @csrf
         <button type="submit" class="btn btn-danger">DELETE</button>
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
