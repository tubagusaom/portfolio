<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';
        $this->load->model('welcome_model');
        $this->load->model('artikel_model');
        $this->load->model('album_galeri_model');
        $this->load->model('repositori_model');
        $this->load->model('jadwal_asesmen_model');
        $this->load->model('slider_model');

        $this->load->helper('text');
        $this->load->helper('cookie');
        $this->load->library('curl');
    }

    public function tutorial($id = false)
    {
        $data['class_active'] = 'tutorial';
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->load->view('templates/bootstraps/header', $data);
        if ($id == 1) {
            $view = 'alamat_website';
        } elseif ($id == 2) {
            $view = 'pendaftaran';
        } else {
            $view = 'tutorial';
        }
        $this->load->view('tutorial/' . $view, $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    public function kontak($id = false)
    {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['class_active'] = 'kontak';
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('tutorial/kontak', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    public function faq($id = false)
    {
        $data['marquee'] = $this->artikel_model->marquee();
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['class_active'] = 'faq';
        $data['faq'] = $this->welcome_model->get_data_faq();
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('tutorial/faq', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    public function link_terkait($id = false)
    {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['marquee'] = $this->artikel_model->marquee();

        $data['faq'] = $this->welcome_model->get_data_faq();
        $data['class_active'] = 'link_terkait';
        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('tutorial/link_terkait', $data);
        $this->load->view('templates/bootstraps/bottom');
    }

    function update_counter($slug)
    {
        // return current article views
        $this->db->where('article_slug', urldecode($slug));
        $this->db->select('article_views');
        $count = $this->db->get('articles')->row();

        // then increase by one
        $this->db->where('article_slug', urldecode($slug));
        $this->db->set('article_views', ($count->article_views + 1));
        $this->db->update('articles');
    }

    // public function index()
    // {
    //     if(!$this->auth->is_logged_in())
    //     {
    //         $visitor = $this->initCounter();
    //         $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();
    //         $data['berita_lsp'] = $this->artikel_model->berita_lsp();
    //         $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
    //         $idlsp = kode_lsp();
    //         $data['data_skema'] = $this->welcome_model->data_skema($idlsp);
    //         // var_dump($data['data_skema']); die();
    //         $data['berita_lsp_list'] = $this->artikel_model->berita_lsp_list();
    //         $data['galeri'] = $this->album_galeri_model->all_galeri();
    //         $data['berita_lsp_pilihan'] = $this->artikel_model->berita_lsp_pilihan();
    //         $data['repo'] = $this->repositori_model->repositori();
    //         $data['jadwal'] = $this->jadwal_asesmen_model->get_jadwal_popular();
    //         $data['slideshow'] = $this->slider_model->tampil_slideshow();
    //         $data['logo_lsp'] = $this->artikel_model->logo_lsp();
    //         $data['total_skema'] = $this->welcome_model->total_skema();
    //         $data['total_asesor'] = $this->welcome_model->total_asesor();
    //         $data['total_tuk'] = $this->welcome_model->total_tuk();
    //         $data['pengunjung'] = $this->welcome_model->dataPengunjung();
    //         $data['total'] = $this->welcome_model->totalPengunjung();
    //         $data['rst'] = array();
    //         $this->load->view('templates/bootstraps/header',$data);
    //         $this->load->view('templates/bootstraps/body',$data);
    //         $this->load->view('templates/bootstraps/bottom',$data);
    //     }
    //     else
    //     {
    //         redirect(base_url() . 'home');
    //     }
    // }

    public function index()
    {
        if (!$this->auth->is_logged_in()) {
            $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
            $data['class_active'] = 'home';

            $this->load->view('templates/bootstraps/header', $data);
            $this->load->view('templates/bootstraps/body', $data);
            $this->load->view('templates/bootstraps/bottom', $data);
        } else {
            redirect(base_url() . 'home');
        }
    }

    public function pelatihan()
    {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->load->view('templates/bootstraps/header_pelatihan', $data);
        $this->load->view('templates/bootstraps/body_pelatihan', $data);
        $this->load->view('templates/bootstraps/bottom_pelatihan', $data);
    }

    function uji_kompetensi($id = "")
    {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['data_provinsi'] = $this->db->get('master_provinsi')->result();
        $data['data_kabupaten'] = $this->db->get('master_kabupaten')->result();
        $data['pendidikan'] = $this->db->get('master_pendidikan')->result();
        $data['pekerjaan'] = $this->db->get('master_pekerjaan')->result();
        $data['genre'] = $this->db->get('master_genre')->result();
        $data['sumber_anggaran'] = $this->db->get('master_sumber_anggaran')->result();
        $data['instansi_anggaran'] = $this->db->get('master_instansi_anggaran')->result();
        // var_dump($data['data_provinsi']);die();
        $this->load->model('welcome_model');
        $idlsp = kode_lsp();
        $data['data_skema'] = $this->welcome_model->data_skema($idlsp);
        $data['data_tuk'] = $this->welcome_model->data_tuk($idlsp);
        //        $data['data_jadwal'] = $this->welcome_model->data_jadwal();
        $data['marquee'] = $this->artikel_model->marquee();

        $data['uri'] = $id;
        $this->load->view('uji_kompetensi/ujikom', $data);
    }

    function daftar_ujikom($id = "")
    {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['data_provinsi'] = $this->db->get('master_provinsi')->result();
        $data['data_kabupaten'] = $this->db->get('master_kabupaten')->result();
        $data['pendidikan'] = $this->db->get('master_pendidikan')->result();
        $data['pekerjaan'] = $this->db->get('master_pekerjaan')->result();
        $data['genre'] = $this->db->get('master_genre')->result();
        $data['sumber_anggaran'] = $this->db->get('master_sumber_anggaran')->result();
        $data['instansi_anggaran'] = $this->db->get('master_instansi_anggaran')->result();
        // var_dump($data['data_provinsi']);die();
        $this->load->model('welcome_model');
        $idlsp = kode_lsp();
        $data['data_skema'] = $this->welcome_model->data_skema($idlsp);
        $data['data_tuk'] = $this->welcome_model->tuk($idlsp);
        // $data['data_jadwal'] = $this->welcome_model->data_jadwal();
        // $data['marquee'] = $this->artikel_model->marquee();

        $data['uri'] = $id;

        // var_dump($data['data_tuk']); die();

        $this->load->view('pendaftaran/ujikom', $data);
        // $this->load->view('pendaftaran/test2', $data);
    }

    function get_jadwal()
    {
        $id_tuk = $this->input->post('id', TRUE);
        $data = $this->welcome_model->data_jadwal($id_tuk);
        echo json_encode($data);
    }

    public function upload()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $folder = $this->input->post('folder');
            $targetPath = getcwd() . '/share/temp/' . $folder . '/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
        }
    }

    function uji_kompetensi_skema()
    {
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';
        $id = $this->input->post('id');

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        $this->db->where("a.id", $id);
        $d = $this->db->get()->result();
        $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
           <tr align="center" style="font-weight:bold;">
           <td  align="center"> No </td>
           <td> Kode Unit </td>
           <td> Judul Unit Kompetensi/Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>
           <td width="30px" align="center"> K (Kompeten)<br/>
           <input type="checkbox" id="all_k" name="all_k" />
           </td>
           <td width="30px" align="center"> BK (Belum Kompeten)<br/>
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
                   <td class="select_bukti">
                   </td>
                   </tr>';
                } else {

                    $table .= ' <tr style="font-weight:normal;">
                <td align="center"></td>
                <td></td>
                <td> ' . ltrim($value->kuk) . ' </td>
                <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
                <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
                <td class="select_bukti">
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
            <td class="select_bukti">
            </td>
            </tr>';
                $no++;
            }
            $real_unit = $value->id_unit_kompetensi;
            $real_elemen = $value->id_elemen_kompetensi;
        }
        $table .= '</table>';
        echo $table;
    }

    function uploads($source, $destination)
    {
        $this->load->library('ftp');
        //FTP configuration
        $ftp_config['hostname'] = '128.199.121.184';
        $ftp_config['username'] = 'sammy';
        $ftp_config['password'] = '400485Aa';
        $ftp_config['debug'] = TRUE;
        //Connect to the remote server
        $this->ftp->connect($ftp_config);
        $this->ftp->upload($source, $destination, 'ascii', 0775);
        //Close FTP connection
        $this->ftp->close();
    }

    public function upload_ajax($nmdokumen)
    {
        $this->load->helper('postinger');
        $this->load->library('upload');

        $files = $_FILES['file_data'];
        // $namafile = $nmdokumen . "-" . time() . "_" . $files['name'];
        $namafile = $nmdokumen . "-buktipendukung-" . time();
        $fileupload = $this->upload_allfile('file', $namafile);
        echo $fileupload;
    }

    public function upload_ajax_jawaban($nmdokumen)
    {
        $this->load->helper('postinger');
        $this->load->library('upload');

        $files = $_FILES['file'];
        // $namafile = $nmdokumen . "-" . time() . "_" . $files['name'];
        $namafile = $nmdokumen . "-" . time() . "-lspitk_";
        $fileupload = $this->upload_jawaban('file', $namafile);
        echo $fileupload;
    }

    function delete_ajax($nmdokumen){

        $filepath = "repo/asesi/$nmdokumen";

        // var_dump($filepath); die();

        if (is_file($filepath))
        {
            unlink($filepath);
        }

    }

    function uji_kompetensi_save()
    {
        // $this->load->helper('postinger');
        // $this->load->library('upload');

        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';

        $no_identitas = $this->input->post('no_identitas', true);

        
        $nama_depan = $this->input->post('first-name', true);
        $nama_belakang = $this->input->post('last-name', true);

        $nama_lengkap = $nama_depan . ' ' . $nama_belakang;
        // $pilihan_bukti_pendukung = @serialize($_POST['pilih_array']);
        // $isbn = @serialize($_POST['isbn']);
        $email = $this->input->post('your_email');
        $skema_yang_dipilih = $this->input->post('skema_yang_dipilih', true);

        // Data Upload Bukti Pendukung
        // $post = $_FILES['file_data'];
        $file_data = $this->input->post('file_data', true);
        // Nama Bukti Pendukung
        $nama_dokumen = $this->input->post('nama_dokumen', true);
        // $marketing = $this->input->post('marketing');


        foreach ($nama_dokumen as $key => $value) {
            $array_bukti[$value] = $file_data[$key];
        }

        $pilihan_bukti_pendukung = @serialize($_POST['pilih']);

        // Extract Files POST
        // foreach ($nama_dokumen as $key => $nmdokumen) {
        //     $file_data = array("name" => $post['name'][$key], "type" => $post['type'][$key], "tmp_name" => $post['tmp_name'][$key], "error" => $post['error'][$key], "size" => $post['size'][$key]);
        //     $dataUpload[$nmdokumen][] = $file_data;
        //     $nama_filenya[] = $nmdokumen . "-" . time() . "-" . str_replace(" ", "_", $post['name'][$key]);
        //     //$nama_filenya[] = $nmdokumen . "-" . time() . "-" . $post['name'][$key];
        //     $dataName[$nmdokumen][] = $nama_filenya[$key];

        //     $_FILES[$nama_filenya[$key]] = $file_data;

        //     $fileupload[$nmdokumen][] = $this->upload_file($nama_filenya[$key], $nama_filenya[$key]);
        // }
        // $bukti_pendukung = json_encode($dataName);

        $aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();

        if ($nama_lengkap == "") {
            $this->session->set_flashdata('result', $aplikasi->pesan_gagal_browser);
            echo '<div class="alert alert-warning" role="alert">' . $this->session->flashdata('result') . '</div>';
            die();
        }
        $this->db->where('nama_lengkap', $nama_lengkap);
        $this->db->where('email', $email);
        $this->db->where('skema_sertifikasi', $skema_yang_dipilih);

        $query = $this->db->get("$asesi");

        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('result', $aplikasi->pesan_gagal_double);
            $this->session->set_flashdata('mode_alert', 'warning');
            redirect('welcome/sukses');
            $datax['sender_id'] = 1;
            $datax['reciepent_id'] = 1;
            $datax['title'] = 'Email Terdaftar';
            $datax['message'] = 'Email Telah terdaftar atas nama ' . $nama_lengkap . ', Email ' . $email;

            $this->load->model('Pesan_Model');
            $this->Pesan_Model->insert($datax);

            $admin = $this->db->get('r_konfigurasi_aplikasi')->row();
            // smssend($admin->sms_center, $datax['message']);
            die();
        }

        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $dates = array_reverse(explode("/", $tanggal_lahir));
        $tanggal_lahir = implode('-', $dates);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $kewarganegaraan = $this->input->post('kewarganegaraan', true);
        $alamat = $this->input->post('alamat', true);
        $no_telp = $this->input->post('no_telp', true);
        // $email = $this->input->post('email', true);
        $pend_terakhir = $this->input->post('pend_terakhir', true);
        $perg_tinggi = $this->input->post('perg_tinggi', true);
        $jurusan = $this->input->post('jurusan', true);
        // $jabatan = $this->input->post('jabatan', true);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan', true);
        $no_telp_company = $this->input->post('no_telp_company', true);
        $email_company = $this->input->post('email_companny', true);
        $tujuan_asesmen = $this->input->post('tujuan_asesmen', true);
        $skema_okupasi = $this->input->post('skema_okupasi', true);
        $kontak_tuktetap = $this->input->post('kontak_tuktetap', true);
        $acuan_standarkomp = $this->input->post('acuan_standarkomp', true);
        $asesmen = $this->input->post('is_perpanjangan', true);
        $provinsi = $this->input->post('id_provinsi', true);
        $kabupaten = $this->input->post('id_kabupaten', true);
        $organisasi = $this->input->post('organisasi', true);
        $id_pendidikan = $this->input->post('id_pendidikan', true);
        $jadwal_id = $this->input->post('jadwal_id', true);
        $id_tuk = $this->input->post('id_tuk', true);
        $id_pekerjaan = $this->input->post('id_pekerjaan', true);
        // $id_genre = $this->input->post('id_genre', true);

        $id_sumber_anggaran = $this->input->post('id_sumber_anggaran', true);
        $id_instansi_anggaran = $this->input->post('id_instansi_anggaran', true);

        //$id= $this->generate_code();
        $pilih = $this->input->post('pilih', true);
        $is_kompeten = $this->input->post('is_kompeten', true);
        $folder = $this->input->post('folder', true);
        $id_provinsi = $this->input->post('id_provinsi');
        $kode_random = rand(1, 1000000);

        // var_dump($is_kompeten);die();

        $data = array(
            'id_tuk' => $id_tuk,
            'jadwal_id' => $jadwal_id,
            'no_identitas' => $no_identitas,
            'nama_lengkap' => strtoupper($nama_lengkap),
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'kewarganegaraan' => $kewarganegaraan,
            'alamat' => $alamat,
            'telp' => $no_telp,
            'email' => $email,
            'id_pendidikan' => $id_pendidikan,
            'jurusan' => $jurusan,
            // 'jabatan' => $jabatan,
            'alamat_company' => $alamat_perusahaan,
            'telp_company' => $no_telp_company,
            'email_company' => $email_company,
            'skema_sertifikasi' => $skema_yang_dipilih,
            'kode_random' => $kode_random,
            'pilihan_bukti_pendukung' => $pilihan_bukti_pendukung,
            // 'isbn' => $isbn,
            'organisasi' => $organisasi,
            'bukti_pendukung' => json_encode($array_bukti), //$bukti_pendukung
            // 'marketing' => $marketing,
            'is_perpanjangan' => $asesmen,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'id_pekerjaan'  => $id_pekerjaan,
            // 'id_genre'  => $id_genre,

            'id_sumber_anggaran'    => $id_sumber_anggaran,
            'id_instansi_anggaran'  => $id_instansi_anggaran,
        );

        

        $bukti = unserialize($pilihan_bukti_pendukung);
        // $isbn_buku = unserialize($isbn);
        // var_dump($data); die();

        if ($this->db->insert($asesi, $data)) {
            $id = $this->db->insert_id();
            //$this->send_email($kode_random,$email,$id,$nama_lengkap);
            $this->load->model('asesi_model');
            $detail_elemen_kuk = $this->asesi_model->detail_elemen_kuk($skema_yang_dipilih);

            // var_dump($id); die();

            foreach ($detail_elemen_kuk as $key => $value) {
                $data_detail = array(
                    'asesi_id' => $id,
                    'unit_kompetensi_id' => $value->id_unit_kompetensi,
                    'jenis_bukti' => $bukti[$key],
                    'is_kompeten' => 'k',
                    'elemen' => $value->elemen_kompetensi,
                );
                $this->db->insert($asesi_detail, $data_detail);
            }

            $this->db->from(kode_lsp() . 'jadual_asesmen');
            $this->db->where('id',$jadwal_id);
            $query_jadwal = $this->db->get()->row();

            $sisa_kouta = $query_jadwal->kuota_tersisa;

            $datajadwal = array(
                'kuota_tersisa' => ($sisa_kouta - 1)
            );
            $this->db->where('id', $jadwal_id);
            $this->db->update(kode_lsp() . 'jadual_asesmen', $datajadwal);

            $datax['sender_id'] = 1;
            $datax['reciepent_id'] = 1;
            $datax['title'] = 'Pendaftaran Uji Kompetensi';
            $datax['message'] = 'Pendaftaran UJK atas nama ' . $nama_lengkap . ' No HP ' . $no_telp;

            $this->load->model('Pesan_Model');
            $this->Pesan_Model->insert($datax);
            $admin = $this->db->get('r_konfigurasi_aplikasi')->row();

            $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
            $nama = str_replace(' ', '', strtolower($nama_lengkap));
            if (strlen($nama) > 4) {
                $dataxy['akun'] = substr($nama, 0, 4) . rand(1, 9999);
            } else {
                $dataxy['akun'] = $nama . rand(1, 9999);
            }


            // $dataxy['akun'] = $no_identitas;
            $dataxy['email'] = $email;
            $dataxy['hp'] = $no_telp;
            $dataxy['nama_user'] = $nama_lengkap;
            $dataxy['jenis_user'] = '1';
            $dataxy['sandi'] = '123456';
            $dataxy['sandi_asli'] = '123456';
            $dataxy['aktif'] = '1';
            $dataxy['pegawai_id'] = $id;

            $this->load->model('User_Model');
            $this->User_Model->insert($dataxy);
            $user_id = $this->db->insert_id();

            $datayy['user_id'] = $user_id;
            $datayy['role_id'] = 17;
            $this->load->model('User_Role_Model');
            $this->User_Role_Model->insert($datayy);

            $dataxyz = array(
                'id_users' => $user_id
            );
            $this->db->where('id', $id);
            $this->db->update(kode_lsp() . 'asesi', $dataxyz);

            $jenis_dokumen_array = array(
                'foto' => '1',
                'ktp' => '1',
                'cv' => '1',
                'ijazah' => '1'
            );
            foreach ($nama_dokumen as $key => $value) {
                $array_repositori = array(
                    'nama_dokumen' => $value,
                    'nama_file' => $file_data[$key],
                    'jenis_portofolio' => $jenis_dokumen_array[$value],
                    'id_asesi' => $user_id
                );
                $this->db->insert('t_repositori', $array_repositori);
            }
            $rootPath = realpath($data['aplikasi']->path . $folder);

            $this->session->set_flashdata('result', $aplikasi->pesan_sukses_pendaftaran);
            $this->session->set_flashdata('mode_alert', 'success');
            redirect('welcome/sukses');
        } else {
            echo $this->db->last_query();
            die();
            $this->session->set_flashdata('result', 'Pengisian Formulir APL 01 dan 02 Gagal. Ada kesalahan dalam pengisian database. Hubungi bagian admin.');
            $this->session->set_flashdata('mode_alert', 'warning');
            redirect('welcome/sukses');
        }
    }

    function send_email($kode_random, $email, $id, $nama_lengkap)
    {
        $this->load->library('email');
        $this->email->from('info@lspteknisiakuntansi.or.id', 'Sekretariat LSP Teknisi Akuntansi');
        $this->email->to($email);

        $this->email->subject('LSP Teknisi Akuntansi');
        $data['id'] = $id;
        $data['email'] = $email;
        $data['kode_random'] = $kode_random;
        $data['nama_lengkap'] = $nama_lengkap;
        $pesan = $this->load->view('com_lsp/vemail', $data, true);
        //$pesan = 'OKOK';

        $this->email->message($pesan);

        if ($this->email->send()) {
            return 'ok';
        } else {
            return 'nok';
        }
        //echo $this->email->print_debugger();
    }

    function generate_code()
    {
        $tahun = date('Y');
        $bulan = date('M');
        $tanggal = date('d');
        $docnumber = $this->db->query("select id from $asesi order by id desc limit 1")->row();

        if (count($docnumber) > 0) {
            $maxdigitx = substr($docnumber->id, -7) + 1;
            if ($maxdigitx < 10) {
                $maxdigit = "000000" . $maxdigitx;
            } elseif ($maxdigitx < 100) {
                $maxdigit = "00000" . $maxdigitx;
            } elseif ($maxdigitx < 1000) {
                $maxdigit = "0000" . $maxdigitx;
            } elseif ($maxdigitx < 10000) {
                $maxdigit = "000" . $maxdigitx;
            } elseif ($maxdigitx < 100000) {
                $maxdigit = "00" . $maxdigitx;
            } elseif ($maxdigitx < 1000000) {
                $maxdigit = "0" . $maxdigitx;
            } elseif ($maxdigitx < 10000000) {
                $maxdigit = $maxdigitx;
            }
            return "APL/" . $tanggal . "/" . $bulan . "/" . $tahun . "/" . $maxdigit;
        } else {
            return "APL/" . $tanggal . "/" . $bulan . "/" . $tahun . "/" . "0000001";
        }
    }

    function detail()
    {
        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $asesi = kode_lsp() . 'asesi';
        $asesi_detail = kode_lsp() . 'asesi_detail';
        $id = $this->input->post('id');

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,c.translate", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        //$this->db->join("$elemen_kompetensi d","d.id_unit_kompetensi=c.id");
        $this->db->where("a.id", $id);
        $this->db->order_by("c.id_unit_kompetensi", "ASC");
        $d = $this->db->get()->result();

        $table = '<h3 style="padding-bottom: 15px;">' . $d[0]->skema . '</h3>';
        $table .= '<table  width="100%" class="table table-stripped table-bordered">
        <tr align="center" style="font-weight:bold;background: #eee;">
        <td align="center"> No </td>
        <td align="left"> Kode Unit </td>
        <td align="left"> Nama Unit Kompetensi</td>

        </tr>';
            $no = 1;
            $d[0]->skema;

            foreach ($d as $key => $value) {

            $table .= ' <tr>
            <td align="center"> ' . $no . ' </td>
            <td align="left"> ' . $value->id_unit_kompetensi . ' </td>
            <td><font>' . $value->unit_kompetensi . '</font><br><hr style=margin:0; padding:0; color:#999>
            <font>' . $value->translate . '</font>
            </td>

            </tr>';
                $no++;
            }
            $table .= '</table>';
            echo $table;
    }

    function about()
    {
        $email = $this->input->post('validasi_email');
        $this->db->where('email', $email);
        $data = $this->db->get(kode_lsp() . 'asesi')->row();
        echo count($data);
    }

    function sukses()
    {
        $data['aplikasi'] = $this->db->get('r_konfigurasi_aplikasi')->row();
        $data['marquee'] = $this->artikel_model->marquee();
        $data['berita_lainnya'] = $this->artikel_model->berita_lainnya();

        $this->load->view('templates/bootstraps/header', $data);
        $this->load->view('templates/bootstraps/sukses', $data);
        $this->load->view('templates/bootstraps/bottom', $data);
    }

    function removeDirectory($path)
    {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }

    function initCounter()
    {
        $res = $this->db->query("SELECT * FROM t_counter")->num_rows();

        $ip = $this->input->ip_address();
        $location = $this->input->server();
        $tanggal = date("Ymd");
        $hits = 1;
        $waktu = time();

        $data = array(
            'ip' => $ip,
            'location' => $location,
            'tanggal' => $tanggal,
            'hits' => $hits,
            'waktu' => $waktu,
        );

        if ($res == 0) {
            $this->db->insert('t_counter', $data);
            //echo "data di input";
        } else {
            //var_dump($visitor); die();
            $this->db->query("UPDATE t_counter SET hits=hits+1, waktu='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
            //echo "data di update";
        }
    }
}
