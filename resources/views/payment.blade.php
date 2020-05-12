@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <h2>Payment</h2>
        <br>
        <p id="error">{{$message ?? ''}}</p>
		<form method="POST" action="/delivery">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th><label>First Name:</label></td>
                    <td><input type="text" name="first_name" required><br></td>
                </tr>
                <tr>
                    <th><label>Last Name:</label></td>
                    <td><input type="text" name="last_name" required><br></td>
                </tr>
                <tr>
                    <th><label>Address:</label></td>
                    <td><input type="text" name="address" required><br></td>
                </tr>
                <tr>
                    <th><label>City:</label></td>
                    <td><input type="text" name="city" required><br></td>
                </tr>
                <tr>
                    <th><label>State:</label></td>
                    <td><input type="text" name="state" required><br></td>
                </tr>
                <tr>
                    <th><label>ZIP:</label></td>
                    <td><input type="text" pattern="[0-9]{5}" name="zip" required><br></td>
                </tr>
                <tr>
                    <th><label>Phone:</label></td>
                    <td><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" size="20" placeholder="###-###-####" required><br></td>
                </tr>
                <tr>
                    <th><label>Email:</label></td>
                    <td><input type="email" name="email" required><br></td>
                </tr>
                <tr>
                    <th><label>Credit Card Number:</label></td>
                    <td><input type="text" name="credit_card_number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="####-####-####-####" required><br></td>
                </tr>
                <tr>
                    <th><label>Expiration:</label></td>
                    <td><input class="expiration" type="number" name="expiration_month" pattern="[0-9]{1,2}" placeholder="##" min=1 max=12 required><input class="expiration" type="number" name="expiration_year" pattern="[0-9]{4}" placeholder="####" min=2020 max=2100 required><br></td>
                </tr>
                <tr>
                    <th><label>Security Code:</label></td>
                    <td><input type="text" name="security_code" pattern="[0-9]{3,4}" placeholder="####" required><br></td>
                </tr>
            </table>
            <selected-component books="{{json_encode($books)}}" selected_book_quantities="{{json_encode($selected_book_quantities)}}"></selected-component>
            <input class="small_button" type="submit" value="Continue">
		</form>
	</div>
@endsection
