<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pra_asesmen extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pra_asesmen_model');
        $this->load->model('asesi_model');
        $this->load->model('rencana_asesmen_model');
        $this->load->model('bukti_pendukung_model');
        $this->load->library('pagination');


    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'pra_asesmen_model', 'controller' => 'pra_asesmen','datepra' => 'pra_asesmen_date', 'options' => array('id' => 'pra_asesmen', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('pra_asesmen/index', array('grid' => $grid), true);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

    function datagrid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
            $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
            $offset = $row * ($page - 1);
            $data = array();
            $params = array('_return' => 'data');
            $jenis_user = $this->auth->get_user_data()->jenis_user;

            if($jenis_user == 2){
                $asesi_id = $this->auth->get_user_data()->id;
                $where['pra_asesmen_checked ='] = $asesi_id;
            }else if($jenis_user == 1){
                $asesi_id = $this->auth->get_user_data()->id;
                $where['id_users ='] = $asesi_id;
            }else if($jenis_user == 3){
                $user_id = $this->auth->get_user_data()->pegawai_id;
                $where['id_tuk ='] = $user_id;
            }
            if(isset($_POST['nama_lengkap']) && !empty($_POST['nama_lengkap']))
            {
                $where['nama_lengkap like'] = '%' . $this->input->post('nama_lengkap') . '%';
            }
            if(isset($_POST['pra_asesmen_checked']) && !empty($_POST['pra_asesmen_checked']))
            {
                $where['pra_asesmen_checked'] =  $this->input->post('pra_asesmen_checked');
            }
            if (isset($where))
                $params['_where'] = $where;

            $data['total'] = isset($where) ? $this->pra_asesmen_model->count_by($where) : $this->pra_asesmen_model->count_all();
            $this->pra_asesmen_model->limit($row, $offset);
            $order = $this->pra_asesmen_model->get_params('_order');
            $rows = $this->pra_asesmen_model->set_params($params)->with(array('skema','user'));



            $data['rows'] = $this->pra_asesmen_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->pra_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->pra_asesmen_model->check_unique($data)) {
                    if ($this->pra_asesmen_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->pra_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('asesi/add', array('pra_asesmen' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut')), TRUE)));
        }
    }
    function biaya_asesmen($id){
        $this->db->select('b.biaya_skema');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $row = $this->db->get()->row();
        return $row->biaya_skema;
    }
    function no_invoice($id){


        $prefix = "#INVOICE-";
        $digits = 6;
        $start = $id;

        for ($i = $start; $i < $start + 1; $i++) {
            $result = str_pad($i, $digits, "0", STR_PAD_LEFT);
        }
        $no = $prefix.$result;

        return $no;
    }
    function kirim_invoice($id){

        $jumlah_desimal ="0";
        $pemisah_desimal =",";
        $pemisah_ribuan =".";
        $no_invoice = $this->no_invoice($id);
        $this->db->select('a.nama_lengkap,a.alamat,a.jumlah_pembayaran,b.skema,a.email,a.telp');
        $this->db->from(kode_lsp().'asesi a');
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
        $this->db->where('a.id',$id);
        $data['asesi'] = $row = $this->db->get()->row();
        //var_dump($data['asesi']); die();
        $biaya_skema = number_format($data['asesi']->jumlah_pembayaran, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
        $data['biaya_skema']=$biaya_skema;
        $data['no_invoice']=$no_invoice;
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $view = $this->load->view('administrasi_ujk/invoice',$data, true);
           //if($type=="pdf") {
        $this->load->library("htm12pdf");
        $this->htm12pdf->pdf_create($view, 'invoice-'.$id.".pdf", true, true);
        $filename = base64_encode(file_get_contents('assets/files/invoice/invoice-'.$id.'.pdf'));
    //var_dump($filename);die();
        $email = $data['asesi']->email;
        $email_tujuan[0]["email"] = $email;

        $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
        $post = '{"personalizations": [{"to": '.json_encode($email_tujuan).',"subject": "Invoice Uji Kompetensi "}],"from": {"email": "'.$admin->alamat_email.'"},"content": [{"type": "text/plain","value": "Berikut terlampir Invoice Pelaksanaan Uji Kompetensi. Terimakasih"}],"attachments": [{"content": "'.$filename.'","type": "application/pdf","filename": "invoice-' . $id . '.pdf"}]}';
            //var_dump($post);die();
        sendgrid_api_text('https://api.sendgrid.com/v3/mail/send',$post);
        $pesan = 'Invoice Uji Kompetensi. Silahkan melakukan pembayaran ke rekening BCA 628-11-8844-2 an it-konsultan sebesar '.$biaya_skema;
        smssend_zenziva($data['asesi']->telp, $pesan);
        //echo json_encode(array('msgType' => 'success', 'msgValue' => 'Surat Tugas berhasil dikirim !'));
    }
    function edit($id = false) {

        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pra_asesmen = $this->input->post('pra_asesmen');
            if($pra_asesmen == "" || $pra_asesmen =="0"){
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan, Validasi dokumen terlebih dahulu atau Rekomendasi tidak boleh kosong !'));
                die();
            }

            $data = $this->pra_asesmen_model->set_validation()->validate();
            //var_dump($data);die();
            if ($data !== false) {
                if ($this->pra_asesmen_model->check_unique($data, intval($id))) {
                    $validitas_dokumen_pra_asesmen = $_POST['validitas_dokumen_pra_asesmen'];
                    $data['validitas_dokumen_pra_asesmen'] =serialize($validitas_dokumen_pra_asesmen);
                    $data['perangkat_yang_digunakan'] = isset($_POST['perangkat_yang_digunakan']) ? serialize($_POST['perangkat_yang_digunakan']) : '';

                    $data['pra_asesmen_datetime'] = date('Y-m-d H-i-s');
                    $this->db->where('id',$data['jadwal_id']);
                    $data_jadwal = $this->db->get(kode_lsp().'jadual_asesmen')->row();
                    $biaya_asesmen = $this->biaya_asesmen($id);
                    //var_dump($data_jadwal);die();
                    if($data_jadwal->is_kolektif=='1'){
                        $data['jumlah_pembayaran'] = $biaya_asesmen;
                    }else{
                        $marketing = $this->input->post('marketing');
                        $jumlah_pembayaran = $this->input->post('jumlah_pembayaran');

                        if($marketing=='mahasiswa_pskk'){
                            $data['jumlah_pembayaran'] = 75000 + $id;
                        }else if($marketing=='umum_pskk'){
                            $data['jumlah_pembayaran'] = 205000  + $id;
                        }else{
                            $data['jumlah_pembayaran'] = $biaya_asesmen  + $id;
                        }
                    }



                    if ($this->pra_asesmen_model->update(intval($id), $data) !== false) {
                        if($data_jadwal->is_kolektif!='1'){
                            $this->kirim_invoice($id);
                        }
                        $this->db->where('asesi_id',$id);
                        $asesi= $this->db->get(kode_lsp().'asesi_detail')->result_array();
                        $v = $this->input->post('v');
                        $a = $this->input->post('a');
                        $t = $this->input->post('t');
                        $m = $this->input->post('m');

                        foreach($asesi as $key=>$value){
                            if(isset($v[$value['id']])){
                                $v_value = '1';
                            }else{
                                $v_value = '0';
                            }
                            if(isset($a[$value['id']])){
                                $a_value = '1';
                            }else{
                                $a_value = '0';
                            }
                            if(isset($t[$value['id']])){
                                $t_value = '1';
                            }else{
                                $t_value = '0';
                            }
                            if(isset($m[$value['id']])){
                                $m_value = '1';
                            }else{
                                $m_value = '0';
                            }
                            $data_update = array(
                                       'v' => $v_value,
                                       'a' => $a_value,
                                       't' => $t_value,
                                       'm' => $m_value,
                                    );

                            $this->db->where('id', $value['id']);
                            $this->db->update(kode_lsp().'asesi_detail', $data_update);
                        }

                        $sms = isset($_POST['kirim_notifikasi']) ? $this->input->post('kirim_notifikasi') : "";
                        if($sms != ""){
                            $id_users = $this->input->post('id_users');
                            $rekomendasi = $this->input->post('pra_asesmen_description');
                            $pra_asesmen = $this->input->post('pra_asesmen');

                            $this->sms($id_users,$rekomendasi,$pra_asesmen);
                        }

                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        // echo $this->db->last_query();die();
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->pra_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $asesi = $this->pra_asesmen_model->get(intval($id));

            if (sizeof($asesi) == 1) {
                $this->db->where('asesi_id',$id);
                $detail_asesi = $this->db->get(kode_lsp().'asesi_detail')->result_array();
                //var_dump($detail_asesi);
                $data = $this->pra_asesmen_model->get_single($asesi);

                $this->load->model('asesi_model');
                $this->db->where('pegawai_id',$id);
                $this->db->where('jenis_user','1');
                $row = $this->db->get('t_users')->row();

                $files_asesi = $this->asesi_model->files_asesi($row->id);

                $this->load->model('pra_asesmen_model');
                $jadwal = $this->pra_asesmen_model->jadwal($asesi->jadwal_id);

                $bukti_pendukung = "<ul style=''>";
                foreach($files_asesi as $value){
                    $bukti_pendukung .= "<li>".$value->nama_dokumen."</li>";
                    //$bukti[]=$value->nama_dokumen;
                }
                $bukti_pendukung .= "</ul>";
                //$bukti_pendukung = implode(',',$bukti);

                $perangkat_ygdipakai =  array('Pertanyaan Lisan','Pertanyaan Tulisan','Observasi/Praktek','Wawancara','Cek Portofolio','Ceklis Ulasan Produk');

                $validitas_dokumen_pra_asesmen=unserialize($asesi->validitas_dokumen_pra_asesmen);

                if(is_array($validitas_dokumen_pra_asesmen) && count($files_asesi) == count($validitas_dokumen_pra_asesmen)){
                    $checklit_valid = 'Y';

                }else{
                    $checklit_valid = 'N';

                }
                $foto = $this->asesi_model->foto($id);
                $isbn = is_array(unserialize($asesi->isbn)) ? count(unserialize($asesi->isbn)) : 0;
                //var_dump($isbn);die();
                $view = $this->load->view('pra_asesmen/edit', array('isbn'=>$isbn,'foto'=>$foto,'checklit_valid'=>$checklit_valid,'jadwal'=>$jadwal,'files_asesi'=>$files_asesi,'bukti_pendukung'=>$bukti_pendukung,'detail_asesi'=>$detail_asesi,'data' => $data,'pra_asesmen' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut'),'jenis_kelamin'=>array('-Pilih-','Pria','Wanita'),'perangkat_ygdipakai'=>$perangkat_ygdipakai,'validitas_dokumen_pra_asesmen'=>$validitas_dokumen_pra_asesmen), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }
    function rencana_asesmen($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->pra_asesmen_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->pra_asesmen_model->check_unique($data, intval($id))) {

                  // $data['is_perpanjangan'] = $_POST['is_perpanjangan'];
                  // $data['is_kandidat'] = $_POST['is_kandidat'];
                  // $data['rating1'] = $_POST['rating1'];
                  // $data['rating2'] = $_POST['rating2'];
                  // $data['rating3'] = $_POST['rating3'];
                  // $data['is_lingkungan'] = $_POST['is_lingkungan'];
                  // $data['is_peluang_bukti'] = $_POST['is_peluang_bukti'];
                  // $data['is_hubungan_kompetensi'] = $_POST['is_hubungan_kompetensi'];
                  // $data['is_lembaga'] = $_POST['is_lembaga'];
                  // $data['is_relevan_asesor'] = $_POST['is_relevan_asesor'];
                  // $data['is_tolak_ukur'] = $_POST['is_tolak_ukur'];
                  $validitas_dokumen_pra_asesmen = $_POST['validitas_dokumen_pra_asesmen'];
                  $data['validitas_dokumen_pra_asesmen'] =serialize($validitas_dokumen_pra_asesmen);
                  $data['perangkat_yang_digunakan'] = isset($_POST['perangkat_yang_digunakan']) ? serialize($_POST['perangkat_yang_digunakan']) : '';


                    if ($this->pra_asesmen_model->update(intval($id), $data) !== false) {

                      $t_asesi_uji = kode_lsp().'asesi_uji';
                      $this->db->where('id_asesi', $id);
                      $get_asesi_uji = $this->db->get(kode_lsp() . 'asesi_uji')->row();
                      // var_dump(count($get_asesi_uji)); die();
                      $totalau = count($get_asesi_uji);

                      if ($totalau == '0') {

                        // data pendekatan
                        $data_au['is_perpanjangan'] = $_POST['is_perpanjangan'];
                        $data_au['is_kandidat'] = $_POST['is_kandidat'];
                        $data_au['rating1'] = $_POST['rating1'];
                        $data_au['rating2'] = $_POST['rating2'];
                        $data_au['rating3'] = $_POST['rating3'];
                        $data_au['is_lingkungan'] = $_POST['is_lingkungan'];
                        $data_au['is_peluang_bukti'] = $_POST['is_peluang_bukti'];
                        $data_au['is_hubungan_kompetensi'] = $_POST['is_hubungan_kompetensi'];
                        $data_au['is_lembaga'] = $_POST['is_lembaga'];
                        $data_au['is_relevan_asesor'] = $_POST['is_relevan_asesor'];
                        $data_au['is_tolak_ukur'] = $_POST['is_tolak_ukur'];

                        // data persiapan
                        $array_jenis_bukti_l = $_POST['l'];
                        $array_jenis_bukti_tl = $_POST['tl'];
                        $array_jenis_bukti_t = $_POST['t'];
                        $array_metode_cl = $_POST['cl'];
                        $array_metode_dit = $_POST['dit'];
                        $array_metode_pw = $_POST['pw'];
                        $array_metode_vp = $_POST['vp'];
                        $array_metode_cup = $_POST['cup'];
                        $array_metode_lainnya = $_POST['lainnya'];

                        $data_au['id_asesi'] = $id;
                        $data_au['array_jenis_bukti_l'] = serialize($array_jenis_bukti_l);
                        $data_au['array_jenis_bukti_tl'] = serialize($array_jenis_bukti_tl);
                        $data_au['array_jenis_bukti_t'] = serialize($array_jenis_bukti_t);
                        $data_au['array_metode_cl'] = serialize($array_metode_cl);
                        $data_au['array_metode_dit'] = serialize($array_metode_dit);
                        $data_au['array_metode_pw'] = serialize($array_metode_pw);
                        $data_au['array_metode_vp'] = serialize($array_metode_vp);
                        $data_au['array_metode_cup'] = serialize($array_metode_cup);
                        $data_au['array_metode_lainnya'] = serialize($array_metode_lainnya);

                        // data rencana
                        $array_karakter     = $_POST['karakter'];
                        $array_kebutuhan    = $_POST['kebutuhan'];
                        $array_saran        = $_POST['saran'];
                        $array_penyesuaian  = $_POST['penyesuaian'];
                        $array_peluang      = $_POST['peluang'];
                        $is_konfirmasi         = $_POST['is_konfirmasi'];

                        $data_au['array_karakter'] = serialize($array_karakter);
                        $data_au['array_kebutuhan'] = serialize($array_kebutuhan);
                        $data_au['array_saran'] = serialize($array_saran);
                        $data_au['array_penyesuaian'] = serialize($array_penyesuaian);
                        $data_au['array_peluang'] = serialize($array_peluang);
                        $data_au['is_konfirmasi'] = $is_konfirmasi;

                        // var_dump($data_au); die();

                        if ($this->db->insert($t_asesi_uji, $data_au)) {
                          echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data FR-MAPA-01 berhasil disimpan !'));
                        }else {
                          echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data FR-MAPA-01 tidak dapat disimpan !'));
                        }

                      }else{

                        $data_asesi_uji = array(
                          // data pendekatan
                          'is_perpanjangan' => $_POST['is_perpanjangan'],
                          'is_kandidat' => $_POST['is_kandidat'],
                          'rating1' => $_POST['rating1'],
                          'rating2' => $_POST['rating2'],
                          'rating3' => $_POST['rating3'],
                          'is_lingkungan' => $_POST['is_lingkungan'],
                          'is_peluang_bukti' => $_POST['is_peluang_bukti'],
                          'is_hubungan_kompetensi' => $_POST['is_hubungan_kompetensi'],
                          'is_lembaga' => $_POST['is_lembaga'],
                          'is_relevan_asesor' => $_POST['is_relevan_asesor'],
                          'is_tolak_ukur' => $_POST['is_tolak_ukur'],

                          // data persiapan
                          'array_jenis_bukti_l' => serialize($_POST['l']),
                          'array_jenis_bukti_tl' => serialize($_POST['tl']),
                          'array_jenis_bukti_t' => serialize($_POST['t']),
                          'array_metode_cl' => serialize($_POST['cl']),
                          'array_metode_dit' => serialize($_POST['dit']),
                          'array_metode_pw' => serialize($_POST['pw']),
                          'array_metode_vp' => serialize($_POST['vp']),
                          'array_metode_cup' => serialize($_POST['cup']),
                          'array_metode_lainnya' => serialize($_POST['lainnya']),

                          // data rencana
                          'array_karakter' => serialize($_POST['karakter']),
                          'array_kebutuhan' => serialize($_POST['kebutuhan']),
                          'array_saran' => serialize($_POST['saran']),
                          'array_penyesuaian' => serialize($_POST['penyesuaian']),
                          'array_peluang' => serialize($_POST['peluang']),
                          'is_konfirmasi' => $_POST['is_konfirmasi']
                        );

                        // var_dump($data_asesi_uji); die();

                        $this->db->where('id_asesi', $id);
                        // $updatedata = $this->db->update(kode_lsp() . 'asesi_uji', $data_asesi_uji);
                        if ($this->db->update($t_asesi_uji, $data_asesi_uji)) {
                              echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data FR-MAPA-01 berhasil disimpan !'));
                        }else {
                          echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data FR-MAPA-01 tidak dapat disimpan !'));
                        }

                      }

                      // var_dump($data_au); die();


                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data FR-MAPA-01 berhasil tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->pra_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $asesi = $this->pra_asesmen_model->get(intval($id));
            if (sizeof($asesi) == 1) {

              $data   = $this->pra_asesmen_model->get_single($asesi);
              $asesi_detail  = $this->pra_asesmen_model->asesi($id);
              $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);

              $data_perangkat = $this->pra_asesmen_model->perangkat_uji($asesi->perangkat_yang_digunakan);
              foreach ($data_perangkat as $key => $value) {
                $perangkat[]= $value;
              }
              $this->db->where('pegawai_id',$id);
              $this->db->where('jenis_user','1');
              $row = $this->db->get('t_users')->row();
              $files_asesi = $this->asesi_model->files_asesi($row->id);


              $idperangkat = unserialize($asesi->perangkat_yang_digunakan);
              $validitas_dokumen_pra_asesmen=unserialize($asesi->validitas_dokumen_pra_asesmen);
              $data_uji = $this->pra_asesmen_model->asesi_detail_uji($id);
              // var_dump($data_uji); die();

              $array_jenis_bukti_l = unserialize($data_uji->array_jenis_bukti_l);
              $array_jenis_bukti_tl = unserialize($data_uji->array_jenis_bukti_tl);
              $array_jenis_bukti_t = unserialize($data_uji->array_jenis_bukti_t);

              $array_metode_cl = unserialize($data_uji->array_metode_cl);
              $array_metode_dit = unserialize($data_uji->array_metode_dit);
              $array_metode_pw = unserialize($data_uji->array_metode_pw);
              $array_metode_vp = unserialize($data_uji->array_metode_vp);
              $array_metode_cup = unserialize($data_uji->array_metode_cup);
              $array_metode_lainnya = unserialize($data_uji->array_metode_lainnya);

              $array_karakter = unserialize($data_uji->array_karakter);
              $array_kebutuhan = unserialize($data_uji->array_kebutuhan);
              $array_saran = unserialize($data_uji->array_saran);
              $array_penyesuaian = unserialize($data_uji->array_penyesuaian);
              $array_peluang = unserialize($data_uji->array_peluang);

              // var_dump($datauji['array_karakter']); die();

                $view = $this->load->view(
                  'rencana_asesmen/rencana_asesmen',
                    array(
                      'data' => $data,
                      'asesi' => $asesi_detail,
                      'data_perangkat' => $perangkat,
                      'idperangkat' => $idperangkat,
                      'validitas_dokumen_pra_asesmen' => $validitas_dokumen_pra_asesmen,
                      'files_asesi' => $files_asesi,
                      'data_uji' => $data_uji,
                      'array_jenis_bukti_l' => $array_jenis_bukti_l,
                      'array_jenis_bukti_tl' => $array_jenis_bukti_tl,
                      'array_jenis_bukti_t' => $array_jenis_bukti_t,

                      'array_metode_cl' => $array_metode_cl,
                      'array_metode_dit' => $array_metode_dit,
                      'array_metode_pw' => $array_metode_pw,
                      'array_metode_vp' => $array_metode_vp,
                      'array_metode_cup' => $array_metode_cup,
                      'array_metode_lainnya' => $array_metode_lainnya,

                      'array_karakter' => $array_karakter,
                      'array_kebutuhan' => $array_kebutuhan,
                      'array_saran' => $array_saran,
                      'array_penyesuaian' => $array_penyesuaian,
                      'array_peluang' => $array_peluang,

                      'unit_kompetensi' =>$unit_kompetensi
                    ),
                    TRUE
                );
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }
    function cetak_mapa01($id,$type = "pdf") {

        // error_reporting(E_ALL);
        // ini_set('display_errors', TRUE);
        // ini_set('display_startup_errors', TRUE);

          $this->load->model('asesi_model');

          $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
          $data_uji = $this->pra_asesmen_model->asesi_detail_uji($id);
          $data['data_uji'] = $data_uji;
// dump($data_uji);
          $asesi = $this->asesi_model->data_asesi($id);
          $data['data_asesi'] = $asesi;
          $asesi_detail = $this->asesi_model->asesi_detail($id);
          $data['asesi_detail'] = $asesi_detail;
          $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
          $data['unit_kompetensi'] = $unit_kompetensi;
          $data_uji = $this->pra_asesmen_model->asesi_detail_uji($id);
          // var_dump($data_uji); die();

          $array_jenis_bukti_l = unserialize($data_uji->array_jenis_bukti_l);
          $array_jenis_bukti_t = unserialize($data_uji->array_jenis_bukti_t);
          $array_jenis_bukti_tl = unserialize($data_uji->array_jenis_bukti_tl);
          $array_metode_cl = unserialize($data_uji->array_metode_cl);
          $array_metode_dit = unserialize($data_uji->array_metode_dit);
          $array_metode_pw = unserialize($data_uji->array_metode_pw);
          $array_metode_vp = unserialize($data_uji->array_metode_vp);
          $array_metode_cup = unserialize($data_uji->array_metode_cup);
          $array_metode_lainnya = unserialize($data_uji->array_metode_lainnya);
            $data['array_karakter'] = unserialize($data_uji->array_karakter);
            $data['array_kebutuhan'] = unserialize($data_uji->array_kebutuhan);
            $data['array_saran'] = unserialize($data_uji->array_saran);
            $data['array_penyesuaian'] = unserialize($data_uji->array_penyesuaian);
            $data['array_peluang'] = unserialize($data_uji->array_peluang);

// dump($data['array_karakter']);
          $kode_unit = '';
          $unit = '';
          $elemen_kuk = "";
          $unit_mak = "";
          foreach ($unit_kompetensi as $key => $value) {
              $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
              $unit .= '<label style="font-size:10px;">' . ($key + 1) . '. ' . $value->unit_kompetensi . '</label><br/>';
              $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
              $detail_elemen = "";
              if (count($query_elemen) > 0) {
                  foreach ($query_elemen as $keys => $values) {
                      $query_kuk = $this->asesi_model->kuk($values->id);
                      if (count($query_kuk) > 0) {
                          $detail_kuk = "";
                          foreach ($query_kuk as $k => $v) {
                            $nuek = ($key + 1).($keys + 1).($k + 1);
                            //   dump_exit($array_jenis_bukti_t);
                              $detail_kuk .= '<tr>
                              <td rowspan="2" style="width:14%;">'.($keys + 1).'.' . ($k + 1) . '. ' . $v->kuk . '</td>
                              <td style="width:11%;"> </td>
                              <td style="width:3%;text-align:center;">'.(isset($array_jenis_bukti_l[$nuek])?'L':'').'</td>
                              <td style="width:3%;text-align:center;">'.(isset($array_jenis_bukti_tl[$nuek])?'TL':'').'</td>
                              <td style="width:3%;text-align:center;">'.(isset($array_jenis_bukti_t[$nuek])?'T':'').'</td>
                              <td style="width:11%;text-align:center;">'.(isset($array_metode_cl[$nuek])?'CLO':'').'</td>
                              <td style="width:11%;text-align:center;">'.(isset($array_metode_dit[$nuek])?'DIT':'').'</td>
                              <td style="width:11%;text-align:center;">'.(isset($array_metode_pw[$nuek])?'PW':'').'</td>
                              <td style="width:11%;text-align:center;">'.(isset($array_metode_vp[$nuek])?'VP':'').'</td>
                              <td style="width:11%;text-align:center;">'.(isset($array_metode_cup[$nuek])?'CUP':'').'</td>
                              <td style="width:11%;text-align:center;"></td>
                            </tr>
                            <tr>
                              <td style="width:11%;border-left:0px"></td>
                              <td style="width:3%;text-align:center;"></td>
                              <td style="width:3%;text-align:center;"></td>
                              <td style="width:3%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                            </tr>';
                          }
                      } else {
                          $detail_kuk .= '<tr>
                              <td></td>
                              <td style="width:3%"></td>
                              <td style="width:3%"></td>
                              <td style="width:3%"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                              <td style="width:11%;text-align:center;"></td>
                            </tr>';
                      }
                      $detail_elemen .= '
                            <tr>
                              <td rowspan="2" style="width:14%;text-align:center;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                              <td rowspan="2" style="width:11%;text-align:center;"><b>Bukti-Bukti</b><br/>
                              (Kinerja, Produk, Portofolio, dan/atau Hapalan) diidentifikasi berdasarkan Kriteria Unjuk Kerja dan Pendekatan Asesmen
                               </td>
                              <td colspan="3" style="width:9%;text-align:center;font-weight:bold;">Jenis Bukti</td>
                              <td colspan="6" style="width:66%;text-align:center;font-weight:bold;">Metode dan Perangkat Asesmen CL (Ceklik Observasi/Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</td>

                            </tr>
                            <tr>

                              <td style="width:3%;text-align:center;font-weight:bold;border-left:0px">L</td>
                              <td style="width:3%;text-align:center;font-weight:bold;">TL</td>
                              <td style="width:3%;text-align:center;font-weight:bold;">T</td>
                              <td style="width:11%;text-align:center;"><b>Observasi langsung</b><br/>
                              (kerja nyata/ aktivitas waktu nyata di tempat kerja di lingkungan tempat kerja yang di simulasikan)
                              </td>
                              <td style="width:11%;text-align:center;"><b>Kegiatan Terstruktur</b><br/>
                              (latihan simulasi dan bermain peran, proyek, presentasi, lembar kegiatan)
                              </td>
                              <td style="width:11%;text-align:center;"><b>Tanya Jawab</b><br/>
                              (pertanyaan tertulis, wawancara, asesmen diri, tanya jawab lisan, angket, ujian lisan atau tertulis)
                              </td>
                              <td style="width:11%;text-align:center;"><b>Verifikasi Portofolio</b><br/>
                              (sampel pekerjaan yang disusun oleh Asesi, produk dengan dokumentasi pendukung, bukti sejarah, jurnal atau buku catatan, informasi tentang pengalaman hidup)
                              </td>
                              <td style="width:11%;text-align:center;"><b>Review Produk</b><br/>
                              (testimoni dan laporan dari atasan, bukti pelatihan, otentikasi pencapaian sebelumnya, wawancara dengan atasan, atau rekan kerja)
                              </td>
                              <td style="width:11%;text-align:center;font-weight:bold;">Lainnya</td>
                            </tr>
                            <tr>
                              <td style="width:14%;font-weight:bold;"> Elemen Kompetensi </td>
                              <td colspan="10" style="width:69%;">' . ($keys + 1) . '. ' . $values->elemen_kompetensi . '</td>
                            </tr>

                            ' . $detail_kuk;
                  }
              } else {
                  $detail_elemen .= '
                            <tr>
                              <td rowspan="2" style="width:14%;text-align:center;font-weight:bold;"> Kriteria Unjuk Kerja </td>
                              <td rowspan="2" style="width:11%;text-align:center;> <b>Bukti-Bukti</b><br/>
                              (Kinerja, Produk, Portofolio, dan/atau Hapalan) diidentifikasi berdasarkan Kriteria Unjuk Kerja dan Pendekatan Asesmen </td>
                              <td colspan="3" style="width:9%;text-align:center;font-weight:bold;">Jenis Bukti</td>
                              <td colspan="6" style="width:66%;text-align:center;font-weight:bold;">Metode dan Perangkat Asesmen CL (Ceklik Observasi/Lembar Periksa), DIT (Daftar Instruksi Terstruktur), DPL (Daftar Pertanyaan Lisan), DPT (Daftar Pertanyaan Tertulis), VP (Verifikasi Portofolio), CUP (Ceklis Ulasan Produk), PW (Pertanyaan Wawancara)</td>

                            </tr>
                            <tr>

                              <td style="width:3%;text-align:center;font-weight:bold;border-left:0px">L</td>
                              <td style="width:3%;text-align:center;font-weight:bold;">TL</td>
                              <td style="width:3%;text-align:center;font-weight:bold;">T</td>
                              <td style="width:11%;text-align:center;">Observasi langsung
                              (kerja nyata/ aktivitas waktu nyata di tempat keja di lingkungan tempat kerja yang di simulasikan)
                              </td>
                              <td style="width:11%;text-align:center;">Kegiatan Terstruktur
                              (latihan simulasi dan bermain peran, proyek, presentasi, lembar kegiatan)
                              </td>
                              <td style="width:11%;text-align:center;">Tanya Jawab
                              (pertanyaan tertulis, wawancara, asesmen diri, tanya jawab lisan, angket, ujian lisan atau tertulis)
                              </td>
                              <td style="width:11%;text-align:center;">Verifikasi Portofolio
                              (sampel pekerjaan yang disusun oleh Asesi, produk dengan dokumentasi pendukung, bukti sejarah, jurnal atau buku catatan, informasi tentang pengalaman hidup)
                              </td>
                              <td style="width:11%;text-align:center;">Review Produk
                              (testimoni dan laporan dari atasan, bukti pelatihan, otentikasi pencapaian sebelumnya, wawancara dengan atasan, atau rekan kerja)
                              </td>
                              <td style="width:11%;text-align:center;">Lainnya</td>
                            </tr>
                            <tr>
                              <td style="width:14%;font-weight:bold;"> Elemen Kompetensi </td>
                              <td colspan="10" style="width:69%;"></td>
                            </tr>';
              }
              $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" cellpadding="5" cellspacing="5">
                              <tr>
                              <td rowspan="2" style="width:14%;font-weight:bold;"> Unit Kompetensi </td>


                              <td style="width:11%;text-align:center;;"> Kode Unit </td>
                              <td style="width:3%;text-align:center;"> : </td>
                              <td colspan="9" style="width:55%;">' . $value->id_unit_kompetensi . '</td>
                           </tr>
                           <tr>
                              <td style="width:11%;text-align:center;border-left:0px;"> Judul Unit </td>
                              <td style="width:3%;text-align:center;"> : </td>
                              <td colspan="9" style="width:55%;">' . $value->unit_kompetensi . '</td>
                            </tr>
                            ' . $detail_elemen . '
                          </table><br/>';
          }
          //'.//$detail_elemen.'
          $data['unit_mak'] = $unit_mak;
          $data['elemen_kuk'] = $elemen_kuk;

          $data['kode_unit'] = $kode_unit;
          $data['unit'] = $unit;
          $data['asesor_pra_asesmen'] = $this->pra_asesmen_model->asesor_pra_asesmen($data['data_asesi']->pra_asesmen_checked);
          $data['ttd_asesor'] = $data['asesor_pra_asesmen']->users." - ".$data['asesor_pra_asesmen']->no_reg."\r\n\n\n".$data['aplikasi']->url_aplikasi."/qrcode/asesor/".$data['data_asesi']->pra_asesmen_checked;

          $view = $this->load->view('rencana_asesmen/cetak_mapa01',$data , true);
          if($type=="pdf") {

              $this->load->library("htm12pdf");
              ini_set('memory_limit', '51208M');
              $this->htm12pdf->pdf_create($view, "data_asesi" . date('YmdHis') . ".pdf", false, true);
          }
      }
      function instrumen_asesmen($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->rencana_asesmen_model->set_validation()->validate();
            $id_asesi = $_POST['id'];
            // var_dump($id_asesi); die();
            if ($data !== false) {
                if ($this->rencana_asesmen_model->check_unique($data, intval($id_asesi))) {
                    if ($this->rencana_asesmen_model->update(intval($id_asesi), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->rencana_asesmen_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $asesi = $this->pra_asesmen_model->get(intval($id));
            // var_dump($asesi); die();

            if (sizeof($asesi) == 1) {

              $asesi_uji = $this->pra_asesmen_model->asesi_detail_uji($id);

              if (sizeof($asesi_uji) == 0) {
                echo json_encode(array('msgType' => 'warning', 'msgValue' => 'MAPA 01 BELUM SELESAI'));
              }else {
                  $data = $this->pra_asesmen_model->get_single($asesi_uji);

                    $view = $this->load->view(
                      'rencana_asesmen/instrumen_asesmen',
                        array(
                          'data' => $asesi_uji,
                          'data_asesi' => $asesi,
                        ),
                        TRUE
                    );
                    echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
              }

            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }
    function cetak_mapa02($id,$type = "pdf") {
        $this->load->model('asesi_model');
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->db->select('a.*,b.nama_lengkap,b.skema_sertifikasi,c.skema,c.kode_skema');
        $this->db->from(kode_lsp().'asesi_uji a');
        $this->db->join(kode_lsp().'asesi b','a.id_asesi=b.id');
        $this->db->join(kode_lsp().'skema c','b.skema_sertifikasi=c.id');
        $this->db->where('a.id',$id);
        $data_asesi = $this->db->get()->row();
        // dump($data_asesi->skema);
        $data['data_asesi'] = $data_asesi;

        // $asesi = $this->asesi_model->data_asesi($id);
        // $data['data_asesi'] = $asesi;
        $asesi_detail = $this->asesi_model->asesi_detail($id);
        $data['asesi_detail'] = $asesi_detail;
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($data_asesi->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $kode_unit = '';
        $unit = '';
        foreach($unit_kompetensi as $key=>$value){
            $kode_unit.=($key+1).'. '.$value->id_unit_kompetensi.'<br/>';
            $unit.=($key+1).'. '.$value->unit_kompetensi.'<br/>';
        }
        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;

        $view = $this->load->view('rencana_asesmen/cetak_mapa02',$data , true);
        if($type=="pdf") {
            $this->load->library("htm12pdf");
            ini_set('memory_limit', '51208M');
            $this->htm12pdf->pdf_create($view, "data_asesi" . date('YmdHis') . ".pdf", false, true);
        }
    }
    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roles = $this->pra_asesmen_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->pra_asesmen_model->delete(intval($id))) {
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
    function combogrid($id = false)
    {
        $this->load->model('v_pra_asesmen_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows')) ;
        $page = intval($this->input->post('page'))== 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return'=>'data');
        if(isset($_POST['q']))
        {
            $where['asesi_name LIKE'] = "%" . $this->input->post('q') . "%";
        }
        if(isset($where)) $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->v_pra_asesmen_model->count_by($where) : $this->v_pra_asesmen_model->count_all();
        $this->v_pra_asesmen_model->limit($row, $offset);
        $order_criteria = "ASC";
        $_order_escape = TRUE;
        if($id)
        {
            $order = "FIELD(id, " . intval($id) . ")";
            $order_criteria = "DESC";
            $_order_escape = FALSE;
        }
        else
        {
            $order = $this->v_pra_asesmen_model->get_params('_order');
        }
        $rows = isset($where) ? $this->v_pra_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->v_pra_asesmen_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->v_pra_asesmen_model->get_selected()->data_formatter($rows);

        echo json_encode($data);
    }
    function view($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }


            $asesi = $this->pra_asesmen_model->get(intval($id));
            if (sizeof($asesi) == 1) {
                $this->db->where('asesi_id',$id);
                $detail_asesi = $this->db->get(kode_lsp().'asesi_detail')->result_array();
                //$bukti_pendukung = array_unique($detail_asesi); 'bukti_pendukung'=>$bukti_pendukung,
                $view = $this->load->view('pra_asesmen/view', array('detail_asesi'=>$detail_asesi,'data' => $this->pra_asesmen_model->get_single($asesi),'pra_asesmen' => array('-Pilih-', 'Lanjut', 'Tidak Lanjut'),'jenis_kelamin'=>array('-Pilih-','Pria','Wanita')), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    function sms($id_users,$pesan,$rekomendasi){
        //var dt = {id_users:id_users,rekomendasi:rekomendasi,pra_asesmen_description:pra_asesmen_description};

         if($rekomendasi==1){
            $rekomendasi_asesor = 'Lanjut';
            //Pesan untuk admin

            $datax['sender_id'] = $id_users;
            $datax['reciepent_id'] = 1 ;
            $datax['title'] = 'Hasil Pra Asesmen Lanjut' ;
            $datax['message'] = 'Hasil Pra Asesmen Lanjut dan masuk ke tahap administrasi' ;

            $this->load->model('Pesan_Model');
            $this->Pesan_Model->insert($datax);
            $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
            smssend($admin->sms_center,$datax['message']);
        }else if($rekomendasi==2){
            $rekomendasi_asesor = 'Tidak Lanjut';
        }else{
            $rekomendasi_asesor = 'Belum ada rekomendasi';
        }

        $pesan = 'Hasil Pra Asesmen anda adalah '.$rekomendasi_asesor.'. '.$pesan;

        $this->db->where('id',$id_users);
        $row = $this->db->get('t_users')->row();

        $data['sender_id'] = $this->auth->get_user_data()->id;
        $data['reciepent_id'] = $id_users ;
        $data['title'] = 'Hasil Pra Asesmen' ;
        $data['message'] = $pesan ;

        $this->load->model('Pesan_Model');
        $this->Pesan_Model->insert($data);
        return smssend($row->hp,$pesan);

        //return smssend($row->hp,$pesan);
    }
    function download($id = false)
    {
        if(!$id)
        {
            block_access_method();
        }
        else
        {
            if($_SERVER['REQUEST_METHOD'] == "GET")
            {
                $zip = new ZipArchive();
                $zip->open('share/asesi/lampiran_' . $id . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
                $files_asesi = $this->asesi_model->files_asesi($id);
                foreach ($files_asesi as $key => $pendukung) {
                             $zip->addFile('/var/www/_tera_byte/public_html/share/asesi/'.$pendukung->nama_file, $pendukung->nama_file);
                }
                $zip->close();
                $nama_files = substr(__dir__,0, strpos( __dir__,"application")) . 'share/asesi/lampiran_' . $id.'.zip';
                header('Cache-Control: public');
                header('Content-Disposition: attachment; filename="lampiran_' . $id . '.zip"');
                readfile($nama_files);
                die();

            }
        }
    }
    public function upload($id) {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $save_folder = $data['aplikasi']->path.$id;

        if (!file_exists($save_folder)) {
           mkdir($data['aplikasi']->path.$id);
        }



        $targetPath = getcwd() . '/assets/temp/'.$id.'/';
        $targetFile = $targetPath . $fileName ;
        move_uploaded_file($tempFile, $targetFile);
        }
    }
    function cetak($id,$type = "pdf",$rekomendasi="") {
          if($rekomendasi==1){
          $hasil_rekomendasi_asesor = 'Lanjut ke Proses Asesmen!';
        }else if($rekomendasi==2){
          $hasil_rekomendasi_asesor = 'Tidak Lanjut ke Proses Asesmen!';
        }else {
          $hasil_rekomendasi_asesor = '';
        }

        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['array_catatan_apl01'] =  explode('|',$data['aplikasi']->opsi_rekomendasi_apl1);

        $this->load->model('asesi_model');
        //$this->load->model('real_asesmen_model');
        $this->db->select('a.*,b.skema,b.kode_skema,c.alamat as alamat_tuk,c.telp as telp_tuk,c.tuk,d.tanggal as tanggal_mulai,d.tanggal_akhir,e.*');
        $this->db->from(kode_lsp().'asesi a');
          $this->db->where('a.id',$id);
        $this->db->join(kode_lsp().'skema b','a.skema_sertifikasi=b.id');
        $this->db->join(kode_lsp().'jadual_asesmen d','a.jadwal_id=d.id');
        $this->db->join(kode_lsp().'tuk c','d.id_tuk=c.id','LEFT');
        $this->db->join('t_users e','e.id=a.id_users');
        $asesi = $this->db->get()->row();

        $data['data_asesi'] = $asesi;

        $this->db->where('id_users',$asesi->id_users);
        $this->db->where('is_work','1');

        $data_pekerjaan = $this->db->get('t_users_pekerjaan')->row();
        if(count($data_pekerjaan) > 0){
          $data['data_pekerjaan'] = $data_pekerjaan ;
        }else{
          $data['data_pekerjaan'] = "";
        }

        //$this->db->where('prov_id',$data_pekerjaan->id_provinsi);
        //$data_provinsi = $this->db->get('mst_provinsi')->row();
        $data['data_provinsi'] = '$data_provinsi' ;

        //$this->db->where('id_asesi',$this->id);
        //$portofolio = $this->db->get('t_asesi_portofolio')->result();

        //$data[] = $this
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($asesi->skema_sertifikasi);
        $data['unit_kompetensi'] = $unit_kompetensi;
        $asesi_detail = $this->asesi_model->asesi_detail($id);
        $data['asesi_detail'] = $asesi_detail;
        $this->db->where('asesi_id',$id);
        $data['detail_asesi'] = $this->db->get(kode_lsp().'asesi_detail')->result();
        //dump($data['detail_asesi']);
/*        echo "<pre>";
        print_r($data['asesi_detail']);
        echo "</pre>";*/
        //Nama Asesor dan No reg
        $this->db->where('id',$asesi->id_asesor);
        $data_asesor = $this->db->get(kode_lsp().'users')->row();

        $this->db->where('id',$id);
        $data['unit_res'] = $this->db->get(kode_lsp().'unit_kompetensi')->row();

        $this->db->select('b.nama_dokumen');
        $this->db->from('t_asesi_portofolio a');
        $this->db->join('t_repositori b','a.id_repositori=b.id');
        $this->db->where('a.id_asesi',$id);
        $this->db->group_by('b.nama_dokumen');
        $portofolio = $this->db->get()->result();

        if(count($portofolio)>0){
                $bukti_pendukung = "<div style='width:150px'><ol style='margin-left:-5px; padding:-10px'> ";
                foreach($portofolio as $value){
                    $bukti_pendukung .= "<li>".$value->nama_dokumen."</li>";
                    //$bukti[]=$value->nama_dokumen;
                }
                $bukti_pendukung .= "</ol></div>";

            //foreach ($portofolio as $key => $value) {
            //    $array_portofolio[] = $value->nama_dokumen ;
            //}
            $data['implode_portofolio'] = $bukti_pendukung;
        }else{
            $data['implode_portofolio'] = "";
        }

        $data['nama_asesor'] = $data_asesor->users;
        $data['no_reg_asesor'] = $data_asesor->no_reg;
        $kode_unit = '';
        $unit = '';
        $elemen_kuk ="";
        $unit_mak ="";

        $this->db->select('v,a,t,m');
        $this->db->where('asesi_id',$id);
        $detail_asesi = $this->db->get(kode_lsp().'asesi_detail')->result_array();
        //dp($detail_asesi[0]['v']);die();
        $data['apl02'] = $this->apl02($unit_kompetensi,$data['implode_portofolio'],$id,$detail_asesi);

        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['qr_asesi'] = $asesi->nama_lengkap." - ".$asesi->no_uji_kompetensi."\r\n\n\n".$data['aplikasi']->url_aplikasi."/qrcode/asesi/".$id;
        $this->load->model('pra_asesmen_model');
        $data['asesor_pra_asesmen'] = $this->pra_asesmen_model->asesor_pra_asesmen($asesi->pra_asesmen_checked);
        $data['ttd_asesor'] = $data['asesor_pra_asesmen']->users." - ".$data['asesor_pra_asesmen']->no_reg."\r\n\n\n".$data['aplikasi']->url_aplikasi."/qrcode/asesor/".$asesi->pra_asesmen_checked;
        $bukti_pendukung = str_replace('"', '|', $asesi->bukti_pendukung);
        $isbn = unserialize($asesi->isbn);
        $bukti_persyaratan = array();
        if(count($isbn) > 0){
            foreach ($isbn as $key=>$value){
                $bukti_persyaratan[]=$value;
            }

            $jenis_bukti = 'ISBN '.@implode('<br/>, ', $bukti_persyaratan);
           // die();
            $data['jenis_bukti'] = $jenis_bukti;
        }else{
            foreach($bukti_pendukung as $keyss=>$valuess){
                //var_dump($keyss);
                $bukti_persyaratan[] = $keyss;
            }
            $jenis_bukti = @implode(',', $bukti_persyaratan);
            //dump($jenis_bukti);
             $data['jenis_bukti'] = $jenis_bukti;
        }

        $view = $this->load->view('pra_asesmen/cetak_asesi',$data , true);
       if($type=="pdf") {
            $this->load->library("htm12pdf");
            $this->htm12pdf->pdf_create($view, "data_asesi" . date('YmdHis') . ".pdf", false, true);

        }
    }
    function apl02($unit_kompetensi,$jenis_bukti,$id,$detail_asesi){
        $kode_unit = '';
        $unit = '';
        $elemen_kuk ="";
        $unit_mak ="";
        $index_kuk = 0;

        foreach($unit_kompetensi as $key=>$value){
            $kode_unit.=($key+1).'. '.$value->id_unit_kompetensi.'<br/>';
            $unit.=($key+1).'. '.$value->unit_kompetensi.'<br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            $detail_elemen = "";
            if(count($query_elemen) > 0){
            foreach($query_elemen as $keys=>$values){
               $query_kuk = $this->asesi_model->kuk($values->id);
                if(count($query_kuk)>0){
                $detail_kuk="";
                foreach($query_kuk as $k=>$v){
                    $checklist_v = $detail_asesi[$index_kuk]['v'] == '1' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
                    $checklist_a = $detail_asesi[$index_kuk]['a'] == '1' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
                    $checklist_t = $detail_asesi[$index_kuk]['t'] == '1' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
                    $checklist_m = $detail_asesi[$index_kuk]['m'] == '1' ? '<img style="width: 10px;" src="'.base_url().'assets/img/cl.png" />' : '';
                    $detail_kuk.='
                <tr>
                    <td style="width:7%;text-align:center;">'.($keys+1).'.'.($k+1).'</td>
                    <td style="width: 40%;" >'.$v->kuk.'</td>
                    <td style="text-align: center;width: 4%;">K</td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="width: 29%;max-width: 45px;display: inline-block;">'.$jenis_bukti.'</td>
                    <td style="width:4%;text-align: center;">'.$checklist_v.'</td>
                    <td style="width:4%;text-align: center;">'.$checklist_a.'</td>
                    <td style="width:4%;text-align: center;">'.$checklist_t.'</td>
                    <td style="width:4%;">'.$checklist_m.'</td>
                </tr>';
                $index_kuk++;
                }
                }
                $detail_elemen .= '  <tr>

    <td colspan="9"><b>Elemen Kompetensi</b> : '.($keys+1).'. '.$values->elemen_kompetensi.'</td>
</tr>
<tr  nobr="true">
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 7%;background-color: #7375D8;">Nomor <br/> KUK</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;background-color: #7375D8;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)</td>
    <td colspan="2" style="text-align: center;font-weight: bold;width: 8%;background-color: #7375D8;">Penilaian</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 29%;background-color: #7375D8;">Bukti-bukti Pendukung</td>
    <td colspan="4" style="text-align: center;font-weight: bold;width: 16%;background-color: #7375D8;">Diisi Asesor</td>
</tr>
<tr  nobr="true">
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">K</td>
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">BK</td>
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">V</td>
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">A</td>
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">T</td>
    <td style="text-align: center;font-weight: bold;background-color: #7375D8;width: 4%;">M</td>
</tr>'.$detail_kuk;
            }
            }else{
                $detail_elemen .= '';
            }
            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr>
                            <td colspan="2" style="width:47%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:53%;">'.$value->id_unit_kompetensi.'</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="width:47%;font-weight:bold;"> Unit Kompetensi </td>
                            <td colspan="7" style="width:53%;">'.$value->unit_kompetensi.'</td>
                          </tr>
                          '.$detail_elemen.'
                        </table><br/>';
            $unit_mak.='<tr>
                            <td colspan="2" style="width:47%">
                            '.$value->unit_kompetensi.'
                            </td>
                            <td style="width:10%">  </td>
                            <td style="width:10%">  </td>
                            <td style="width:33%">  </td>
                          </tr>';

        }
        //'.//$detail_elemen.'
        return $elemen_kuk;
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //$this->load->model('pra_asesmen_model');
            $this->load->library('combogrid');
                $users = $this->combogrid->set_properties(array('model'=>'Vasesi_Users_Model', 'controller'=>'combo_pra_asesmen', 'fields'=>array('nama_user','email','jenis_user'), 'options'=>array('id'=>'pra_asesmen_checked', 'pagination', 'rownumber', 'idField'=>'id', 'textField'=>'nama_user', 'panelWidth'=>500,
                    'queryParams'=>array('name'=>'easui')
                    )))->load_model()->set_grid();

            $view = $this->load->view('asesi/search', array('pra_asesmen_grid' => $users), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));

        } else {
            block_access_method();
        }
    }
}
