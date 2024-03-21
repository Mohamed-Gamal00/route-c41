<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>To-Do-List</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-4 p-3">

                <form action="{{ route('update',$data->id) }}" method="post">
                    <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here">{{$data->title}}</textarea>
                    <div class="text-center">
                        <button type="submit" name="submit"
                            class="form-control text-white bg-info mt-3 ">Update</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</body>

</html>
