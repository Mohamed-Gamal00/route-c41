<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class todoController extends Controller
{
    public function all()
    {
        /*
             select * from todo table
             get() to return and get data
        */
        DB::table("todo")->get();
        // $data = DB::table("todo")->get(); // select all
        // $data = DB::table("todo")->select("title",'status')->get(); // select column
        // $data = DB::table("todo")->where('id','>','3')->get(); // select where
        // dd($data);
        $data = DB::table("todo")->get();
        return view("todo.index", ["data" => $data]);
    }

    public function add(Request $request)
    {
        // echo "di";
        $title = $request->title;
        $val = $request->validate([
            'title' => 'required',
        ]);
        DB::table('todo')->insert([
            'title' => $title,
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        //check if id exist
        $todo_id = DB::table('todo')->find($id);
        if (!$todo_id) {
            return redirect()->back();
        }
        echo $id;
        DB::table('todo')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $todo_id = DB::table('todo')->find($id);
        if (!$todo_id) {
            return redirect()->back();
        }
        echo $id;
        // DB::table('todo')->where('id', '=', $id)->delete();
        // return redirect()->back();
        // $data = DB::table("todo")->where('id', '=', $id)->get();
        $data = DB::table("todo")->find($id);
        // dd($data);
        return view("todo.edit", ["data" => $data]);
    }
    public function update(Request $request, $id)
    {
        $title = $request->title;
        DB::table('todo')
            ->where('id', $id)
            ->update([
                'title' => $title,
            ]);
        return redirect()->route('all');
    }


    public function doingstatus($id)
    {
        $todo_id = DB::table('todo')->find($id);
        if (!$todo_id) {
            return redirect()->back();
        }
        echo $id;
        $status = DB::table('todo')->find($id);
        DB::table('todo')
            ->where('id', $id)
            ->update([
                'status' => 'doing',
            ]);
        return redirect('todo');
    }
    public function donestatus($id)
    {
        $todo_id = DB::table('todo')->find($id);
        if (!$todo_id) {
            return redirect()->back();
        }
        echo $id;
        $status = DB::table('todo')->find($id);
        DB::table('todo')
            ->where('id', $id)
            ->update([
                'status' => 'done',
            ]);
        // return redirect()->route('all');
        return redirect('todo');

    }

    public function deletedone($id)
    {
        //check if id exist
        $todo_id = DB::table('todo')->find($id);
        if (!$todo_id) {
            return redirect()->back();
        }
        echo $id;
        DB::table('todo')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
