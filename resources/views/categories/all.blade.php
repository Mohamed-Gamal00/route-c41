    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <title>Document</title>
    </head>

    <body>

        @if (session()->has('success'))
            {{ session()->get('success') }}
        @endif
        <a href="{{ url('categories/create') }}">
            create
        </a>
        @foreach ($categories as $cat)
            <a href="{{ url("categories/show/$cat->id") }}">
                {{ $cat->name }} <br />
                {{ $cat->desc }} <br />
            </a>
        @endforeach
        {{-- <div>
            {{ $categories->links() }}
        </div> --}}

    </body>

    </html>
