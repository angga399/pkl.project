<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JournalsExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithMapping
{
    protected $journals;

    public function __construct($journals)
    {
        $this->journals = $journals;
    }

    public function collection()
    {
        return $this->journals;
    }

    public function map($journal): array
    {
        return [
            $journal->tanggal->format('d/m/Y'),
            $journal->user->name,
            $journal->uraian_konsentrasi,
            $journal->kelas,
            $journal->PT,
            $journal->status,
            $journal->created_at->format('d/m/Y H:i')
        ];
    }

    public function headings(): array
    {
        return [
            ['LAPORAN JURNAL PKL'], // Judul utama
            ['Periode: ' . now()->format('F Y')], // Sub-judul
            [], // Baris kosong
            [ // Header kolom
                'Tanggal',
                'Nama Siswa',
                'Uraian Kegiatan',
                'Jurusan',
                'Perusahaan',
                'Status',
                'Dibuat Pada'
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk judul utama
            1 => [
                'font' => ['bold' => true, 'size' => 16],
                'alignment' => ['horizontal' => 'center']
            ],
            
            // Style untuk sub-judul
            2 => [
                'font' => ['italic' => true],
                'alignment' => ['horizontal' => 'center']
            ],
            
            // Style header kolom
            4 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4472C4']],
                'alignment' => ['horizontal' => 'center']
            ],
            
            // Style untuk data
            'A5:G' . ($sheet->getHighestRow()) => [
                'borders' => [
                    'allBorders' => ['borderStyle' => 'thin', 'color' => ['rgb' => '000000']]
                ],
                'alignment' => ['vertical' => 'top']
            ],
            
            // Wrap text untuk kolom uraian
            'C5:C' . ($sheet->getHighestRow()) => [
                'alignment' => ['wrapText' => true]
            ]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 12, // Tanggal
            'B' => 25, // Nama
            'C' => 40, // Kegiatan
            'D' => 15, // Jurusan
            'E' => 25, // Perusahaan
            'F' => 12, // Status
            'G' => 18  // Dibuat Pada
        ];
    }
}