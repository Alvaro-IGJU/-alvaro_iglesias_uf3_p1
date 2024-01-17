@include('layout.header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
    <link rel="shortcut icon" href="{{ asset('img/Netflix.png') }}" />
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body style=" background-size: cover;">
    <div
        style="
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 1;
    filter: ightness(0.9);
    background-size: cover;
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.6) 50%, transparent), url('{{ asset('img/background.jpg') }}');
    box-shadow: inset 0 20px 70px rgba(0, 0, 0, 0.9); 

">
    </div>
    <h1 class="mt-5"
        style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold; margin-left: 11%">
        Lista de Películas</h1>
    <ul
        style="color: white; list-style:none; display: flex;justify-content: space-around; font-size: 2em; margin-top: 2%;font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; ">
        <li><a style="color: white;" href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a style="color: white;" href="/filmout/newFilms">Pelis nuevas</a></li>
        <li><a style="color: white;" href="/filmout/films">Pelis</a></li>
        <li><a style="color: white;" href="/filmout/countFilms">Contar pelis</a></li>
    </ul>
    @if (!empty($error))
        <FONT  style=" font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold;margin-left: 11%;" COLOR="red">{{ $error }}</FONT>
    @endif
    <h1
        style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold; margin-left: 11%; margin-top: 5%">
        ¡Añade tu película!</h1>
    <form action="{{ route('createFilm') }}" method="post"
        style="display: flex; margin-left: 11%; margin-right: 11%;flex-wrap: wrap;flex-direction: row;color: white; justify-content: center; ">
        @csrf

        <div  style="margin:2%;width:32%;display: flex;flex-direction: column; ">
            <label for="name"> Name:</label>
            <input id="name"  style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);   
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" type="text" name="name" id="">
        </div>

        <div style="margin:2%;width:32%;display: flex;flex-direction: column">
            <label for="year"> Year:</label>
            <input type="number" name="year" style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" id="">
        </div>
        <div style="margin:2%;width:32%;display: flex;flex-direction: column">
            <label for="genre"> Genre:</label>
            <input type="text" name="genre" style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" id="">
        </div>

        <div style="margin:2%;width:32%;display: flex;flex-direction: column">
            <label for="country"> Country:</label>
            <input type="text" name="country" style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" id="">
        </div>
        <div style="margin:2%;width:32%;display: flex;flex-direction: column">
            <label for="duration"> Duration:</label>
            <input type="number" name="duration" style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" id="">
        </div>
        <div  style="margin:2%;width:32%;display: flex;flex-direction: column">

            <label for="img_url">Image URL:</label>
            <input type="text" name="img_url" style=" padding: 14px;
            background-color: rgba(34, 34, 34, 0.767);
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
            color: white; /* Color del texto */
            -webkit-appearance: textfield; /* Para cambiar la apariencia en webkit */
            appearance: textfield; /* Apariencia del input */" id="">
        </div>
        <div style="width:32%;display: flex;flex-direction: column; margin: auto">
            <input type="submit" name="sendButton" value="Enviar" style="height: 50px; background: rgb(229, 9, 20); color: rgb(255, 255, 255);border-radius: 5px; border-style: none;font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold;">
        </div>

    </form>
    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Include any additional HTML or Blade directives here -->

</body>

</html>
@include('layout.footer')
