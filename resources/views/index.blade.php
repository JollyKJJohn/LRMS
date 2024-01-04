<! DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> user | home
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> --}}
    </head>
    <style>
        body {
            background-image: url("https://images.pexels.com/photos/19123087/pexels-photo-19123087/free-photo-of-a-mountain-with-clouds-and-fog-in-the-background.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load");
            /* background: #ECF0F1 !important; */
            font-family: 'Muli', sans-serif;
            background-size: cover;
            background-position: center;
            height: 100vh;
            /* background-image: url('https://images.pexels.com/photos/2310713/pexels-photo-2310713.jpeg?auto=compress&cs=tinysrgb&w=600');
            background: #ECF0F1 !important;
            font-family: 'Muli', sans-serif; */
        }

        h1 {
            color: #1B2631;
            padding-bottom: 2rem;
            font-weight: bold;
        }

        a {
            color: #333;
        }

        a:hover {
            color: #E8D426;
            text-decoration: none;
        }

        .form-control:focus {
            color: #000;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }

        .btn {
            background: #1C2833;
            border: #E8D426;
        }

        .btn:hover {
            background: #212F3C;
            border: #E8D426;
        }
    </style>
    @include('flash-message')

    <body>

        <div class="pt-5">

            <h1 class="text-center"> USER LOGIN </h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                            <form action="{{ route('user.login') }}" method="post" data-parsley-validate>
                                @csrf
                                <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                                <div class="form-group required">
                                    <lSabel for="username"> Enter Your UserName </lSabel>
                                    <input type="text" class="form-control text-lowercase" id="username"
                                        required="" name="username" value="">
                                </div>
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password"> Enter your
                                        Password
                                    </label>
                                    <input type="password" class="form-control" required="" id="password"
                                        name="password" value="">
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember-me"
                                            name="remember-me" data-parsley-multiple="remember-me">
                                        <label clss="custom-control-label" for="remember-me"> Remember me? </label>

                                    </div>
                                </div>
                                <div class="form-group pt-1">

                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>
                            </form>
                            <p class="small-xl pt-3 text-center">
                                <span class="text-muted"> Not a member? </span>
                                <a href="{{ route('show') }}"> Sign up </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
