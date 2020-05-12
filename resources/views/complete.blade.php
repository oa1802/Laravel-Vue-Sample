@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <h2>Purchase completed</h2>
        <br>
		<form method="POST" action="/payment">
            @csrf
			<a href="/store"><input type="button" value="Return to store"></a>
		</form>
	</div>
@endsection
