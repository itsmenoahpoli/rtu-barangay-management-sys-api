<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use Carbon\Carbon;

use Storage;

class PDFController extends Controller
{
    public function generatePdf($payload)
    {
        try
        {
            $pdfType = $this->getPdfType($payload['type']);
            $resident = $payload['resident'];

            // return $resident;

            $pdf = PDF::loadView(
                $pdfType,
                [
                    'resident' => $payload['resident']
                ]
            );

            $pdfContent = $pdf->download()->getOriginalContent();
            $fileName = $this->generatePdfFilename($pdfType, $resident);
            $storageFileDir = 'public/files/'.str_replace('.', '/', $pdfType).'s/'.$fileName;
            $storageAccessFileDir = 'storage/files/'.str_replace('.', '/', $pdfType).'s/'.$fileName;

            Storage::put($storageFileDir, $pdfContent);

            return [
                'file_directory' => url($storageAccessFileDir),
                'status' => 'Successfully generated PDF file'
            ];
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }

    }

    public function archiveGeneratedPdf($filename, $pdf)
    {
        try {

        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }

    private function generatePdfFilename($pdfType, $resident)
    {
        return time()
        .'-'.
        date('Y-m-d', strtotime(Carbon::now()))
        .'-'.
        strtoupper($resident->last_name
        .'-'.
        $resident->first_name
        .'-'.
        str_replace('.', '-', $pdfType))
        .'.pdf';
    }

    private function getPdfType($type)
    {
        switch($type)
        {
            case 'brgycertificate':
                return 'pdfs.certificates.barangay-certificate';

            case 'singleparentcertificate':
                return 'pdfs.certificates.indigency-certificate';

            case 'indigencycertificate':
                return 'pdfs.certificates.indigency-certificate';

            case 'brgyclearance':
                return 'pdfs.clearances.barangay-clearance';

            case 'brgypermit':
                return 'pdfs.permits.barangay-permit';

            default:
                return NULL;
        }
    }
}
