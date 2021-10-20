<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nama;
use App\Models\Jenis;
use App\Models\Laporan;
use App\Models\Produk;
use App\Exports\LaporanExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama = Nama::all();
        return view ('manager.KelolaLaporan', compact('nama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        $nama = Nama::all();
        return view('manager.TambahKelolaLaporan', compact('jenis', 'nama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         foreach ($request->witel as $row => $key) {
         $laporan = new Laporan;
         $realmtd = $request->realmtd[$row];
         $tgtmtd = $request->tgtmtd[$row];
         $tgtrev = $request->tgtrev[$row];
         $progrev = $request->progrev[$row];

         $laporan->id_jenis = $request->id_jenis[0];
         $laporan->id_nama_produk = $request->id_nama_produk[0];
         $laporan->witel = $request->witel[$row];
         $laporan->tgtmtd = $tgtmtd;
         $laporan->realmtd = $realmtd;
         $laporan->ach = $realmtd / $tgtmtd * 100;
         $laporan->shrtge = $tgtmtd - $realmtd; 
         $laporan->tgtrev = $tgtrev;
         $laporan->progrev = $progrev;
         $laporan->achrev = $progrev / $tgtrev * 100;

         $laporan->save();
     }
         // return $request;
     return redirect('KelolaLaporan')->with('success', 'Laporan Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::where('id_nama_produk', $id)->get();
        $laporan_id = Laporan::where('id_nama_produk', $id)->first();
        return view('manager.ViewLaporan', compact('laporan_id', 'laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::all();
        $nama = Nama::all();
        $laporan = Laporan::where('id', $id)->first();
        return view('manager.EditLaporan', compact('jenis', 'nama', 'laporan'));
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
        $laporan = Laporan::find($id);
         $realmtd = $request->realmtd;
         $tgtmtd = $request->tgtmtd;
         $tgtrev = $request->tgtrev;
         $progrev = $request->progrev;

         $laporan->id_jenis = $request->id_jenis;
         $laporan->id_nama_produk = $request->id_nama_produk;
         $laporan->witel = $request->witel;
         $laporan->tgtmtd = $tgtmtd;
         $laporan->realmtd = $realmtd;
         $laporan->ach = $realmtd / $tgtmtd * 100;
         $laporan->shrtge = $tgtmtd - $realmtd; 
         $laporan->tgtrev = $tgtrev;
         $laporan->progrev = $progrev;
         $laporan->achrev = $progrev / $tgtrev * 100;

         $laporan->save();

         return redirect('KelolaLaporan/'.$laporan->id_nama_produk)->with('success', 'Laporan Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect('KelolaLaporan/'.$laporan->id_nama_produk)->with('success', 'Laporan Berhasil Dihapus!');
    }

    public function viewExport(Request $request, $id)
    {
        $time = $request->time;
        $laporan_query = DB::table('kelola_laporan')
                ->select('id_nama_produk', 'witel', 'tgtmtd', 'realmtd', 'ach', 'shrtge', 'tgtrev', 'progrev', 'achrev')
                ->selectRaw('RANK() OVER(ORDER BY ach DESC) AS `rank`')
                ->selectRaw('RANK() OVER(ORDER BY achrev DESC) AS `rankrev`')
                ->groupBy('id_nama_produk', 'witel', 'tgtmtd', 'realmtd', 'ach', 'shrtge', 'tgtrev', 'progrev', 'achrev')
                ->where('id_nama_produk', $id)
                ->where('created_at', $time)
                ->where('witel', 'not like', 'TREG%')
                ->get();
        $nama = Laporan::where('id_nama_produk', $id)->first();
        $laporan_id = Laporan::where('id_nama_produk', $id)->first();
        $sumtgtmtd =  Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgtmtd');
        $sumrealmtd =  Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('realmtd');
        $sumach = round($sumtgtmtd / $sumrealmtd * 100); 
        $sumtgtrev = Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgtrev');
        $sumprogrev = Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('progrev');
        $sumachrev = round($sumtgtrev / $sumprogrev * 100);
        return view ('manager.ViewExport', compact(
            'laporan_query',
            'nama',
            'time', 
            'sumtgtmtd', 
            'sumrealmtd', 
            'sumach', 
            'sumtgtrev',
            'sumprogrev',
            'sumachrev',
            'laporan_id'));
    }

    public function export(Request $request, $id)
    {
        $time = $request->time;
        $laporan_query = DB::table('kelola_laporan')
                ->select('id_nama_produk', 'witel', 'tgtmtd', 'realmtd', 'ach', 'shrtge', 'tgtrev', 'progrev', 'achrev')
                ->selectRaw('RANK() OVER(ORDER BY ach DESC) AS `rank`')
                ->selectRaw('RANK() OVER(ORDER BY achrev DESC) AS `rankrev`')
                ->groupBy('id_nama_produk', 'witel', 'tgtmtd', 'realmtd', 'ach', 'shrtge', 'tgtrev', 'progrev', 'achrev')
                ->where('id_nama_produk', $id)
                ->where('created_at', $time)
                ->where('witel', 'not like', 'TREG%')
                ->get();
        $nama = Laporan::where('id_nama_produk', $id)->first();
        $laporan_id = Laporan::where('id_nama_produk', $id)->first();
        $sumtgtmtd =  Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgtmtd');
        $sumrealmtd =  Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('realmtd');
        $sumach = round($sumtgtmtd / $sumrealmtd * 100); 
        $sumtgtrev = Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('tgtrev');
        $sumprogrev = Laporan::where('id_nama_produk', $id)->where('created_at', $time)->sum('progrev');
        $sumachrev = round($sumtgtrev / $sumprogrev * 100);
        return Excel::download(new LaporanExport($id, $request, $time, $laporan_query, $nama, $sumtgtmtd, $sumrealmtd, $sumach, $sumtgtrev, $sumprogrev, $sumachrev ), 'ReportLaporan'.$nama->nama->nama.$time.'.xlsx');
        // return view ('manager.LaporanReport', compact(
        //     'laporan_query',
        //     'nama',
        //     'time', 
        //     'sumtgtmtd', 
        //     'sumrealmtd', 
        //     'sumach', 
        //     'sumtgtrev',
        //     'sumprogrev',
        //     'sumachrev',
        //     'laporan_id'));
    }
}
