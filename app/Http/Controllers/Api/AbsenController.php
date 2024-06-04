<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function presensi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rfid' => 'required',
            'nim' => 'required',
            'status' => 'required',
            'timestamp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 400);
        }

        return response()->json([
            'message' => 'Presensi berhasil',
            'data' => [
                'rfid' => $request->rfid,
                'nim' => $request->nim,
                'status' => $request->status,
                'timestamp' => $request->timestamp,
            ],
        ]);
    }
}
