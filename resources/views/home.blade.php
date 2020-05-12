@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <img src="{{ asset('/img/books.jpg') }}"/>
        <br>
        <br>
        <h2>Welcome to Omar's Classic Books</h2>
        <br>
        <p class="home-text text-left">Come check out our collection of classic novels at our store front located
            at 408 Washington Street, Hoboken, NJ 07020. Also feel free to browse
            our <strong><a href='/store'>online store</a></strong></p>
		</form>
	</div>
@endsection
