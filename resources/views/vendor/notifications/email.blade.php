<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div style="font-family: Arial, sans-serif; text-align: center; padding: 20px;">
        <h1>{{ config('app.name') }}</h1>
        <p>{{ $greeting ?? 'Hello!' }}</p>
        @foreach ($introLines as $line)
            <p>{{ $line }}</p>
        @endforeach
        <a href="{{ $actionUrl }}"
            style="background-color: #4A2574; color: #ffffff; padding: 10px 20px; text-decoration: none;">
            {{ $actionText }}
        </a>
        @foreach ($outroLines as $line)
            <p>{{ $line }}</p>
        @endforeach
        <p>Regards,<br>{{ config('app.name') }}</p>
    </div>
</body>

</html>
