<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\WeeklyApproval;
use App\Models\User;

class ApprovalController extends Controller
{
    public function generateQr($userId, $type)
    {
        $startOfWeek = now()->startOfWeek(); // Senin
        $endOfWeek = now()->endOfWeek();     // Minggu

        $data = [
            'user_id' => $userId,
            'start' => $startOfWeek->toDateString(),
            'end' => $endOfWeek->toDateString(),
            'type' => $type
        ];

        $json = json_encode($data);
        $url = route('qr.approve', ['data' => urlencode($json)]);

        return view('qr', ['qrCode' => QrCode::size(300)->generate($url)]);
    }

    public function approveFromQR(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        if (!$data) {
            return back()->with('error', 'QR tidak valid.');
        }

        $approval = WeeklyApproval::firstOrCreate([
            'user_id' => $data['user_id'],
            'start_date' => $data['start'],
            'end_date' => $data['end'],
            'type' => $data['type'],
        ]);

        if ($approval->approved) {
            return back()->with('info', 'Sudah disetujui minggu ini.');
        }

        $approval->approved = true;
        $approval->save();

        return back()->with('success', 'Berhasil disetujui melalui QR!');
    }
}
