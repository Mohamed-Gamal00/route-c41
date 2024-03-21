<ul>
        <li>
             {{ $category->name }} <br />
             {{ $category->desc }} <br />
        </li>
</ul>
<br>
<img src="{{asset("storage/$category->image")}}" alt="dd">
<br>
<br>
<a href="{{ url("categories/edit/$category->id") }}">Edit</a>
<br>
<br>
<form action="{{ url("categories/$category->id") }}" method="post">
@csrf
@method("DELETE")
<button type="submit">DELETE</button>
</form>
