<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tirhal Observation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;

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
            @keyframes example {
                from {font-size: 0px;}
                to {font-size: 30px;}
            }
            @keyframes img {
                from {width: 50px; height: 50px;}
                to {width: 245px; height: 245px;}
            }

            .title {


                font-size:30px;
                color:#E97000;
font-weight: bold;
text-shadow: -1px 0 #555, 0 1px #555, 1px 0 #555, 0 -1px #555;
            }

            .links > a {

                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

                color:#E97000;
font-weight: bold;
text-shadow: -1px 0 #555, 0 1px #555, 1px 0 #555, 0 -1px #555;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            img{

              animation-name:img;
              animation-duration:7s;
              width: auto;
border-radius: 50%;
padding: 10px;
box-shadow: 1px 1px 4px;
margin-bottom: 50px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    <!--    <a href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="col-md-12">
                  <img src="{{asset('img/logo.png')}}">
                </div>
                <div class="title m-b-md">

                    Quality Assurance
                </div>


            </div>
        </div>
    </body>
</html>
