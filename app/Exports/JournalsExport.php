<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JournalsExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    protected $journals;
    protected $week;

    public function __construct($journals, $week)
    {
        $this->journals = $journals;
        $this->week = $week;
    }

    public function collection()
    {
        return $this->journals->map(function ($journal, $index) {
            return [
                'No' => $index + 1,
                'Nama' => $journal->nama,
                'Tanggal' => $journal->tanggal,
                'Uraian Kegiatan' => $journal->uraian_konsentrasi,
                'Jurusan' => $journal->kelas,
                'Perusahaan' => $journal->PT,
                'Status' => $journal->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            ['JURNAL KEGIATAN - MINGGU ' . $this->week],
            [],
            ['No', 'Nama', 'Tanggal', 'Uraian Kegiatan', 'Jurusan', 'Perusahaan', 'Status']
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:G1');
        
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 16,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle('A3:G3')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4f46e5'],
            ],
            'font' => [
                'color' => ['rgb' => 'FFFFFF'],
            ],
        ]);

        $sheet->getStyle('A4:G'.($this->journals->count() + 3))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 15,
            'D' => 50,
            'E' => 20,
            'F' => 25,
            'G' => 15,
        ];
    }
}