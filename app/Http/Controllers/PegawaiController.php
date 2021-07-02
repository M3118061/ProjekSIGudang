<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::orderBy('created_at','desc')->paginate(10);
        return view('pegawai.index', compact('pegawai'));
    }

    public function cari(Request $request){
        $search = $request->get('search');
        $pegawai = Pegawai::where('name','like',"%".$search."%")->paginate(3);
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'exp_reminder' => 'required'
        ]);

        //insert ke tabel user
        $user = new User;
        $user->role = 'pegawai';
        $user->name = $request->name;
        $user->jk = $request->jk;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->exp_reminder = $request->exp_reminder;
        $user->save();

        $request->request->add(['pegawai_id' => $user->id]);
        Pegawai::create($request->all());

        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        Pegawai::where('id', $pegawai->id)
                ->update([
                    'name' => $request->name,
                    'jk' => $request->jk,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    'role' => $request->role
                ]);

        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai')->with('success', 'Data Pegawai Berhasil Dihapus!');
    }

    public function status($id)
    {
        $pegawai = DB::table('pegawai')->where('id',$id)->first();
        // $pegawai = Pegawai::where('id','$id')->first();
        $status_sekarang = $pegawai->status;
        if ($status_sekarang == 1) {
            DB::table('pegawai')->where('id',$id)->update([
                'status'=>0
            ]);
        }else{
            DB::table('pegawai')->where('id',$id)->update([
                'status'=>1
            ]);
        }
        return redirect('/pegawai')->with('success', 'Status berhasil diubah!');
    }
}
