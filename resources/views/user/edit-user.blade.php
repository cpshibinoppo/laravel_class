@extends('layout.home')
@section('content')
    <div class="container">
        <form action="{{ route('updateuser') }}" method="Post">
            @csrf
            <input type="hidden" name="user_id" value="{{encrypt($user->id)}}">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" value="{{$user->email}}" name="email" class="form-control">
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Number </label>
                <input type="number" value="{{$user->number}}" name="number" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" value="{{$user->address}}" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Date Of Birth </label>
                <input type="date" value="{{$user->dob->format('Y-m-d')}}" name="date_of_birth" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
