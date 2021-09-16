

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"style="background-color:#FAD5A5">CREATE</div>
               <div class="card-body">
                 
               <form method="POST" action="{{route('member.store')}}">

<!-- Name: <input type="text" name="member_name"> -->
    <div class="form-group">
  <label>Name</label>
  <input type="text" name="member_name"  class="form-control">
  <small class="form-text text-muted">Member name.</small>
  </div>
<!-- Surname: <input type="text" name="member_surname"> -->
    <div class="form-group">
  <label>Surname</label>
  <input type="text" name="member_surname"  class="form-control">
  <small class="form-text text-muted">Member surname.</small>
  </div>
   <!-- Live: <input type="text" name="member_live"> -->
    <div class="form-group">
  <label>Live</label>
  <input type="text" name="member_live"  class="form-control">
  <small class="form-text text-muted">Where are you from?</small>
  </div>
   <!-- Experience: <input type="text" name="member_experience"> -->
    <div class="form-group">
  <label>Experience</label>
  <input type="text" name="member_experience"  class="form-control">
  <small class="form-text text-muted">How many years you have been fishing.</small>
  </div>
   <!-- Registered: <input type="text" name="member_registered"> -->
       <div class="form-group">
  <label>Registered</label>
  <input type="text" name="member_registered"  class="form-control">
  <small class="form-text text-muted">How many years you are member of this club?</small>
  </div>
   @csrf
   <button type="submit"class="btn btn-success">ADD</button>
</form>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection
