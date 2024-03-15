<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Requests\KelasEmp;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        $users = User::all();
        $jurusans = Jurusan::all(); // Add this line
        return view('admin.kelas', compact('data', 'users', 'jurusans'));
    }

    public function store(KelasEmp $request)
    {
        $request->validated();

        $kelas = new Kelas;
        $kelas->nama = $request->nama;
        $kelas->jurusan_id = $request->jurusan_id; // Add this line
        $kelas->user_id = $request->user_id; 
        $kelas->save();

        flash()->success('Success', 'Kelas berhasil ditambahkan!');
        return redirect()->route('kelas.index');
    }

    public function update(Request $request, Kelas $kelas, string $id)
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


        $kelas = Kelas::findOrFail($id);
        $kelas->nama = $request->nama;
        $kelas->jurusan_id = $request->jurusan_id; // add this line
        $kelas->user_id = $request->user_id;
        $kelas->save();

        flash()->success('Success', 'Kelas berhasil diupdate!');
        return redirect()->route('kelas.index');
    }

    public function destroy(Kelas $kelas, string $id)
    {
        $kelas = Kelas::find($id);
        if ($kelas) {
            $kelas->delete();
            flash()->success('Success', 'Kelas berhasil dihapus !');
        } else {
            flash()->error('Error', 'Kelas tidak ditemukan.');
        }

        return redirect()->route('kelas.index');
    }
}
