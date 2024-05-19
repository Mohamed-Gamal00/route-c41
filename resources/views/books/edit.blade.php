<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url("books/$book->id") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" value="{{$book->name}}" name="name">
        <br>
        <br>
        <textarea name="small_desc" id="" cols="30" rows="10">{{$book->small_desc}}</textarea>
        <br>
        <br>
        <textarea name="desc" id="" cols="30" rows="10">{{$book->desc}}</textarea>
        <br>
        <br>
        <input type="number" name="price">
        <br>
        <br>
        <select name="category_id" id="">
            @foreach ($categories as $category )

            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <br>
        <input type="file" name="image">
        <br>
        <br>
        <img src="{{asset("storage/$book->image")}}" width="200" height="200" alt="dd">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
