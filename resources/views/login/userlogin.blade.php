<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
    </head>
    <body>
    <h1>Login Page</h1>
        <form method="post">
            {{csrf_field()}}
            <label>Enter username</label>
            <input type="text" id="username"><br><br>
            <label>Enter password</label>
            <input type="text" id="password"><br><br>
            <input type="submit" id="submit" value="Login">  
        </form>
    </body>
</html>



