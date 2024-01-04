<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/user-single-view.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>profile | usersingleview</title>
</head>

<body>


    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">



                <div class="card p-3 py-4">
                    <div class="text-center">

                        @if ($users->image)
                            <img src="{{ asset('uploads/' . $users->image) }}" style="height: 150px;width:180px;">
                        @else
                            <!-- Display a demo image if the user does not have an uploaded image -->
                            <img src="{{ asset('uploads/no_user.png') }}" width="100" class="rounded-circle">
                        @endif
                    </div>

                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">{{ $users->name }}</h5>
                        <h5 class="mt-2 mb-0">{{ $users->username }}</h5>
                        <h5 class="mt-2 mb-0">{{ $users->address }}</h5>
                        <br />

                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

                    </div>




                </div>

            </div>

        </div>
    </div>



</body>

</html>
