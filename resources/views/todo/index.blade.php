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

    <div class="container my-3 ">
        <div class="row d-flex justify-content-center">

            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('add') }}" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id=""
                            placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Add To
                                Do</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <!-- all -->
            <div class="col-md-3 ">
                <h4 class="text-white">All Notes</h4>

                <div class="m-2  py-3">
                    <div class="show-to-do">
                        @if ($data)
                            @foreach ($data as $all)
                                @if ($all->status == 'all')
                                    <div class="alert alert-info p-2">
                                        <h4>{{ $all->title }}</h4>
                                        <h5>{{ $all->created_at }}</h5>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('doing', $all->id) }}"
                                                class="btn btn-info p-1 text-white">doing</a>
                                            <a href="{{ route('delete', $all->id) }}"
                                                class="btn btn-danger p-1 text-white">delete</a>
                                            <a href="{{ route('edit', $all->id) }}"
                                                class="btn btn-success p-1 text-white">edit</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="item">
                                <div class="alert-info text-center ">
                                    empty to do
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">

                <h4 class="text-white">Doing</h4>


                <div class="m-2 py-3">
                    <div class="show-to-do">
                        @if ($data)
                            @foreach ($data as $doing)
                                @if ($doing->status == 'doing')
                                    <div class="alert alert-info p-2">
                                        <h4>{{ $doing->title }}</h4>
                                        <h5>{{ $doing->created_at }}</h5>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('done', $doing->id) }}"
                                                class="btn btn-success p-1 text-white">Done</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="item">
                                <div class="alert-success text-center ">
                                    empty to do
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">
                        @if ($data)
                            @foreach ($data as $done)
                                @if ($done->status == 'done')
                                    <div class="alert alert-info p-2">
                                        <a href="{{ route('delete', $done->id) }}" onclick="confirm('are your sure')"
                                            class="remove-to-do text-dark d-flex justify-content-end "><i
                                                class="fa fa-close" style="font-size:16px;"></i></a>
                                        <h4>{{ $done->title }}</h4>
                                        <h5>{{ $done->created_at }}</h5>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="item">
                                <div class="alert-success text-center ">
                                    empty to do
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
