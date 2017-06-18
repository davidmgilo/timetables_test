<?php

namespace App\Http\Controllers;

use View;

/**
 * Class PdfController.
 */
class PdfController extends Controller
{
    public function user()
    {
        return 'todo';
    }

    public function users()
    {
        //
        $pdf = \App::make('dompdf.wrapper');
        $view = View::make('pdf.users')->render();
        $pdf->loadHTML('<h1>Hello World!</h1>');

        return $pdf->stream('users');
    }

    public function users_view()
    {
        return view('pdf.users');
    }
}
