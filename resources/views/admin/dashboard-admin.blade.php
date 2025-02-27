<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Welcome Admin page</h1>

    <h2>Hello {{ Auth::user()->name }} </h2>

    <form action="{{ route('admin.logout') }}" method="post">
        @csrf

        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign
            Out</button>

    </form>
</body>

</html>
