<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductImportController extends Controller
{
    public function showForm()
    {
        return view('import.upload');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(
            new ProductsImport,
            $request->file('excel')
        );

        return back()->with(
            'success',
            'Importación completada correctamente'
        );
    }
}