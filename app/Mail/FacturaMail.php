<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class FacturaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compra;
    public $pdf; // Agregar propiedad para el PDF

    public function __construct($compra, $pdf)
    {
        $this->compra = $compra;
        $this->pdf = $pdf; // Asignar el PDF
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Factura Mail',
            from: 'contacto@joacomayorista.com.ar'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.factura',
        );
    }

    public function attachments(): array
    {
        return [
            // Adjuntar el PDF generado
            new Attachment(
                content: $this->pdf->output(),
                name: 'factura.pdf',
                mimeType: 'application/pdf'
            )
        ];
    }
}
