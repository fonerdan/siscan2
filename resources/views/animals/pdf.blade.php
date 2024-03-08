<!doctype html>
<html lang="en">
    <head>
        <title>Lista de Clientes</title>
        <meta charset="utf-8" />
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
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            text-align: center;
            padding: 0px;
            margin: 0px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
        background-color: #a8dbe7be;
        }

        h1{
            color: rgba(2, 108, 170, 0.815);
            font-size: 20px;
            margin: 0px;
        }
    </style>
    <body>

        <img src="{{ public_path('img/logo_pdf.jpg') }}" alt="Logo" width="100" height="80"/>

        <h1 class="text-center">CENTRO VETERINARIO AA TARIJA LISTA DE CLIENTES</h1>
        <table class="table table-striped">
            <thead class="bg-info text-white">
                <tr>
                    <th>CÓDIGO</th>
                    <th>APELLIDO / NOMBRE DEL CLIENTE</th>
                    <th>TELÉFONO / CELULAR</th>
                    <th>NOMBRE DEL PACIENTE</th>
                    <th>ESPECIE</th>
                    <th>RAZA</th>
                    <th>SEXO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <td>{{ "A". str_pad($animal->client->code, 7, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $animal->client->name }}</td>
                        <td>
                            @if ($animal->client->phone && $animal->client->reference_phone)
                                {{ $animal->client->phone }} /
                                {{ $animal->client->reference_phone }}
                            @else
                                {{ $animal->client->phone }}
                            @endif
                        </td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->specie }}</td>
                        <td>{{ $animal->race }}</td>
                        <td>{{ $animal->gender }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
