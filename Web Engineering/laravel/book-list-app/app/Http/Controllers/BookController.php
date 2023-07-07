<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        $data = $request->validate([
                'name' => 'required',
                'author' => 'required',
                'price' => 'required|decimal:0,2',
                'quantity' => 'required|numeric'
            ]);

        Book::create($data);

        return redirect(route('book.index'))->with('success', 'Succesfully created!');
    }

    public function edit(Book $book){
        return view('book.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book){
        $data = $request->validate([
            'name' => 'required',
            'author' => 'required',
            'price' => 'required|decimal:0,2',
            'quantity' => 'required|numeric'
        ]);

        $book->update($data);

        return redirect(route('book.index'))->with('success', 'Succesfully edited!');
    }

    public function delete(Book $book){
        $book->delete();
        return redirect(route('book.index'))->with('success', 'Succesfully deleted!');

    }

    public function search(Request $request){
        $query = $request->search;
        $books = Book::where('name', 'like', '%' . $query . '%')->get();

        return view('book.index', ['books' => $books]);
    }
}
