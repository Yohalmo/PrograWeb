<div style="background-color: whiteSmoke; padding:20px">
    <div style="margin:auto; border: 1px solid #f5f5f5; border-radius: 10px; text-align:justify;
     background-color:white; padding:14px">
        <h3 style="color:green">Activación de usuario</h3>
        <br>
        <div>Estimado {{ $datos['usuario'] ?? '' }} le notificamos que su usuario ha sido creado exitosamente en el sistema.
            Para ingresar al Sistema confirme su usuario en el siguiente enlace: </div>
        <br>
        <a href="{{$datos['url'] ?? ''}}" style="margin-bottom: 15px">{{$datos['url'] ?? ''}}</a>
    </div>
</div>
