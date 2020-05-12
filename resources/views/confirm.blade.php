@extends('layout')
@section('title', 'Store')
@section('content')
    <div id="app" class="text-center">
        <navigation-component></navigation-component>
        <br>
        <h2>Confirmation</h2>
        <br>
		<form method="POST" action="/complete">
            @csrf
            <form action="">
                <table class="table table-bordered">
                    <tr>
                        <th><label>First Name:</label></td>
                        <td><label><?php echo $contact['first_name'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>Last Name:</label></td>
                            <td><label><?php echo $contact['last_name'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>Address:</label></td>
                            <td><label><?php echo $contact['address'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>City:</label></td>
                            <td><label><?php echo $contact['city'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>State:</label></td>
                        <td><label><?php echo $contact['state'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>ZIP:</label></td>
                        <td><label><?php echo $contact['zip'] ?></label><br></td>
                    </tr>
                    <tr>
                        <th><label>Phone:</label></td>
                        <td><label><?php echo $contact['phone'] ?></label><br></td></tr>
                    <tr>
                        <th><label>Email:</label></td>
                        <td><label><?php echo $contact['email'] ?></label><br></td></tr>
                    <tr>
                        <th><label>Credit Card Number:</label></td>
                        <td><label><?php echo $payment['credit_card_number'] ?></label><br></td></tr></tr>
                    <tr>
                        <th><label>Expiration:</label></td>
                        <td><label><?php echo date('m/Y', strtotime($payment['expiration_date'])) ?></label><br></td></tr></tr>
                    <tr>
                        <th><label>Security Code:</label></td>
                        <td><label><?php echo $payment['security_code'] ?></label><br></td></tr>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <th><label>Delivery Date:</label></td>
                    <td><label><?php echo date("m/d/Y", strtotime($delivery_date)) ?></label><br></td>
                </table>
                <selected-component books="{{json_encode($books)}}" selected_book_quantities="{{json_encode($selected_book_quantities)}}"></selected-component>
		        <input type="submit" value="Complete Purchase">
		</form>
	</div>
@endsection
