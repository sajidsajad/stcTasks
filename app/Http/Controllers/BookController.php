<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  
    public function index(){

        $data['books'] = Book::orderBy('id','desc')->paginate(5);   
        return view('books',$data);
    }
    

    public function store(Request $request){

        $book   =   Book::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'title' => $request->title, 
                        'code' => $request->code,
                        'author' => $request->author,
                    ]);
    
        return response()->json(['success' => true], 201);
    }
    
    public function edit(Request $request){

        $book  = Book::where('id',$request->id)->first(); 
        return response()->json($book, 200);
    }
 
    public function destroy(Request $request){

        $book = Book::where('id',$request->id)->delete();   
        return response()->json(['success' => true], 200);
    }
}