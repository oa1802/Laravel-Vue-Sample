@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <h2>Delivery</h2>
        <br>
        <p id="error">{{$message ?? ''}}</p>
		<form method="POST" action="/confirm">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th><label>Select Delivery Date:</label></th>
                    <td><input type="date" name="delivery_date" value="{{date('Y-m-d', strtotime(date('Y-m-d') . '1 day'))}}" required><br></td>
                </tr>
            </table>
            <selected-component books="{{json_encode($books)}}" selected_book_quantities="{{json_encode($selected_book_quantities)}}"></selected-component>
            <input class="small_button" type="submit" value="Continue">
		</form>
	</div>
@endsection
