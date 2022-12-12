@extends('layout.home')
@section('content')
<form action="{{route('adduser')}}" method="Post">
    @csrf
    <div class="mb-3">
        <label  class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
        @error('name')
            <p>{{$message}}</p>
        @enderror
      </div>
    <div class="mb-3">
      <label  class="form-label">Email address</label>
      <input type="email" name="email" class="form-control"  >
      <div  class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label  class="form-label">Number </label>
        <input type="number" name="number" class="form-control" >
      </div>
    <div class="mb-3">
      <label  class="form-label">Address</label>
      <input type="text" name="address" class="form-control" >
    </div>
    <div class="mb-3">
        <label  class="form-label">Date Of Birth </label>
        <input type="date" name="date_of_birth" class="form-control"  >
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection
