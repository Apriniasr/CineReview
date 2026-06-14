<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register - Filmerakey</title>
        <link rel="stylesheet" href="{{asset('css/register.css')}}" />
    </head>
    <body>
        <div class="container-layout">
            
            <!-- Form Login -->
            <div class="container-register">
                <div class="container-form">
                    <h3>Welcome to <br>FilmeraKey</h3>
                    <h4>Create your account to get your personal API key and start exploring a world of movie data.</h4>
                    <form method="POST" action="{{ route('register.post')}}">
                        @csrf
                        <input type="text" name="name" placeholder="User Name" required><br>
                        <input type="email" name="email" placeholder="Email" required><br>
                        <input type="password" name="password" placeholder="Password" required><br>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>

            <!-- Login Picture -->
            <div class="container-picture">
                <img src="{{ asset ('assets/picture/image_4.png')}}" alt="Container-login-picture">
            </div>
            
            
        </div>
    </body>
</html>