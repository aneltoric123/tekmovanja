<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reg.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Registracija</h1>

        <form method="POST" action="/reg">
            @csrf

            <input type="text" name="polno_ime" placeholder="Ime in priimek">
            <input type="text" name="vzdevek" placeholder="Uporabnikško ime">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Geslo">
            <input type="password" name="password_confirmation" placeholder="Ponovno vnesi geslo">
            <button type="submit" name="login">Registracija</button>
        </form>
        <a href="/index">
            Nazaj na login!
            </a>
    </div>
    @if(Session::has('error'))
    <div class="notification">
        @if($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<script>
    setTimeout(function() {
        document.querySelector('.notification').classList.add('fade-out');
    }, 3000);
</script>
@endif

</body>
</html>
