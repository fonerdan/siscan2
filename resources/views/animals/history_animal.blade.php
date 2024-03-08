<!doctype html>
<html lang="en">
    <head>
        <title>Ficha Clinica</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        {{-- bootstrap 4 --}}
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZfzisyJ6BdOzFLkhJ5uoXf3Tx"
            crossorigin="anonymous">
    </head>
    <style>
        body{
            color: #479459;
            font-weight: bold;
            font-style: italic;
        }

        .bg-success{
            background-color: #75c487 !important;
        }

        h1{
            font-size: 16px;
            padding: 2px;
            color: white;
            font-weight: bold;
        }

        hr{
            border: 1px solid rgb(219, 131, 131);
            margin: 0px;
        }

        .ws {
            position: relative;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: #4cb0bd;
            margin-bottom: 24.5px;
        }

        .overlay-text {
            position: absolute;
            top: 0;
            left: 0;
            line-height: 25px;
            z-index: 1;
        }
    </style>

    <body>
        <div class="bg-success">
            <h1 class="text-center">FICHA CLINICA - CENTRO VETERINARIO AA TARIJA</h1>
        </div>
        <span>
            PROPIETARIO: {{ $animal->client->name }}
        </span>
        <span class="float-right">
            CELULAR: {{ $animal->client->phone }}
        </span>
        <div class="bg-success">
            <h1>DATOS DEL PACIENTE</h1>
        </div>
        <span>
            NOMBRE: {{ $animal->name }}
        </span>
        <span class="ml-3">
            ESPECIE: {{ $animal->specie }}
        </span>
        <span class="ml-3">
            RAZA: {{ $animal->race }}
        </span>
        <span class="ml-3">
            SEXO: {{ $animal->gender }}
        </span>
        <span class="ml-3">
            FECHA: {{ $animal->created_at->format('d-M-Y') }}
        </span>
        <hr>
        {{-- <span>
            ESTERILIZADO: {{ $animal->clinicalRecords->sterilized }}
        </span>
        <span class="ml-4">
            TEMP: {{ $animal->clinicalRecords->temp }}
        </span>
        <span class="ml-4">
            PESO: {{ $animal->clinicalRecords->weight }}
        </span>
        <span class="ml-4">
            EDAD: {{ $animal->clinicalRecords->age }}
        </span>
        <span class="ml-4">
            COLOR: {{ $animal->clinicalRecords->color }}
        </span>
        <span class="ml-4">
            FECHA: {{ $animal->clinicalRecords->created_at->format('d-M-Y') }}
        </span> --}}

        <div class="ws" style="position: relative;">
            @for ($i = 0; $i < 22; $i++)
                <div class="line"></div>
            @endfor
            <p class="overlay-text">
                @foreach ($animal->clinicalRecords as $data)
                    {{ $data->created_at->format('d-M-Y') }}
                    {{ $data->observation }} <br>
                @endforeach
            </p>
        </div>
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
