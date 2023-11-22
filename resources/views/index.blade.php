<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <h1>Login</h1>

        <form method="POST" action="/homepage">
            @csrf

            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Geslo">
            <button type="submit" name="login">Login</button>
        </form>
        <a href="/reg">
            Registriraj se!
            </a>
            <script>
                setTimeout(function() {
                    document.querySelector('.notification').classList.add('fade-out');
                }, 3000);
            </script>

    @if(Session::has('success'))
    <div class="notification">
    <div class="success">
        {{ Session::get('success') }}
    </div>
    </div>
    @endif
    @if($errors->any())
    <div class="notification2">
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endif
</body>
</html>
