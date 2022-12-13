@extends('layout.home')
@section('content')
    <h1>age{{ $user->userage->age }}</h1>
    <h2>username{{ $user->name }}</h2>
    <h3>imag {{ $user->image }}</h3>
    <img width="200px" src="{{ asset('storage/images/' . $user->image) }}" alt="">
    <ul>
        <table>
            <thead>
                <tr>
                    <td>OrderId</td>
                    <td>Price</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($user->orders as $order)
                    <tr>
                        <th>{{ $order->order_id }}</th>
                        <th>{{ $order->price }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
@endsection
