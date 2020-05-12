@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <img src="{{ asset('/img/letter.jpg') }}"/>
        <br>
        <br>
        <h2>Contact</h2>
        <br>
        <p class="contact-text text-center">408 Washington Street, Hoboken, NJ 07020</p>
        <p class="contact-text text-center"><strong><a href = "mailto:info@omarclassicbooks.com">info@omarclassicbooks.com</a></strong></p>
        <p class="contact-text text-center">(201) 970-3940</p>
		</form>
	</div>
@endsection
