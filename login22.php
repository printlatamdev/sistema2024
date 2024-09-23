<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Color Digital | 2023</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='./bg-login.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        body {
            margin: 0;
            font: 600 16px/18px 'Open Sans', sans-serif;
            background-color: #eeeeee;
        }

        .login-box {
            width: 100%;
            margin: auto;
            max-width: 525px;
            min-height: 670px;
            position: relative;
            border-radius: 25px;
            /*background: url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center;*/
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
        }

        .login-snip {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
        }

        .login-snip .login,
        .login-snip .sign-up-form {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear
        }

        .login-snip .sign-in,
        .login-snip .sign-up,
        .login-space .group .check {
            display: none
        }

        .login-snip .tab,
        .login-space .group .label,
        .login-space .group .button {
            text-transform: uppercase
        }

        .login-snip .tab {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent
        }

        .login-snip .sign-in:checked+.tab,
        .login-snip .sign-up:checked+.tab {
            color: #fff;
            border-color: #1161ee
        }

        .login-space {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d
        }

        .login-space .group {
            margin-bottom: 15px
        }

        .login-space .group .label,
        .login-space .group .input,
        .login-space .group .button {
            width: 100%;
            color: #fff;
            display: block
        }

        .login-space .group .input,
        .login-space .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1)
        }

        .login-space .group input[data-type="password"] {
            text-security: circle;
            -webkit-text-security: circle
        }

        .login-space .group .label {
            color: #aaa;
            font-size: 12px
        }

        .login-space .group .button {
            background: #1161ee
        }

        .login-space .group label .icon {
            width: 15px;
            height: 15px;
            border-radius: 2px;
            position: relative;
            display: inline-block;
            background: rgba(255, 255, 255, .1)
        }

        .login-space .group label .icon:before,
        .login-space .group label .icon:after {
            content: '';
            width: 10px;
            height: 2px;
            background: #fff;
            position: absolute;
            transition: all .2s ease-in-out 0s
        }

        .login-space .group label .icon:before {
            left: 3px;
            width: 5px;
            bottom: 6px;
            transform: scale(0) rotate(0)
        }

        .login-space .group label .icon:after {
            top: 6px;
            right: 0;
            transform: scale(0) rotate(0)
        }

        .login-space .group .check:checked+label {
            color: #fff
        }

        .login-space .group .check:checked+label .icon {
            background: #1161ee
        }

        .login-space .group .check:checked+label .icon:before {
            transform: scale(1) rotate(45deg)
        }

        .login-space .group .check:checked+label .icon:after {
            transform: scale(1) rotate(-45deg)
        }

        .login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
            transform: rotate(0)
        }

        .login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
            transform: rotate(0)
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: table
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, .2)
        }

        .foot {
            text-align: center
        }

        ::placeholder {
            color: #b3b3b3
        }
        .card{
            border-radius: 2.25rem;
        }
    </style>
</head>
<div class="full-screen">
</div>
<body oncontextmenu='return false' class='snippet-body'>
<form role="form" method="post" action="validaLogin.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mx-auto" style="margin-top: 10%;">
                    <div class="card bg-dark" style="box-shadow: 15px 15px 7px 8px rgba(0, 0, 0, 0.2);">
                        <div class="login-box">
                            <div class="login-snip">
                                <img id="logo" src="images/logo.png" width="250" alt="Logo">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                                <label for="tab-1" class="tab"></label>
                                <input id="tab-2" type="radio" name="tab" class="sign-up">
                                <label for="tab-2" class="tab"></label>
                                <div class="login-space">
                                    <div class="login">
                                        <div class="form-group mb-3">
                                            <label for="user" class="form-control-label text-white">Usuario</label>
                                            <input id="user" name="user" type="text" class="input form-control" placeholder="Ingrese Usuario" aria-label="Usuario">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pass" class="form-control-label text-white">Contraseña</label>
                                            <input id="pass" name="pass" type="password" class="input form-control" placeholder="Ingrese Clave" aria-label="Contraseña">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label class="form-control-label text-white">Seleccione su País:</label><br>
                                            <div class="form-check-inline mt-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="SV" checked name="ni">
                                                    <span class="text-white">El Salvador</span>
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="NI" name="ni">
                                                    <span class="text-white">Nicaragua</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
                                        </div>
                                        <div class="form-group text-center">
                                            <label class="text-white text-center mt-5">Sistema Color Digital 2023 ©</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
</body>

</html>
<script>
 var count = 0;
      var button = document.getElementById("logo");
      let url = document.location.href;
      let domain = (new URL(url));
      domain = domain.hostname;
      button.onclick = function() {
         count++;
         if(count >= 5){
            document.location.href = 'http://'+domain+'/sistema2024/login_maintenance.php';
         }
      }
</script>