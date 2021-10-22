<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.KelolaAkun', compact('users'));
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
        'name' => 'required',
        'address' => 'required',
        'telp' => 'required',
        'email' => 'required|email| unique:users',
        'role' => 'required',
        'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        // User::create($request->all());
        $users = new User;
        $users->name = $request->name;
        $users->address = $request->address;
        $users->telp = $request->telp;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect('/KelolaAkun')->with('success', 'Akun berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $users = User::all();
        return view('admin.KelolaAkun', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        return view ('admin/EditAkun', compact('users'));
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
        'name' => 'required',
        'address' => 'required',
        'telp' => 'required',
        'email' => 'required|email',
        'role' => 'required',
        'password' => 'confirmed'
        ]);

        if ($validator->fails()) {
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        if ($request->password != null) {
            $users = User::find($id);
            $users->name = $request->name;
            $users->address = $request->address;
            $users->telp = $request->telp;
            $users->email = $request->email;
            $users->role = $request->role;
            $users->password = $request->password;
            $users->save();
        }else{
            $users = User::find($id);
            $users->name = $request->name;
            $users->address = $request->address;
            $users->telp = $request->telp;
            $users->email = $request->email;
            $users->role = $request->role;
            $users->save();
        }

        

        return redirect('/KelolaAkun')->with('success', 'Akun berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $users = User::find($id);
         $users->delete();
        return redirect('/KelolaAkun')->with('success', 'Data akun berhasil dihapus!');
    }
}
