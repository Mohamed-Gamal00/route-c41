<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    public function all()
    {
        // $categories = Category::select('desc')->get();   // query builder
        // $categories = Category::orderBy('name', 'desc')->limit(1)->get();
        // $categories = Category::paginate(1);
        $categories = Category::get();

        // dd($categories);
        return view('categories.all', ['categories' => $categories]);
    }
    public function show($id)
    {
        $category = Category::findOrfail($id);
        return view('categories.show', ['category' => $category]);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        //    validation
        $data = $request->validate([
            "name" => "required|string",
            "desc" => "required|string",
            "image" => "required|image|mimes:png,jpg,jpeg",
        ]);
        //    insert

        /*
          insert imgae
          rename->move->insert

        */
        $data['image'] = Storage::putFile("categories", $data['image']);
        // dd($image);
        Category::create($data);
        // session()->put("success","Data inserted successfuly");//مش بتتشال لو عملت ريلود
        session()->flash("success", "Data inserted successfuly"); //  unset  بيتعملها
        //    redirect
        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        //validate
        $data = $request->validate([
            "name" => "required|string",
            "desc" => "required|string",
            "image" => "image|mimes:png,jpg,jpeg",
        ]);
        //check
        $category = Category::findOrFail($id);
        // unlink old image if exist
        // move new image
        if($request->has("image")){
            Storage::delete($category->image); //unlink
            $data['image'] =Storage::putFile("categories",$data['image']); //new image
        }

        //update
        $category->update($data);
        return redirect(url("categories/show/$id"));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        Storage::delete($category->image); //unlink

        $category->delete();
        return redirect("categories");
    }
}
