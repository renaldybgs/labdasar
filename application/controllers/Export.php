<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('ExportModel');
    }

    public function export_pdf() {
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(275,9,'LAB Komputer IT PLN',0,1,'C');
        $pdf->SetFont('Arial','B',12);    
        $pdf->Cell(275,9,'Lab Dasar',0,1,'C');
        $pdf->SetFont('Arial','B',12);    
        $pdf->Cell(275,9,'Data Inventory',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(40,8,'KODE BARANG',1,0,'C');
        $pdf->Cell(50,8,'NAMA BARANG',1,0,'C');
        $pdf->Cell(50,8,'MERK BARANG',1,0,'C');
        $pdf->Cell(35,8,'JUMLAH BARANG',1,0,'C');
        $pdf->Cell(35,8,'STATUS',1,0,'C');
        $pdf->Cell(65,8,'KETERANGAN',1,1,'C');

        $pdf->SetFont('Arial','',11);
        
        $inventory = $this->ExportModel->get_all_inventory();
        foreach ($inventory as $row){
            $pdf->Cell(40,6,$row->kode_barang,1,0);
            $pdf->Cell(50,6,$row->nama_barang,1,0);
            $pdf->Cell(50,6,$row->merk_barang,1,0);
            $pdf->Cell(35,6,$row->jumlah_barang,1,0); 
            $pdf->Cell(35,6,$row->status,1,0,'C'); 
            $pdf->Cell(65,6,$row->keterangan,1,1); 
        }

        $inventaris = $this->ExportModel->get_all_inventaris();
        foreach ($inventaris as $row){
            $pdf->Cell(40,6,$row->kode_barang,1,0);
            $pdf->Cell(50,6,$row->nama_barang,1,0);
            $pdf->Cell(50,6,$row->merk_barang,1,0);
            $pdf->Cell(35,6,$row->jumlah_barang,1,0); 
            $pdf->Cell(35,6,$row->status,1,0,'C'); 
            $pdf->Cell(65,6,$row->keterangan,1,1); 
        }

        $pdf->Output();
    }

    public function export_excel () {
        $spreadsheet = new Spreadsheet;

         $styleArray = array(
            'font'  => array(
                'name'  => 'Arial'
            )
        );      

        $spreadsheet->getDefaultStyle()->applyFromArray($styleArray);

        foreach(range('A', 'M') as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->getColumnDimension($value)
                        ->setAutoSize(true);
        }

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getAlignment()
                    ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getFont()
                    ->setSize(16);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getFont()
                    ->setBold(true);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:H5")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:H5")
                    ->getFont()
                    ->setSize(14);
        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:H5")
                    ->getFont()
                    ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:H5")
                    ->getAlignment()
                    ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->setActiveSheetIndex(0)
                    ->mergeCells('A1:H1')
                    ->mergeCells('A2:H2')
                    ->mergeCells('A3:H3')
                    ->setCellValue('A1', 'LAB KOMPUTER IT PLN JAKARTA')
                    ->setCellValue('A2', 'Inventory Lab Dasar')
                    ->setCellValue('A3', 'Data Inventory');

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A5', 'No')
                    ->setCellValue('B5', 'Kode Barang')
                    ->setCellValue('C5', 'Nama Barang')
                    ->setCellValue('D5', 'Merk Barang')
                    ->setCellValue('E5', 'Jumlah Barang')
                    ->setCellValue('F5', 'Status')
                    ->setCellValue('G5', 'Keterangan')
                    ->setCellValue('H5', 'Tanggal Masuk');
    
        $column = 6;
        $no = 1;

        $inventory = $this->ExportModel->get_all_inventory();

        foreach ($inventory as $row) {

            $spreadsheet->setActiveSheetIndex(0)
                        ->getRowDimension($column)
                        ->setRowHeight(20);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":H".$column)
                        ->getAlignment()
                        ->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("B".$column.":C".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("D".$column.":E".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);           
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("F".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("H".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."H".$column)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."H".$column)
                        ->getFont()
                        ->setSize(12);

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $no)
                        ->setCellValue('B' . $column, $row->kode_barang)
                        ->setCellValue('C' . $column, $row->nama_barang)
                        ->setCellValue('D' . $column, $row->merk_barang)
                        ->setCellValue('E' . $column, $row->jumlah_barang)
                        ->setCellValue('F' . $column, $row->status)
                        ->setCellValue('G' . $column, $row->keterangan)
                        ->setCellValue('H' . $column, $row->tanggal);
                
            $column++;
            $no++;
        }
        $inventaris = $this->ExportModel->get_all_inventaris();
        foreach ($inventaris as $row) {

            $spreadsheet->setActiveSheetIndex(0)
                        ->getRowDimension($column)
                        ->setRowHeight(20);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":H".$column)
                        ->getAlignment()
                        ->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("B".$column.":C".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("D".$column.":E".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);           
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("F".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("H".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."H".$column)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."H".$column)
                        ->getFont()
                        ->setSize(12);

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $no)
                        ->setCellValue('B' . $column, $row->kode_barang)
                        ->setCellValue('C' . $column, $row->nama_barang)
                        ->setCellValue('D' . $column, $row->merk_barang)
                        ->setCellValue('E' . $column, $row->jumlah_barang)
                        ->setCellValue('F' . $column, $row->status)
                        ->setCellValue('G' . $column, $row->keterangan)
                        ->setCellValue('H' . $column, $row->tanggal);
                
            $column++;
            $no++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Inventory.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}