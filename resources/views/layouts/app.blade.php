<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/hashimoto.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <header>
        <div class="container">
            <a class="brand" href="{{ route('sales.index') }}">TOP</a>
            @include('commons.nav')
        </div>
    </header>
    <main>
        <div class="container">
            
                @yield('content')
            
        </div>
    </main>
</body>
</html>
