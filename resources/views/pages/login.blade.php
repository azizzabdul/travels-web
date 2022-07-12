<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('frontend/libraries/bootstrap/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Assistant&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}">

    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/dist/xzoom.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
    <title>Login</title>
</head>
<body>

    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mb-4">We explore the new<br>life much better</h1>
                    <img src="{{ url('frontend/images/login-content2.png') }}" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('frontend/image/Logo-Travels.png') }}" class="w-50 mb-4">
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label for="inputEmail">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp">
                                </div>

                                <div class="form-grup">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" id="password">
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="check">
                                    <label for="check" class="form-check-label">Remember Me</label>
                                </div>

                                <button type="submit" class="btn btn-login btn-block">Sign In</button>
                                <p class="text-center mt-4">
                                    <a href="#">Saya Lupa Password</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ url('frontend/libraries/retina/retina.js') }}"></script>    
    <script src="{{ url('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>    
    <script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>    
</body>
</html>