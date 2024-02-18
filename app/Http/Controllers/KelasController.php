<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Http\Requests\KelasEmp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('admin.kelas', compact('data'));
    }

    public function store(KelasEmp $request)
    {
        $request->validated();

        $kelas = new Kelas;
        $kelas->nama = $request->nama;
        $kelas->user_id = Auth::id(); // Set user_id sesuai dengan user yang sedang login
        $kelas->save();

        flash()->success('Success', 'Kelas berhasil ditambahkan!');
        return redirect()->route('kelas.index');
    }

    public function update(KelasEmp $request, Kelas $kelas, string $id)
    {
        $request->validated();

        $kelas = Kelas::find($id);
        if (!$kelas) {
            flash()->error('Error', 'Kelas tidak ditemukan !');
            return redirect()->route('kelas.index');
        }

        $kelas->nama = $request->nama;
        $kelas->user_id = Auth::id();
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
