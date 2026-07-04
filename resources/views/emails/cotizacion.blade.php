<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Cotización</title>
</head>
<body style="background-color: #030712; color: #f3f4f6; font-family: sans-serif; padding: 40px; margin: 0;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #111827; border: 1px solid #1f2937; border-radius: 16px; padding: 32px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);">
        
        <div style="text-align: center; border-bottom: 1px solid #1f2937; padding-bottom: 20px; margin-bottom: 24px;">
            <h2 style="color: #facc15; margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 0.1em;">                ⚡ JEAB Company
            </h2>
            <p style="color: #9ca3af; margin: 5px 0 0 0; font-size: 14px;">
                Notificación de Sistema: Nueva Solicitud
            </p>
        </div>

        <p style="font-size: 16px; color: #e5e7eb; line-height: 1.5;">
            Se ha registrado una nueva solicitud de cotización en la plataforma web. A continuación, se detallan los datos del prospecto:
        </p>

        <div style="background-color: #030712; border-left: 4px solid #facc15; padding: 20px; border-radius: 8px; margin: 24px 0;">
            <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Tipo de Cliente:</strong> <span style="text-transform: uppercase; color: #facc15;">{{ $cliente->tipo_cliente }}</span></p>
            <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Nombre completo:</strong> {{ $cliente->nombre }}</p>
            <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Correo Electrónico:</strong> {{ $cliente->email }}</p>
            <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Teléfono de Contacto:</strong> {{ $cliente->telefono }}</p>
            <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Dirección / Ubicación:</strong> {{ $cliente->direccion }}</p>
            
            @if($cliente->tipo_cliente === 'empresa')
                <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>NIT:</strong> {{ $cliente->nit }}</p>
                <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>Giro Comercial:</strong> {{ $cliente->giro }}</p>
            @else
                <p style="margin: 0 0 10px 0; font-size: 14px;"><strong>DUI:</strong> {{ $cliente->dui }}</p>
            @endif
        </div>

        <div style="text-align: center; border-top: 1px solid #1f2937; padding-top: 20px; margin-top: 32px;">
            <p style="color: #6b7280; font-size: 12px; margin: 0;">
                Este es un correo automático generado por el Sistema de Cotizaciones de JEAB Company. Por favor, no responder a este mensaje.
            </p>
        </div>

    </div>

</body>
</html>