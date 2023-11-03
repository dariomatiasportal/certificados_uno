<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function __invoke(Certificate $order)
    {

        return Pdf::loadView('pdf', ['record' => $order])
        ->setPaper('a4', 'landscape')->stream($order->id. '.pdf');
    }
}
