<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sertifikasi extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('Sertifikasi_Model');
        $this->load->library('pagination');
    }
    function konfirmasi_pembayaran(){
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row(); 
         //$data['marquee'] = $this->artikel_model->marquee();
        $data['a'] = $this->captcha();
        $data['b'] = $this->captcha();
        $data['c'] = $data['a'] + $data['b'];
        
        $this->session->set_userdata('captcha', $data['c']);
        $this->load->view('templates/bootstraps/header',$data);
        $this->load->view('sertifikasi/vkonfirmasi_pembayaran',$data);
        $this->load->view('templates/bootstraps/bottom');       
    }
     function simpan_konfirmasi(){
        
        $txtcaptcha = $this->input->post('txtcaptcha');
        $txtjumlah_pembayaran = $this->input->post('txtjumlah_pembayaran');
        $txttgl_transfer = $this->input->post('txttgl_transfer');
        $txt_nama_pengirim = $this->input->post('txtemail');
        $txtmessage = $this->input->post('txtmessage');
        $ukuran_file = $_FILES['namafile']['size'];
        $this->db->where('nama_lengkap',$txt_nama_pengirim);
        $this->db->where('jumlah_pembayaran',$txtjumlah_pembayaran);
        $data_asesi = $this->db->get(kode_lsp().'asesi')->row();
        if(count($data_asesi) < 1){
            $this->session->set_flashdata('result', 'Data tidak ditemukan. Pastikan nominal transfer sesuai dengan invoice. Dan nama peserta sesuai dengan nama lengkap peserta pada saat mendaftar!');
                $this->session->set_flashdata('mode_alert', 'danger');
                 redirect('sertifikasi/konfirmasi_pembayaran');
            die();
        }
        //var_dump(round($ukuran_file/1024000,2));die();
        if($ukuran_file > 15728640){
            $size_in_mb = round($ukuran_file/1024000,2).' MB';
            $this->session->set_flashdata('result', 'Maximum file upload 15 MB. ! File anda '.$size_in_mb);
                $this->session->set_flashdata('mode_alert', 'danger');
                 redirect('sertifikasi/konfirmasi_pembayaran');
            die();
        }
        if ($txtcaptcha == $this->session->userdata('captcha')) {
                    $config['upload_path']  = "assets/files/administrasi/";
                    $config['upload_url']   = "assets/files/administrasi/";
                    $config['allowed_types']= '*';
                    $config['max_size']     = '502696982';
                    $config['remove_spaces']=TRUE;
                    $file_name = time().str_replace(' ','_',$_FILES['namafile']['name']);
                    $config['file_name'] = $file_name;
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    
                    if(!$this->upload->do_upload('namafile'))
                     {
                        $this->session->set_flashdata('result', 'Upload Gagal. !');
                        $this->session->set_flashdata('mode_alert', 'danger');
                        redirect('sertifikasi/konfirmasi_pembayaran');
                        die();
                     }
                    $data = array(
                       'tanggal_bayar' => $txttgl_transfer ,
                       'bukti_pembayaran'=> $file_name,
                       'catatan_konfirmasi_pembayaran' =>$txtmessage
                    );
                    $this->db->where('id',$data_asesi->id);
                    if ($this->db->update(kode_lsp().'asesi', $data)) {
                        $this->session->set_flashdata('result', 'Sukses Terkirim, konfirmasi pembayaran anda akan segera kami tindak lanjuti.');
                        $this->session->set_flashdata('mode_alert', 'success');
                         redirect('sertifikasi/konfirmasi_pembayaran');
                    }
            
            
        } else {
            $this->session->set_flashdata('result', 'Validasi input anda salah !');
            $this->session->set_flashdata('mode_alert', 'danger');
                redirect('sertifikasi/konfirmasi_pembayaran');
        }
    }
    function index($id) {
        $data['data'] = $this->artikel_model->detail($id);
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
        //var_dump($data['berita_lainnya']);
        //die();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/index', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function vskema($id = 0, $offset = 0) {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $keyword = $this->input->get('keyword');
        if ($keyword == "") {
            $offset = $this->uri->segment(4);
            $jml = $this->db->get(kode_lsp() . 'skema');
            $data['jmldata'] = $jml->num_rows();
            //pengaturan pagination
            $config['enable_query_strings'] = true;
            $config['base_url'] = base_url() . 'sertifikasi/vskema/' . $id;
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 10;
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['next_page'] = '&laquo;';
            $config['prev_page'] = '&raquo;';
            $config['uri_segment'] = 4;
            //inisialisasi config
            $this->pagination->initialize($config);
            //buat pagination
            $data['halaman'] = $this->pagination->create_links();
            $data['data'] = $this->Sertifikasi_Model->get_all_skema($config['per_page'], $offset);
        } else {
            $offset = $this->uri->segment(3);
            $this->db->like('skema', $keyword);
            $jml = $this->db->get(kode_lsp() . 'skema');
            $data['jmldata'] = $jml->num_rows();

            //pengaturan pagination
            $config['enable_query_strings'] = true;
            if (!empty($keyword)) {
                $config['suffix'] = "?keyword=" . $keyword;
            }

            $config['base_url'] = base_url() . 'sertifikasi/vskema/' . $id;
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 10;
            $config['first_page'] = 'Awal';
            $config['last_page'] = 'Akhir';
            $config['next_page'] = '&laquo;';
            $config['prev_page'] = '&raquo;';
            $config['uri_segment'] = 4;
            //inisialisasi config
            $this->pagination->initialize($config);
            //buat pagination
            $data['halaman'] = $this->pagination->create_links();
            $data['data'] = $this->Sertifikasi_Model->get_all_skema($config['per_page'], $offset, $keyword);
            //var_dump($data['data']);
        }
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vskema', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function vskema_detail($id) {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
        $data['unit_kompetensi'] = $this->Sertifikasi_Model->get_detail_skema($id);

        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vskema_detail', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function facebook() {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vfacebook');
        $this->load->view('templates/bootstraps/bottom');
    }

    function faq() {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['faq'] = $this->db->get('t_faq')->result();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vfaq', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function detail_faq($id) {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->db->where('id', $id);
        $data['faq'] = $this->db->get('t_faq')->row();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vdetail_faq', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function link_terkait() {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/vlink_terkait', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function views($id) {
        $data['data'] = $this->artikel_model->detail($id);
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
        //var_dump($data['berita_lainnya']);
        //die();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('sertifikasi/index', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function proses() {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/proses';
        $template_bottom = 'templates/responsive/footer';

        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function view() {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/view';
        $template_bottom = 'templates/responsive/footer';

        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();

        $riwayat_sertifikasi = $this->Sertifikasi_Model->riwayat_sertifikasi($row->pegawai_id);
        //var_dump($riwayat_sertifikasi);die();
        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'riwayat_sertifikasi' => $riwayat_sertifikasi));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function detail($id) {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/detail';
        $template_bottom = 'templates/responsive/footer';
        $detail_sertifikasi = $this->Sertifikasi_Model->detail_sertifikasi($id);
        //var_dump($detail_sertifikasi);die();
        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'detail_sertifikasi' => $detail_sertifikasi, 'id' => $id));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function detail_asesmen($id) {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/detail_asesmen';
        $template_bottom = 'templates/responsive/footer';

        $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_asesmen($id, $this->id);
        $this->load->model('bukti_pendukung_model');
        $detail_repositori = $this->bukti_pendukung_model->row_bukti_pendukung($this->id);
        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'detail_asesmen' => $detail_asesmen, 'detail_repositori' => $detail_repositori, 'id' => $id));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function save_mandiri() {
        $is_kompeten = $this->input->post('is_kompeten');
        //dump($is_kompeten);die();
        //$this->input->post('txt_bukti_pendukung');
        //var_dump($txt_bukti_pendukung);die();
        $data_kuk = $this->input->post('data_kuk');
        $data_unitkompetensi = $this->input->post('data_unitkompetensi');
        $data_elemen_kompetensi = $this->input->post('data_elemen_kompetensi');
        $data_id_unit_kompetensi = $this->input->post('data_id_unit_kompetensi');

        $id_asesi = $this->input->post('id_asesi');
        //dump($id_asesi);die();
        $hidden_bukti = $_POST['hidden_bukti'];
        //var_dump($hidden_bukti_pendukung);die();
        $asesi_detail = kode_lsp() . 'asesi_detail';
        //Hapus data detail yang sudah ada sebelumnya
        $this->db->where('asesi_id', $id_asesi);
        $this->db->delete($asesi_detail);
        //var_dump($data_kuk); die();
        //Insert ke asesi detail
        foreach ($data_kuk as $key => $value) {
            //$txt_bukti_pendukung = $_POST['txt_bukti_pendukung'.$key];
            $data_detail = array(
                'asesi_id' => $id_asesi,
                'unit_kompetensi_id' => $data_unitkompetensi[$key],
                'jenis_bukti' => $hidden_bukti,
                'is_kompeten' => $is_kompeten[$key][$key],
                'elemen' => $value,
                'elemen_kompetensi' => $data_elemen_kompetensi[$key],
                'kode_unit' => $data_id_unit_kompetensi[$key],
            );
            $this->db->insert($asesi_detail, $data_detail);
        }


        $array_update_asesi = array(
            'hasil_mandiri' => serialize($is_kompeten),
            //'bukti_mandiri' => serialize($txt_bukti_pendukung),
            'complete_praasesmen' => '1',
            'tgl_praasesmen' => date('Y-m-d H:i:s'),
                //'invoice_no' => $id_asesi . '/INV-SERT/LSP-KS/' . date('Y')
        );
        $this->db->where('id', $id_asesi);
        $this->db->update(kode_lsp() . 'asesi', $array_update_asesi);
        redirect(base_url());
    }

    function detail_asesmen_update() {
        $nama_pekerjaan = $_POST['group-a'];
        //var_dump($nama_pekerjaan);
        //die();
        //$id_asesi = $this->input->post
        $this->db->where('id_asesi', $nama_pekerjaan[0]['id_asesi']);
        $this->db->delete('t_asesi_portofolio');
        foreach ($nama_pekerjaan as $key => $value) {
            if ($value['id_repositori'] != "") {
                if ($key == 0) {
                    $id_asesi = $value['id_asesi'];
                }
                $data_array = array('id_repositori' => $value['id_repositori'],
                    'deskripsi' => $value['deskripsi'],
                    'id_asesi' => $id_asesi);
                $this->db->insert('t_asesi_portofolio', $data_array);
            }
        }
        $this->db->where('id', $nama_pekerjaan[0]['id_asesi']);
        $this->db->update(kode_lsp() . 'asesi', array('complete_portofolio' => '1'));
        redirect('sertifikasi/detail_asesmen/' . $nama_pekerjaan[0]['id_asesi']);
    }

    function asesmen_mandiri($id = false) {
        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/asesmen_mandiri';
        $template_bottom = 'templates/responsive/footer';

        $table_asesmen_mandiri = $this->table_asesmen_mandiri();

        $this->load->view($template_header, array('aplikasi' => $this->aplikasi, 'query_pesan' => $this->query_pesan, 'query_pesan_unread' => $this->query_pesan_unread));
        $this->load->view($template_body, array('aplikasi' => $this->aplikasi, 'unread_message' => $this->unread_message, 'menus' => $this->menus, 'rolename' => $this->auth->get_rolename(), 'nama_user' => $this->auth->get_user_data()->nama, 'table_asesmen_mandiri' => $table_asesmen_mandiri, 'id' => $id));
        $this->load->view($template_bottom, array('aplikasi' => $this->aplikasi));
    }

    function table_asesmen_mandiri() {
        // $id = $this->uri->segment(3);
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';

        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();

        $this->db->where('id', $row->pegawai_id);
        $row_skema = $this->db->get(kode_lsp() . 'asesi')->row();



        //var_dump($bukti_pendukung);die();
        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", "1");
        $d = $this->db->get()->result();
        /*        echo "<pre>";
          print_r($d);
          echo "</pre>";
          die(); */
        $this->db->where('asesi_id', $row->pegawai_id);
        $detail_asesi = $this->db->get(kode_lsp() . 'asesi_detail')->result_array();

        //var_dump($detail_asesi);die();
        $this->db->where('id_asesi', $this->id);
        $row_bukti = $this->db->get('t_repositori')->result();
        $implode_bukti = count($row_bukti) > 0 ? implode(',', create_array($row_bukti, 'nama_dokumen')) : "";


        $table = '<input type="hidden" name="id_asesi" value="' . $row->pegawai_id . '" /><input type="hidden" name="hidden_bukti" value="' . $implode_bukti . '" /><table  width="100%" class="table table-stripped table-bordered" border="1" style="background-color:#fff">
        <tr align="center" style="font-weight:bold;">

            <td  align="center" style="width:5%"> No </td>
            <td style="width:10%"> Kode Unit </td>
            <td style="width:40%"> Judul Unit Kompetensi / Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>
            <td width="30px" align="center"> K<br/>

                <input type="checkbox" id="all_k" name="all_k" />
            </td>
            <td style="width:5%;" align="center"> BK<br/>
                <input type="checkbox" id="all_bk" name="all_k" /> </td>

                <td> Bukti Pendukung </td>
            <td>V</td>
            <td>A</td>
            <td>T</td>
            <td>M</td>

            </tr>';
        $no = 1;
        $nomor = 1;
        $real_unit = "";
        $real_elemen = "";
        //var_dump($d);
        foreach ($d as $key => $value) {

            if (count($detail_asesi) > 0) {
                //var_dump($detail_asesi[$key]);die();
                $v = $detail_asesi[$key]['v'] == '1' ? 'V' : '';
                $a = $detail_asesi[$key]['a'] == '1' ? 'A' : '';
                $t = $detail_asesi[$key]['t'] == '1' ? 'T' : '';
                $m = $detail_asesi[$key]['m'] == '1' ? 'M' : '';
                $checked_k = $detail_asesi[$key]['is_kompeten'] == 'k' ? 'checked' : '';
                $checked_bk = $detail_asesi[$key]['is_kompeten'] == 'bk' ? 'checked' : '';
            } else {
                $v = '';
                $a = '';
                $t = '';
                $m = '';
            }


            if ($real_unit == $value->id_unit_kompetensi) {
                if ($real_elemen != $value->id_elemen_kompetensi) {
                    $table .= ' <tr style="font-weight:normal;">

                   <td align="center"></td>
                   <td></td>
                   <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                   <td> </td>
                   <td> </td>
                   <td colspan="5">

                   </td>
               </tr>';
                    //if($real_elemen == $value->id_elemen_kompetensi){
                    $table .= ' <tr style="font-weight:normal;">
               <td align="center"></td>
               <td></td>
               <td> ' . ltrim($value->kuk) . ' </td>
               <td align="center">
                <input type="hidden" name="data_kuk[]" value="' . $value->kuk . '" />
                <input type="hidden" name="data_unitkompetensi[]" value="' . $value->unit_kompetensi . '" />
                <input type="hidden" name="data_elemen_kompetensi[]" value="' . $value->elemen_kompetensi . '" />
                <input type="hidden" name="data_id_unit_kompetensi[]" value="' . $value->id_unit_kompetensi . '" />
               <input ' . $checked_k . ' type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
               <td align="center"> <input ' . $checked_bk . ' type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>

               <td class="select_bukti"> ' . $implode_bukti . '

               </td>
               <td>' . $v . '</td>
               <td>' . $a . '</td>
               <td>' . $t . '</td>
               <td>' . $m . '</td>
           </tr>';
                } else {

                    $table .= ' <tr style="font-weight:normal;">
        <td align="center"></td>
        <td>
            <input type="hidden" name="data_kuk[]" value="' . $value->kuk . '" />
            <input type="hidden" name="data_unitkompetensi[]" value="' . $value->unit_kompetensi . '" /></td>
            <input type="hidden" name="data_elemen_kompetensi[]" value="' . $value->elemen_kompetensi . '" />
            <input type="hidden" name="data_id_unit_kompetensi[]" value="' . $value->id_unit_kompetensi . '" />
        <td> ' . ltrim($value->kuk) . ' </td>
        <td align="center"> <input ' . $checked_k . ' type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
        <td align="center"> <input type="radio" ' . $checked_bk . ' required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>

        <td class="select_bukti"> ' . $implode_bukti . '

        </td>
               <td>' . $v . '</td>
               <td>' . $a . '</td>
               <td>' . $t . '</td>
               <td>' . $m . '</td>
    </tr>';
                }
            } else {
                $table .= ' <tr>
    <td align="center"> ' . $no . ' </td>
    <td> ' . $value->id_unit_kompetensi . ' </td>
    <td> <b>' . $value->unit_kompetensi . '</b> </td>
    <td align="center"> </td>
    <td align="center"> </td>
    <td colspan="5">
    </td>
</tr>';
                $table .= ' <tr style="font-weight:normal;">
<td align="center"></td>
<td></td>
<td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
<td> </td>
<td> </td>
<td colspan="5">
</td >
</tr>';
                $table .= ' <tr style="font-weight:normal;">
<td align="center"></td>
<td>
    <input type="hidden" name="data_kuk[]" value="' . $value->kuk . '" />
    <input type="hidden" name="data_unitkompetensi[]" value="' . $value->unit_kompetensi . '" />
    <input type="hidden" name="data_elemen_kompetensi[]" value="' . $value->elemen_kompetensi . '" />
    <input type="hidden" name="data_id_unit_kompetensi[]" value="' . $value->id_unit_kompetensi . '" />
</td>
<td> ' . ltrim($value->kuk) . ' </td>
<td align="center"> <input type="radio" ' . $checked_k . ' required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
<td align="center"> <input type="radio" ' . $checked_bk . ' required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>

<td class="select_bukti"> ' . $implode_bukti . '

</td>
<td>' . $v . '</td>
<td>' . $a . '</td>
<td>' . $t . '</td>
<td>' . $m . '</td>
</tr>';
                $no++;
            }
            $real_unit = $value->id_unit_kompetensi;
            $real_elemen = $value->id_elemen_kompetensi;
            $nomor++;
        }
        $table .= '</table>';
        return $table;
    }

    function table_asesmen_mandiris() {
        //$id = $this->uri->segment(3);
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';

        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();

        $this->db->where('id', $row->pegawai_id);
        $row_skema = $this->db->get(kode_lsp() . 'asesi')->row();

        $this->db->where('id_asesi', $this->id);
        $row_bukti = $this->db->get('t_repositori')->result();
        $implode_bukti = count($row_bukti) > 0 ? implode(',', create_array($row_bukti, 'nama_dokumen')) : "";

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", $row_skema->skema_sertifikasi);
        $d = $this->db->get()->result();
        $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
                        <tr align="center" style="font-weight:bold;">
                            <td  align="center"> No </td>
                            <td> Kode Unit </td>
                            <td> Judul Unit Kompetensi / Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>
                            <td width="30px" align="center"> K<br/>
                            <input type="checkbox" id="all_k" name="all_k" />
                            </td>
                            <td width="30px" align="center"> BK<br/>
                            <input type="checkbox" id="all_bk" name="all_k" /> </td>
                            <td> Bukti Pendukung </td>
                        </tr>';
        $no = 1;
        $real_unit = "";
        $real_elemen = "";
        foreach ($d as $key => $value) {
            if ($real_unit == $value->id_unit_kompetensi) {
                if ($real_elemen != $value->id_elemen_kompetensi) {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                            <td> </td>
                            <td> </td>
                            <td>
                            </td>
                          </tr>';
                    //if($real_elemen == $value->id_elemen_kompetensi){
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
                            <td class="select_bukti">' . $implode_bukti . '
                            </td>
                          </tr>';
                } else {

                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
                            <td class="select_bukti"> ' . $implode_bukti . '
                            </td>
                          </tr>';
                }
            } else {
                $table .= ' <tr>
                            <td align="center"> ' . $no . ' </td>
                            <td> ' . $value->id_unit_kompetensi . ' </td>
                            <td> <b>' . $value->unit_kompetensi . '</b> </td>
                            <td align="center"> </td>
                            <td align="center"> </td>
                            <td>
                            </td>
                          </tr>';
                $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                            <td> </td>
                            <td> </td>
                            <td>
                            </td>
                          </tr>';
                $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
                            <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
                            <td class="select_bukti"> ' . $implode_bukti . '
                            </td>
                          </tr>';
                $no++;
            }
            $real_unit = $value->id_unit_kompetensi;
            $real_elemen = $value->id_elemen_kompetensi;
        }
        $table .= '</table>';
        return $table;
    }

    function asesmen() {
        //var_dump($id);die();
        $this->load->model('bukti_pendukung_model');

        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/detail_rekomendasi_asesmen';
        $template_bottom = 'templates/responsive/footer';

        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();

        $this->load->model('asesi_model');
        $data['unit_kompetensi'] = $this->asesi_model->data_unit_kompetensi('1');
        $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_jadwal($row->pegawai_id, $this->id);
        //var_dump($detail_asesmen->mak04);die();

        $data['mak05'] = unserialize($detail_asesmen->mak05);
        $data['mak05a'] = unserialize($detail_asesmen->mak05a);
        $data['mak03'] = unserialize($detail_asesmen->mak03);
        $data['mak04'] = unserialize($detail_asesmen->mak04);
        $data['mak04a'] = unserialize($detail_asesmen->mak04a);

        //var_dump($mak04);die();
        $data['id'] = $row->pegawai_id;
        $data['detail_asesmen'] = $detail_asesmen;
        $data['query_pesan'] = $this->query_pesan;
        $data['query_pesan_unread'] = $this->query_pesan_unread;
        $data['aplikasi'] = $this->aplikasi;

        //$data['minimal_syarat_pendaftaran'] = $minimal_array_skema;

        $this->load->view($template_header, $data);
        $this->load->view($template_body, $data);
        $this->load->view($template_bottom, $data);
    }

    function save_asesmen() {
        $mak05 = serialize($this->input->post('mak05'));
        $mak05a = serialize($this->input->post('mak05a'));
        $mak03 = serialize($this->input->post('mak03'));

        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();

        $this->db->where('id', $row->pegawai_id);
        $array = array(
            'mak05' => $mak05,
            'mak05a' => $mak05a,
            'mak03' => $mak03
        );
        $this->db->update(kode_lsp() . 'asesi', $array);
        redirect('sertifikasi/asesmen');
    }

    function detail_sertifikat() {
        //var_dump($id);die();
        $this->load->model('Sertifikasi_Model');
        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();
        $id = $row->pegawai_id;
        $this->load->model('bukti_pendukung_model');

        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/detail_sertifikat';
        $template_bottom = 'templates/responsive/footer';

        $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_jadwal($id, $this->id);
        //var_dump($detail_asesmen);die();
        $data['id'] = $id;
        $data['detail_asesmen'] = $detail_asesmen;
        $data['query_pesan'] = $this->query_pesan;
        $data['query_pesan_unread'] = $this->query_pesan_unread;
        $data['aplikasi'] = $this->aplikasi;

        //$data['minimal_syarat_pendaftaran'] = $minimal_array_skema;
        $this->load->view($template_header, $data);
        $this->load->view($template_body, $data);
        $this->load->view($template_bottom, $data);
    }

    function detail_pengiriman() {
        //var_dump($id);die();
        $this->load->model('bukti_pendukung_model');
        $this->db->where('id', $this->id);
        $this->db->where('jenis_user', '1');
        $row = $this->db->get('t_users')->row();
        $id = $row->pegawai_id;

        $template_header = 'templates/responsive/header';
        $template_body = 'templates/responsive/sertifikasi/detail_pengiriman';
        $template_bottom = 'templates/responsive/footer';
        $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_jadwal($id, $this->id);
        $data['id'] = $id;
        $data['detail_asesmen'] = $detail_asesmen;
        $data['query_pesan'] = $this->query_pesan;
        $data['query_pesan_unread'] = $this->query_pesan_unread;

        $data['aplikasi'] = $this->aplikasi;
        $this->load->view($template_header, $data);
        $this->load->view($template_body, $data);
        $this->load->view($template_bottom, $data);
    }
    function persetujuan($id)
{
            //var_dump($id);die();
    //$this->load->model('bukti_pendukung_model');

    $template_header = 'templates/responsive/header';
    $template_body = 'templates/responsive/sertifikasi/persetujuan';
    $template_bottom = 'templates/responsive/footer';

    $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_jadwal($id,$this->id);
    $data['mak03'] = unserialize($detail_asesmen->mak03);
            //var_dump($detail_asesmen);die();
    $id_skema = $detail_asesmen->skema_sertifikasi;
    $data['id'] = $id;
    $data['detail_asesmen']=$detail_asesmen;
    $data['query_pesan'] = $this->query_pesan;
    $data['query_pesan_unread']=$this->query_pesan_unread;
    $data['aplikasi']=$this->aplikasi;

        //$data['minimal_syarat_pendaftaran'] = $minimal_array_skema;

    $this->load->view($template_header, $data);
    $this->load->view($template_body, $data);
    $this->load->view($template_bottom, $data);
}
function save_persetujuan(){
    $data['mak03'] = serialize($this->input->post('mak03'));
    $id = $this->input->post('id');
    $this->db->where('id',$id);
    if($this->db->update(kode_lsp().'asesi',$data)){
        $this->session->set_flashdata('result', 'Berhasil Menyimpan');
        $this->session->set_flashdata('mode_alert', 'success');
    }else{
        $this->session->set_flashdata('result', 'Gagal menyimpan data');
        $this->session->set_flashdata('mode_alert', 'warning');
    }
    redirect(base_url().'sertifikasi/persetujuan/'.$id);
}
function banding($id)
{
            //var_dump($id);die();
    //$this->load->model('bukti_pendukung_model');

    $template_header = 'templates/responsive/header';
    $template_body = 'templates/responsive/sertifikasi/banding';
    $template_bottom = 'templates/responsive/footer';

    $detail_asesmen = $this->Sertifikasi_Model->detail_sertifikasi_jadwal($id,$this->id);
    $data['mak02'] = unserialize($detail_asesmen->mak02);
    $data['mak02a'] = unserialize($detail_asesmen->mak02a);
            //var_dump($detail_asesmen);die();
    $id_skema = $detail_asesmen->skema_sertifikasi;
    $data['unit_kompetensi'] = $this->Sertifikasi_Model->unit_kompetensi($id_skema);
    $data['id'] = $id;
    $data['detail_asesmen']=$detail_asesmen;
    $data['query_pesan'] = $this->query_pesan;
    $data['query_pesan_unread']=$this->query_pesan_unread;
    $data['aplikasi']=$this->aplikasi;

        //$data['minimal_syarat_pendaftaran'] = $minimal_array_skema;

    $this->load->view($template_header, $data);
    $this->load->view($template_body, $data);
    $this->load->view($template_bottom, $data);
}
function save_banding(){
    $data['mak02'] = serialize($this->input->post('mak02'));
    $data['mak02a'] = serialize($this->input->post('mak02a'));

    //var_dump($data); die();
    $id = $this->input->post('id');
    $this->db->where('id',$id);
    if($this->db->update(kode_lsp().'asesi',$data)){
        $this->session->set_flashdata('result', 'Berhasil Menyimpan');
        $this->session->set_flashdata('mode_alert', 'success');
    }else{
        $this->session->set_flashdata('result', 'Gagal menyimpan data');
        $this->session->set_flashdata('mode_alert', 'warning');
    }
    redirect(base_url().'sertifikasi/banding/'.$id);
}
}
