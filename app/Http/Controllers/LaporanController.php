<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Carbon\Carbon;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function minggu()
    {
        $datas = Buku::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $title = "Minggu";
        return view('laporan.index',compact('datas','title'));
    }

    public function bulan()
    {
        $title = "Bulan";
        $datas = Buku::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        return view('laporan.index',compact('datas','title'));
    }

    public function tahun()
    {
        $title = "Tahun";
        $datas = Buku::whereYear('created_at', date('Y'))->get();
        return view('laporan.index',compact('datas','title'));
    }

    public function export($type) 
    {
        return Excel::download(new BukuExport($type), 'LAPORAN_SURAT_MASUK.xlsx');
    }

    public function exportDoc($type)
    {
        if ($type==0) {
            $data = Buku::all();
        }
        if ($type==1) {
            $data   = Buku::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        }
        if ($type==2) {
            $data  = Buku::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        }
        if ($type==3) {
            $data   = Buku::whereYear('created_at', date('Y'))->get();
        }
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $header = array('size' => 16, 'bold' => true);
        $section->addTextBreak(1);

        $fancyTableStyleName = 'Fancy Table';
        $fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000','alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
        $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF','align'=>'center');
        $fancyTableCellStyle = array('valign' => 'center');
        $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $fancyTableFontStyle = array('bold' => true, 'align'=> 'center');
        $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
        $table = $section->addTable($fancyTableStyleName);
        $table->addRow(900);
        $table->addCell(500, $fancyTableCellStyle)->addText('NO', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('TANGGAL', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('DARI', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('NOMOR SURAT', $fancyTableFontStyle);
        $table->addCell(3000, $fancyTableCellStyle)->addText('PERIHAL', $fancyTableFontStyle);

        foreach ($data as $item ) {
            $table->addRow();
            $table->addCell(500)->addText($item->id);
            $table->addCell(2000)->addText(date('d/m/y', strtotime($item->created_at)));
            $table->addCell(2000)->addText($item->dari);
            $table->addCell(2000)->addText($item->nomor_surat);
            $table->addCell(3000)->addText($item->perihal);
        }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord);
        $objWriter->save('LAPORAN_SURAT_MASUK.docx');
        return response()->download(public_path('LAPORAN_SURAT_MASUK.docx'));
    }
    public function exportDocCustom($from, $to)
    {
        $data = Buku::whereBetween('created_at', [$from, $to])->get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $header = array('size' => 16, 'bold' => true);
        $section->addTextBreak(1);

        $fancyTableStyleName = 'Fancy Table';
        $fancyTableStyle = array('borderSize' => 6, 'borderColor' => '000000','alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
        $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF','align'=>'center');
        $fancyTableCellStyle = array('valign' => 'center');
        $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $fancyTableFontStyle = array('bold' => true, 'align'=> 'center');
        $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
        $table = $section->addTable($fancyTableStyleName);
        $table->addRow(900);
        $table->addCell(500, $fancyTableCellStyle)->addText('NO', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('TANGGAL', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('DARI', $fancyTableFontStyle);
        $table->addCell(2000, $fancyTableCellStyle)->addText('NOMOR SURAT', $fancyTableFontStyle);
        $table->addCell(3000, $fancyTableCellStyle)->addText('PERIHAL', $fancyTableFontStyle);

        foreach ($data as $item ) {
            $table->addRow();
            $table->addCell(500)->addText($item->id);
            $table->addCell(2000)->addText(date('d/m/y', strtotime($item->created_at)));
            $table->addCell(2000)->addText($item->dari);
            $table->addCell(2000)->addText($item->nomor_surat);
            $table->addCell(3000)->addText($item->perihal);
        }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord);
        $objWriter->save('LAPORAN_SURAT_MASUK.docx');
        return response()->download(public_path('LAPORAN_SURAT_MASUK.docx'));
    }
}
