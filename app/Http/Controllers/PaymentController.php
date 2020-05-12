<?php

namespace App\Http\Controllers;

use App\Book;

class PaymentController extends Controller
{
    public function show()
    {
        $session = request()->session();
        $session->put('selected_book_quantities', []);
        $parameters = request()->all();
        $session->put('selected_books', []);
        $count = 0;
        foreach($parameters as $parameter) {
            if($count > 0) {
                $session->put('selected_book_quantities.' . $count, $parameter);
                if($parameter > 0) {
                    $session->push('selected_books', $count);
                }
            }
            $count++;
        }

        if(empty($session->get('selected_books'))) {
            return view('store', [
                'books' => Book::all(),
                'message' => 'Please select at least one product for purchase.'
            ]);
        }

		return view('payment', [
            'books' => Book::find($session->get('selected_books')),
            'selected_book_quantities' => $session->get('selected_book_quantities')
        ]);
    }
}
