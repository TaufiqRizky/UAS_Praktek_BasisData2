<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CRUDmhs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mahasiswa'] = DB::table('mahasiswa')
        ->join('kelas', 'kelas.id', '=', 'mahasiswa.id_kelas')
        ->join('dosen', 'kelas.waldos', '=', 'dosen.nip')
        ->join('jurusan', 'jurusan.id', '=', 'mahasiswa.id_jurusan')
        ->join('fakultas', 'jurusan.id_fakultas', '=', 'fakultas.id')
        ->select('mahasiswa.*','jurusan.jurusan','fakultas.fakultas','kelas.kelas','dosen.nama as namaD')->get();
        return view('admin/mhs/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['kelas'] = DB::table('kelas')->select('*')->get();
        $data['jurusan'] = DB::table('jurusan')->join('fakultas', 'jurusan.id_fakultas', '=', 'fakultas.id')->select('jurusan.*','fakultas.fakultas')->get();
        return view('admin/mhs/crete',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $user= new \App\User;
          $user->name = $req->nama;
          $user->email = 'mhs@gmail.com';
          $user->password = Hash::make($req->nim);
          $user->role = 'mahasiswa';
          $user->save();
        //
        DB::table('mahasiswa')->insert([
            'nim' => $req->nim, 
            'nama' => $req->nama, 
            'alamat' => $req->alamat, 
            'tlp' => $req->tlp, 
            'jk' => $req->jk, 
            'tgl_lahir' => $req->tgl,
            'id_kelas' => $req->kelas,
            'id_jurusan' => $req->jurusan,
            'id_user' => $user->id
            
        ]);
         return redirect('admin/mahasiswa');
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
        $data['kelas'] = DB::table('kelas')->select('*')->get();
        $data['jurusan'] = DB::table('jurusan')->join('fakultas', 'jurusan.id_fakultas', '=', 'fakultas.id')->select('jurusan.*','fakultas.fakultas')->get();
        $data['mahasiswa'] = DB::table('mahasiswa')->select('*')->where('nim','=',$id)->first();
        return view('admin/mhs/edit',$data);

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
        $up = \App\mahasiswa::where('nim', $id)
        ->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl,
            'id_kelas' => $request->kelas,
            'id_jurusan' => $request->jurusan
        ]);
        
        
        return redirect('admin/mahasiswa');
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
        $data = DB::table('mahasiswa')->where('nim', '=', $id)->delete(); 
        return redirect('admin/mahasiswa');
    }
}
