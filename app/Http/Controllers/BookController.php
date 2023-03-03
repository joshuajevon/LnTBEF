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

    // =========================================
    // API
    // munculin data buku yang udah diinput
    public function getBook(){
        $books = Book::all();
        return $books;
    }

    // function untuk menambahkan data buku dari postman
    public function addBook(Request $request){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Name.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);

        Book::create([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
            'Category_Id' => $request->Category_Id,
            'Image' => $fileName,
        ]);

        return response()->json(["success" => 200]);
    }

    //function untuk mengupdate buku dari postman berdasarkan id
    public function updateBook(Request $request, $id){
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

        return response()->json(["success" => 200]);
    }

    // function untuk menghapus buku berdasarkan id
    public function removeBook($id){
        Book::destroy($id);
        return response()->json(["success" => 200]);
    }
}
