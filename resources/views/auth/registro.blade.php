<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <title>Registro</title>
</head>
<body>
  <div class="container">
    <h2>Registro de Usuario</h2>
    <form action="{{route('user.update')}}" id="FrmUser" method="POST">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombres" required placeholder="ejemplo: Juan">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellidos" required placeholder="ejemplo: Perez">
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="password" required placeholder="********">
            </div>

            <div class="form-group">
                <label for="confirmar_contrasena">Confirmar contraseña:</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required placeholder="********">
                <span id="message"></span>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required placeholder="(codigo del pais) 0000-000">
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="correo" required placeholder="ejemplo@correo.com">
            </div>

            <label for="direccion">Dirección:</label>
            <textarea id="direccion" name="direccion" rows="4" cols="75" placeholder="Direccion"></textarea><br>

            <div class="form-group2">
                <input type="submit" value="Registrarse" id="registroBtn">
            </div>
        </form>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-validate.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/index.js')}}?vhbj=tyyuh"></script>
    <script src="{{asset('js/main.js')}}?vgbh=fty"></script>
</body>
</html>

