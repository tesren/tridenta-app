<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensaje de Tridenta Towers</title>
    </head>

    <body>
        <p>
            ¡Bienvenido al sistema de preventa privada de Tridenta Towers!
        </p>

        @php
            //primeras 3 letras del nombre
            $generatedPass = substr($user->name, 0, 3);

            //gion bajo y primeras 2 letras del correo
            $generatedPass .= '_'.substr($user->email, 0, 2);

            //lenguage en mayusculas y año actual
            $generatedPass .= strtoupper($user->lang).date('Y');

            //simbolo en caso de que no haya pais
            $generatedPass .= '&';
        @endphp

        <p>
            Te compartimos tu información de acceso: <br>
            
            Correo: {{ $user->email }}<br>
            Contraseña: {{ $generatedPass }}<br>
            Link de acceso: {{ route('login') }}<br>
        </p>
        
        
    
    </body>

</html>