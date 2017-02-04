<?php

namespace App\Http\Controllers;

use App\Need;
use Barryvdh\DomPDF\Facade as PDF;

class PrintNeedController extends Controller
{
    /**
     * Stores the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {

        $needs = Need::whereIn('id', request('needs'))->get();
        $pdf = PDF::loadView('print.pdf', ['needs' => $needs]);

        return $pdf->download('Needs.pdf');
//        header("HTTP/1.1 200 OK");
//        header("Pragma: public");
//        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//
//        // The optional second 'replace' parameter indicates whether the header
//        // should replace a previous similar header, or add a second header of
//        // the same type. By default it will replace, but if you pass in FALSE
//        // as the second argument you can force multiple headers of the same type.
//        header("Cache-Control: private", false);
//        header("Content-type: application/pdf");
//
//        // $strFileName is, of course, the filename of the file being downloaded.
//        // This won't have to be the same name as the actual file.
//        header("Content-Disposition: attachment; filename=Needs.pdf");
//
//        header("Content-Transfer-Encoding: binary");
//        header("Content-Length: " . mb_strlen($file));
    }
}
