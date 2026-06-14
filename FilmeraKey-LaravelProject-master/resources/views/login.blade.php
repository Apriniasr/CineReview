<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FilmeraKey Login</title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    </head>
    <body>
        <div class="container-layout">
            <!-- Login Picture -->
            <div class="container-picture">
                <img src="{{ asset ('assets/picture/image_5_left.png')}}" alt="Container-login-picture">
            </div>
            <!-- Form Login -->
            <div class="container-login">
                <div class="container-form">
                    <h3>Welcome Back to <br>FilmeraKey</h3>
                    <h4>Log in to access your API key and manage your movie data request.</h4>
                    <form method="POST" action="{{ route('login.post')}}">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required><br>
                        <input type="password" name="password" placeholder="Password" required><br>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
            
            
        </div>
    </body>
</html>