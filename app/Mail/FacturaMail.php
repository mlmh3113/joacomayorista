<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF; // Asegúrate de importar la clase PDF

class FacturaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compra;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($compra, $pdf)
    {
        $this->compra = $compra;
        $this->pdf = $pdf;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Factura Mail',
            from: 'contacto@joacomayorista.com.ar'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.factura',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Genera un nombre de archivo para el PDF
        $fileName = 'factura_' . $this->compra->id . '.pdf';

        // Guarda el PDF en una variable temporal
        $pdfPath = storage_path('app/public/' . $fileName);
        $this->pdf->save($pdfPath);

        return [
            // Adjunta el PDF generado
            \Illuminate\Mail\Mailables\Attachment::fromPath($pdfPath)->as($fileName),
        ];
    }
}
