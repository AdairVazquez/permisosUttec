<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        body{
            background-color: gray;
        }
        .contenedor{
            background-color: white;
            border-radius: 10px;
        }
        .boxes{
            background-color: aqua; 
            opacity: 50%;
        }
    </style>
</head>
<body>
    @yield('content');
</body>
</html>