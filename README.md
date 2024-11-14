1. composer require barryvdh/laravel-dompdf
2. [    use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
   ]
3. 
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
   
