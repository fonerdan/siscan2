<!doctype html>
<html lang="en">
    <head>
        <title>Acta de Autorización de Anestesia y Cirugía {{ $anesthesiaSurgery->client->name }}</title>
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

        .box{
            border: 1px solid black;
            padding: 10px 15px 10px 15px;
            border-radius: 10px;
        }

        .p{
            margin-top: 150px;
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
            <h6 class="text-right form">FORM: CVAAT/ADM/0004</h6>
        </p>

        <div class="w-75 m-auto py-4">
            <h1 class="text-center"><u>ACTA DE AUTORIZACIÓN DE ANESTESIA Y CIRUGÍA</u></h1>
        </div>

        <div class="text-right">
            Tarija, {{ \Carbon\Carbon::parse($anesthesiaSurgery->created_at)->isoFormat('D [de] MMMM [de] YYYY')  }}
        </div>

        <p>
            Yo, <strong>{{ $anesthesiaSurgery->client->name }}</strong>, con documento de identidad N°: <strong>{{ $anesthesiaSurgery->client->ci }}</strong>
        </p>

        <p>
            Como:
            <div class="float-right">
                <div class="mb-4">
                    <span class="{{ ($anesthesiaSurgery->type_client == "Propietario") ? 'bg-primary' : '' }} box">.</span> Propietario <br>
                </div>
                <div class="mb-4">
                    <span class="{{ ($anesthesiaSurgery->type_client == "Representante del Propietario") ? 'bg-primary' : '' }} box">.</span> Representante del Propietario <br>
                </div>
                <div>
                    <span class="{{ ($anesthesiaSurgery->other_type_client) ? 'bg-primary' : '' }} box">.</span>  Otro: <strong>{{ $anesthesiaSurgery->other_type_client }}</strong>
                </div>
            </div>
        </p>
        <p class="p">
            Doy mi consentimiento para que mi mascota de nombre y características: <br>
            <strong>{{ $anesthesiaSurgery->animal->name }}</strong>, Especie: <strong>{{ $anesthesiaSurgery->animal->specie }}</strong>, Sexo: <strong>{{ $anesthesiaSurgery->animal->gender}}</strong>, Raza: <strong>{{$anesthesiaSurgery->animal->race}}</strong>, Pelaje: <strong>{{$anesthesiaSurgery->animal->fur}}</strong>
        </p>

        <p>
            sea intervenido quirúrgicamente bajo anestesia en las condiciones que han sido propuestas.
        </p>

        <p>
            He leído y aceptado las información indicada al reverso. También he realizado las preguntas oportunas y he sido informado de las ventajas y riesgos de ambos procedimientos.
        </p>

        <p>
            Acepto las modificaciones de los métodos que se puedan producir en el transcurso de dichos procedimientos y que se justifiquen por una mejora de calidad de los mismos y en beneficio del paciente, aunque ello pueda suponer un incremento del costo del procedimiento.
        </p>

        <p>
            En el caso de no optar por la internación de la mascota los cuidados post operatorios están bajo responsabilidad del propietario,
        </p>


        <span>_______________________
            <br>
            Firma
        </span>

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
