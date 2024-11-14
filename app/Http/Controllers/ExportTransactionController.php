<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportTransactionController extends Controller
{
    public function exportExcel()
    {
        // Logika export transaksi ke Excel
        return response()->json(['message' => 'Export transaksi ke Excel berhasil']);
    }

    public function exportPDF()
    {
        // Logika export transaksi ke PDF
        return response()->json(['message' => 'Export transaksi ke PDF berhasil']);
    }
}
