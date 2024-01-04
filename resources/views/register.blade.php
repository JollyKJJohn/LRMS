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
            /* Set the height of the body to be the full viewport height */
            /* display: flex; */

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
            background: #28a745;
            border: #E8D426;
        }
    </style>

    <body>
        <div class="pt-5">
            <h1 class="text-center"> REGISTER HERE</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                            <form action="{{ route('user.register') }}" method="post"
                                enctype="multipart/form-data
                                data-parsley-errors-messages-disabled=true"
                                novalidate="" _lpchecked="1">
                                @csrf
                                <div class="form-group required">
                                    <lSabel for="username"> Enter your Name </lSabel>
                                    <input type="text" class="form-control text-lowercase" id="name"
                                        required="" name="name" value="">
                                </div>
                                <div class="form-group required">
                                    <lSabel for="username"> Enter your Email </lSabel>
                                    <input type="text" class="form-control text-lowercase" id="username"
                                        required="" name="username" value="">
                                </div>
                                <div class="form-group required">
                                    <lSabel for="password"> Enter your Password </lSabel>
                                    <input type="text" class="form-control text-lowercase" id="password"
                                        required="" name="password" value="">
                                </div>
                                <div class="form-group pt-1">
                                    <button class="btn btn-primary btn-block" type="submit"> Register</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
