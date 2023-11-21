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
    </div>

</body>
</html>
