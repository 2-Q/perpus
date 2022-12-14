<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = DB::select(
            'select peminjamen.*, mahasiswas.* from peminjamen 
            join mahasiswas on peminjamen.nrp_mahasiswa = mahasiswas.nrp
            join bukus on peminjamen.kode_buku = bukus.kode');
        
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bukus = Buku::all();
        $mahasiswas = Mahasiswa::all();
        return view('peminjaman.set_data', compact('bukus', 'mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->kode_buku == 'Select Buku') {
            $request->request->remove('kode_buku');
        }
        if ($request->nrp_mahasiswa == 'Select Mahasiswa') {
            $request->request->remove('nrp_mahasiswa');
        }
        $request->validate([
            'kode_buku' => 'required',
            'nrp_mahasiswa' => 'required',
        ]);

//         Peminjaman::create([
//             'no' => time(),
//             'kode_buku' => $request->kode_buku,
//             'nrp_mahasiswa' => $request->nrp_mahasiswa,
//             'tgl_pinjam' => Carbon::now()->toDateTimeString(),
//             'tgl_kembali' => Carbon::now()->subDay(-5)->toDateTimeString(),
//         ]);
        
        // INSERT DENGAN PLSQL ORACLE ==============
        $binding = [
            'operasi' => 'Insert',
            'no' => time(),
            'kode_buku' => $request->kode_buku,
            'nrp_mahasiswa' => $request->nrp_mahasiswa,
            'tgl_pinjam' => Carbon::now()->toDateTimeString(),
            'tgl_kembali' => Carbon::now()->subDay(-5)->toDateTimeString(),
        ];

        DB::statement("begin PPINJAM(:operasi,:no,:kode_buku,:nrp_mahasiswa,:tgl_pinjam,:tgl_kembali); end;", $binding);
        // INSERT DENGAN PLSQL ORACLE ===============

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::select(
            'select peminjamen.*, mahasiswas.*, bukus.*, mahasiswas.nama as mahasiswa, bukus.nama as buku from peminjamen 
            join mahasiswas on peminjamen.nrp_mahasiswa = mahasiswas.nrp
            join bukus on peminjamen.kode_buku = bukus.kode
            where peminjamen.no = '. $id);
        $peminjaman = $result[0];
        return view('peminjaman.detail', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $bukus = Buku::all();
        $mahasiswas = Mahasiswa::all();
        return view('peminjaman.set_data', compact('peminjaman', 'bukus', 'mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->kode_buku == 'Select Buku') {
            $request->request->remove('kode_buku');
        }
        if ($request->nrp_mahasiswa == 'Select Mahasiswa') {
            $request->request->remove('nrp_mahasiswa');
        }
        $request->validate([
            'kode_buku' => 'required',
            'nrp_mahasiswa' => 'required',
        ]);
        
//         $peminjaman = Peminjaman::findOrFail($id);
//         $peminjaman->update([
//             'kode_buku' => $request->kode_buku,
//             'nrp_mahasiswa' => $request->nrp_mahasiswa,
//         ]);

        // UPDATE DENGAN PLSQL ORACLE ==============
        $binding = [
            'operasi' => 'Update',
            'no' => $id,
            'kode_buku' => $request->kode_buku,
            'nrp_mahasiswa' => $request->nrp_mahasiswa,
            'tgl_pinjam' => NULL,
            'tgl_kembali' => NULL,
        ];

        DB::statement("begin PPINJAM(:operasi,:no,:kode_buku,:nrp_mahasiswa,:tgl_pinjam,:tgl_kembali); end;", $binding);
        // UPDATE DENGAN PLSQL ORACLE ===============

        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//         Peminjaman::destroy($id);
        
        // DELETE DENGAN PLSQL ORACLE ==============
        $binding = [
            'operasi' => 'Delete',
            'no' => $id,
            'kode_buku' => NULL,
            'nrp_mahasiswa' => NULL,
            'tgl_pinjam' => NULL,
            'tgl_kembali' => NULL,
        ];

        DB::statement("begin PPINJAM(:operasi,:no,:kode_buku,:nrp_mahasiswa,:tgl_pinjam,:tgl_kembali); end;", $binding);
        // DELETE DENGAN PLSQL ORACLE ===============
        
        return redirect()->route('peminjaman.index');
    }
}
