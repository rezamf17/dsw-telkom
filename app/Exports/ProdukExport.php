<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $id;
    protected $time;
    protected $request;
    protected $produk_query;
    protected $nama;
    protected $sumtgt;
    protected $sumpsbln;
    protected $sumach;
    protected $sumtgtrev;
    protected $sumprogrev;
    protected $sumachrev;    
    protected $treg_query;
    public function __construct($id, $time, $request, $produk_query, $nama, $sumtgt, $sumpsbln, $sumach, $sumtgtrev, $sumprogrev, $sumachrev, $treg_query)
    {
        $this->id = $id;
        $this->request = $request;
        $this->time = $time;
        $this->produk_query = $produk_query;
        $this->nama = $nama;
        $this->sumtgt = $sumtgt; 
        $this->sumpsbln = $sumpsbln; 
        $this->sumach = $sumach; 
        $this->sumtgtrev = $sumtgtrev; 
        $this->sumprogrev = $sumprogrev; 
        $this->sumachrev = $sumachrev;
        $this->treg_query = $treg_query;
    }

    public function view(): View
    {
        $id = $this->id;
        $produk_query = $this->produk_query;
        $time = $this->time;
        $nama = $this->nama;
        $sumtgt = $this->sumtgt;
        $sumpsbln = $this->sumpsbln;
        $sumach = $this->sumach;
        $sumtgtrev = $this->sumtgtrev;
        $sumprogrev = $this->sumprogrev;
        $sumachrev = $this->sumachrev;
        $treg_query = $this->treg_query;
        return view('staff.LaporanProduk', compact('id', 'produk_query', 'time', 'nama', 'sumtgt', 
            'sumpsbln', 
            'sumach', 
            'sumtgtrev',
            'sumprogrev',
            'sumachrev',
            'treg_query'));
    }
}
