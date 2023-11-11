<html>

<head>
    <style>
        h1 {
            text-align: center;
            background: #2b81ea;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Hello {{ $user_name }},</p>
    <p>{!! $content !!}</p>
    <p>
        Click <a href="https://match.lightningspeedmatchmaker.com/login">here</a> to login to your account
    </p>
    <hr>
    <p>
        Kind Regards,
        <br>
        Lightning Speed Matchmaker Team
    </p>

</body>

</html>
