<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_skema extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('v_laporan_skema');
    }

    function index() {
        $this->load->library('grid');
        // $grid = $this->grid->set_properties(array('model' => 'v_laporan_skema', 'controller' => 'laporan_skema', 'rownumber', 'options' => array('id' => 'laporan_skema', 'pagination')))->load_model()->set_grid();
        $grid = $this->grid->set_properties(array('model'=>  'v_laporan_skema', 'controller' => 'laporan_skema', 'options'=>array('id'=>'laporan_skema', 'pagination', 'rownumber')))->load_model()->set_grid();

        $view = $this->load->view('laporan_skema/index', array('grid' => $grid), true);

        echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
    }

    function datagrid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);
            if(isset($_POST['skema']) && !empty($_POST['skema']))
            {
                $where['skema LIKE'] = '%' . $this->input->post('skema') . '%';
            }

            $data = array();
            $params = array('_return' => 'data');

            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->v_laporan_skema->count_by($where) : $this->v_laporan_skema->count_all();
            $this->v_laporan_skema->limit($row, $offset);
            $order = $this->v_laporan_skema->get_params('_order');
            $rows = $this->v_laporan_skema->set_params($params)->with(array('lsp'));
            $data['rows'] = $this->v_laporan_skema->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function download($id){

      // error_reporting(E_ALL);
      // ini_set('display_errors', TRUE);
      // ini_set('display_startup_errors', TRUE);

      $this->load->library("PHPExcel/PHPExcel");
      $this->load->library("PHPExcel/PHPExcel/IOFactory");

      $jadwal = kode_lsp().'jadual_asesmen';
      $asesi = kode_lsp().'asesi';
      $users = kode_lsp().'users';
      $tuk = kode_lsp().'tuk';
      $skema = kode_lsp().'skema';
      $pendidikan = 'master_pendidikan';
      $pekerjaan = 'master_pekerjaan';
      $sumber_anggaran = 'master_sumber_anggaran';
      $instansi_anggaran = 'master_instansi_anggaran';
      $provinsi = 'master_provinsi';
      $kabupaten = 'master_kabupaten';

      // $data['default']=$this->db->query("SELECT
      //   a.id,
      //   a.nama_lengkap,
      //   a.no_identitas,
      //   a.tempat_lahir,
      //   a.tgl_lahir,
      //   a.jadwal_id,
      //   a.jenis_kelamin,
      //   CASE a.jenis_kelamin WHEN '1' THEN 'L' WHEN '2' THEN 'P' ELSE ' NULL' END as klamin,
      //   a.alamat,
      //   a.telp,
      //   a.email,
      //   a.id_pendidikan,
      //   a.id_pekerjaan,
      //   e.kode_skema as skema,
      //   b.tanggal,
      //   d.no_cab,
      //   c.no_reg,
      //   a.id_provinsi,
      //   a.id_kabupaten,
      //   a.id_instansi_anggaran,
      //   a.id_sumber_anggaran,
      //   CASE a.rekomendasi_asesor WHEN '1' THEN 'K' WHEN '2' THEN 'BK' ELSE '-' END as rekomendasi_asesor
      //
      //   FROM $asesi a
      //   LEFT JOIN $jadwal b ON b.id=a.jadwal_id
      //   LEFT JOIN $users c ON c.id=a.id_asesor
      //   LEFT JOIN $tuk d ON d.id=a.id_tuk
      //   LEFT JOIN $skema e ON e.id=a.skema_sertifikasi
      //
      //   WHERE a.skema_sertifikasi = $id")->result_array();

        $dataasesi = $this->v_laporan_skema->daftar_asesi($id);

        // var_dump($dataasesi); die();

      $excel = new PHPExcel();
      $excel->setActiveSheetIndex(0);
      $page = $excel->getActiveSheet();
      $page->setTitle("Blanko Sertifikasi");
      $header_style = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                              )
                          ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "bold" => true
                          ),
                          'fill' => array(
                              'type' => PHPExcel_Style_Fill::FILL_SOLID,
                              'color' => array('rgb' => '#5bc0de')
                          )
      );
      $body_style_huruf = array(
                              "borders" => array(
                                  "allborders" => array(
                                      "style" => PHPExcel_Style_Border::BORDER_THIN
                                      )
                                  ),
                                  "alignment" => array(
                                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                                  )
      );
      $italic_center = array(
                          "borders" => array(
                              "allborders" => array(
                                  "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                              ),
                          "alignment" => array(
                              "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                          ),
                          "font" => array(
                              "italic" => true,
                              "bold" => false
                          )
      );
      $center = array(
                  "borders" => array(
                      "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                      )
                  ),
                  "alignment" => array(
                      "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                      "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
                  )
      );
      $bordered = array(
                      "borders" => array(
                          "allborders" => array(
                          "style" => PHPExcel_Style_Border::BORDER_THIN
                          )
                      )
      );
      $page->getColumnDimension("A")->setWidth(5);
      $page->getColumnDimension("B")->setWidth(30);
      $page->getColumnDimension("C")->setWidth(20);
      $page->getColumnDimension("D")->setWidth(20);
      $page->getColumnDimension("E")->setWidth(20);
      $page->getColumnDimension("F")->setWidth(20);
      $page->getColumnDimension("G")->setWidth(60);
      $page->getColumnDimension("H")->setWidth(20);
      $page->getColumnDimension("I")->setWidth(20);
      $page->getColumnDimension("J")->setWidth(20);
      $page->getColumnDimension("K")->setWidth(30);
      $page->getColumnDimension("L")->setWidth(20);
      $page->getColumnDimension("M")->setWidth(20);
      $page->getColumnDimension("N")->setWidth(20);
      $page->getColumnDimension("O")->setWidth(20);
      $page->getColumnDimension("P")->setWidth(20);
      $page->getColumnDimension("Q")->setWidth(20);
      $page->getColumnDimension("R")->setWidth(20);
      $page->getColumnDimension("S")->setWidth(30);
      $page->getColumnDimension("T")->setWidth(10);
      // $a="A";
      // $g="G";
      // $k="K";
      // $t="T";
      // for($i=0;$i<=19;$i++){
      //         $a++;
      //         $g++;
      //         $k++;
      //         $t++;
      //         $page->getColumnDimension("$a")->setWidth(20);;
      // }
      $page->setCellValue("A1","No");
      //$page->mergeCells("A1:A1");
      $a="A";
      $abc=array(
          "NAMA ASESI",
          "NIK",
          "TEMPAT LAHIR",
          "TANGGAL LAHIR",
          "JENIS KLAMIN",
          "TEMPAT TINGGAL",
          "KODE KAB/KOTA",
          "KODE PROVINSI",
          "TELP",
          "EMAIL",
          "KODE PENDIDIKAN",
          "KODE PEKERJAAN",
          "KODE SKEMA",
          "TANGGAL UJI",
          "KODE TUK",
          "NO REG ASESOR",
          "SUMBER ANGGARAN",
          "INSTANSI PEMBERI ANGGARAN",
          "K/BK"
      );
      for($i=0;$i<=18;$i++){
          $a++;
          $page->setCellValue($a."1",$abc[$i]);
          $page->mergeCells($a."1:".$a."1");
      }
      $page->getStyle("A1:T1")->applyFromArray($header_style);
      $pos = 2;
      $no=0;
      for($i=0;$i<count($dataasesi);$i++){
           $page->getStyle("A". ($i+2))->applyFromArray($center);
           $page->getStyle("C". ($i+2))->applyFromArray($center);
           $page->getStyle("E". ($i+2))->applyFromArray($center);
           $page->getStyle("F". ($i+2))->applyFromArray($center);
           $page->getStyle("H". ($i+2))->applyFromArray($center);
           $page->getStyle("I". ($i+2))->applyFromArray($center);
           $page->getStyle("J". ($i+2))->applyFromArray($center);
           $page->getStyle("L". ($i+2))->applyFromArray($center);
           $page->getStyle("M". ($i+2))->applyFromArray($center);
           $page->getStyle("N". ($i+2))->applyFromArray($center);
           $page->getStyle("O". ($i+2))->applyFromArray($center);
           $page->getStyle("P". ($i+2))->applyFromArray($center);
           $page->getStyle("R". ($i+2))->applyFromArray($center);
           $page->getStyle("S". ($i+2))->applyFromArray($center);
           $page->getStyle("T". ($i+2))->applyFromArray($center);

           if ($dataasesi[$i]['rekomendasi_asesor'] == '1'){
               	$dataasesi[$i]['keputusan'] = 'K';
               }else if($dataasesi[$i]['rekomendasi_asesor'] == '2'){
                       $dataasesi[$i]['keputusan'] = 'BK';
               }else{
                       $dataasesi[$i]['keputusan'] = '-';
               }

      $no++;
          $page->setCellValue("A".($i+2), $i + 1);
          $page->setCellValue("B".($i+2), $dataasesi[$i]['nama_lengkap']);
          $page->setCellValueExplicit("C".($i+2), $dataasesi[$i]['no_identitas'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("D".($i+2), $dataasesi[$i]['tempat_lahir']);
          $page->setCellValue("E".($i+2), date('d/m/Y', strtotime($dataasesi[$i]['tgl_lahir'])));
          $page->setCellValue("F".($i+2), $dataasesi[$i]['klamin']== '1' ? 'L' : 'P');
          $page->setCellValue("G".($i+2), $dataasesi[$i]['alamat']);
          $page->setCellValue("H".($i+2), $dataasesi[$i]['id_kabupaten']);
          $page->setCellValue("I".($i+2), $dataasesi[$i]['id_provinsi']);
          $page->setCellValueExplicit("J".($i+2), $dataasesi[$i]['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("K".($i+2), $dataasesi[$i]['email']);
          $page->setCellValue("L".($i+2), $dataasesi[$i]['id_pendidikan']);
          $page->setCellValue("M".($i+2), $dataasesi[$i]['id_pekerjaan']);
          $page->setCellValue("N".($i+2), $dataasesi[$i]['skema']);
          $page->setCellValue("O".($i+2), date('d/m/Y', strtotime($dataasesi[$i]['tanggal'])));
          $page->setCellValue("P".($i+2), $dataasesi[$i]['no_cab']);
          $page->setCellValue("Q".($i+2), $dataasesi[$i]['no_reg']);
          $page->setCellValue("R".($i+2), $dataasesi[$i]['id_sumber_anggaran']);
          $page->setCellValue("S".($i+2), $dataasesi[$i]['id_instansi_anggaran']);
          $page->setCellValue("T".($i+2), $dataasesi[$i]['keputusan']);
          $pos++;
      }
      $page->getStyle("A1:T".($pos-1))->applyFromArray($bordered);
      //$date_export = date('Y-m-d H:i:s');
      $objWriter = IOFactory::createWriter($excel, 'Excel5');
      $objWriter->save("assets/files/permohonan_blanko/asesi_perskema_".$id.".xls");
      redirect ("assets/files/permohonan_blanko/asesi_perskema_".$id.".xls");

    }

}
