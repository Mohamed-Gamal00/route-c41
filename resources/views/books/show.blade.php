<ul>
        <li>
             {{ $book->name }} <br />
             {{ $book->desc }} <br />
        </li>
</ul>
category name: {{$book->category->name}}

<br>
<img src="{{asset("storage/$book->image")}}" alt="dd">
<br>
<br>
<a href="{{ url("books/edit/$book->id") }}">Edit</a>
<br>
<br>
<form action="{{ url("books/$book->id") }}" method="post">
@csrf
@method("DELETE")
<button type="submit" class="btn">DELETE</button>
</form>
