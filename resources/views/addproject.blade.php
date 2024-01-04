<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
        font-size: 62, 5%;
    }

    body {
        background-image: url("https://images.pexels.com/photos/19123087/pexels-photo-19123087/free-photo-of-a-mountain-with-clouds-and-fog-in-the-background.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load");
        font-family: 'Muli',
            sans-serif;
        background-size: cover;
        background-position: center;

        height: 100vh;
        width: 100%;
        /* background: #0f2027; */
        /* fallback for old browsers */
        /* background: linear-gradient(to right, #2c5364, #203a43, #0f2027); */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #fff;
    }

    .form__label {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2rem;
        margin-left: 2rem;
        margin-top: 0.7rem;
        display: block;
        transition: all 0.3s;
        transform: translateY(0rem);
    }

    .form__input {
        font-family: 'Roboto', sans-serif;
        color: #333;
        font-size: 1.2rem;
        margin: 0 auto;
        padding: 1.5rem 2rem;
        border-radius: 0.2rem;
        background-color: rgb(255, 255, 255);
        border: none;
        width: 90%;
        display: block;
        border-bottom: 0.3rem solid transparent;
        transition: all 0.3s;
    }

    .form__input:placeholder-shown+.form__label {
        opacity: 0;
        visibility: hidden;
        -webkit-transform: translateY(-4rem);
        transform: translateY(-4rem);
    }
</style>

<body>

    <div class="form__group">
        <form action="{{ route('project.insert') }}" method="post">
            @csrf
            <input type="text" class="form__input" id="project_name" name="project_name" placeholder="Project name"
                required="" />
            <label for="name" class="form__label">Project Name</label>
            {{-- <input type="text" class="form__input" id="project_name" name="project_name" placeholder="Project name"
                required="" />
            <label for="name" class="form__label">Project Name</label> --}}
            {{-- <br /> --}}

            <div class="mt-5 text-center"><button class="btn btn-dark profile-button" type="submit">submit</button>
            </div>
        </form>

    </div>


</body>

</html>
