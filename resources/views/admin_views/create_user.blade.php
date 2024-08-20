<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form class="form" action="{{route('createUser')}}">
        @method('GET')
        @csrf
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>
            <div class="flex">
            <label>
                <input required="" placeholder="" type="text" class="input" name="firstName">
                <span>Firstname</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="lastName">
                <span>Lastname</span>
            </label>
        </div>

        <label>
            <input required="" placeholder="" type="email" class="input" name="email">
            <span>Email</span>
        </label>

        <label>
            <input required="" placeholder="" type="password" class="input" name="password">
            <span>Password</span>
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input">
            <span>Confirm password</span>
        </label>
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
    </form>
</body>
</html>
