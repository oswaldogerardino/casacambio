<?php

namespace App\Mail;

use App\Venta;
use App\Venta_Item;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdenVenta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $venta;
    public $items;

    public function __construct($venta)
    {
        //
        $this->venta = Venta::whereCodigoFactura($venta)->firstOrFail();
        $this->items = Venta_Item::whereCodigoFactura($venta)->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.venta')->from('no-reply@ganaderosbalzar.com')->subject('Factura de Venta!');
    }
}
