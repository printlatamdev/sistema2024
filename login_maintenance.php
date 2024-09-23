<!DOCTYPE html>
<html lang="en">

<head>
    <title>Color Digital | 2023</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- google fonts-->
    <link rel="shortcut icon" href="../favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body id="page">
    <div class="container">
        <div class="container">
            <div class="body d-md-flex align-items-center justify-content-between">
                <div class="box-1 mt-md-0 mt-5">
                    <img src="./imgs/mantenimiento.JPG?auto=compress&cs=tinysrgb&dpr=2&w=500" class="" alt="">
                </div>
                <div class=" box-2 d-flex flex-column h-100">
                    <div class="mt-5">
                    <img id='logo' src="imgs/logocd.jpeg" width="250" style="margin-left: 43px;margin-top: -63px;">
                        <div class="d-flex flex-column ">
                            <div class="d-flex align-items-center">
                                <form role="form" method="POST" action="validaLogin_maintenance.php">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">Usuario</label>
                                        <input type="user" class="form-control" id="user" name='user' aria-describedby="user">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name='pass' id="password">
                                    </div>
                                    <div class="mb-3" >
                                        <label for="pias" class="form-label">Seleccione pais</label>
                                        <br>
                                        <!-- <div class="form-check-inline mt-3"> -->
                                                <label class="form-check-label" >
                                                    <input type="radio" class="form-check-input" value="SV" checked name="ni">
                                                    <span>El Salvador</span>
                                                </label>
                                            <!-- </div> -->
                                            <!-- <div class="form-check-inline"> -->
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="NI" name="ni">
                                                    <span>Nicaragua</span>
                                                </label>
                                            <!-- </div> -->
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesion">

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <h4 class="footer text-muted mb-0 mt-md-0 mt-4">
                            Sistema de mantenimiento de equipos
                            <span class="p-color me-1">Color Digital</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
        if (count >= 5) {
            document.location.href = 'http://' + domain + '/sistema2024/login22.php';
        }
    }
</script>