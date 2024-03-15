<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRec;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    //////
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        $kelas = Kelas::all();
        return view('admin.siswa', compact('data', 'kelas'));
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
    public function store(SiswaRec $request)
    {
        // dd($request);
        $request->validated();

        // $kelas = Kelas::findOrFail($request->class_id);

        $siswa = new Siswa;
        $siswa->nama = $request->name;
        $siswa->rfid = $request->rfid;
        $siswa->kelamin = $request->kelamin;
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:32',
            'rfid' => [
                'required',
                Rule::unique('siswas', 'rfid')->ignore($id),
            ],
            'class_id' => 'required',
            'kelamin' => 'required|string',
        ], [
            'nama.required' => 'Nama siswa wajib diisi.',
            'rfid.required' => 'RFID wajib diisi.',
            'rfid.unique' => 'RFID sudah digunakan untuk siswa lain.',
            'kelas_id.required' => 'Nama kelas wajib diisi.',
            'kelamin.required' => 'Jenis kelamin wajib diisi.',

        ]);

        $siswa = Siswa::FindOrFail($id);
        if (!$siswa) {
            flash()->error('Error', 'Siswa tidak ditemukan !');
            return redirect()->route('siswa.index');
        }

        $siswa->nama = $request->name;
        $siswa->rfid = $request->rfid;
        $siswa->kelas_id = $request->class_id;
        $siswa->kelamin = $request->kelamin;
        $siswa->save();

        flash()->success('Success', 'Siswa berhasil diupdate!');
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
        $siswa = Siswa::FindOrFail($id);

        $siswa->delete();
        flash()->success('Success', 'Siswa berhasil dihapus!');
        return redirect()->route('siswa.index');
    }
}
