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

Route::get('cert-mail', function() {
    $mail = new App\Mail\Residents\CertificateStatus;

    return $mail;
});
