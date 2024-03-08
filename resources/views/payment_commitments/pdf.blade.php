<!doctype html>
<html lang="en">
    <head>
        <title>Compromiso de Pago {{ $payment_commitment->client->name }}</title>
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
        body{
            padding:40px;
        }

        .parrafo-1 {
            text-indent: 50px;
            text-align: justify;
        }

        .firma{
            margin-top: 200px;
        }
    </style>

    <body>
        <div class="mb-4">
            Tarija, {{ \Carbon\Carbon::parse($payment_commitment->created_at)->isoFormat('D [de] MMMM [de] YYYY')  }}
        </div>

        Señores:  <br>
        Centro Veterinario AA Tarija <br>
        Lic. Carola Nleva Magarzo <br>
        Gerente Propietario <br>
        <u>Presente.-</u>
        <h6 class="text-right">REF: <u>COMPROMISO DE PAGO</u></h6>
        <p class="parrafo-1">
            Por medio de la presente, yo, <strong><u>{{ $payment_commitment->client->name }}</u></strong> en mi calidad de paciente, solicito se me otorgue prórroga para cancelar los honorarios por los servicios veterinarios recibidos de acuerdo a detalle adjunto. Comprometiéndome a realizar el pago correspondiente hasta la fecha <strong><u>{{ \Carbon\Carbon::parse($payment_commitment->date)->isoFormat('D [de] MMMM [de] YYYY') }}</u></strong>, tiempo que no excederá al mes a partir de la fecha.
        </p>

        <p>
            Dicho monto asciende a un total de <strong><u>{{ $payment_commitment->amount }}</u></strong> bs <strong>(<u>{{$numero}}</u> 00/100 bolivianos)</strong> los cuales serán cubiertos por mi persona en el tiempo convenido.
        </p>
        <p class="mb-5">
            Sin otro particular, saludos cordiales.
        </p>

        <p class="firma mb-5">
            Firma: _________________________
        </p>
        <p class="mb-5">
            Nombre: _________________________
        </p>

        <p>
            C.I.: _________________________
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
