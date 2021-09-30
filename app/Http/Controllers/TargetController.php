<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Produk;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         $target = Target::all();
         $produk = Produk::all();
        return view ('admin.KelolaTarget', compact('target', 'produk'));
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
        $target = new Target;
        $target->jml_target = $request->jml_target;
        $target->time = $request->time;
        $target->produk = $request->produk;
        $target->save();
        return redirect('/KelolaTarget')->with('success', 'Target berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $target = Target::all();
        // return view('admin.KelolaTarget', compact('target'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $target = Target::where('id', $id)->first();
        $produk = Produk::all();
        return view ('admin.EditTarget', compact('produk', 'target'));
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
        $target = Target::find($id);;
        $target->jml_target = $request->jml_target;
        $target->time = $request->time;
        $target->produk = $request->produk;
        $target->save();
        return redirect('/KelolaTarget')->with('success', 'Target berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Target::find($id);
         $target->delete();
        return redirect('/KelolaTarget')->with('success', 'Data target berhasil dihapus!');
    }
}
