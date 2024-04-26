<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensaje de Tridenta Towers</title>
    </head>

    @php
        $lang = $user->lang;
        App::setLocale($lang);

        //primeras 3 letras del nombre
        $generatedPass = substr($user->name, 0, 3);

        //gion bajo y primeras 2 letras del correo
        $generatedPass .= '_'.substr($user->email, 0, 2);

        //lenguage en mayusculas y año actual
        $generatedPass .= strtoupper($user->lang).date('Y');

        //simbolo en caso de que no haya pais
        $generatedPass .= '&';
    @endphp

    <body>

        <img src="{{asset('img/tridenta-mail.jpg')}}" alt="Tridenta" style="width: 100%; margin-bottom:25px;">

        @if($lang == 'es')
            <h1 style="text-align: center;">
                {{__('BIENVENIDO')}} <br>
                {{__('Pre-Venta Privada Especial')}}
            </h1>

            <h2>Estimado(a) {{$user->name}}</h2>

            <p>Esperamos que al recibir este correo, usted y su familia se encuentren muy bien.</p>

            <p>En Domus nos enorgullece informarle que finalmente ha llegado el momento de salir a la preventa privada especial de TRIDENTA TOWERS, que es exclusiva para las personas que como usted, solicitaron ser incluidos en este evento exclusivo.</p>

            <p>A partir de este momento, usted podrá ingresar al sitio especial TRIDENTA TOWERS <a href="{{ route('login') }}">{{ route('login') }}</a>, en donde podrá encontrar información detallada, a manera que usted pueda seleccionar y comprar el condominio de su preferencia, usando la siguiente información:</p>
            
            <p>
                {{__('Correo')}}: {{ $user->email }}<br>
                {{__('Contraseña')}}: {{ $generatedPass }}<br>
            </p>

            <p>El proceso de selección y compra se realizará en dos fases:</p>

            <h3>FASE 1: Proceso de revisión y selección</h3>

            <p>A partir de hoy viernes, 26 abril, usted tendrá 5 (cinco) días naturales para revisar el inventario disponible, analizar y seleccionar las posibles opciones de su preferencia, y tener el contacto necesario con su agente representante de Domus para aclarar cualquier duda que pueda tener.</p>

            <p>Le recomendamos ampliamente que tenga en mente de dos a tres unidades que sean de su preferencia, ya que el proceso de compra será en la modalidad de “el primero que elija, será el primero que comprará”. Por lo que, mientras más rápido haga su selección y proceda con el formato de Solicitud de Compra, es más probable que adquiera la unidad de su preferencia.</p>

            <p>Durante esta primera fase no se cerrarán ventas; es solamente análisis, revisión, aclaración de dudas y selección de la(s) unidad(es) de su preferencia.</p>


            <h3>FASE 2: Proceso de compra</h3>

            <p>Uno de los beneficios de haberse registrado en la lista de espera, es precisamente tener la posibilidad de ser de las primeras personas en elegir, así como obtener los mejores precios, por lo que es vital que usted concrete su compra en el tiempo establecido.</p>

            <p>A partir del día miércoles, 1° de mayo, usted tendrá dos semanas para definir su unidad o unidades para comprar. Es decir, durante estas dos semanas usted deberá de emitir su solicitud de compra y proporcionar la documentación requerida para la elaboración del Contrato de Promesa de Compraventa, mismo que se le estará enviando para revisión.</p>

            <p>Los contratos deberán ser firmados a más tardar el día miércoles, 15 de mayo.</p>

            <p>El enganche correspondiente también deberá de ser pagado a más tardar el miércoles, 15 de mayo.</p>


            <h3>¿¡CUÁL ES EL BENEFICIO DE LA PREVENTA PRIVADA?!</h3>

            <p>Estaremos ofreciendo dos atractivos planes de pago, con un 5% y un 10% respectivamente.</p>

            <p>A los clientes que firmen y paguen su enganche dentro del periodo de preventa privada, adicionalmente se les dará un 5% de descuento sobre el descuento ya otorgado.</p>

            <p>Es por eso la importancia de asegurar la compra en el tiempo establecido.</p>

            <p>Una vez concluido el periodo de preventa privada, el día jueves, 16 de mayo, estaremos lanzando el proyecto a la venta al público en general.</p>

            <p>A partir del jueves, 16 de mayo, se elimina el 5% de descuento adicional y solamente aplican los planes de pago con el 5% y 10% respectivamente.</p>

            <p>La información sobre disponibilidad y precios se estará actualizando en tiempo real, por lo que usted podrá ver en todo momento lo que hay disponible.</p>

            <p>Como podrá darse cuenta, éste será un proceso muy dinámico, por lo que le recomendamos ampliamente aprovechar esta oportunidad única e irrepetible para adquirir un condominio en uno de los mejores desarrollos inmobiliarios en la playa de la Zona Hotelera de Puerto Vallarta, y con el beneficio del descuento adicional.</p>

            <p>Usted tendrá tiempo para analizar la información a detalle, pero le podemos adelantar que TRIDENTA TOWERS tiene una buena variedad de diferentes tipos de unidades y con diferentes rangos de precios para todos los gustos y necesidades.</p>

            <p>Para apoyarlo y guiarlo durante el proceso de revisión, selección y compra, su agente Profesional de Ventas en DOMUS estará presente en todo momento para asegurarse de que tenga una grata experiencia de compra.</p>

            <p>Esperamos que esta información le sea de utilidad. Agradecemos su amable atención a este comunicado y quedamos a sus órdenes para cualquier duda o comentario que tenga al respecto.</p>

            <p>
                Atentamente, <br>
                DOMUS Fine Real Estate
            </p>

            <div>
                <img width="35px" height="auto" src="{{asset('img/icono-tridenta.jpg')}}" alt="Icono Tridenta">
            </div>
            <hr style="opacity: 1; color:2A345A;">

        @else

            <h2>Dear {{$user->name}}:</h2>
    
            <p>We hope that upon receiving this email, you and your family are doing very well.</p>
            
            <p>We at Domus are proud to inform you that the time has finally come to go on the special private presale of TRIDENTA TOWERS, which is exclusive for people like you, who requested to be included in this exclusive event.</p>
            
            
            <p>From this moment on, you will be able to enter the special TRIDENTA TOWERS site <a href="{{ route('login') }}">{{ route('login') }}</a>, where you will be able to find detailed information, so that you can select and purchase the condo of your preference, using the following information:</p>
            <p>
                Email: {{ $user->email }}<br>
                Password: {{ $generatedPass }}<br>
            </p>
            
            <h2>The selection and purchase process will be carried out in two phases:</h2>
            
            
            <h3>PHASE 1: Review and selection process</h3>
            <p>Starting today Friday, April 26, you will have 5 (five) calendar days to review the available inventory, analyze, and select the possible options of your preference, and have the necessary contact with your Domus representative agent to clarify any doubts you may have.</p>
            <p>We strongly recommend that you have two to three units of your preference in mind, as the purchase process will be on a first-choice, first-buy basis.  Therefore, the sooner you make your selection and proceed with the Purchase Request form, the more likely you are to purchase the unit of your choice.</p>
            <p>During this first phase no sales will be closed; it is only analysis, review, answering questions, and selection of the unit(s) of your preference.</p>
            
            <h3>PHASE 2: Purchase process</h3>
            <p>One of the benefits of having registered in the waiting list is precisely to have the possibility of being one of the first people to choose, as well as to obtain the best prices, so it is vital that you make your purchase in the established time.</p>
            <p>Starting Wednesday, May 1st, you will have two weeks to define your unit or units to purchase. That is to say, during these two weeks you must issue your purchase request and provide the required documentation for the preparation of the Promise to Purchase Contract, which will be sent to you for review.</p>
            <p>The contracts must be signed no later than Wednesday, May 15.</p>
            <p>The corresponding down payment must also be paid no later than Wednesday, May 15.</p>
            
            <h3>WHAT IS THE BENEFIT OF THE PRIVATE PRESALE?!</h3>
            <p>We will be offering two attractive payment plans, with 5% and 10% respectively.</p>
            <p>Customers who sign and pay their down payment within the private presale period will be given an additional 5% discount on top of the discount already granted.</p>
            <p>This is why it is so important to secure the purchase within the established time frame.</p>
            <p>Once the private presale period has concluded, on Thursday, May 16, we will be launching the project for sale to the general public.</p>
            <p>As of Thursday, May 16, the additional 5% discount will be eliminated and only the 5% and 10% payment plans will apply.</p>
            
            <p>Availability and pricing information will be updated in real time, so you will be able to see what is available at all times.</p>
            
            <p>As you can see, this will be a very dynamic process, so we strongly recommend you to take advantage of this unique and unrepeatable opportunity to acquire a condominium in one of the best real estate developments on the beach of Puerto Vallarta's Hotel Zone, and with the benefit of the additional discount.</p>
            
            <p>You will have time to analyze the information in detail, but we can tell you in advance that TRIDENTA TOWERS has a good variety of different types of units and with different price ranges for all tastes and needs.</p>
            
            <p>To support and guide you through the review, selection, and purchase process, your DOMUS Professional Sales Agent will be present at all times to make sure you have a pleasant buying experience.</p>
            
            <p>We hope you find this information useful. We thank you for your kind attention to this communication and remain at your disposal for any questions or comments you may have.</p>
            
            
            <p>
                Sincerely yours, <br>
                DOMUS Fine Real Estate
            </p>
            
            <div>
                <img width="35px" height="auto" src="{{asset('img/icono-tridenta.jpg')}}" alt="Icono Tridenta">
            </div>
            <hr style="opacity: 1; color:2A345A;">

        @endif
        
    
    </body>

</html>