<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($filename)
    {
        // Verifica si el archivo existe en el disco
        if (Storage::disk('local')->exists('evidences/' . $filename)) {
            // Devuelve el archivo como una respuesta de descarga
            return response()->download(storage_path('app/public/evidences/' . $filename));
        }

        // Retorna un error 404 si el archivo no existe
        abort(404, 'File not found');
    }
}
