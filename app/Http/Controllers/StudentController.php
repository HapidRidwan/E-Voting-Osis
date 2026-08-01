<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('role', 'siswa')
        ->latest()
        ->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
    $request->validate([
        'nis' => 'required|unique:users',
        'nama' => 'required',
        'kelas' => 'required',
        'username' => 'required|unique:users',
    ]);

    User::create([
        'nis' => $request->nis,
        'name' => $request->nama,
        'kelas' => $request->kelas,
        'username' => $request->username,
        'role' => 'siswa',
        'password' => Hash::make($request->nis),
    ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $student)
    {
        $student->nis = $request->nis;
        $student->name = $request->nama;
        $student->kelas = $request->kelas;
        $student->username = $request->username;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function exportPdf()
    {
        $students = User::where('role', 'siswa')
            ->orderBy('kelas')
            ->orderBy('name')
            ->get();

        $pdf = Pdf::loadView('pdf.students', compact('students'));

        return $pdf->stream('akun-siswa.pdf');
    }

}

