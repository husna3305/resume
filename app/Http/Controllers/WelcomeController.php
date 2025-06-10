<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Pengabdian;
use App\Models\PengalamanKerja;
use App\Models\Portfolio;
use App\Models\Publikasi;
use App\Models\SertifikatKompetensi;
use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $list_pendidikan = Pendidikan::orderBy('urutan', 'desc')->get();
        $list_pengalaman_kerja = PengalamanKerja::orderBy('urutan', 'desc')->get();
        $list_sertifikasi = SertifikatKompetensi::orderBy('urutan', 'desc')->get();
        $list_portfolio = Portfolio::orderBy('nama', 'asc')->get();
        $list_publikasi = Publikasi::orderBy('tahun', 'desc')->get();
        $list_pengabdian = Pengabdian::orderBy('tahun', 'desc')->get();
        $setting = setting();
        return view('welcome', compact('list_pendidikan', 'list_pengalaman_kerja', 'list_sertifikasi', 'list_portfolio', 'list_publikasi', 'list_pengabdian', 'setting'));
    }

    public function cv()
    {
        $list_pendidikan = Pendidikan::orderBy('urutan', 'desc')->get();
        $list_pengalaman_kerja = PengalamanKerja::orderBy('urutan', 'desc')->get();
        $list_sertifikasi = SertifikatKompetensi::orderBy('urutan', 'desc')->get();
        $list_portfolio = Portfolio::orderBy('nama', 'asc')->get();
        $list_publikasi = Publikasi::orderBy('tahun', 'desc')->get();
        $list_pengabdian = Pengabdian::orderBy('tahun', 'desc')->get();
        $setting = setting();
        return view('cv', compact('list_pendidikan', 'list_pengalaman_kerja', 'list_sertifikasi', 'list_portfolio', 'list_publikasi', 'list_pengabdian', 'setting'));
    }
}
