

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"style="background-color:#AFE1AF">EDIT</div>

               <div class="card-body">
            
<form method="POST" action="{{route('reservoir.update',[$reservoir])}}">
       <!-- Title: <input type="text" name="reservoir_title" value="{{$reservoir->title}}"> -->
       <div class="form-group">
  <label>Title</label>
  <input type="text" name="reservoir_title"  class="form-control" value="{{$reservoir->title}}">
  <small class="form-text text-muted">Enter title of reservoir.</small>
  </div>
       <!-- Area: <input type="text" name="reservoir_area" value="{{$reservoir->area}}"> -->
       <div class="form-group">
  <label>Area</label>
  <input type="text" name="reservoir_area"  class="form-control" value="{{$reservoir->area}}">
  <small class="form-text text-muted">Enter area of reservoir.</small>
  </div>
       <!-- About: <textarea name="reservoir_about">{{$reservoir->about}}</textarea> -->
       <div class="form-group">
  <label>About</label>
  <textarea name="reservoir_about"  class="form-control" value="{{$reservoir->about}}"id="summernote"></textarea>
  <small class="form-text text-muted">Enter information about reservoir.</small>
  </div>
       <select name="member_id">
           @foreach ($members as $member)
               <option value="{{$member->id}}" @if($member->id == $reservoir->member_id) selected @endif>
                   {{$member->name}} {{$member->surname}}
               </option>
           @endforeach
</select>
       @csrf
       <br>
       <br>
       <button type="submit"class="btn btn-primary">EDIT</button>
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
