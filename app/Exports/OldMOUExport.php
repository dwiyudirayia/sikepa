<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;


class OldMOUExport implements FromView, WithEvents, WithTitle
{
    use Exportable;

    public function title(): string
    {
        return 'Format Import MOU Lama';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $cellHeader = "A1:I1";

                $headerStyle = [
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => '47a3da'
                        ]
                    ],
                ];

                $event->sheet->getColumnDimension('A')->setWidth(10);
                $event->sheet->getColumnDimension('B')->setWidth(15);
                $event->sheet->getColumnDimension('C')->setWidth(10);
                $event->sheet->getColumnDimension('D')->setWidth(15);
                $event->sheet->getColumnDimension('E')->setWidth(15);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(20);
                $event->sheet->getColumnDimension('H')->setWidth(10);
                $event->sheet->getColumnDimension('I')->setWidth(15);

                $event->sheet
                    ->getComment('B1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('B1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('B1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('B1')
                    ->getText()->createTextRun('Pastikan Judul MOU Terisi & Sesuai.');

                $event->sheet
                    ->getComment('C1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('C1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('C1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('C1')
                    ->getText()->createTextRun('Ketik Simbol "-" Jika Nomor Lebih dari Satu.');

                $event->sheet
                    ->getComment('D1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('D1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('D1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('D1')
                    ->getText()->createTextRun('Ketik Simbol "-" Jika Para Pihak Lebih dari Satu.');

                $event->sheet
                    ->getComment('E1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('E1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('E1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('E1')
                    ->getText()->createTextRun('Ketik Tanggal Menggunakan Angka. Contoh: 2019-12-28. Lalu Hiraukan Setelahnya. Sistem akan generate otomatis');

                $event->sheet
                    ->getComment('G1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('G1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('G1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('G1')
                    ->getText()->createTextRun('Ketik Tanggal Menggunakan Angka. Contoh: 2019-12-28. Lalu Hiraukan Setelahnya. Sistem akan generate otomatis.');

                $event->sheet
                    ->getComment('H1')
                    ->setHeight("100px")
                    ->setWidth("200px");
                $commentRichText = $event->sheet
                    ->getComment('H1')
                    ->getText()->createTextRun('Informasi:');
                $commentRichText->getFont()->setBold(true);
                $event->sheet
                    ->getComment('H1')
                    ->getText()->createTextRun("\r\n");
                $event->sheet
                    ->getComment('H1')
                    ->getText()->createTextRun('Ketik 1 Bila Status Masih Aktif, Ketik 2 Bila Status Sudah Berakhir, Ketik 3 Bila Diperpanjang');
                $event->sheet->freezePaneByColumnAndRow(10,2);
                $event->sheet->getStyle("$cellHeader")->applyFromArray($headerStyle)->getAlignment()->setWrapText(true);
            },
        ];
    }

    public function view(): View
    {
        return view('export.old-mou');
    }
}
