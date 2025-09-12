<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataRab;
use App\Models\dataUpdateGis;
use App\Models\dataJaringanBaru;
use App\Models\dataPenggantianPipa;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $jumlahPengguna = User::count();

        // RAB bulan ini
        $jumlahRabBulanIni = DataRab::whereMonth('tanggal_input', now()->month)
            ->whereYear('tanggal_input', now()->year)
            ->count();

        // GIS bulan ini
        $jumlahGisBulanIni = DataUpdateGis::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        // Data grafik RAB per bulan
        $rabPerBulan = DataRab::select(
                DB::raw('MONTH(tanggal_input) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('tanggal_input', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Data grafik GIS per bulan
        $updateGis = DataUpdateGis::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('tanggal', now()->year)
            ->groupBy('bulan')->orderBy('bulan')->get();

        $jaringanBaru = DataJaringanBaru::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('tanggal', now()->year)
            ->groupBy('bulan')->orderBy('bulan')->get();

        $penggantianPipa = DataPenggantianPipa::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('tanggal', now()->year)
            ->groupBy('bulan')->orderBy('bulan')->get();

        return view('admin.dashboard', compact(
            'title',
            'jumlahPengguna',
            'jumlahRabBulanIni',
            'jumlahGisBulanIni',
            'rabPerBulan',
            'updateGis',
            'jaringanBaru',
            'penggantianPipa'
        ));
    }
}