<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey Kepuasan</title>
</head>
<body>
    Ini Survey Kepuasan {{ $survey['email'] }}
    <a href="{{ route('satisfaction.survey.update', ['token' => $survey['token']]) }}">Verifikasi</a>
</body>
</html>
