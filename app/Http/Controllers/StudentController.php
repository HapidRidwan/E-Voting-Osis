<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->get();

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
            'nis'=>'required|unique:students',
            'nama'=>'required',
            'kelas'=>'required',
            'username'=>'required|unique:students',
            'password'=>'required|min:6',
        ]);

        Student::create([
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('students.index')
                ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Student $student)
    {
        $student->nis = $request->nis;
        $student->nama = $request->nama;
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
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function exportPdf()
    {
        $students = Student::orderBy('kelas')
                            ->orderBy('nama')
                            ->get();

        $pdf = Pdf::loadView('pdf.students', compact('students'));

        return $pdf->download('akun-siswa.pdf');
    }

}

