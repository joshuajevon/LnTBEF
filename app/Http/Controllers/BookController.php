<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createBook(){
        $categories = Category::all();
        return view('createBook', compact('categories'));
    }

    public function storeBook(Request $request){

        $request->validate([
            'Name' => 'required|unique:books,Name,except,id',
            'PublicationDate' => 'required',
            'Stock' => 'required|integer|gt:5',
            'Author' => 'required|min:5',
            'Image' => 'required|mimes:png,jpg'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Name.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);

        Book::create([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
            'Category_Id' => $request->CategoryName,
            'Image' => $fileName,
        ]);

        //name dari model => $request->name dari form

        return redirect('/');
    }

    public function show(){
        $books = Book::all();
        return view('view', compact('books'));
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('editBook', compact('book'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'Name' => 'required',
            'PublicationDate' => 'required',
            'Stock' => 'required|integer|gt:5',
            'Author' => 'required|min:5',
            'Image' => 'required|mimes:png,jpg'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Name.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);

        Book::findOrFail($id)->update([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
            'Image' => $fileName,
        ]);
        return redirect('/');
    }

    public function delete($id){
        Book::destroy($id);

        return redirect('/');
    }
}
