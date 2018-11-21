<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translator;
use PDF;


class Vocabulary extends Controller
{
    public function index()
    {
        $kintamasis = Translator::all();

        return view('vocabulary')->with('translate', $kintamasis);

    }

    public function pdfview(Request $request)
    {
        $data = Translator::all();
        view()->share('translate',$data);

        if($request->has('download')){
            // Set extra option
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('vocabulary');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('vocabulary');
    }

}
