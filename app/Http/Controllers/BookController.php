<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function all()
    {
        $books = Book::get();
        return view('books.all', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrfail($id);
        // dd($book);
        return view('books.show', ["book" => $book]);
    }

    public function create()
    {
        $categories = Category::all(); // categories data of select
        return view('books.create',compact("categories"));
    }
    public function store(Request $request)
    {
        //    validation
        $data = $request->validate([
            "name" => "required|string",
            "small_desc" => "required|string",
            "desc" => "required|string",
            "image" => "required|image|mimes:png,jpg,jpeg",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
        $data['user_id'] = 1;
        $data['image'] = Storage::putFile("books", $data['image']);
        // dd($image);
        Book::create($data);
        // session()->put("success","Data inserted successfuly");//مش بتتشال لو عملت ريلود
        session()->flash("success", "Data inserted successfuly"); //  unset  بيتعملها
        //    redirect
        return redirect()->route('books');
    }


    public function edit($id)
    {
        $categories = Category::all(); // categories data of select
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book','categories'));
    }

    public function update(Request $request, $id)
    {
        //validate
        $data = $request->validate([
            "name" => "required|string",
            "small_desc" => "required|string",
            "desc" => "required|string",
            "image" => "required|image|mimes:png,jpg,jpeg",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
          $data['user_id'] = 1;
        //check
        $book = Book::findOrFail($id);
        // unlink old image if exist
        // move new image
        if($request->has("image") && $book->image){
            Storage::delete($book->image); //unlink
            $data['image'] =Storage::putFile("categories",$data['image']); //new image
        }

        //update
        $book->update($data);
        return redirect(url("books/show/$id"));
    }


    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if($book->image){
            Storage::delete($book->image); //unlink
        }

        $book->delete();
        return redirect("books");
    }
}
