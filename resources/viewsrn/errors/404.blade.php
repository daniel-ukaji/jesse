<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Not Found</title>
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
        }

        .container {
            width: 50dvw;
            backdrop-filter: blur(15px);
            border-radius: 1rem;
            border: 1px solid #e2e2e2b0;
            margin: 0 auto;
            margin-top: 10%;
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
            font-size: 6rem;
            margin: 10px
        }

        a {
            background: #0D6EFD;
            padding: 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: block;
            transition: all .3s;
        }

        a:hover {
            background: #004fc6;
        }
    </style>

    <main>
        <div class="container">
            <h1>404</h1>
            <h3>Oops! Page not found.</h3>
            <p>Something is wrong with the page you're trying to access.</p>

            <a href="https://www.lightningspeedmatchmaker.com">
                Return Home
            </a>
        </div>
    </main>
</body>

</html>
