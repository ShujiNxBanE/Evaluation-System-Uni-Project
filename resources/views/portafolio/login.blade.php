<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="header shadow-xl text-2xl text-white fond-extrabold rounded-xl m-5 p-3">
        <img src="https://www.caled-ead.org/tarjeta-puntuacion/imagenes/logo_caled.gif" alt="CALED" class="w-16 h-auto ml-12">
        <p>Instituto Latinoamericano y del Caribe de Calidad en Educacion Superior a Distancia</p>
    </header>
        <div class="wrapper">
            <div class="sct brand">
                <h3>Portafolio Electrónico</h3>
            </div>
            <div class="sct login">
                <form action="{{route('loginUser')}}">
                    @method('GET')
                    @csrf
                    <h3>Member Login</h3>
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <div class="forgot-remember">
                            <label class="control control-checkbox">
                                    Remember me
                                        <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                        <div class="forgot">
                                <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <input type="submit" name="send" value="Send">
                    <p class="text-center">Sign up with<br><i class="fa fa-hand-o-down" aria-hidden="true"></i></p>
                    <div class="social-sign">
                        <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div> <!--end login-->
        </div> <!--end wrapper-->
    <footer class="text-sm text-white rounded-tl-xl rounded-tr-xl m-5 p-3">
        <p>CALED</p>
        <P>Contacto: info_caled@utpl.edu.ec</P>
        <P>Telefono: 593 - 73701444, ext: 2238</P>
        <P>2016</P>
    </footer>
</body>
</html>
