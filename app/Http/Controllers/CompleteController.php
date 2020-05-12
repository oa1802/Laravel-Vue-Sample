<?php

namespace App\Http\Controllers;

use App\Book;
use App\Customer;
use App\Payment;
use App\Purchase;
use App\Date;

class CompleteController extends Controller
{
    public function show()
    {
        $session = request()->session();

        $date_record = (Date::where('date', $session->get('delivery_date'))->first());
        if($date_record->time_slots <= 0) {
            return view('delivery', [
                'contact' => $session->get('contact'),
                'payment' => $session->get('payment'),
                'books' => Book::find($session->get('selected_books')),
                'selected_book_quantities' => $session->get('selected_book_quantities'),
                'message' => 'There is no more availablity for this date. Please select another date.'
            ]);
        }

        $customer_exists = Customer::where('first_name', $session->get('contact.first_name'))
            ->where('last_name', $session->get('contact.last_name'))
            ->where('email', $session->get('contact.email'))->first();

        if($customer_exists == null) {

            $customer = new Customer;
            $customer->first_name = $session->get('contact.first_name');
            $customer->last_name = $session->get('contact.last_name');
            $customer->address = $session->get('contact.address');
            $customer->city = $session->get('contact.city');
            $customer->state = $session->get('contact.state');
            $customer->zip = $session->get('contact.zip');
            $customer->phone = $session->get('contact.phone');
            $customer->email = $session->get('contact.email');
            $customer->save();

        }

        $customer_id = Customer::where('first_name', $session->get('contact.first_name'))
            ->where('last_name', $session->get('contact.last_name'))
            ->where('email', $session->get('contact.email'))->first()->id;

        $payment_exists = Payment::where('credit_card_number', $session->get('payment.credit_card_number'))->first();

        if($payment_exists == null) {

            $payment = new Payment;
            $payment->credit_card_number = $session->get('payment.credit_card_number');
            $payment->expiration_date = date('Y-m', strtotime($session->get('payment.expiration_date')));
            $payment->security_code = $session->get('payment.security_code');
            $payment->save();

        }

        $payment_id = Payment::where('credit_card_number', $session->get('payment.credit_card_number'))->first()->id;

        $purchase = new Purchase;
        $books = Book::find($session->get('selected_books'));
        $count = 0;
        $products = [];
        foreach($books as $book) {
            $product['id'] = $book->id;
            $product['title'] = $book->title;
            $product['author'] = $book->author;
            $product['price'] = $book->price;
            $product['title'] = $book->title;
            $product['quantity'] = $session->get('selected_book_quantities')[$session->get('selected_books')[$count]];
            $product['delivery_date'] = $session->get('delivery_date');
            $inventory = Book::where('id', $product['id'])->first()->inventory;
            $book_update = Book::where('id', $product['id'])->first();
            $book_update->inventory = $inventory - $product['quantity'];
            $book_update->save();
            $count++;
            array_push($products, $product);
        }
        $time_slots = Date::where('date', $product['delivery_date'])->first()->time_slots;
        $date_update = Date::where('date', $product['delivery_date'])->first();
        $date_update->time_slots = $time_slots - 1;
        $date_update->save();

        $purchase->products = json_encode($products);
        $purchase->customer_id = $customer_id;
        $purchase->payment_id = $payment_id;
        $purchase->delivery_date = $session->get('delivery_date');
        $purchase->save();

        return view('complete');
    }
}
