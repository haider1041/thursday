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
            html, body ,  {
                background-color: #fff;
                align-items: center;
                text-align: center;

                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 10vh;
                margin: 2px;
                

            }
            tr,td,table{
                align-items: center;
                text-align: center;
                height: 3vh;
                margin: 2px;

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
        <p >Areas Data</p>
        <table>
        <tr>
            <th>ID</th><th>Area Name</th><th>City ID </th> <th>Longitude</th><th>Latitude</th>
         </tr>
        @foreach($areas as $area)

        <tr>
        <td> {{ $area ->id }} </td>  <td>{{$area->name}}</td><td>{{$area->city_id}}</td><td>{{$area->longitude}}</td><td>{{$area->latitude}}</td> 
        </tr>     
        @endforeach
        </table>
    </body>
</html>
