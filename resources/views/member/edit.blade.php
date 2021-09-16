
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header" style="background-color:#AFE1AF">EDIT</div>

               <div class="card-body">
                  
                 <form method="POST" action="{{route('member.update',$member)}}">
   <!-- Name: <input type="text" name="member_name" value="{{$member->name}}"> -->
       <div class="form-group">
  <label>Name</label>
  <input type="text" name="member_name"  class="form-control" value="{{$member->name}}">
  <small class="form-text text-muted">Member name.</small>
  </div>
   <!-- Surname: <input type="text" name="member_surname" value="{{$member->surname}}"> -->
    <div class="form-group">
  <label>Surname</label>
  <input type="text" name="member_surname"  class="form-control" value="{{$member->surname}}">
  <small class="form-text text-muted">Member surname.</small>
  </div>
   <!-- Live: <input type="text" name="member_live" value="{{$member->live}}"> -->
    <div class="form-group">
  <label>Live</label>
  <input type="text" name="member_live"  class="form-control" value="{{$member->live}}">
  <small class="form-text text-muted">Where are you from?</small>
  </div>
   <!-- Experience: <input type="text" name="member_experience" value="{{$member->experience}}"> -->
    <div class="form-group">
  <label>Experience</label>
  <input type="text" name="member_experience"  class="form-control" value="{{$member->experience}}">
  <small class="form-text text-muted">How many years you have been fishing?</small>
  </div>
   <!-- Registered: <input type="text" name="member_registered" value="{{$member->registered}}"> -->
       <div class="form-group">
  <label>Registered</label>
  <input type="text" name="member_registered"  class="form-control" value="{{$member->registered}}">
  <small class="form-text text-muted">How many years you are member of this club?</small>
  </div>
   @csrf
   <button type="submit" class="btn btn-primary">EDIT</button>
</form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
