@props([
    'title' => 'outfits'
])

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
            color: #222;
        }

        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-left,
        .nav-right {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #222;
            font-weight: bold;
        }

        nav a:hover {
            color: #e60023;
        }

        main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }


        .outfit-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .outfit-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background: #e60023;
            color: #fff;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
        }

        .button:hover {
            background: #ad081b;
        }

    </style>

</head>
<body>


<nav>
    <div class="nav-left">
        <a href="/outfits">Outfits</a>
        @auth
            <a href="/outfits/create">Create +</a>
        @endauth
    </div>

    <div class="nav-right">
        @guest
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest

        @auth
            <a href="/dashboard">Profile</a>
        @endauth
    </div>
</nav>

<main>
    {{$slot}}
</main>
</body>
</html>
