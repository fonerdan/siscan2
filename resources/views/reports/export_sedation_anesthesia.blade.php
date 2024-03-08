<!doctype html>
<html lang="en">
    <head>
        <title>Autorizaciones para Sedación y Anestesia</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <style>
        body{
            margin-top: -30px;
            font-size: 12px;
        }

        #customers {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        }

        #customers th {
        text-align: left;
        background-color: #119cb4;
        color: white;
        }
    </style>
    <body>

        <h1 class="text-center text-uppercase">Autorizaciones para Sedación y Anestesia</h1>

        <table id="customers" border="1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Mascota</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Fecha / Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sedationAnesthesias as $index => $sedationAnesthesia)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $sedationAnesthesia->client->name }} - {{ "A". str_pad($sedationAnesthesia->client->code, 7, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $sedationAnesthesia->animal->name }}</td>
                        <td>{{ $sedationAnesthesia->detail }}</td>
                        <td>{{ $sedationAnesthesia->created_at->format('d-m-Y H:i:s ') }}</td>
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
