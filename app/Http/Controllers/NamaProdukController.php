<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nama;
use Illuminate\Support\Facades\Validator;

class NamaProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama = Nama::all();
        return view ('staff.KelolaNamaProduk', compact('nama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'nama' => 'required',
        ]);

        if ($validator->fails()) {
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $nama = new Nama;
        $nama->nama = $request->nama;
        $nama->save();

        return redirect('NamaProduk')->with('success', 'Nama Produk Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama = Nama::where('id', $id)->first();
        return view('staff.EditNamaProduk', compact('nama'));
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
        $validator = Validator::make($request->all(), [
        'nama' => 'required',
        ]);

        if ($validator->fails()) {
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
        
        $nama = Nama::find($id);
        $nama->nama = $request->nama;
        $nama->save();

        return redirect('NamaProduk')->with('success', 'Nama Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $nama = Nama::find($id);
         $nama->delete();

         return redirect('NamaProduk')->with('success', 'Nama Produk Berhasil Dihapus');
    }
}
