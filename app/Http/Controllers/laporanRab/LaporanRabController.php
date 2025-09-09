<?php

namespace App\Http\Controllers\laporanRab;

use App\Http\Controllers\Controller;
use App\Models\DataRab;
use Illuminate\Http\Request;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LaporanRabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['title'] = "Laporan RAB";
        if ($request->ajax()) {
            $dataRab = DataRab::query();
            if($request->start_date != null && $request->end_date != null) {
                $tgl_awal = DateTime::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
                $tgl_akhir = DateTime::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
                $dataRab->whereBetween('tanggal', [$tgl_awal, $tgl_akhir]);
            }
            return DataTables::of($dataRab->orderBy('tanggal', 'asc'))
                    ->addIndexColumn()
                    ->editColumn('tanggal', function ($row) {
                        return Carbon::parse($row->tanggal)->locale('id')->translatedFormat('d F Y');
                    })->make(true);
        }

        return view("laporanrab.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "start_date" => "required|date_format:d/m/Y",
            "end_date" => "required|date_format:d/m/Y"
        ]);

        if (ob_get_level() > 0) {
           ob_end_clean();
           }


        ini_set('memory_limit', '5G');
        ini_set('max_execution_time', '10000');

        $tgl_awal = Carbon::createFromFormat('d/m/Y', $request->start_date);
        $tgl_akhir = Carbon::createFromFormat('d/m/Y', $request->end_date);
        $tgl_awal->setLocale("id");
        $tgl_akhir->setLocale("id");

        $data['data'] = dataRab::query()->whereBetween('tanggal', [$tgl_awal->translatedFormat("Y-m-d"), $tgl_akhir->translatedFormat("Y-m-d")])->get();
        $data['title'] = "LAPORAN REALISASI RAB PEKERJAAN SIPIL & PERPIPAAN";
        $data['bulan'] = $tgl_awal->translatedFormat("d F Y") . ' - ' . $tgl_akhir->translatedFormat("d F Y");
        $data['staff'] = Auth::user()->name;
        $data['now'] = Carbon::now()->locale('id')->translatedFormat("d F Y");
        $pdf = Pdf::loadView('laporanrab.laporan-pdf', $data);
        $pdf->setOption([
            'isPhpEnabled' => true,
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'debugKeepTemp' => true,
            'defaultFont' => 'sans-serif'
        ]);
        $pdf->setPaper([0, 0, 609.4488, 935.433], 'landscape');
        // $output = $pdf->output();
        // $filename = md5(date('YmdHis') . microtime()) . ".pdf";
        // // lokasi file simpan
        // $lokasi_save = "D:/laragon/www";
        // file_put_contents($lokasi_save . "/" . $filename, $output);
        // return redirect()->back();
        return $pdf->stream('Laporan Rab ' . '- ' . $tgl_awal->translatedFormat("d F Y") . ' - '  . $tgl_akhir->translatedFormat("d F Y") . '.pdf', array("Attachment" => false));
    }


    public function testLaporan() {
        $carbon = Carbon::create();
        $carbon->setLocale("id");
        $tgl_awal = "2024-01-01";
        $tgl_akhir = "2025-01-01";
        $data['data'] = dataRab::whereBetween('tanggal', [$tgl_awal, $tgl_akhir])->get();
        $data['title'] = "LAPORAN REALISASI RAB PEKERJAAN SIPIL & PERPIPAAN";
        $data['bulan'] = $carbon->parse($tgl_awal)->translatedFormat("F Y") . ' - ' . $carbon->parse($tgl_akhir)->translatedFormat("F Y");
        $data['staff'] = Auth::user()->name;
        $data['now'] = $carbon->now()->translatedFormat("d F Y");
        return view('laporanrab.laporan-pdf', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
