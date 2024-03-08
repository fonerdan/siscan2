<!doctype html>
<html lang="en">
    <head>
        <title>Fichas Clinicas</title>
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

        <h1 class="text-center">FICHAS CLINICAS</h1>

        <table id="customers" border="1">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Mascota</th>
                    <th scope="col">Esterilizado</th>
                    <th scope="col">Temperatura</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Color</th>
                    <th scope="col">Observación</th>
                    <th scope="col">Fecha / Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clinicalRecords as $clinicalRecord)
                    <tr>
                            <th scope="row">{{ $clinicalRecord->id }}</th>
                            <td>{{ $clinicalRecord->client->name }} - {{ "A". str_pad($clinicalRecord->client->code, 7, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $clinicalRecord->animal->name }}</td>
                            <td>{{ $clinicalRecord->sterilized }}</td>
                            <td>{{ $clinicalRecord->temp }}</td>
                            <td>{{ $clinicalRecord->weight }}</td>
                            <td>{{ $clinicalRecord->age }}</td>
                            <td>{{ $clinicalRecord->color }}</td>
                            <td>{{ $clinicalRecord->observation }}</td>
                            <td>{{ $clinicalRecord->created_at->format('d-m-Y H:i:s ') }}</td>
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
