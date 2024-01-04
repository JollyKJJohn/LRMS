<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/userprofile.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User | profile</title>
</head>
<style>
    body {
        background-image: url("https://images.pexels.com/photos/19123087/pexels-photo-19123087/free-photo-of-a-mountain-with-clouds-and-fog-in-the-background.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load");
        font-family: 'Muli',
            sans-serif;
        background-size: cover;
        background-position: center;
        height: 100vh;


    }
</style>
@php
    $user = session()->get('user');
    $id = $user->id;
    $name = $user->name;
    $username = $user->username;
    $password = $user->password;

    foreach ($user_details as $value) {
        $address = $value->address;
        $image = $value->image;
    }

@endphp
@include('flash-message')

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img src="{{ asset('uploads/' . $value->image) }}" style="height: 150px;width:150px;">
                    <br />
                    <a href="{{ route('user.logout') }}" class="btn btn-dark profile-button">Logout</a>
                    <span class="font-weight-bold">{{ $name }}</span>
                    <span class="text-black-50">{{ $username }}</span><span>
                    </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" name="name" value={{ $name }}>
                        </div>

                        <div class="col-md-12"><label class="labels">UserName</label><input type="text"
                                class="form-control" name="username" value={{ $username }}></div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <textarea class="form-control" id="address" name="address">{{ $address }}</textarea>
                        </div>
                        <div class="col-md-12"><label class="labels">Update Image</label><input type="file"
                                class="form-control" name="image" value="image">
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>

                    </div>
                    <div class="mt-5 text-center">
                        <a href="{{ route('project.view') }}" class="btn btn-dark profile-button">ADD PROJECT</a>

                    </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>

</body>

</html>
