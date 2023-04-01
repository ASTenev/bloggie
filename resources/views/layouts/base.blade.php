<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="/image/x-icon" href="/assets/favicon.ico" />
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body>
    <x-header />
    <x-navbar />
    <main>
        @yield('content')
    </main>
    <x-footer />
</body>
</html>
