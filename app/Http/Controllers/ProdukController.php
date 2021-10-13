<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Nama;
use App\Models\Jenis;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $produkcount = Produk::where('id_nama_produk', 1)->count();
        $nama = Nama::all();
        return view ('staff.KelolaProduk', compact('produk', 'nama', 'produkcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama = Nama::all();
        $jenis = Jenis::all();
        $produk = Produk::all();
        return view ('staff.TambahDataProduk', compact('nama', 'jenis', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Produk::create($request->all());
       // return $produk;
        foreach ($request->witel as $row => $key) {
         $produk = new Produk;
         $psbln = $request->psbln[$row];
         $tgt = $request->tgt[$row];
         $tgtrev = $request->tgtrev[$row];
         $progrev = $request->progrev[$row];
         $produk->id_jenis = $request->id_jenis[0];
         $produk->id_nama_produk = $request->id_nama_produk[0];
         $produk->witel = $request->witel[$row];
         $produk->tgt = $tgt;
         $produk->psbln = $psbln;
         $produk->ach = $tgt / $psbln;
         $produk->rank = 4;
         $produk->tgtrev = $tgtrev;
         $produk->progrev = $progrev;
         $produk->achrev = $tgtrev / $progrev;
         $produk->rankrev = 4;
         $produk->save();
     }
        // return  $request->witel;
     return redirect('KelolaProduk')->with('success', 'Produk Berhasil Disimpan!');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::where('id_nama_produk', $id)->get();
        $produk_id = Produk::where('id_nama_produk', $id)->first();
        return view('staff.ViewProduk', compact('produk', 'produk_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama = Nama::all();
        $name = Nama::where('id', $id)->first();
        $jenis = Jenis::all();
        $produk = Produk::where('id', $id)->first();
        return view('staff.EditProduk', compact('nama', 'jenis', 'produk', 'name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $psbln = $request->psbln;
        $tgt = $request->tgt;
        $tgtrev = $request->tgtrev;
        $progrev = $request->progrev;
        $produk->id_jenis = $request->id_jenis;
        $produk->id_nama_produk = $request->id_nama_produk;
        $produk->witel = $request->witel;
        $produk->tgt = $tgt;
        $produk->psbln = $psbln;
        $produk->ach = $tgt / $psbln;
        $produk->rank = 4;
        $produk->tgtrev = $tgtrev;
        $produk->progrev = $progrev;
        $produk->achrev = $tgtrev / $progrev;
        $produk->rankrev = 4;
        $produk->save();
        return redirect('KelolaProduk/'.$request->id_nama_produk)->with('success', 'Produk Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return back()->with('success', 'Data produk berhasil dihapus!');
    }

    public function export(Request $request, $id) 
    {
        $time = $request->time;
        $produk = Produk::where('id_nama_produk', $id)->where('created_at', $time)->where('witel', 'not like', 'TREG%')->get();
        $nama = Produk::where('id_nama_produk', $id)->first();
        $sumtgt =  Produk::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgt');
        $sumpsbln =  Produk::where('id_nama_produk', $id)->where('created_at', $time)->sum('psbln');
        $sumach = round($sumtgt / $sumpsbln); 
        $sumtgtrev = Produk::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgtrev');
        $sumprogrev = Produk::where('id_nama_produk', $id)->where('created_at', $time)->sum('progrev');
        $sumachrev = round($sumtgtrev / $sumprogrev);
        $treg = Produk::where('id_nama_produk', $id)->where('created_at', $time)->where('witel', 'like', 'TREG%')->get();
        return view ('staff.LaporanProduk', compact(
            'produk',
            'nama',
            'time', 
            'sumtgt',
            'treg', 
            'sumpsbln', 
            'sumach', 
            'sumtgtrev',
            'sumprogrev',
            'sumachrev'));
        // return Excel::download(new ProdukExport($id, $request, $time, $produk, $nama, $sumtgt, $sumpsbln, $sumach, $sumtgtrev, $sumprogrev, $sumachrev ), 'LaporanProduk'.$time.'.xlsx');
        // return $request;
    }
}
