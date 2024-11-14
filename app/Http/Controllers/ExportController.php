<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportExcel()
    {
        // Logika export ke Excel
        return response()->json(['message' => 'Export Excel berhasil']);
    }

    public function exportPDF()
    {
        // Logika export ke PDF
        return response()->json(['message' => 'Export PDF berhasil']);
    }
}
