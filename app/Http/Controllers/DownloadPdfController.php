<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice;
class DownloadPdfController extends Controller
{
    public function download(Certificate $datoscertificado)
    {
        //$certificado = Certificate::all();

        $certificate = new Buyer([
            'name'          => $datoscertificado-> id,
            'custom_fields' => [
                'email'=>$datoscertificado-> nota,],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($certificate)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}
