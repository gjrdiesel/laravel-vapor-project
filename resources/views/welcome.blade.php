<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vapor</title>

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
                min-height: 50vh;
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

            .text-left {
                text-align: left;
            }
        </style>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="/">Vapor</a>
                </div>

                <div class="links m-b-md">
                    <a href="https://twitter.com/gjreasoner">Follow @gjreasoner on twitter</a>
                </div>

                <div class="tasks m-b-md">
                    <a href="?dispatch=true">Queue API call</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 m-auto">
                <div class="text-left">
                    <div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <p>Search {{ $users->total() }} Users:</p>
                            </div>
                            <form class="d-flex">
                                <input type="text" class="form-control" placeholder="Search" value="{{ request('search') }}" name="search"/>
                                <button type="submit" class="btn">Go</button>
                            </form>
                        </div>
                        @unless($users->isEmpty())
                            <table class="table mb-3">
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endunless
                        @if($users->isEmpty())
                            <div class="card">
                                <div class="card-body">
                                    No users found. <a href="{{ back()->getTargetUrl() }}">Go back.</a>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            {{ $users->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
