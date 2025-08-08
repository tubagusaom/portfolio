<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/html2pdf/vendor/autoload.php');

class Permohonan_blanko extends MY_Controller {

	function __construct()
	{
		parent::__construct();
                ini_set('memory_limit','-1');
        $this->load->model('permohonan_blanko_model');
        $this->load->model('jadwal_asesmen_model');
	}

    function index()
    {
        $this->load->library('grid');
        $grid = $this->grid->set_properties(array('model' => 'permohonan_blanko_model', 'controller' => 'permohonan_blanko', 'options' => array('id' => 'permohonan_blanko', 'pagination', 'rownumber')))->load_model()->set_grid();
        $view = $this->load->view('permohonan_blanko/index', array('grid' => $grid), true);
        echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
    }

    function datagrid()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);

            $data = array();
            $params = array('_return' => 'data');
            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->permohonan_blanko_model->count_by($where) : $this->permohonan_blanko_model->count_all();
            $this->permohonan_blanko_model->limit($row, $offset);
            $order = $this->permohonan_blanko_model->get_params('_order');
            $rows = $this->permohonan_blanko_model->set_params($params)->with(array());

            foreach ($rows as $key => $value) {
                foreach ($value as $keys=>$values) {
                    if($keys == 'nomor_keputusan'){
                        $decode = json_decode($value->nomor_keputusan, true);

                        if($decode){
                            $rows_baru[$key]->nomor_keputusan = implode(', ', $decode);
                        }else{
                            $rows_baru[$key]->nomor_keputusan = $value->nomor_keputusan;
                        }
                    }else{
                        $rows_baru[$key]->$keys = $value->$keys;
                    }

                }
            }

            //var_dump($rows_baru); die();
            $data['rows'] = $this->permohonan_blanko_model->get_selected()->data_formatter($rows_baru);
            echo json_encode($data);
        }
        else
        {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data_jadwal = $_POST['jadwal_id'];


            $jadwal_id = json_encode($data_jadwal);
            $data = $this->permohonan_blanko_model->set_validation()->validate();
            $asesi = kode_lsp().'asesi';
            //var_dump($jadwal_id); die();
            if ($data !== false) {
                if ($this->permohonan_blanko_model->check_unique($data)) {
                    $id_array_jadwal = implode(',', $data_jadwal);
                    $query_kompeten = $this->db->query("SELECT COUNT(id) as total FROM $asesi WHERE rekomendasi_asesor='1' AND jadwal_id IN($id_array_jadwal)")->row();

                    $data['nomor_keputusan'] = no_keputusan_surat($data_jadwal);

                   //var_dump($data['nomor_keputusan']); die();
                    $data['jadwal_id'] = $jadwal_id;
                    $data['jumlah_kompeten'] = $query_kompeten->total;
										$data['no_urut'] = $this->input->post('no_urut');
										// var_dump($data['no_urut']); die();
                    if ($this->db->insert('t_permohonan_blanko',$data) !== false) {
                        foreach ($data_jadwal as $key => $value) {
                            $this->db->where('id',$value);
                            $this->db->update(kode_lsp().'jadual_asesmen',array('status_permohonan_blanko'=>'1'));
                        }
                    	echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'))  ;
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->permohonan_blanko_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->library('combogrid');
            $jadwal_grid = $this->combogrid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'fields' => array('jadual', 'tanggal'), 'options' => array('id' => 'jadwal_id', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'id', 'panelWidth' => 500)))->load_model()->set_grid();

            $select_jadwal = $this->jadwal_asesmen_model->select_jadwal();

						$no_urut_permohonan  = $this->permohonan_blanko_model->no_urut_permohonan();
            // var_dump($no_permohonan);die();

            $view = $this->load->view('permohonan_blanko/add', array(
							'no_urut_permohonan' => $no_urut_permohonan,
							'jadwal' => $jadwal_grid,
							'select_jadwal' => $select_jadwal), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->permohonan_blanko_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->permohonan_blanko_model->check_unique($data, intval($id))) {
                    if ($this->permohonan_blanko_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->permohonan_blanko_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $berita = $this->permohonan_blanko_model->get(intval($id));
            $data = $this->permohonan_blanko_model->get_single($berita);

            $select_jadwal = $this->jadwal_asesmen_model->select_jadwal('0');

            $this->db->where_in('id', json_decode($data->jadwal_id, true));
            $query = $this->db->get(kode_lsp().'jadual_asesmen')->result();

            foreach ($query as $value ){
                $jadual[] = $value->jadual;
            }


            $this->load->library('combogrid');
            $jadwal_grid = $this->combogrid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'fields' => array('jadual', 'tanggal'), 'options' => array('id' => 'jadwal_id', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'jadual', 'panelWidth' => 500)))->load_model()->set_grid();
            if (sizeof($berita) == 1) {
                $view = $this->load->view('permohonan_blanko/edit', array('data' => $data, 'jadwal' => $jadwal_grid, 'jadwal_asesmen' => $jadual, 'select_jadwal' => $select_jadwal), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roles = $this->permohonan_blanko_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->permohonan_blanko_model->delete(intval($id))) {
                    echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil dihapus'));
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak berhasil dihapus !'));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        } else {
            block_access_method();
        }
    }

    function cetaks($id, $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
	$data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
	$tuk_id = $data['pb']->tuk_id;
	$jadwal_id = json_decode($data['pb']->jadwal_id);
	$asesor_id = json_decode($data['pb']->asesor_id);
	$data['tuk'] = $this->permohonan_blanko_model->get_tuk($tuk_id);
	$data['asesor'] = $this->permohonan_blanko_model->get_asesor($asesor_id);
	$data['asesi'] = $this->permohonan_blanko_model->get_asesi($jadwal_id);
	$data['terbilang'] = terbilang($data['pb']->asesi_k);

        $view = $this->load->view('permohonan_blanko/cetak', $data, true);

        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
        }
    }

    function cetak_permohonan($id, $option = false, $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);

        $array_jadwal_id = json_decode($data['pb']->jadwal_id);
        $asesi_k=0;
        $asesi_bk=0;
                 foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->permohonan_blanko_model->asesi_k($value));
                     $asesi_bk += count($this->permohonan_blanko_model->asesi_bk($value));
                     $skema_uji[] = $this->permohonan_blanko_model->get_skema($value);
                     $tuk_uji[] = $this->permohonan_blanko_model->get_tuk($value);
                     $sk_tuk_uji[] = $this->permohonan_blanko_model->get_sk_tuk($value);
                     $tanggal_uji[] = $this->permohonan_blanko_model->get_tanggal_uji($value);
                     $data['info_jadwal'][] = $this->permohonan_blanko_model->info_jadwal($value);
                     $data['asesi_ba'][] = $this->permohonan_blanko_model->get_asesi($value);
                     $data['asesor_uji'][] = $this->permohonan_blanko_model->get_asesor($value);
                 }
                 //var_dump($data['info_jadwal']);die();
        //$data['info_jadwal'] = $this->permohonan_blanko_model->info_jadwal($value);
        // $data['asesi_ba'] = $this->permohonan_blanko_model->get_asesi($jadwal_id);
        // $id_asesor = $this->permohonan_blanko_model->get_id_asesor($jadwal_id);
        $data['asesi_k'] = $asesi_k;
        $data['asesi_bk'] = $asesi_bk;
        $data['skema_uji'] = implode(',', $skema_uji);
        $data['tuk_uji'] = implode(',', $tuk_uji);
        $data['sk_tuk_uji'] = implode(',', $sk_tuk_uji);
        $data['tanggal_uji'] = implode(',', $tanggal_uji);
        $data['array_jadwal'] = $array_jadwal_id;

	$view = $this->load->view('permohonan_blanko/cetak_permohonan', $data, true);
        if ($type == "pdf" && $option == 'download') {
            //$this->load->library("htm12pdf");
            //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
            $this->pdf = new HTML2PDF('P','A4','en');
            $this->pdf->WriteHTML($view);
            $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_permohonan_'. implode('_', $array_jadwal_id).'.pdf','F');
        }else{
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
        }
    }

	function cetak_ba($id, $option = false, $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
            //var_dump(json_decode($data['pb']->jadwal_id));die();
            $array_jadwal_id = json_decode($data['pb']->jadwal_id);
                 $asesi_k=0;
                 $asesi_bk=0;
                 foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->permohonan_blanko_model->asesi_k($value));
                     $asesi_bk += count($this->permohonan_blanko_model->asesi_bk($value));
                     $id_asesor[$value] = $this->permohonan_blanko_model->get_id_asesor($value);
                     $data['skema_uji'][$value] = $this->permohonan_blanko_model->get_skema($value);
                     //$data['tuk_uji'][$value] = $this->permohonan_blanko_model->get_tuk($value);
                     $data['tanggal_uji'][] = $this->permohonan_blanko_model->get_tanggal_uji($value);
                     $data['info_jadwal'][$value] = $this->permohonan_blanko_model->info_jadwal($value);
                     $data['asesi_ba'][$value] = $this->permohonan_blanko_model->get_asesi($value);
                     foreach ($id_asesor[$value] as $asesor){
                        $test[$value][] = $asesor->id_asesor;
                        $data['asesor_uji'][$value] = $this->permohonan_blanko_model->get_asesor($test[$value]);
                     }
                 }
        $data['asesi_k'] = $asesi_k;
        $data['asesi_bk'] = $asesi_bk;
        $data['array_jadwal'] = $array_jadwal_id;

		$view = $this->load->view('permohonan_blanko/cetak_ba', $data, true);
                if ($type == "pdf" && $option == 'download') {
                    //$this->load->library("htm12pdf");
                    //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
                    $this->pdf = new HTML2PDF('P','A4','en');
                    $this->pdf->WriteHTML($view);
                    $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_beritaacara_'. implode('_', $array_jadwal_id).'.pdf','F');
                }else{
                    $this->load->library("htm12pdf");
                    $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
                }
    }

	function cetak_keputusan($id, $option = false, $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
            //var_dump(json_decode($data['pb']->jadwal_id));die();
            $array_jadwal_id = json_decode($data['pb']->jadwal_id);
                 $asesi_k=0;
                 $asesi_bk=0;
                 foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->permohonan_blanko_model->asesi_k($value));
                     $asesi_bk += count($this->permohonan_blanko_model->asesi_bk($value));
                     $id_asesor[$value] = $this->permohonan_blanko_model->get_id_asesor($value);
                     $data['skema_uji'][$value] = $this->permohonan_blanko_model->get_skema($value);
                     //$data['tuk_uji'][$value] = $this->permohonan_blanko_model->get_tuk($value);
                     $data['tanggal_uji'][] = $this->permohonan_blanko_model->get_tanggal_uji($value);
                     $data['info_jadwal'][$value] = $this->permohonan_blanko_model->info_jadwal($value);
                     $data['asesi_ba'][$value] = $this->permohonan_blanko_model->get_asesi($value);
                     foreach ($id_asesor[$value] as $asesor){
                        $test[$value][] = $asesor->id_asesor;
                        $data['asesor_uji'][$value] = $this->permohonan_blanko_model->get_asesor($test[$value]);
                     }
                 }
        $data['asesi_k'] = $asesi_k;
        $data['asesi_bk'] = $asesi_bk;
        $data['array_jadwal'] = $array_jadwal_id;

        $view = $this->load->view('permohonan_blanko/cetak_keputusan', $data, true);
        if ($type == "pdf" && $option == 'download') {
            //$this->load->library("htm12pdf");
            //$this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
            $this->pdf = new HTML2PDF('P','A4','en');
            $this->pdf->WriteHTML($view);
            $this->pdf->Output('/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_keputusan_'. implode('_', $array_jadwal_id).'.pdf','F');
        }else{
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
        }
    }

    function elfinder($id = false){

      //   error_reporting(E_ALL);
      // ini_set('display_errors', TRUE);
      // ini_set('display_startup_errors', TRUE);

        $this->load->library("PHPExcel/PHPExcel");
        $this->load->library("PHPExcel/PHPExcel/IOFactory");
        $asesi = kode_lsp().'asesi';
        $users = kode_lsp().'users';
        $tuk = kode_lsp().'tuk';
        $skema = kode_lsp().'skema';
        $jadual_asesmen = kode_lsp().'jadual_asesmen';

				$no_permohonan  = $this->permohonan_blanko_model->no_permohonan($id);
				// var_dump($no_permohonan); die();

        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
        // $data['ju'] = $this->permohonan_blanko_model->get_jadwal_uji($data['pb']->jadwal_id);
        // $jadwal_id = json_decode($data['pb']->jadwal_id, true);
        $ju = json_decode($data['pb']->jadwal_id, true);
        $jid=$ju[0];

        $data['jadwal'] = $this->permohonan_blanko_model->get_jadwal_uji($jid);

        $jadwal_id=$data['jadwal']->id;

        // var_dump($jadwal_id);die();

        $data['default']=$this->db->query("SELECT
        a.id,
        b.nama_lengkap,
        b.no_identitas,
        b.tempat_lahir,
        b.tgl_lahir,
        b.jadwal_id,
        b.jenis_kelamin,
        CASE b.jenis_kelamin WHEN '1' THEN 'L' WHEN '2' THEN 'P' ELSE ' NULL' END as klamin,
        b.alamat,
        b.telp,
        b.email,
        b.id_pendidikan,
        b.id_pekerjaan,
        e.kode_skema as skema,
        a.tanggal,
        d.no_cab,
        c.no_reg,
        b.id_provinsi,
        b.id_kabupaten,
        b.id_instansi_anggaran,
        b.id_sumber_anggaran,
        CASE b.rekomendasi_asesor WHEN '1' THEN 'K' WHEN '2' THEN 'BK' ELSE '-' END as rekomendasi_asesor

        FROM $jadual_asesmen a
        LEFT JOIN $asesi b ON b.jadwal_id=a.id
        LEFT JOIN $users c ON c.id=b.id_asesor
        LEFT JOIN $tuk d ON d.id=b.id_tuk
        LEFT JOIN $skema e ON e.id=b.skema_sertifikasi

        WHERE a.id = $jadwal_id")->result_array();

        // var_dump($data['default']); die();

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
      $page->getColumnDimension("N")->setWidth(30);
      $page->getColumnDimension("O")->setWidth(20);
      $page->getColumnDimension("P")->setWidth(20);
      $page->getColumnDimension("Q")->setWidth(30);
      $page->getColumnDimension("R")->setWidth(20);
      $page->getColumnDimension("S")->setWidth(10);
      // $page->getColumnDimension("T")->setWidth(10);
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
          "KODE KOTA",
          "KODE PROVINSI",
          "TELP",
          "EMAIL",
          "KODE PENDIDIKAN",
          "KODE PEKERJAAN",
          "KODE JADWAL",
          "TANGGAL UJI",
          // "KODE TUK",
          "NO REG ASESOR",
          "KODE SUMBER ANGGARAN",
          "KODE KEMENTERIAN",
          "K/BK"
      );
      for($i=0;$i<=17;$i++){
          $a++;
          $page->setCellValue($a."1",$abc[$i]);
          $page->mergeCells($a."1:".$a."1");
      }
      $page->getStyle("A1:S1")->applyFromArray($header_style);
      $pos = 2;
      $no=0;
      for($i=0;$i<count($data['default']);$i++){
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
           $page->getStyle("Q". ($i+2))->applyFromArray($center);
           $page->getStyle("R". ($i+2))->applyFromArray($center);
           $page->getStyle("S". ($i+2))->applyFromArray($center);
           // $page->getStyle("T". ($i+2))->applyFromArray($center);
      $no++;
          $page->setCellValue("A".($i+2), $i + 1);
          $page->setCellValue("B".($i+2), $data['default'][$i]['nama_lengkap']);
          $page->setCellValueExplicit("C".($i+2), $data['default'][$i]['no_identitas'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("D".($i+2), $data['default'][$i]['tempat_lahir']);
          $page->setCellValue("E".($i+2), date('d/m/Y', strtotime($data['default'][$i]['tgl_lahir'])));
          $page->setCellValue("F".($i+2), $data['default'][$i]['klamin']);
          $page->setCellValue("G".($i+2), $data['default'][$i]['alamat']);
          $page->setCellValue("H".($i+2), $data['default'][$i]['id_kabupaten']);
          $page->setCellValue("I".($i+2), $data['default'][$i]['id_provinsi']);
          $page->setCellValueExplicit("J".($i+2), $data['default'][$i]['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
          $page->setCellValue("K".($i+2), $data['default'][$i]['email']);
          $page->setCellValue("L".($i+2), $data['default'][$i]['id_pendidikan']);
          $page->setCellValue("M".($i+2), $data['default'][$i]['id_pekerjaan']);
          $page->setCellValue("N".($i+2), $no_permohonan);
          $page->setCellValue("O".($i+2), date('d/m/Y', strtotime($data['default'][$i]['tanggal'])));
          // $page->setCellValue("P".($i+2), $data['default'][$i]['no_cab']);
          $page->setCellValue("P".($i+2), $data['default'][$i]['no_reg']);
          // $page->setCellValue("Q".($i+2), $data['default'][$i]['id_sumber_anggaran']);
          // $page->setCellValue("R".($i+2), $data['default'][$i]['id_instansi_anggaran']);
          $page->setCellValue("Q".($i+2), '4');
          $page->setCellValue("R".($i+2), '102');
          $page->setCellValue("S".($i+2), $data['default'][$i]['rekomendasi_asesor']);
          $pos++;
      }
      $page->getStyle("A1:S".($pos-1))->applyFromArray($bordered);
      //$date_export = date('Y-m-d H:i:s');
      $objWriter = IOFactory::createWriter($excel, 'Excel5');
      $objWriter->save("assets/files/permohonan_blanko/permohonan_blanko_sertifikat_".$id.".xls");
      redirect ("assets/files/permohonan_blanko/permohonan_blanko_sertifikat_".$id.".xls");
    }

    // function elfinder($id = false){
    //     $this->load->library("PHPExcel/PHPExcel");
    //     $this->load->library("PHPExcel/PHPExcel/IOFactory");
    //     $asesi = kode_lsp().'asesi';
    //     $users = kode_lsp().'users';
    //     $tuk = kode_lsp().'tuk';
    //     $skema = kode_lsp().'skema';
    //     $jadual_asesmen = kode_lsp().'jadual_asesmen';

    // 	$data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
    //     $jadwal_id = json_decode($data['pb']->jadwal_id, true);

    //     //var_dump($jadwal_id); die();

    //     $data['default'] = $this->permohonan_blanko_model->get_asesi_lengkap($jadwal_id);

    //     //var_dump($data['default']); die();

    //     $excel = new PHPExcel();
    //     $excel->setActiveSheetIndex(0);
    //     $page = $excel->getActiveSheet();
    //     $page->setTitle("Rekap Sertifikasi");

    //     $objDrawing = new PHPExcel_Worksheet_Drawing();
    //     $objDrawing->setName('kop_lsp');
    //     $objDrawing->setDescription('kop_lsp');
    //     $objDrawing->setPath('assets/img/kop_atas.jpg');
    //     $objDrawing->setCoordinates('E1');
    //     //setOffsetX works properly
    //     $objDrawing->setOffsetX(5);
    //     $objDrawing->setOffsetY(5);
    //     //set width, height
    //     $objDrawing->setWidth(750);
    //     $objDrawing->setHeight(120);
    //     $objDrawing->setWorksheet($excel->getActiveSheet());
    //     $header_style = array(
    //                         "borders" => array(
    //                             "allborders" => array(
    //                                 "style" => PHPExcel_Style_Border::BORDER_THIN
    //                             )
    //                         ),
    //                         "alignment" => array(
    //                             "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    //                             "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
    //                         ),
    //                         "font" => array(
    //                             "bold" => true
    //                         ),
    //                         'fill' => array(
    //                             'type' => PHPExcel_Style_Fill::FILL_SOLID,
    //                             'color' => array('rgb' => '#5bc0de')
    //                         )
    //     );
    //     $body_style_huruf = array(
    //                             "borders" => array(
    //                                 "allborders" => array(
    //                                     "style" => PHPExcel_Style_Border::BORDER_THIN
    //                                     )
    //                                 ),
    //                                 "alignment" => array(
    //                                     "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    //                                     "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
    //                                 )
    //     );
    //     $italic_center = array(
    //                         "borders" => array(
    //                             "allborders" => array(
    //                                 "style" => PHPExcel_Style_Border::BORDER_THIN
    //                         )
    //                             ),
    //                         "alignment" => array(
    //                             "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    //                             "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
    //                         ),
    //                         "font" => array(
    //                             "italic" => true,
    //                             "bold" => false
    //                         )
    //     );
    //     $center = array(
    //                 "borders" => array(
    //                     "allborders" => array(
    //                         "style" => PHPExcel_Style_Border::BORDER_THIN
    //                     )
    //                 ),
    //                 "alignment" => array(
    //                     "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    //                     "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
    //                 )
    //     );
    //     $bordered = array(
    //                     "borders" => array(
    //                         "allborders" => array(
    //                         "style" => PHPExcel_Style_Border::BORDER_THIN
    //                         )
    //                     )
    //     );
    //     $page->getColumnDimension("A")->setWidth(10);
    //     $a="A";
    //     for($i=0;$i<=20;$i++){
    //             $a++;
    //             $page->getColumnDimension("$a")->setWidth(20);;
    //     }
    //     $page->setCellValue("A8","No");
    //     $page->setCellValue("B1", "Lampiran IV");
    //     $page->setCellValue("B3", "Lampiran Surat Nomor");
    //     $page->setCellValue("B4", "Perihal");
    //     $page->setCellValue("C3", ": ".$data['pb']->nomor_permohonan);
    //     $page->setCellValue("C4", ": Permintaan Blanko Sertifikat Kompetensi");
    //     $a="A";
    //     $abc=array(
    //         "NAMA ASESI",
    //         "NIK",
    //         "TEMPAT LAHIR",
    //         "TANGGAL LAHIR",
    //         "JENIS KELAMIN",
    //         "TEMPAT TINGGAL",
    //         "KODE KAB / KOTA",
    //         "KODE PROVINSI",
    //         "TELP",
    //         "EMAIL",
    //         "KODE PENDIDIKAN",
    //         "KODE PEKERJAAN",
    //         "KODE SKEMA",
    //         "TANGGAL UJI",
    //         "KODE TUK",
    //         "NO REG ASESOR",
    //         "SUMBER ANGGARAN",
    //         "INSTANSI PEMBERI ANGGARAN",
    //         "K / BK"
    //     );
    //     for($i=0;$i<=18;$i++){
    //         $a++;
    //         $page->setCellValue($a."8",$abc[$i]);
    //         $page->mergeCells($a."1:".$a."1");
    //     }
    //     $page->getStyle("A8:T8")->applyFromArray($header_style);
    //     $pos = 2;
    //     $no=0;
    //     for($i=0;$i<count($data['default']);$i++){
    //        $page->getStyle("A". ($i+9))->applyFromArray($center);
    //        $page->getStyle("C". ($i+9))->applyFromArray($center);
    //        $page->getStyle("E". ($i+9))->applyFromArray($center);
    //        $page->getStyle("F". ($i+9))->applyFromArray($center);
    //        $page->getStyle("H". ($i+9))->applyFromArray($center);
    //        $page->getStyle("I". ($i+9))->applyFromArray($center);
    //        $page->getStyle("J". ($i+9))->applyFromArray($center);
    //        $page->getStyle("L". ($i+9))->applyFromArray($center);
    //        $page->getStyle("M". ($i+9))->applyFromArray($center);
    //        $page->getStyle("O". ($i+9))->applyFromArray($center);
    //        $page->getStyle("R". ($i+9))->applyFromArray($center);
    //        $page->getStyle("S". ($i+9))->applyFromArray($center);
    //        $page->getStyle("T". ($i+9))->applyFromArray($center);

    //     if ($data['default'][$i]['rekomendasi_asesor'] == '1'){
    //     	$data['default'][$i]['keputusan'] = 'K';
    //     }else if($data['default'][$i]['rekomendasi_asesor'] == '2'){
    //             $data['default'][$i]['keputusan'] = 'BK';
    //     }else{
    //             $data['default'][$i]['keputusan'] = '-';
    //     }

    //     $tanggal = strtotime($data['default'][$i]['tanggal']);
    //     $no++;
    //         $page->setCellValue("A".($i+9), $i + 1);
    //         $page->setCellValue("B".($i+9), $data['default'][$i]['nama_lengkap']);
    //         $page->setCellValueExplicit("C".($i+9), $data['default'][$i]['no_identitas'], PHPExcel_Cell_DataType::TYPE_STRING);
    //         $page->setCellValue("D".($i+9), $data['default'][$i]['tempat_lahir']);
    //         $page->setCellValue("E".($i+9), date('d/m/Y', strtotime($data['default'][$i]['tgl_lahir'])));
    //         $page->setCellValue("F".($i+9), $data['default'][$i]['jenis_kelamin']== '1' ? 'L' : 'P');
    //         $page->setCellValue("G".($i+9), $data['default'][$i]['alamat']);
    //         $page->setCellValue("H".($i+9), $data['default'][$i]['id_kabupaten']);
    //         $page->setCellValue("I".($i+9), $data['default'][$i]['id_provinsi']);
    //         $page->setCellValueExplicit("J".($i+9), $data['default'][$i]['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
    //         $page->setCellValue("K".($i+9), $data['default'][$i]['email']);
    //         $page->setCellValue("L".($i+9), $data['default'][$i]['id_pendidikan']);
    //         $page->setCellValue("M".($i+9), $data['default'][$i]['id_pekerjaan']);
    //         $page->setCellValue("N".($i+9), $data['default'][$i]['kode_skema']);
    //         $page->setCellValue("O".($i+9), date('d/m/Y', strtotime($data['default'][$i]['tanggal'])));
    //         $page->setCellValue("P".($i+9), $data['default'][$i]['no_cab']);
    //         $page->setCellValue("Q".($i+9), $data['default'][$i]['no_reg']);
    //         $page->setCellValue("R".($i+9), $data['default'][$i]['id_sumber_anggaran']);
    //         $page->setCellValue("S".($i+9), $data['default'][$i]['id_instansi_anggaran']);
    //         $page->setCellValue("T".($i+9), $data['default'][$i]['keputusan']);
    //         $pos++;
    //     }
    //     $page->getStyle("A1:T".($pos-1))->applyFromArray($bordered);
    //     //$date_export = date('Y-m-d H:i:s');
    //     $objWriter = IOFactory::createWriter($excel, 'Excel5');

    //     $objWriter->save("assets/files/permohonan_blanko/sertifikasi_".implode('_', $jadwal_id).".xls");
    //     redirect ("assets/files/permohonan_blanko/sertifikasi_".implode('_', $jadwal_id).".xls");
    // }

    function export($id){
	$info_jadwal = $this->permohonan_blanko_model->get_by_id($id);
        $jadwal_id = $info_jadwal->jadwal_id;
        $data_jadwal = $this->permohonan_blanko_model->info_jadwal($jadwal_id);

        $this->elfinder($id);
    }

    function download($id){
        //$id='3';
        //var_dump($id);
        //die();
    	//untuk penamaan file excel
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
            //var_dump(json_decode($data['pb']->jadwal_id));die();
            $array_jadwal_id = json_decode($data['pb']->jadwal_id);
                 $asesi_k=0;
                 $asesi_bk=0;
                 foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->permohonan_blanko_model->asesi_k($value));
                     $asesi_bk += count($this->permohonan_blanko_model->asesi_bk($value));
                     $id_asesor[$value] = $this->permohonan_blanko_model->get_id_asesor($value);
                     $data['skema_uji'][$value] = $this->permohonan_blanko_model->get_skema($value);
                     //$data['tuk_uji'][$value] = $this->permohonan_blanko_model->get_tuk($value);
                     $data['tanggal_uji'][] = $this->permohonan_blanko_model->get_tanggal_uji($value);
                     $data['info_jadwal'][$value] = $this->permohonan_blanko_model->info_jadwal($value);
                     $data['asesi_ba'][$value] = $this->permohonan_blanko_model->get_asesi($value);
                     foreach ($id_asesor[$value] as $asesor){
                        $test[$value][] = $asesor->id_asesor;
                        $data['asesor_uji'][$value] = $this->permohonan_blanko_model->get_asesor($test[$value]);
                     }
                 }

        //untuk generate file pdf & excel
    	$this->load->library('zip');
        $this->zip->clear_data();
        ob_clean();
    	$this->cetak_permohonan($id, 'download', $type = "pdf");
    	$this->cetak_ba($id, 'download', $type = "pdf");
    	$this->cetak_keputusan($id, 'download', $type = "pdf");
    	$this->elfinder($id);

    	//untuk membaca file yang telah di generate
    	$sp = '/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_permohonan_'. implode('_', $array_jadwal_id).'.pdf';
    	$ba = '/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_beritaacara_'. implode('_', $array_jadwal_id).'.pdf';
    	$keputusan = '/var/www/_tera_byte/assets/files/permohonan_blanko/'.'surat_keputusan_'. implode('_', $array_jadwal_id).'.pdf';
    	$excels = '/var/www/_tera_byte/assets/files/permohonan_blanko/'.'sertifikasi_'. implode('_', $array_jadwal_id).'.xls';

    	//untuk mengambil & menyatukan file yang telah dibaca
	$this->zip->read_file($sp);
    	$this->zip->read_file($ba);
    	$this->zip->read_file($keputusan);
    	$this->zip->read_file($excels);
    	//mendownload file
        $nama = 'permohonan_blanko_'.implode('_', $array_jadwal_id).'.zip';
        ob_end_clean();
    	$this->zip->download($nama);
    }

    function cetak($id, $option = false, $type = "pdf") {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['pb'] = $this->permohonan_blanko_model->get_by_id($id);
            //var_dump(json_decode($data['pb']->jadwal_id));die();
            $array_jadwal_id = json_decode($data['pb']->jadwal_id);

                 $asesi_k=0;
                 $asesi_bk=0;
                 foreach ($array_jadwal_id as $key => $value) {
                     $asesi_k += count($this->permohonan_blanko_model->asesi_k($value));
                     $asesi_bk += count($this->permohonan_blanko_model->asesi_bk($value));
                     $id_asesor[$value] = $this->permohonan_blanko_model->get_id_asesor($value);
                     $data['skema_uji'][$value] = $this->permohonan_blanko_model->get_skema($value);
                     //$data['tuk_uji'][$value] = $this->permohonan_blanko_model->get_tuk($value);
                     $data['tanggal_uji'][] = $this->permohonan_blanko_model->get_tanggal_uji($value);
                     $data['info_jadwal'][$value] = $this->permohonan_blanko_model->info_jadwal($value);
                     $data['asesi_ba'][$value] = $this->permohonan_blanko_model->get_asesi($value);
                     foreach ($id_asesor[$value] as $asesor){
                        $test[$value][] = $asesor->id_asesor;
                        $data['asesor_uji'][$value] = $this->permohonan_blanko_model->get_asesor($test[$value]);
                     }
                 }

        $data['asesi_k'] = $asesi_k;
        $data['asesi_bk'] = $asesi_bk;
        $data['skema_uji'] = implode(',', $skema_uji);
        $data['tuk_uji'] = implode(',', $tuk_uji);
        $data['sk_tuk_uji'] = implode(',', $sk_tuk_uji);
        $data['tanggal_uji'] = implode(',', $tanggal_uji);
        $data['array_jadwal'] = $array_jadwal_id;


        if ($option == '1'){
            $view = $this->load->view('permohonan_blanko/cetak_permohonan', $data, true);
        }elseif($option == '2'){
            $view = $this->load->view('permohonan_blanko/cetak_keputusan', $data, true);
        }elseif($option == '3'){
            $view = $this->load->view('permohonan_blanko/cetak_ba', $data, true);
        }else {
            $view = $this->load->view('permohonan_blanko/cetak', $data, true);
        }


        if ($type == "pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "pb-" . $id . ".pdf", false, true);
            //$this->pdf = new HTML2PDF('P','A4','en');
            //$this->pdf->WriteHTML($view);
            //$this->pdf->Output('/var/www/html/_tera_byte/assets/files/permohonan_blanko/'.'surat_keputusan_'.$jadwal_id.'.pdf','F');
        }
    }
}
