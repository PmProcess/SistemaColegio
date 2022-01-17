<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagos de Matricula</title>
    {{-- <link rel="icon" href="{{ base_path() . '/img/siscom.ico' }}" /> --}}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }

        .cabecera {
            width: 100%;
            position: relative;
            height: 100px;
            max-height: 150px;
        }

        .logo {
            width: 30%;
            position: absolute;
            left: 0%;
        }

        .logo .logo-img {
            position: relative;
            width: 95%;
            margin-right: 5%;
            height: 90px;
        }

        .img-fluid {
            width: 100%;
            height: 100%;
        }

        .empresa {
            width: 60%;
            position: absolute;
            left: 30%;
        }

        .empresa .empresa-info {
            position: relative;
            width: 100%;
        }

        .nombre-empresa {
            font-size: 16px;
        }

        .ruc-empresa {
            font-size: 15px;
        }

        .direccion-empresa {
            font-size: 12px;
        }

        .text-info-empresa {
            font-size: 12px;
        }

        .comprobante {
            width: 30%;
            position: absolute;
            left: 70%;
        }

        .comprobante .comprobante-info {
            position: relative;
            width: 100%;
            display: flex;
            align-content: center;
            align-items: center;
            text-align: center;
        }

        .numero-documento {
            margin: 1px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 2px solid #52BE80;
            font-size: 14px;
        }

        .nombre-documento {
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 0px;
            margin-right: 0px;
            width: 100%;
            background-color: #7DCEA0;
        }

        .logos-empresas {
            width: 100%;
            height: 105px;
        }

        .img-logo {
            width: 95%;
            height: 100px;
        }

        .logo-empresa {
            width: 14.2%;
            float: left;
        }

        .informacion {
            width: 100%;
            position: relative;
            border: 2px solid #52BE80;
        }

        .tbl-informacion {
            width: 100%;
            font-size: 12px;
        }

        .cuerpo {
            width: 100%;
            position: relative;
            border: 1px solid #52BE80;
            margin-top: 10px;
        }

        .tbl-detalles {
            width: 100%;
            font-size: 12px;
        }

        .tbl-detalles thead {
            border-top: 2px solid #52BE80;
            border-left: 2px solid #52BE80;
            border-right: 2px solid #52BE80;
        }

        .tbl-detalles tbody {
            border-top: 2px solid #52BE80;
            border-bottom: 2px solid #52BE80;
            border-left: 2px solid #52BE80;
            border-right: 2px solid #52BE80;
        }

        .info-total-qr {
            position: relative;
            width: 100%;
        }

        .tbl-total {
            width: 100%;
            border: 2px solid #229954;
        }

        .qr-img {
            margin-top: 15px;
        }

        .text-cuerpo {
            font-size: 12px
        }

        .tbl-qr {
            width: 100%;
        }

        /*---------------------------------------------*/

        .m-0 {
            margin: 0;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .p-0 {
            padding: 0;
        }

    </style>
</head>

<body>
    <div class="cabecera">
        <div class="logo">
            <div class="logo-img">
                @if ($colegio->url_imagen)
                    <img src="{{ base_path() . '/storage/app/' . $colegio->url_imagen }}" class="img-fluid">
                @else
                    <img src="{{ public_path() . '/img/default.png' }}" class="img-fluid">
                @endif
            </div>
        </div>
        <div class="empresa">
            <div class="empresa-info">
                <p class="m-0 p-0 text-uppercase nombre-empresa">
                    {{ $colegio->razon_social }}
                </p>
                <p class="m-0 p-0 text-uppercase direccion-empresa">
                    {{ $colegio->direccion }}
                </p>

                <p class="m-0 p-0 text-info-empresa">Central telefónica:
                    {{ $colegio->telefono }}</p>
                <p class="m-0 p-0 text-info-empresa">Email:
                    {{ $colegio->correo }}</p>
            </div>
        </div>

    </div><br>
    <div class="informacion">
        <table class="tbl-informacion">
            <tbody style="padding-top: 5px; padding-bottom: 5px;">
                <tr>
                    <td style="padding-left: 5px;">Matricula-Grado</td>
                    <td>:</td>
                    <td>{{ $matricula->gradoSeccion->grado->grado . ' - ' . $matricula->gradoSeccion->seccion->seccion }}
                    </td>
                    {{-- <td>{{ getFechaFormato( $documento->fecha_documento ,'d/m/Y')}}</td> --}}
                </tr>
                <tr>
                    <td style="padding-left: 5px;">Alumno</td>
                    <td>:</td>
                    <td>{{ $matricula->alumno->persona->personaDni->apellidos . ' ' . $matricula->alumno->persona->personaDni->nombres }}
                    </td>
                    {{-- <td>{{ getFechaFormato( $documento->fecha_documento ,'d/m/Y')}}</td> --}}
                </tr>
                <tr>
                    <td style="padding-left: 5px;">Fecha Matricula</td>
                    <td>:</td>
                    <td>{{ $matricula->fecha_registro }}</td>
                    {{-- <td>{{ getFechaFormato( $documento->fecha_documento ,'d/m/Y')}}</td> --}}
                </tr>
                <tr>
                    <td style="padding-left: 5px;">Pago Total</td>
                    <td>:</td>
                    <td>{{ $matricula->monto_total }}</td>
                    {{-- <td>{{ getFechaFormato( $documento->fecha_documento ,'d/m/Y')}}</td> --}}
                </tr>
                <tr>
                    <td style="padding-left: 5px;">Estado</td>
                    <td>:</td>
                    <td>{{ $matricula->monto_deuda == 0 ? 'PAGADO' : 'PENDIENTE' }}</td>
                    {{-- <td>{{ getFechaFormato( $documento->fecha_documento ,'d/m/Y')}}</td> --}}
                </tr>
            </tbody>
        </table>
    </div><br>
    <span style="text-transform: uppercase;font-size:15px">Lista de Pagos</span>
    <br>
    <div class="cuerpo">
        <table class="tbl-detalles text-uppercase" cellpadding="8" cellspacing="0">
            <thead style="background: #52BE80">
                <tr>
                    <th style="text-align: center;border-right: 2px solid #52BE80">Fecha Pago</th>
                    <th style="text-align: center; border-right: 2px solid #52BE80">Persona</th>
                    <th style="text-align: center; border-right: 2px solid #52BE80">Documento</th>
                    <th style="text-align: center; border-right: 2px solid #52BE80">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matricula->pagos as $pago)
                    @if ($pago->estado == 'ACTIVO')
                        <tr>
                            <td style="text-align: center; border-right: 2px solid #52BE80">
                                {{ $pago->fecha_pago }}</td>
                            <td style="text-align: center; border-right: 2px solid #52BE80">
                                {{ $pago->nombre_cliente }}</td>
                            <td style="text-align: center; border-right: 2px solid #52BE80">
                                {{ $pago->documento }}
                            </td>
                            <td style="text-align: center; border-right: 2px solid #52BE80">
                                {{ $pago->total }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div><br>
    <br>
</body>

</html>
