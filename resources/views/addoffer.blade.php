<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>addarea</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div >
           

        
        <form action="/addarea" method="POST">
        @csrf
        <h1>Add offers</h1>
        <table>
            <tr>
            <td>
            <label for="name">Add offers</label>
            </td>
           <td> <input type="text" id="name" name="name"></td></tr><br>
            <tr>
            <td><label for="brandname">Select Brand</label></td>

           <td> <select name="brand" id="brand">
            
            @foreach($brands as $brand)
            <option value= "{{ $brand->id }}"> {{$brand->name}}</option>
            @endforeach
            </select>
            </td></tr>
            <tr><td>
            <label for="longitude">Longitude</label></td>

           <td> <input type="text" id="longitude" name="longitude"></td><br>
            </tr>
            <tr><td>
            <label for="latitude">Latitude</label></td>
            <td><input type="text" id="latitude" name="latitude"></td></tr><br>
            </table>
            <input type="submit" value="Add Area">
            </form>
            <h1 class="mssg">{{session('confirmation')}} </h1>
    


           
        </div>
    </body>
</html>
