<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class DeliveryController extends Controller
{
    public function show()
    {
        $session = request()->session();
        $parameters = request()->all();
        $session->put('contact', []);
        $session->put('contact.first_name', $parameters['first_name']);
        $session->put('contact.last_name', $parameters['last_name']);
        $session->put('contact.address', $parameters['address']);
        $session->put('contact.city', $parameters['city']);
        $session->put('contact.state', $parameters['state']);
        $session->put('contact.zip', $parameters['zip']);
        $session->put('contact.phone', $parameters['phone']);
        $session->put('contact.email', $parameters['email']);
        $session->put('payment', []);
        $session->put('payment.credit_card_number', $parameters['credit_card_number']);
        $session->put('payment.expiration_date', date('Y-m', strtotime($parameters['expiration_year'] . '-' . $parameters['expiration_month'])));
        $session->put('payment.security_code', $parameters['security_code']);

        if($session->get('payment.expiration_date') <= date('Y-m', strtotime(date('Y-m')))) {
            return view('payment', [
                'books' => Book::find($session->get('selected_books')),
                'selected_book_quantities' => $session->get('selected_book_quantities'),
                'message' => 'Invalid expiration date.'
            ]);
        }

		return view('delivery', [
            'contact' => $session->get('contact'),
            'payment' => $session->get('payment'),
            'books' => Book::find($session->get('selected_books')),
            'selected_book_quantities' => $session->get('selected_book_quantities')
        ]);
    }
}
