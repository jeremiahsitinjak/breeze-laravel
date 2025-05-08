<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function index(): View {
        $mahasiswa = Mahasiswa::all();
        return view('dashboard', compact('mahasiswa'));
    }

    public function store(Request $request) {
        $request->validate([
            'nim' => 'required|string|max:255|unique:mahasiswa',
            'nama' => 'required|string|max:255',
        ]);

        Mahasiswa::create($request->all());

        $notifications = [
            'message' => 'Data Mahasiswa Berhasil Ditambahkan',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard')->with($notifications);
        // ->with('success', 'Mahasiswa created successfully.');
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        $notifications = [
            'message' => 'Data Mahasiswa Berhasil Dihapus',
            'alert-type' => 'warning'
        ];

        return redirect()->route('dashboard')->with($notifications);
        // ->with('success', 'Mahasiswa deleted successfully.');
    }
}
