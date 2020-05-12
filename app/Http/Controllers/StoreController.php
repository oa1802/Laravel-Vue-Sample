<?php

namespace App\Http\Controllers;

use App\Book;

class StoreController extends Controller
{
    public function show()
    {
		return view('store', [
            'books' => Book::all()
        ]);
    }
}
