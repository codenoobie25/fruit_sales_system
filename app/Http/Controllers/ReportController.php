<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Fruit::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }

        $fruits         = $query->get();
        $categories     = ['citrus', 'berry', 'stone fruit', 'tropical', 'pome'];
        $availabilities = ['available', 'out of stock'];

        return view('reports.index', compact('fruits', 'categories', 'availabilities'));
    }

    public function exportPDF(Request $request)
    {
        $query = Fruit::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }

        $fruits = $query->get();
        $pdf    = Pdf::loadView('reports.pdf', compact('fruits'));

        return $pdf->download('fruits-report.pdf');
    }
}
