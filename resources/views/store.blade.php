@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <h2>Store</h2>
        <br>
        <p id="error">{{$message ?? ''}}</p>
		<form method="POST" action="/payment">
            @csrf
            <store-Component books="{{json_encode($books)}}"></store-Component>
		</form>
	</div>
@endsection
