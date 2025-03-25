<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    header {
        padding: 10px;
        text-align: center;
    }

    main {
        padding: 16px;
    }

    table {
        font-size: 20px;
        margin: auto;
    }

    input {
        width: 100%;
        padding: 4px 4px;
        font-size: 18px;
        border-radius: 12px;
        margin: 4px;
    }

    textarea {
        margin: 4px;
        width: 100%;
        padding: 4px 4px;
        font-size: 18px;
        border-radius: 12px;
    }

    h1 {
        margin-top: 78px;
        font-size: 32px;
    }

    h6 {
        margin: 16px;
        font-size: 20px;
    }

    .submit-button {
        margin-top: 16px;
        text-align: center;
        padding: 12px 32px;
        background-color: #ff9900;
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 20px;
        cursor: pointer;
        font-style: bold;
    }
</style>

<body>
    <header>
        <h1>
            @yield('header-content')
        </h1>
        <h6>
            Silahkan isi data anda
        </h6>
    </header>
    <main>
        @yield('form-content')
    </main>
</body>

</html>
