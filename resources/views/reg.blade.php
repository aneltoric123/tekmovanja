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
        @csrf
        <form method="POST" action="/">
            <input type="text" name="polno_ime" placeholder="Ime in priimek">
            <input type="text" name="vzdevek" placeholder="Uporabnikško ime">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Geslo">
            <input type="password" name="password" placeholder="Ponovno vnesi geslo">
            <button type="submit" name="login">Registracija</button>
        </form>
        <a href="/">
            Nazaj na login!
            </a>
    </div>
</body>
</html>
