<?php

namespace App\Mail;

use App\Models\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaCotizacionMail extends Mailable
{
    use Queueable, SerializesModels;

    // Declaramos la variable pública para que la plantilla Blade tenga acceso a ella automáticamente
    public $cliente;

    /**
     * Create a new message instance.
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Get the message envelope (Asunto y configuraciones de cabecera).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚡ Nueva Solicitud de Cotización Recibida - JEAB Company',
        );
    }

    /**
     * Get the message content definition (Asigna la vista HTML).
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.cotizacion', // Apunta a resources/views/emails/cotizacion.blade.php
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}