<?php

namespace App\Http\Controllers;

use App\Models\DashboardProdi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis=DashboardProdi::latest()->paginate(10);
        return view('dashboard.prodi.index',['prodis'=>$prodis]);
    }

    public function cetakPdf()
    {
        $pdf = Pdf::loadView('dashboard.prodi.cetak_pdf', ['prodis' => DashboardProdi::all()]);
        return $pdf->stream('Laporan-Data-Prodi.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view ('dashboard.prodi.create', ['prodis' => DashboardProdi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
        ]);
        //dd($validated);
        DashboardProdi::create($validated);
        return redirect('dashboard-prodi')->with('pesan', 'Data Berhasil Di-tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodis = DashboardProdi::findOrFail($id);
        return view('dashboard.prodi.show', compact('prodis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = DashboardProdi::find($id);
        return view ('dashboard.prodi.edit', compact('prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3'
        ]);
        DashboardProdi::where('id', $id)->update($validated);
        return redirect('dashboard-prodi')->with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashboardProdi::destroy($id);
        return redirect('dashboard-prodi')->with('pesan', 'Data berhasil dihapus');
    }
}
