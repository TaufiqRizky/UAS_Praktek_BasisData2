<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/dashboard');
    }

    public function fakultas()
    {
        //
        $data['fak']=DB::table('fakultas')->select('*')->get();
        return view('admin/fakultas/index',$data);
    }

    public function Cfakultas( Request $req)
    {
        //
        DB::table('fakultas')->insert([
            'fakultas' => $req->fakultas 
            
        ]);
        return redirect('admin/fakultas');
    }
    public function Dfakultas($id){
        $data = DB::table('fakultas')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Ufakultas(Request $req){
        $up = \App\fakultas::find($req->id);
        $up->fakultas = $req->efakultas;
        $up->save();

        return redirect('admin/fakultas');
   }

   public function matkul()
    {
        //
        $data['fak']=DB::table('matkul')->select('*')->get();
        return view('admin/matkul/index',$data);
    }

    public function Cmatkul( Request $req)
    {
        //
        DB::table('matkul')->insert([
            'matkul' => $req->matkul, 
            'sks' => $req->sks 
            
        ]);
        return redirect('admin/matkul');
    }
    public function Dmatkul($id){
        $data = DB::table('matkul')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Umatkul(Request $req){
        $up = \App\matkul::find($req->id);
        $up->matkul = $req->ematkul;
        $up->sks = $req->esks;
        $up->save();

        return redirect('admin/matkul');
   }

   public function kelas()
    {
        //
        $data['fak']=DB::table('kelas')->join('dosen', 'kelas.waldos', '=', 'dosen.nip')->select('kelas.*','dosen.nama')->get();
        $data['dosen']=DB::table('dosen')->select('*')->get();
        return view('admin/kelas/index',$data);
    }

    public function Ckelas( Request $req)
    {
        //
        DB::table('kelas')->insert([
            'kelas' => $req->kelas, 
            'waldos' => $req->waldos 
            
        ]);
        return redirect('admin/kelas');
    }
    public function Dkelas($id){
        $data = DB::table('kelas')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Ukelas(Request $req){
        $up = \App\kelas::find($req->id);
        $up->kelas = $req->ekelas;
        $up->waldos = $req->ewaldos;
        $up->save();

        return redirect('admin/kelas');
   }

   public function ruangan()
    {
        //
        $data['fak']=DB::table('ruangan')->select('*')->get();
        return view('admin/ruangan/index',$data);
    }

    public function Cruangan( Request $req)
    {
        //
        DB::table('ruangan')->insert([
            'no_ruangan' => $req->ruangan, 
            'gedung' => $req->gedung 
            
        ]);
        return redirect('admin/ruangan');
    }
    public function Druangan($id){
        $data = DB::table('ruangan')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Uruangan(Request $req){
        $up = \App\ruangan::find($req->id);
        $up->no_ruangan = $req->eruangan;
        $up->gedung = $req->egedung;
        $up->save();

        return redirect('admin/ruangan');
   }

    public function jurusan()
    {
        //
        $data['fak']=DB::table('fakultas')->select('*')->get();
        $data['jur']=DB::table('jurusan')->join('fakultas', 'jurusan.id_fakultas', '=', 'fakultas.id')->select('jurusan.*','fakultas.fakultas')->get();
        return view('admin/jurusan/index',$data);
    }

    public function Cjurusan( Request $req)
    {
        //
        DB::table('jurusan')->insert([
            'id_fakultas' => $req->fakultas,
            'jurusan'=>$req->jurusan 
            
        ]);
        return redirect('admin/jurusan');
    }

    public function Djurusan($id){
        $data = DB::table('jurusan')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Ujurusan(Request $req){
        $up = \App\jurusan::find($req->id);
        $up->jurusan = $req->ejurusan;
        $up->id_fakultas = $req->efakultas;
        $up->save();

        return redirect('admin/jurusan');
   }


   public function jadwal()
    {
        //
        $data['dosen']=DB::table('dosen')->select('*')->get();
        $data['matkul']=DB::table('matkul')->select('*')->get();
        $data['ruangan']=DB::table('ruangan')->select('*')->get();
        $data['fak']=DB::table('jadwal')
        ->join('matkul', 'jadwal.id_matkul', '=', 'matkul.id')
        ->join('ruangan', 'jadwal.id_ruangan', '=', 'ruangan.id')
        ->join('dosen', 'jadwal.nip', '=', 'dosen.nip')
        ->select('jadwal.*','matkul.matkul','matkul.sks','dosen.nama','ruangan.no_ruangan','ruangan.gedung')->get();
        return view('admin/jadwal/index',$data);
    }

    public function Cjadwal( Request $req)
    {
        //
        DB::table('jadwal')->insert([
            'id_matkul' => $req->matkul, 
            'id_ruangan' => $req->ruangan, 
            'nip' => $req->dosen, 
            'jam_mulai' => $req->jam, 
            'hari' => $req->hari 
            
        ]);
        return redirect('admin/jadwal');
    }
    public function Djadwal($id){
        $data = DB::table('jadwal')->where('id', '=', $id)->delete(); 
        if ($data) {
            
            return true;
        }else{
            return false;
        }
   }

   public function Ujadwal(Request $req){
        $up = \App\jadwal::find($req->id);
        $up->id_matkul = $req->ematkul;
        $up->id_ruangan = $req->eruangan;
        $up->nip = $req->edosen;
        $up->jam_mulai = $req->ejam;
        $up->hari = $req->ehari;
        $up->save();

        return redirect('admin/jadwal');
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
        //
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
    }
}
