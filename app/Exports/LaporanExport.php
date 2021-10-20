<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $id;
    protected $time;
    protected $request;
    protected $laporan_query;
    protected $nama;
    protected $sumtgtmtd;
    protected $sumrealmtd;
    protected $sumach;
    protected $sumtgtrev;
    protected $sumprogrev;
    protected $sumachrev;    

    public function __construct($id, $time, $request, $laporan_query, $nama, $sumtgtmtd, $sumrealmtd, $sumach, $sumtgtrev, $sumprogrev, $sumachrev)
    {
        $this->id = $id;
        $this->request = $request;
        $this->time = $time;
        $this->laporan_query = $laporan_query;
        $this->nama = $nama;
        $this->sumtgtmtd = $sumtgtmtd; 
        $this->sumrealmtd = $sumrealmtd; 
        $this->sumach = $sumach; 
        $this->sumtgtrev = $sumtgtrev; 
        $this->sumprogrev = $sumprogrev; 
        $this->sumachrev = $sumachrev;
    }

    public function view(): View
    {
         $id = $this->id;
        $laporan_query = $this->laporan_query;
        $time = $this->time;
        $nama = $this->nama;
        $sumtgtmtd = $this->sumtgtmtd;
        $sumrealmtd = $this->sumrealmtd;
        $sumach = $this->sumach;
        $sumtgtrev = $this->sumtgtrev;
        $sumprogrev = $this->sumprogrev;
        $sumachrev = $this->sumachrev;
        return view('manager.LaporanReport', compact('id', 'laporan_query', 'time', 'nama', 'sumtgtmtd', 
            'sumrealmtd', 
            'sumach', 
            'sumtgtrev',
            'sumprogrev',
            'sumachrev',
            ));
    }
}
