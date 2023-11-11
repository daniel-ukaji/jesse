<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page expired</title>
</head>

<body>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: url('/logo.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: contain;
            background: #fff
        }

        .container {
            width: 50dvw;
            backdrop-filter: blur(15px);
            border-radius: 1rem;
            border: 1px solid #e2e2e2b0;
            margin: 0 auto;
            margin-top: 5%;
            text-align: center;
            padding: 10px 20px;
            box-shadow: 0 0 5px -2px;
            transition: all .5s ease-out;
        }

        @media screen and (max-width: 800px) {
            .container {
                width: 90%;
                margin-top: 60%;
            }
        }

        .container:hover {
            backdrop-filter: blur(8px);
        }

        h1 {
            font-size: 3rem;
        }

        a {
            background: #0D6EFD;
            padding: 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all .3s;
        }

        a:hover {
            background: #004fc6;
        }

        #msg {
            text-align: left;
        }
    </style>

    <main>
        <div class="container">
            <h2 style="font-size: 4rem; margin: 0;">⚠️</h2>
            <h1>Page Expired</h1>
            {{-- <h3>Oops! Page not found.</h3> --}}
            <p id="msg">It seems that the page you were trying to access has expired. This could be due to the
                session timing out
                or a security measure in place.
                <br><br>
                To continue, please refresh the page and try again. If the issue persists, kindly return to the previous
                page or visit our homepage to explore other content.
                <br><br>
                If you believe this is an error, please contact our support team for further assistance. We are here to
                help resolve any issues you may be facing.
                <br><br>
                Thank you for your understanding and patience.
            </p><br>
            <a onclick="window.location.reload();" style="cursor: pointer;">
                Reload
            </a>
            <a href="https://www.lightningspeedmatchmaker.com" style="background: green; cursor: pointer;">
                Return Home
            </a>
        </div>
    </main>
</body>

</html>
