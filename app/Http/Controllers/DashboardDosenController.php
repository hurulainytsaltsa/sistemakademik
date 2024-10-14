<?php

namespace App\Http\Controllers;

use App\Models\DashboardProdi;
use App\Models\DashboardDosen;
use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $dosens =DashboardDosen::latest()->paginate(10);
        return view('dashboard.dosen.index',['dosens'=>$dosens]);
    }

    public function cetakPdf()
    {
        $pdf = Pdf::loadView('dashboard.dosen.cetak_pdf', ['dosens' => DashboardDosen::all()]);
        return $pdf->stream('Laporan-Data-Dosen.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = DashboardProdi::all();
        return view('dashboard.dosen.create',['prodis'=>$prodis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:dosens',
            'nama' => 'required|min:3',
            'email' => 'required',
            'no_telp' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable',
            'jabatan' => 'required',
        ]);

        // dd($validated);

        DashboardDosen::create($validated);
        return redirect('/dashboard-dosen')->with('pesan', 'Data sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $prodis = Prodi::all();
        $dosen = DashboardDosen::findOrFail($id);
        return view('dashboard.dosen.show', compact('prodis','dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodis = Prodi::all();
        $dosen = DashboardDosen::find($id);
        return view('dashboard.dosen.edit', compact('prodis', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'nama' => 'required|min:3',
            'email' => 'required',
            'no_telp' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable',
            'jabatan' => 'required',
        ]);

        DashboardDosen::where('id', $id)->update($validated);
        return redirect('/dashboard-dosen')->with('pesan', 'Data sudah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DashboardDosen::destroy($id);
        return redirect('/dashboard-dosen')->with('pesan', 'Data sudah berhasil dihapus');
    }
}
