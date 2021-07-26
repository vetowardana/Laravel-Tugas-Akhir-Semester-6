<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Pasanglowongan;
use App\Pendaftar;
use App\Profilemahasiswa;
Use App\User;
Use \Carbon\Carbon;

class CarilowonganController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

        $tanggal = Carbon::now()->format('Y-m-d');
        $a = Pasanglowongan::where('lowongan_selesai', '>=', $tanggal);

    	$carilowongan = $a->where('status','Diterima')->paginate(6);

        $pendaftar = Pendaftar::where('user_id', $user_id)->get();
        $statusbelumditerima = $pendaftar->where('status', 'Belum Diterima')->count();
        $statusditerima = $pendaftar->where('status', 'Diterima')->count();

    	return view('layouts.cari_lowongan.index',compact('carilowongan','profilemahasiswa','statusbelumditerima','statusditerima','tanggal','a'));
    }

    public function show($id) {
    	$user_id = auth()->user()->id;
    	$profilemahasiswa = Profilemahasiswa::get()->where('user_id', $user_id)->all();

    	$carilowongan = Pasanglowongan::find($id);

        return view('layouts.cari_lowongan.detail', compact('carilowongan','profilemahasiswa'));
    }

    public function daftarLowongan(Request $request, $id) {
        $user_id = auth()->user()->id;
        $user = auth()->user();
        $daftarlowongan = Pasanglowongan::find($id);
        $profilemahasiswa = Profilemahasiswa::where('user_id', $user_id)->first();

        $this->validate($request, [
            'surat_permohonan' => 'required|mimes:pdf',
        ]);
        if ($request->hasFile('surat_permohonan')) {
            $file = $request->file('surat_permohonan');
            $filename = time() . Str::slug($user->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/aplikan', $filename);
            $pendaftar = Pendaftar::create([
                'user_id' => $user_id,
                'perusahaan_id' => $daftarlowongan->user_id,
                'lowongan_id' => $daftarlowongan->id,
                'image' => $user->image,
                'name' => $user->name,
                'email' => $user->email,
                'nama_universitas' => $profilemahasiswa->nama_universitas,
                'prodi' => $profilemahasiswa->prodi,
                'nim' => $profilemahasiswa->nim,
                'jenis_kelamin' => $profilemahasiswa->jenis_kelamin,
                'status_perkawinan' => $profilemahasiswa->status_perkawinan,
                'tanggal_lahir' => $profilemahasiswa->tanggal_lahir,
                'no_telp' => $profilemahasiswa->no_telp,
                'alamat' => $profilemahasiswa->alamat,
                'kota' => $profilemahasiswa->kota,
                'kode_pos' => $profilemahasiswa->kode_pos,
                'nama_perusahaan' => $daftarlowongan->nama_Perusahaan,
                'nama_lowongan' => $daftarlowongan->nama_lowongan,
                'logo' => $daftarlowongan->image,
                'surat_permohonan' => $filename,
                'slug' => $user->name,
                'status' => 'Belum Diterima',
            ]);
            return redirect(route('carilowongan.index'))->with(['success' => 'Pendaftaran berhasil, tunggu respon perusahaan yang bersangkutan !']);
        }
    }
}
