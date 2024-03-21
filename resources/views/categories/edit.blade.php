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
    <form action="{{ url("categories/$category->id") }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" value="{{$category->name}}" name="name">
        <br>
        <br>
        <textarea name="desc" id="" cols="30" rows="10">{{$category->desc}}</textarea>
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
