<!doctype html>
<html lang="en">
    <head>
        <title>Acta de Autorización para Sedación / Anestesia {{ $internment->client->name }}</title>
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

        <div class="m-auto py-4">
            <h1 class="text-center"><u>ACTA DE INTERNACIÓN</u></h1>
        </div>

        <div class="text-right">
            Tarija, {{ \Carbon\Carbon::parse($internment->created_at)->isoFormat('D [de] MMMM [de] YYYY')  }}
        </div>

        <p>
            Yo, <strong>{{ $internment->client->name }}</strong> C.I: <strong>{{ $internment->client->ci }}</strong><br>
            con domicilio en la calle: <strong>{{ $internment->client->address }}</strong> N°: <strong>{{ $internment->client->number }}</strong><br>
            Teléfono fijo/celular: <strong>{{ $internment->client->phone }}</strong>, propietario/a del animal de especie: <strong>{{ $internment->animal->specie }}</strong> raza: <strong>{{$internment->animal->race}}</strong> sexo: <strong>{{ $internment->animal->gender }}</strong> edad: <strong>{{ $internment->animal->age }}</strong> pelaje: <strong>{{ $internment->animal->fur }}</strong> nombre: <strong>{{ $internment->animal->name }}</strong>
        </p>
        <p>
            Presta su conformidad y autoriza a <strong>{{$internment->doctor}}</strong> <br>
            para efectuar la internación del animal cuyos datos han sido especificados precedentemente, para realizar todos los procedimientos destinado a salvaguardar la vida y/o procurar mejorar y/o recuperar la salud del mismo.
        </p>

        <p>
            Asimismo, deja constancia y acepta que le ha sido informado de los riesgos que implica la patología por la que ha sido internado. Se comprometa a retirar al animal y sus perternencias en los tiempos estipulados por los profesionales actuantes, no siendo así se autoriza al Centro Veterinario AA Tarija para disponer libremente de ellos, con más los gastos que correspondieran al exclusivo cargo y responsabilidad del abajo firmante.
        </p>

        <p>
            Certifica con su firma que ha leido y comprendido la presente autorización, prestando su consentimiento.
        </p>

        <span>_______________________<br>
            Firma del propietario <br>
            Aclaración de la Firma: ..........................................................
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
