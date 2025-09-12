<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spam;
use Carbon\Carbon;
use Validator,Storage;

class spamController extends Controller
{
    public function index()
    {
        $data = spam::all();
        $title = "SPAM";
        return view('spam.view', compact('data', 'title'));
    }

    public function table() 
    {
        $model = \App\Models\spam::query();
        return \DataTables::of($model)
        ->addColumn('action', function($model) {
            return view('spam.action', [
                'model' => $model,
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
    
    protected function validasi(array $data)
    {
        $messages = [
            'required' => ':attribute wajib diisi Semua!!!',
        ];
        $validator = \Validator::make($data, [
            'tanggal' => 'required',
            'spam' => 'required',
            'lokasi' => 'required',
            'koordinat' => 'required',
            'kondisi_existing' => 'required',
            'permasalahan' => 'required',
            'tindak_lanjut' => 'required',
            'file_existing' => 'max:20048|mimes:pdf',
            'file_permasalahan' => 'max:20048|mimes:pdf',
            'file_tindak_lanjut' => 'max:20048|mimes:pdf',
            'file_spam' => 'max:20048|mimes:pdf',
        ], $messages);
        return $validator;
    }

    public function save(Request $request)
    {
        $validator=$this->validasi($request->all());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 200);
        } else {
             $data = $request->only([
                'tanggal',
                'lokasi',
                'koordinat',
                'spam',
                'kondisi_existing',
                'permasalahan',
                'tindak_lanjut',
            ]);
            foreach (['file_existing', 'file_permasalahan', 'file_tindak_lanjut', 'file_spam'] as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('/uploads', $fileName);
                    $data[$field] = $path;
                }
            }
            spam::updateOrCreate(['id' => $request->id], $data);
            return response()->json(['success' => $data,
                'message' => $request->id ? 'Data SPAM berhasil diupdate!' : 'Data SPAM berhasil disimpan!'], 200);
        }  
    }

    public function detail($id)
    {
        $data = spam::find($id);
        if($data) {
            $data->file_existing = $data->file_existing ? Storage::url($data->file_existing) : null;
            $data->file_permasalahan = $data->file_permasalahan ? Storage::url($data->file_permasalahan) : null;
            $data->file_tindak_lanjut = $data->file_tindak_lanjut ? Storage::url($data->file_tindak_lanjut) : null;
            $data->file_spam = $data->file_spam ? Storage::url($data->file_spam) : null; 
            return response()->json(['success' => $data], 200);
        } else {
            return response()->json(['success' => false], 404);
        }
    }

    public function delete($id)
    {
        $spam=spam::find($id);
        $spam->delete();
        return response()->json(['success'=>true]);
    }
}
