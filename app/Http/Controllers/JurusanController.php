<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\JurusanEmp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jurusan::all();
        $users = User::all();
        return view('admin.jurusan', compact('data', 'users'));
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
    public function store(JurusanEmp $request)
    {
        $request->validated();
        // dd($request);
        $jurusan = new Jurusan;
        $jurusan->nama = $request->nama;
        $jurusan->user_id = $request->user_id; 
        $jurusan->save();

        flash()->success('Success', 'Jurusan berhasil ditambahkan!');
        return redirect()->route('jurusan.index');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:32',
            'user_id' => [
                'required',
                Rule::unique('jurusans', 'user_id')->ignore($id),
            ],
        ], [
        'nama.required' => 'Nama jurusan wajib diisi.',
        'user_id.required' => 'Nama BK wajib diisi.',
        'user_id.unique' => 'Nama BK sudah digunakan untuk jurusan lain.',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        if (!$jurusan) {
            flash()->error('Error', 'Jurusan tidak ditemukan !');
            return redirect()->route('jurusan.index');
        }

        $jurusan->nama = $request->nama;
        $jurusan->user_id = $request->user_id;
        $jurusan->save();

        flash()->success('Success', 'Jurusan berhasil diupdate!');
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        if ($jurusan) {
            $jurusan->delete();
            flash()->success('Success', 'Jurusan berhasil dihapus!');
        } else {
            flash()->error('Error', 'Jurusan tidak ditemukan.');
        }

        return redirect()->route('jurusan.index');
    }
}
