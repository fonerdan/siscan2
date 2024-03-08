<!doctype html>
<html lang="en">
    <head>
        <title>Acta de Autorización para Sedación / Anestesia {{ $sedationAnesthesia->client->name }}</title>
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
            <h1 class="text-center"><u>ACTA DE AUTORIZACIÓN PARA SEDACIÓN / ANESTESIA</u></h1>
        </div>

        <div class="text-right">
            Tarija, {{ \Carbon\Carbon::parse($sedationAnesthesia->created_at)->isoFormat('D [de] MMMM [de] YYYY')  }}
        </div>

        <p>
            Yo, <strong>{{ $sedationAnesthesia->client->name }}</strong> C.I: <strong>{{ $sedationAnesthesia->client->ci }}</strong><br>
            con domicilio en la calle: <strong>{{ $sedationAnesthesia->client->address }}</strong> N°: <strong>{{ $sedationAnesthesia->client->number }}</strong><br>
            Teléfono fijo/celular: <strong>{{ $sedationAnesthesia->client->phone }}</strong>, propietario/a del animal de especie: <strong>{{ $sedationAnesthesia->animal->specie }}</strong> raza: <strong>{{$sedationAnesthesia->animal->race}}</strong> sexo: <strong>{{ $sedationAnesthesia->animal->gender }}</strong> edad: <strong>{{ $sedationAnesthesia->animal->age }}</strong> pelaje: <strong>{{ $sedationAnesthesia->animal->fur }}</strong> nombre: <strong>{{ $sedationAnesthesia->animal->name }}</strong>
        </p>
        <p>
            Presta su conformidad y autoriza a Centro Veterinario AA Tarija, para efectuar la sedación y/o anestesia que sea necesaria para poder realizar las maniobras detalladas, al animal cuyos datos han sido especificados precedentemente.
        </p>

        <b>Detalle de maniobras</b>
        <p>
            <strong>{{ $sedationAnesthesia->detail }}</strong> y todo otro procedimiento destinado a salvaguardar la vida del animal y/o procurar mejorar y/o recuperar la salud del mismo.
        <p>
        <p>
            Asimismo, deja constancia y acepta en forma irrevocable, que le han sido explicados y conoce los riesgos que implica para la vida del animal, los resultados esperados, las posibles complicaciones, asi como eventuales secuelas derivadas de la sana práctica médica. A someterse a las indicaciones, tratamientos y prácticas que los profesionales actuantes consideren convenientes. A retirar al animal y sus pertenencias en los tiempos estipulados por los profesionales actuantes, no siendo así se autoriza al Centro Veterinario para disponer libremente de ellos, con más los gastos que correspondieran al exclusivo cargo y responsabilidad del abajo firmante.
        </p>

        <p>
            Certifica con su firma que ha leido y comprendido la presente autorización, prestando su consentimiento.
        </p>

        <span>_______________________
            <br>
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
