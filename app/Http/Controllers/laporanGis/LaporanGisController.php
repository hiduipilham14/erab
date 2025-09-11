<?php

namespace App\Http\Controllers\laporanGis;

use App\Http\Controllers\Controller;
use App\Models\dataJaringanBaru;
use App\Models\Laporangis;
use App\Models\dataPenggantianPipa;
use App\Models\dataUpdateGis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LaporanGisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataUpdateGis = dataUpdateGis::query();
            // dd($data);
            return DataTables::eloquent($dataUpdateGis)->addIndexColumn()->make(true);
        }
        $data['title'] = "Laporan GIS";
        return view("laporangis.index", $data);
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
            "bulan" => [
                "required",
                "date_format:m/Y",
                fn ($attribute, $value, $fail) =>
                Carbon::createFromFormat('m/Y', $value)->startOfMonth()
                ->greaterThan(Carbon::now()->startOfMonth())
                ? $fail('The ' . $attribute . ' must be the current month or a past month.')
                : null
            ],
            "tgl_print" => "required|date_format:d/m/Y",
            "kategori" => "required|string|in:data-gis,data-pipa,data-jaringan"
        ]);
        // dd($request->all());

        // ob_end_clean();

        ini_set('memory_limit', '5G');
        ini_set('max_execution_time', '10000');



        $carbonBulan = Carbon::createFromFormat('m/Y', $request->bulan);
        $carbonBulan->setLocale("id");
        $bulanLaporan = $carbonBulan->format("Y-m");
        $getAttributes = $this->getLaporanAttributes($request->kategori, $bulanLaporan);
        $laporanGrouped = array_key_exists("data", $getAttributes) ? $getAttributes["data"] : [];
        $data["kategori"] = $request->kategori;
        $data["laporan_bulan"] = $carbonBulan->translatedFormat("F-Y");
        $data["now"] = Carbon::createFromFormat('d/m/Y', $request->tgl_print)->locale("id")->translatedFormat("d F Y");
        $data["get_laporan"] = $laporanGrouped;
        $data["staff"] = Auth::user()->name;
        $data["title"] = $getAttributes["title"] ." ". $data["laporan_bulan"];
        // dd($data);
        $pdf = Pdf::loadView($getAttributes["view"], $data);
        $pdf->setOption([
            'isPhpEnabled' => true,
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
            'debugKeepTemp' => true,
            'defaultFont' => 'sans-serif'
        ]);
        $pdf->setPaper([0, 0, 609.4488, 935.433], 'landscape');

        return $pdf->stream($data["title"] . ".pdf", array("Attachment" => false));
    }
    /**
     * @param $kategori kategori laporan yg ingin diambil
     * @param $bulanLaporan bulan yang ingin diambil laporannya
     * @return array array of attributes ["data" => 'data laporan', "view" => 'template view pdf', "title" => 'Judul pdf'];
     */
    public function getLaporanAttributes(String $kategori, String $bulanLaporan): array {
        $startDate = date('Y-m-01', strtotime($bulanLaporan . '-01'));
        $endDate = date('Y-m-t', strtotime($bulanLaporan . '-01'));
        $laporanGrouped = [];

        switch($kategori) {
            case "data-jaringan" :
                $laporanRaw = dataJaringanBaru::with(['data_divisi', 'data_pipas', 'data_diameters'])->whereBetween("tanggal", [$startDate, $endDate])->get()->groupBy('data_divisi.nama');
                foreach($laporanRaw as $divisi => $laporan) {
                    $daftarLokasi = $laporan->pluck("lokasi")->unique()->toArray();

                    foreach($daftarLokasi as $lokasi) {
                        $laporanGrouped["data"][$divisi][$lokasi] = $laporan->where('lokasi', $lokasi);
                    }
                }
                $laporanGrouped["view"] = "laporangis.laporan-update-jaringan";
                $laporanGrouped["title"] = "Laporan Update Data Pengembangan Jaringan Baru";
                break;
            case "data-pipa" :
                $laporanRaw = dataPenggantianPipa::with('data_divisi')->whereBetween("tanggal", [$startDate, $endDate])->get()->groupBy('data_divisi.nama');
                foreach($laporanRaw as $divisi => $laporan) {
                    $daftarLokasi = $laporan->pluck("lokasi")->unique()->toArray();

                    foreach($daftarLokasi as $lokasi) {
                        $laporanGrouped["data"][$divisi][$lokasi] = $laporan->where('lokasi', $lokasi);
                    }
                }
                $laporanGrouped["view"] = "laporangis.laporan-update-pipa";
                $laporanGrouped["title"] = "Laporan Update Data Penggantian Pipa";
                break;
            default:
                $laporanRaw = dataUpdateGis::with('divisi')->whereBetween("tanggal", [$startDate, $endDate])->get()->groupBy('divisi.nama');
                foreach($laporanRaw as $divisi => $laporan) {
                    $daftarLokasi = $laporan->pluck("lokasi")->unique()->toArray();

                    foreach($daftarLokasi as $lokasi) {
                        $laporanGrouped["data"][$divisi][$lokasi] = $laporan->where('lokasi', $lokasi);
                    }
                }
                $laporanGrouped["view"] = "laporangis.laporan-update-gis";
                $laporanGrouped["title"] = "Laporan Update Data Gis";
                break;
        }
        return $laporanGrouped;
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
