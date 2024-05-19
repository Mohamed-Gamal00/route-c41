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
    <form action="{{ url('books') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <br>
        <br>
        <textarea name="small_desc" id="" cols="30" rows="10"></textarea>
        <br>
        <br>
        <textarea name="desc" id="" cols="30" rows="10"></textarea>
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
        <button type="submit">Submit</button>
    </form>
</body>

</html>
