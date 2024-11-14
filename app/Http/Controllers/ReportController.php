<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    public function report1($pid){
        $data = Product::find($pid);
        $pdf = Pdf::loadView('pdf.invoice', ['data'=> $data]);
        return $pdf->download('invoice.pdf');
    }

    public function report2(){
    $products = [
        ['name' => 'Product 1', 'price' => 10.99],
        ['name' => 'Product 2', 'price' => 15.49],
        ['name' => 'Product 3', 'price' => 7.89],
    ];

    // Create the table HTML content
    $html = '<h1>Product List</h1>';
    $html .= '<table style="border-collapse: collapse; width: 100%;">';
    $html .= '<thead>';
    $html .= '<tr><th style="border: 1px solid #000; padding: 8px; text-align: left;">Name</th>';
    $html .= '<th style="border: 1px solid #000; padding: 8px; text-align: left;">Price</th></tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    
    // Loop through products and add them to the table
    foreach ($products as $product) {
        $html .= '<tr>';
        $html .= '<td style="border: 1px solid #000; padding: 8px;">' . $product['name'] . '</td>';
        $html .= '<td style="border: 1px solid #000; padding: 8px;">$' . number_format($product['price'], 2) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';

    // Generate the PDF
    $pdf = PDF::loadHTML($html);

    // Optionally stream the PDF to the browser
    return $pdf->stream('products.pdf');
    }
}
