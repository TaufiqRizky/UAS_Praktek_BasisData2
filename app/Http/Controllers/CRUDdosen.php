<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUDdosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['dosen'] = DB::table('dosen')->select('*')->get();
        return view('admin/dosen/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin/dosen/crete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        DB::table('dosen')->insert([
            'nip' => $req->nip, 
            'nama' => $req->nama, 
            'alamat' => $req->alamat, 
            'tlp' => $req->tlp, 
            'jk' => $req->jk, 
            'tgl_lahir' => $req->tgl
            
        ]);
         return redirect('admin/dosen');
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
        //
        $data['dosen'] = DB::table('dosen')->select('*')->where('nip','=',$id)->first();
        return view('admin/dosen/edit',$data);

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
        //
        $up = \App\dosen::where('nip', $id)
        ->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl
        ]);
        
        
        return redirect('admin/dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = DB::table('dosen')->where('nip', '=', $id)->delete(); 
        return redirect('admin/dosen');
    }
}
