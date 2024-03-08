<!doctype html>
<html lang="en">
    <head>
        <title>Contrato de Prestación {{ $service_provision_contract->client->name }}</title>
        <meta charset="utf-8"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZfzisyJ6BdOzFLkhJ5uoXf3Tx"
            crossorigin="anonymous">
    </head>
    <style>
        body{
            padding: 40px;
        }

        h1{
            font-size: 14px
        }

        p{
            font-size: 13.5px;
        }

        strong{
            border-bottom: 1px dotted black;
        }

        hr{
            border: 1px solid black;
            margin: 0px;
        }

        .tel{
            font-size: 10px;
        }

        .form{
            font-size: 10px;
        }

        .space{
            margin-top: 20px;
        }
    </style>

    <body>

        <div class="text-justify">
            CENTRO VETERINARIO <br>
            AA TARIJA
        </div>

        <div class="float-right">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo" width="100" height="100">
        </div>
        <hr>
        <p>
            <b class="float-right tel">Cel: 77895939 / 75252515 / 77175559</b>
        </p>

        <p>
            <h6 class="text-right form">FORM: CVAAT/ADM/0005</h6>
        </p>

        <div class="w-50 m-auto">
            <h1 class="text-center"><u>CONTRATO DE PRESTACIÓN DE SERVICIO DE RESIDENCIA CANINA</u></h1>
        </div>
        <p class="space">
            De una parte, el Centro Veterinario AA Tarija, con domicilio legal en el Barrio La Pampa
            Calle Bolivar 667 entre O'connor y Junín, Teléfono 66 635365 Celular: 77175556 / 77875939.
            Y de otra parte el/la Sr.(a) <strong>{{ $service_provision_contract->client->name }}</strong> en adelante <b>el cliente</b> con Cedula de Identidad No. <strong>{{ $service_provision_contract->client->ci }}</strong> exp <strong>{{ $service_provision_contract->client->expedition }}</strong> con domicilio en Barrio <strong>{{ $service_provision_contract->client->home }}</strong> Calle <strong>{{ $service_provision_contract->client->street }}</strong> número <strong>{{ $service_provision_contract->client->number }}</strong> Teléfono celular <strong>{{ $service_provision_contract->client->phone }}</strong>
        </p>

        <p>
            Ambas partes reconociéndose mutuamente con capacidad legal suficiente para suscribir este contrato, declaran:
        </p>

        <p>
            Que el Cliente está interesado en contratar los servicios de residencia, que ofrece la Empresa, para la Mascota de Nombre: <strong>{{ $service_provision_contract->animal->name }}</strong> Raza: <strong>{{ $service_provision_contract->animal->race}} </strong>
            Sexo: <strong>{{ $service_provision_contract->animal->gender }}</strong>, Edad aproximada: <strong>{{ $service_provision_contract->aproximated_age }}</strong>, Color: <strong>{{ $service_provision_contract->color }}</strong>, en las siguientes condiciones.
        </p>

        <p>
            1°- Que el Cliente es propietario del perro cuyos datos se reseñan arriba, o que en su defecto está autorizado por él, para entregar el perro y firmar este contrato en representación del mismo.
        </p>
        <p>
            2°- Todo perro, para acceder a estos servicios, deberá ir provisto de un sistema <u>efectivo</u> contra pulgas y garrapatas, pudiéndolo adquirir en el mismo centro si lo desea el Cliente.
        </p>

        <p>
            3°- La duración de la estadía será desde el día <strong>{{ \Carbon\Carbon::parse($service_provision_contract->date_start)->isoFormat('D [del mes de] MMMM [de] YYYY') }}</strong>
        hasta el día <strong>{{ \Carbon\Carbon::parse($service_provision_contract->date_end)->isoFormat('D [de] MMMM [de] YYYY') }}</strong> El precio convenido de <strong>{{ $service_provision_contract->amount }}</strong> bs (<strong>{{$numero}}</strong> 00/100 Bolivianos) la noche.
        </p>

        <p>
            4°- La Empresa mantendrá al perro en las instalaciones sitas en su domicilio.

        </p>

        <p>
            5°- El cliente autoriza a la Empresa a hacer uso de los servicios veterinarios que estime para garantizar la buena salud del perro si esto fuese necesario, siendo los gastos de dichos servicios por cuenta del Cliente, debiéndolos abonar a la Empresa a la presentación de sus recibos correspondientes.
        </p>

        <p>
            6°- En caso de enfermedad contagiosa el Cliente autoriza a la Empresa al traslado del perro para su aislamiento, haciéndose cargo de los gastos, si este fuese fuera de las instalaciones de la Empresa.
        </p>

        <p>
            7°- La Empresa se compromente a avisar al Cliente de cualquier incidencia con la mayor brevedad posible, contactando para ello a través del teléfono de aviso que figura en este documento.
        </p>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
