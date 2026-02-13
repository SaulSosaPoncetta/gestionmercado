<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoEnvioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orden; // Propiedad para almacenar la orden
    public $ajuste; // Propiedad para almacenar los ajustes del vendedor

    public function __construct($orden, $ajuste)
    {
        $this->orden = $orden; // Asigna la orden a la propiedad para usarla en la vista del correo electrónico
        $this->ajuste = $ajuste; // Asigna los ajustes a la propiedad para usarla en la vista del correo electrónico
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tu pedido ha sido despachado con exito',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.pedidos.pedido_enviado', // Vista del correo electrónico
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
