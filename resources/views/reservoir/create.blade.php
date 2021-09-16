
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"style="background-color:#FAD5A5">CREATE</div>

               <div class="card-body">
                  
                 <form method="POST" action="{{route('reservoir.store')}}">
   <!-- Title: <input type="text" name="reservoir_title"> -->
       <div class="form-group">
  <label>Title</label>
  <input type="text" name="reservoir_title"  class="form-control">
  <small class="form-text text-muted">Enter title of reservoir.</small>
  </div>
   <!-- Area: <input type="text" name="reservoir_area"> -->
       <div class="form-group">
  <label>Area</label>
  <input type="text" name="reservoir_area"  class="form-control">
  <small class="form-text text-muted">Enter area of reservoir.</small>
  </div>
   <!-- About: <textarea name="reservoir_about"></textarea> -->
       <div class="form-group">
  <label>About</label>
  <textarea name="reservoir_about"  class="form-control" id="summernote"></textarea>
  <small class="form-text text-muted">Enter information about reservoir.</small>
  </div>
   <select name="member_id">
       <!-- $sorted = $member->sortBy([
           ['name'],
       ]);
       $sorted->values()->all(); -->
       @foreach ($members as $member)
           <option value="{{$member->id}}">{{$member->name}} {{$member->surname}}</option>
       @endforeach
</select>
   @csrf
   <br>
   <br>
   <button type="submit"class="btn btn-success">ADD</button>
</form>


               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection

