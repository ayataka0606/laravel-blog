<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AYATAKA</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-admin-header/>
    <x-admin-navbar/>
    {{$slot}}
</body>
</html>