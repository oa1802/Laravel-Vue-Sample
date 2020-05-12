<?php

namespace App\Http\Controllers;

use App\Book;
use App\Date;

class ConfirmController extends Controller
{
    public function show()
    {
        $session = request()->session();
        $parameters = request()->all();
        $session->put('delivery_date', $parameters['delivery_date']);

        if(strtotime($session->get('delivery_date')) <= strtotime(date("Y-m-d"))) {
            return view('delivery', [
                'contact' => $session->get('contact'),
                'payment' => $session->get('payment'),
                'books' => Book::find($session->get('selected_books')),
                'selected_book_quantities' => $session->get('selected_book_quantities'),
                'message' => 'Please select a delivery date after today.'
            ]);
        }

        $date_record = (Date::where('date', $parameters['delivery_date'])->first());

        if($date_record == null) {
            return view('delivery', [
                'contact' => $session->get('contact'),
                'payment' => $session->get('payment'),
                'books' => Book::find($session->get('selected_books')),
                'selected_book_quantities' => $session->get('selected_book_quantities'),
                'message' => 'There is no more availablity for this date. Please select another date.'
            ]);
        }

        if($date_record->time_slots == 0) {
            return view('delivery', [
                'contact' => $session->get('contact'),
                'payment' => $session->get('payment'),
                'books' => Book::find($session->get('selected_books')),
                'selected_book_quantities' => $session->get('selected_book_quantities'),
                'message' => 'There is no more availablity for this date. Please select another date.'
            ]);
        }

        $session->put('delivery_date', $parameters['delivery_date']);

		return view('confirm', [
            'delivery_date' => $session->get('delivery_date'),
            'contact' => $session->get('contact'),
            'payment' => $session->get('payment'),
            'books' => Book::find($session->get('selected_books')),
            'selected_book_quantities' => $session->get('selected_book_quantities'),
            'delivery_date' => $session->get('delivery_date')
        ]);
    }
}
