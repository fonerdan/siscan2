<!doctype html>
<html lang="en">
    <head>
        <title>Solicitud de Eutanasia {{ $euthanasia->client->name }}</title>
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
            <h6 class="text-right form">FORM: CVAAT/ADM/0004</h6>
        </p>

        <div class="w-50 m-auto py-4">
            <h1 class="text-center"><u>SOLICITUD DE EUTANASIA</u></h1>
        </div>

        <div class="text-right">
            Tarija, {{ \Carbon\Carbon::parse($euthanasia->created_at)->isoFormat('D [de] MMMM [de] YYYY')  }}
        </div>

        <p>
            Por la presente, el/la señor/a <strong>{{$euthanasia->client->name}}</strong> quien acredita identidad con documento CI, N° <strong>{{$euthanasia->client->ci}}</strong> expedido en <strong>{{$euthanasia->client->expedition}}</strong> con domicilio en la calle: <strong>{{$euthanasia->client->address}}</strong> N°: <strong>{{$euthanasia->client->number}}</strong> Teléfono fijo/celular: <strong>{{$euthanasia->client->phone}}</strong>, propietario/a del animal de especie: <strong>{{$euthanasia->animal->specie}}</strong>, raza: <strong>{{$euthanasia->animal->race}}</strong> sexo: <strong>{{$euthanasia->animal->gender}}</strong> edad: <strong>{{$euthanasia->animal->age}}</strong> pelaje: <strong>{{$euthanasia->animal->fur}}</strong> nombre: <strong>{{$euthanasia->animal->name}}</strong>
        </p>

        <p>
            Solicita a <strong>{{$euthanasia->doctor}}</strong> Y a quien este designe, a practicar la <b>Eutanasia</b>, del animal mencionado, de conformidad con el procedimiento profesional correspondiente.
        </p>
        <p>
            Informándole en este caso, que el diagnóstico arribado consiste en, <strong>{{$euthanasia->description}}</strong>, lo cual justifica plenamente la medida a adoptarse.
        </p>

        <p>
            El firmante, declara bajo juramento que el animal a sacrificar, no ha mordido por un lapso no menor a los 14 dias precedentes a la firma del presente, haciéndole saber que en caso de falsedad u ocultamiento de dicha circunstancia será pasible de las sanciones que determina el art. 5 y 6 de la Ley N° 700 del 03 de junio de 2015, sin perjuicio de la responsabilidad civil o penal que la pudiera corresponder (art.10, Ley 700).
        </p>
        <p>
            Certifica con su firma que ha leido y comprendido la presente autorización, prestando su consentimiento.
        </p>

        <p>
            ________________________________ <br>
            Firma del propietario <br>
            Aclaración de la Firma: .........................................................................
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
