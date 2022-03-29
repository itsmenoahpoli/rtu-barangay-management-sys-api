<?php

use Illuminate\Support\Facades\Route;

use App\Models\Residents\ResidentRecord;
// use PDF;

/**
 * Modules
 */
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-pdf', function() {
    $resident = ResidentRecord::first();

    $pdf = PDF::loadView(
        'pdfs.certificates.barangay-certificate',
        [
            'resident' => $resident
        ]
    );

    return $pdf->download('brgycertificate.pdf');
});
