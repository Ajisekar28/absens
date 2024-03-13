<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Http\Requests\SiswaRec;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        $kelas = Kelas::all(); // Add this line
        return view('admin.siswa', compact('data', 'kelas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa_create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRec $request,)
    {
        $validatedData = $request->validated();

        $kelas = Kelas::findOrFail($request->class_id);

        $siswa = new Siswa;
        $siswa->nama = $request->name;
        $siswa->rfid = $request->rfid;
        $siswa->kelamin = $request->gender;
        $siswa->kelas_id = $request->class_id;
        $siswa->save();

        flash()->success('Success', 'Siswa berhasil ditambahkan!');
        return redirect()->route('siswa.index');
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
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::all(); // Add this line
        return view('admin.kelas_edit', compact('kelas', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaRec $request, Siswa $siswa, string $id)
    {
        $siswa = FindOrFail::siswa($id);

        $validatedData = $request->validated();

        $siswa->nama = $request->nama;
        $siswa->rfid = $request->rfid;
        $siswa->kelamin = $request->kelamin;
        $siswa->save();

        flash()->success('Success', 'Siswa berhasil ditambahkan!');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = FindOrFail::siswa($id);

        $siswa->delete();
        flash()->success('Success', 'Siswa berhasil dihapus!');
        return redirect()->route('siswa.index');
    }
}
