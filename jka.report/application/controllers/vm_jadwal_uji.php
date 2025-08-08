<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vm_jadwal_uji extends MY_Controller {

	function __construct() {
		parent::__construct();
		// has_privilege($this->uri->segment(1));
		$this->load->model('vm_jadwal_uji_model');
        $this->load->library('grids');
        $this->load->library('pagination');
	}

    // function indexx() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //         $this->load->library('grid');
    //         $grid = $this->grid->set_properties(array('model' => 'jadwal_asesmen_model', 'controller' => 'jadwal_asesmen', 'options' => array('id' => 'jadwal_asesmen', 'pagination', 'rownumber')))->load_model()->set_grid();
    //         $view = $this->load->view('jadwal_asesmen/index', array('grid' => $grid), true);
    //         echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
    //     } else {
    //         block_access_method();
    //     }
    // }

	function indexd(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $grid = $this->grids->set_properties(
                array(
                    'model' => 'vm_jadwal_uji_model',
                    'controller' => 'vm_jadwal_uji',
                    'menus' => $this->menus,
                    'uri_segmen' => $this->uri->segment(1),
                    'options' => array('id' => 'vm_jadwal_uji', 'pagination', 'rownumber')
                )
            );

            $data = [
                'menus' => $this->menus,
                'uri_segmen' => $this->uri->segment(1),
                'grid' => $grid
                // 'datagrid' => $this->datagrid(),
                // 'konten' => 'vm_jadwal_uji/index'
            ];
            // var_dump($grid); die();

            $this->load->view('templates/users/app',$data);
            // $view = $this->load->view('vm_jadwal_uji/index', array('grid' => $grid), true);
            
        } else {
            block_access_method();
        }
    }

    function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $grid = $this->grids->set_properties(
            array(
                'menus' => $this->menus,
                'model' => 'vm_jadwal_uji_model',
                'controller' => 'vm_jadwal_uji',
                'uri_segmen' => $this->uri->segment(1),
                'options' => array('id' => 'vm_jadwal_uji', 'pagination', 'rownumber')
            )
        );
        
        } else {
            block_access_method();
        }

        // $view = $this->load->view('vm_jadwal_uji/index', array('datagrid' => $grid), true);

        // var_dump($grid); die();

        // $this->load->view('vm_jadwal_uji/index',array('datagrid' => $grid));
    }

    // function datagrid(){
    //     $data = "ini adalah datagrid jadwal uji";

    //     echo $data;
    // }

	function datagrid(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $jadwal_asesmen = $this->vm_jadwal_uji_model->data_jadwal();

            $data = $jadwal_asesmen;

            $table = '
                <thead>
                    <tr style="background-color:#eee">
                        <th width="4%"></th>
                        <th width="18%">Kode</th>
                        <th>Jadwal</th>
                        <th width="18%">Tanggal</th>
                        <th>TUK</th>
                        <th width="8%" class="center">Kuota</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="animated">';

            $no = 1;
            foreach ($data as $value) {
                $table .= '
                    <tr id="kolom' . $value->id . '" onclick="action('. $value->id .')" class="">
                        <th class="center" style="background-image: linear-gradient(to bottom, #F5F4F9 0%, #ECEAF3 100%);">' . $no++ . '</th>
                        <td>' . $value->kode_jadwal . '</td>
                        <td>' . $value->jadual . '</td>
                        <td>' . tgl_indo($value->tanggal) . '</td>
                        <td>' . $value->tuk . '</td>
                        <td class="center">' . $value->kuota_peserta . '</td>
                    </tr>';
            };

            $table .= '</tbody>';

            echo $table;
            
        } else {
            block_access_method();
        }
    }

    // function uji_kompetensi_skema()
    // {
    //     $skema = kode_lsp() . 'skema';
    //     $skema_detail = kode_lsp() . 'skema_detail';
    //     $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
    //     $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
    //     $kuk = kode_lsp() . 'kuk';
    //     $asesi = kode_lsp() . 'asesi';
    //     $asesi_detail = kode_lsp() . 'asesi_detail';
    //     $id = $this->input->post('id');

    //     $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk", false);
    //     $this->db->from("$skema a");
    //     $this->db->join("$skema_detail b", "b.id_skema=a.id");
    //     $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
    //     $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
    //     $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
    //     $this->db->where("a.id", $id);
    //     $d = $this->db->get()->result();
    //     $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
    //        <tr align="center" style="font-weight:bold;">
    //        <td  align="center"> No </td>
    //        <td> Kode Unit </td>
    //        <td> Judul Unit Kompetensi/Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>
    //        <td width="30px" align="center"> K (Kompeten)<br/>
    //        <input type="checkbox" id="all_k" name="all_k" />
    //        </td>
    //        <td width="30px" align="center"> BK (Belum Kompeten)<br/>
    //        <input type="checkbox" id="all_bk" name="all_k" /> </td>
    //        <td> Bukti Pendukung </td>
    //        </tr>';
    //     $no = 1;
    //     $real_unit = "";
    //     $real_elemen = "";
    //     foreach ($d as $key => $value) {
    //         if ($real_unit == $value->id_unit_kompetensi) {
    //             if ($real_elemen != $value->id_elemen_kompetensi) {
    //                 $table .= ' <tr style="font-weight:normal;">
    //                <td align="center"></td>
    //                <td></td>
    //                <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
    //                <td> </td>
    //                <td> </td>
    //                <td>
    //                </td>
    //                </tr>';
    //                 //if($real_elemen == $value->id_elemen_kompetensi){
    //                 $table .= ' <tr style="font-weight:normal;">
    //                <td align="center"></td>
    //                <td></td>
    //                <td> ' . ltrim($value->kuk) . ' </td>
    //                <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
    //                <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
    //                <td class="select_bukti">
    //                </td>
    //                </tr>';
    //             } else {

    //                 $table .= ' <tr style="font-weight:normal;">
    //             <td align="center"></td>
    //             <td></td>
    //             <td> ' . ltrim($value->kuk) . ' </td>
    //             <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
    //             <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
    //             <td class="select_bukti">
    //             </td>
    //             </tr>';
    //             }
    //         } else {
    //             $table .= ' <tr>
    //         <td align="center"> ' . $no . ' </td>
    //         <td> ' . $value->id_unit_kompetensi . ' </td>
    //         <td> <b>' . $value->unit_kompetensi . '</b> </td>
    //         <td align="center"> </td>
    //         <td align="center"> </td>
    //         <td>
    //         </td>
    //         </tr>';
    //             $table .= ' <tr style="font-weight:normal;">
    //         <td align="center"></td>
    //         <td></td>
    //         <td> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
    //         <td> </td>
    //         <td> </td>
    //         <td>
    //         </td>
    //         </tr>';
    //             $table .= ' <tr style="font-weight:normal;">
    //         <td align="center"></td>
    //         <td></td>
    //         <td> ' . ltrim($value->kuk) . ' </td>
    //         <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']"  value="k" class="value_k"/> </td>
    //         <td align="center"> <input type="radio" required name="is_kompeten[][' . $key . ']" value="bk" class="value_bk"/></td>
    //         <td class="select_bukti">
    //         </td>
    //         </tr>';
    //             $no++;
    //         }
    //         $real_unit = $value->id_unit_kompetensi;
    //         $real_elemen = $value->id_elemen_kompetensi;
    //     }
    //     $table .= '</table>';
    //     echo $table;
    // }

    function tambah(){
        // $data = ['about' => ci_get('t_about')->result()];
        $view = $this->load->view('vm_jadwal_uji/tambah',TRUE);
        echo json_encode($view);
    }

    function edit($id){
        $data = [
            'about' => ci_get_where(kode_lsp().'jadual_asesmen',['id'=>$id])->row(),
        ];

        $view = $this->load->view('vm_jadwal_uji/edit',$data,TRUE);
        echo json_encode($view);
    }

    function save($id = ""){
        $data = [
          'about_us' => input_post('about_us'),
          'address' => input_post('address'),
          'phone' => input_post('phone'),
          'email' => input_post('email'),
          'linkedin' => input_post('linkedin'),
        ];
    
        if($id == ""){
          ci_insert(kode_lsp().'jadual_asesmen', $data);
          $data = ['type' => 'success', 'msg' => 'Data berhasi disimpan'];
          echo json_encode($data);
        }else {
          ci_update(kode_lsp().'jadual_asesmen', $data, ['id' => $id]);
          $data = ['type' => 'success', 'size' => 'mini', 'text' => 'Data berhasi diupdate'];
          echo json_encode($data);
        }
    }
    
    function hapus($id){
        $data = ci_delete(kode_lsp().'jadual_asesmen',['id'=>$id]);
        if($data){
            $data = ['type' => 'success', 'size' => 'mini', 'text' => 'Data berhasil di hapus'];
        echo json_encode($data);
        }
    }

}