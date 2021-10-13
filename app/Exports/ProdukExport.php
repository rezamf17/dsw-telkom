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
    protected $produk;
    protected $nama;
    protected $sumtgt;
    protected $sumpsbln;
    protected $sumach;
    protected $sumtgtrev;
    protected $sumprogrev;
    protected $sumachrev;    
    public function __construct($id, $time, $request, $produk, $nama, $sumtgt, $sumpsbln, $sumach, $sumtgtrev, $sumprogrev, $sumachrev)
    {
        $this->id = $id;
        $this->request = $request;
        $this->time = $time;
        $this->produk = $produk;
        $this->nama = $nama;
        $this->sumtgt = $sumtgt; 
        $this->sumpsbln = $sumpsbln; 
        $this->sumach = $sumach; 
        $this->sumtgtrev = $sumtgtrev; 
        $this->sumprogrev = $sumprogrev; 
        $this->sumachrev = $sumachrev;
    }

    public function view(): View
    {
        $id = $this->id;
        $produk = $this->produk;
        $time = $this->time;
        $nama = $this->nama;
        $sumtgt = $this->sumtgt;
        $sumpsbln = $this->sumpsbln;
        $sumach = $this->sumach;
        $sumtgtrev = $this->sumtgtrev;
        $sumprogrev = $this->sumprogrev;
        $sumachrev = $this->sumachrev;
        return view('staff.LaporanProduk', compact('id', 'produk', 'time', 'nama', 'sumtgt', 
            'sumpsbln', 
            'sumach', 
            'sumtgtrev',
            'sumprogrev',
            'sumachrev'));
    }
}
