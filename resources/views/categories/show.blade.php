<ul>
        <li>
             {{ $category->name }} <br />
             {{ $category->desc }} <br />
        </li>
</ul>
<br>
<a href="{{ url("categories/edit/$category->id") }}">Edit</a>
<form action="{{ url("categories/$category->id") }}" method="post">
@csrf
@method("DELETE")
<button type="submit">DELETE</button>
</form>
