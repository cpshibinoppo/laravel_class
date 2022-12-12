@extends('layout.home')
@section('content')
    <h1>Welcome {{auth()->user()->name}} </h1>
    <a href="{{route('logout')}}" class="btn btn-danger">LogOut</a>
    <a href="{{route('export')}}" class="btn btn-success">Export</a>
    <a href="{{route('pdf')}}" class="btn btn-warning">pdf</a>
    <div class="d-flex justify-content-between">
        <h1>user show list</h1>
        <a href="{{ route('adduserform') }}" class='btn btn-primary'>new</a>
    </div>
    @if (session()->has('message'))
    <p>{{session()->get('message')}}</p>
    @endif
    {{-- <div class="row"> --}}
        {{-- <div class="col-6">
            <table class="table">
                <h4>non order user</h4>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->Where('name','=','Mohammed shibin cp')->values() as $user)

                        <tr>
                            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->dob->format('d-m-Y') }}</td>
                            <td>
                                <ul style='list-style:none' class="d-flex">
                                    <li><a class="btn btn-warning" href="{{route('view.user',encrypt($user->id))}}">show age</a></li>
                                    @if ($user->trashed())
                                    <li><a href="{{route('restore',encrypt($user->id))}}" class="btn btn-success">Restore</a></li>
                                    @endif
                                    <li><a href="{{route('edituserform',encrypt($user->id))}}" class='btn btn-primary'>Edit</a></li>
                                    <li><a href="{{route('deleteuser',encrypt($user->id))}}" class='btn btn-danger'>Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        <!--secon col -->
        <div class="col-12">
            <h4>order user</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->dob->format('d-m-Y') }}</td>
                            <td>
                                <ul style='list-style:none' class="d-flex">
                                    <li><a class="btn btn-warning" href="{{route('view.user',encrypt($user->id))}}">show age</a></li>
                                    @if ($user->trashed())
                                    <li><a href="{{route('restore',encrypt($user->id))}}" class="btn btn-success">Restore</a></li>
                                    @endif
                                    <li><a href="{{route('edituserform',encrypt($user->id))}}" class='btn btn-primary'>Edit</a></li>
                                    <li><a href="{{route('deleteuser',encrypt($user->id))}}" class='btn btn-danger'>Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div> --}}
        {{$users->links()}}
    </div>
    <h3>test <span></span></h3>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('896951bdaf6f86ff31ae', {
          cluster: 'ap2'
        });
        var channel = pusher.subscribe('orders');
        channel.bind('New-order', function(data) {
            $data = data.user.name;
          $('h3 span').text($data);
          return $data;
        });
      </script>
@endsection
