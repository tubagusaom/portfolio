<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skema extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('skema_model');
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'skema_model', 'controller' => 'skema', 'options' => array('id' => 'skema', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('skema/index', array('grid' => $grid), true);
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
            if(isset($_POST['skema']) && !empty($_POST['skema']))
            {
                $where['skema LIKE'] = '%' . $this->input->post('skema') . '%';
            }

            $data = array();
            $params = array('_return' => 'data');

            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->skema_model->count_by($where) : $this->skema_model->count_all();
            $this->skema_model->limit($row, $offset);
            $order = $this->skema_model->get_params('_order');
            $rows = $this->skema_model->set_params($params)->with(array('lsp'));
            $data['rows'] = $this->skema_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->skema_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->skema_model->check_unique($data)) {
                    if ($this->skema_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->skema_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            //echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('skema/add', array('status' => 1, 'bidang' => 1),  TRUE)));
            $this->load->library('combogrid');
            $lsp = $this->combogrid->set_properties(array('model' => 'lsp_model', 'controller' => 'lsp', 'fields' => array('nama_unit', 'singkatan_unit'), 'options' => array('id' => 'id_lsp', 'pagination', 'rownumber', 'idField' => 'id', 'textField' => 'nama_unit', 'panelWidth' => 500,
                            'queryParams' => array('name' => 'easui')
                )))->load_model()->set_grid();
            $view = $this->load->view('skema/add', array('kategori' => array('skema', 'simulator'),'lsp_grid' => $lsp), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        }
    }

    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roles = $this->skema_model->get(intval($id));
            if (sizeof($roles) == 1) {
                if ($this->skema_model->delete(intval($id))) {
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

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $this->skema_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->skema_model->check_unique($data, intval($id))) {
                    $discount_skema = $_POST['discount_skema'];
                    //var_dump($discount_skema);die();
                    $data['discount_skema'] = serialize($discount_skema);

                    if ($this->skema_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->skema_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $batch = $this->skema_model->get(intval($id));
            if (sizeof($batch) == 1) {
                $array_discount_skema = str_replace('"', '|', $batch->discount_skema);
                $discount_skema = unserialize($array_discount_skema);

                $view = $this->load->view('skema/edit', array('data' => $this->skema_model->get_single($batch),'discount_skema'=>$discount_skema,
                'kategori_skema' => array('Klaster'=>'Klaster','Okupasi' => 'Okupasi','KKNI'=>'KKNI','Standar Khusus'=>'Standar Khusus','Standar Internasional'=>'Standar Internasional')   ), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
                
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

    function combogrid($id = false) {
        $this->load->model('skema_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
        $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return' => 'data');
        if (isset($_POST['q'])) {
            $where['skema_name LIKE'] = "%" . $this->input->post('q') . "%";
        }
        if (isset($where))
            $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->skema_model->count_by($where) : $this->skema_model->count_all();
        $this->skema_model->limit($row, $offset);
        $order_criteria = "ASC";
        $_order_escape = TRUE;
        if ($id) {
            $order = "FIELD(id, " . intval($id) . ")";
            $order_criteria = "DESC";
            $_order_escape = FALSE;
        } else {
            $order = $this->skema_model->get_params('_order');
        }
        $rows = isset($where) ? $this->skema_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->skema_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->skema_model->get_selected()->data_formatter($rows);
        //var_dump($data);
        echo json_encode($data);
    }

    function mpa($id) {
        $this->db->where('id', $id);
        $row_skema = $this->db->get(kode_lsp() . 'mma')->row();


        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $kuk_detail = kode_lsp() . 'kuk_detail';

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk,e.id as id_kuk", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        //$this->db->join("$kuk_detail f", "f.id_kuk=e.id",'LEFT');

        $this->db->where("a.id", $row_skema->id_skema);
        $d = $this->db->get()->result();

        $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
                        <tr align="center" style="font-weight:bold;">
                            <td  align="center"> No </td>
                            <td> Kode Unit </td>
                            <td> Judul Unit Kompetensi / Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>

                            <td width="30px" align="center"> Edit KUK</td>
                        </tr>';
        $no = 1;
        $real_unit = "";
        $real_elemen = "";
        $real_kuk = "";
        foreach ($d as $key => $value) {
            //var_dump($value->id_kuk.'--');
            if ($real_unit == $value->id_unit_kompetensi) {
                if ($real_elemen != $value->id_elemen_kompetensi) {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                          </tr>';
                    //if($real_elemen == $value->id_elemen_kompetensi){
                    $this->db->where('id_kuk', $value->id_kuk);
                    $this->db->where('id_mma', $id);
                    $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                    $array_detail_kuk = count($data_detail_kuk);
                    if ($array_detail_kuk > 0) {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                        $table_detail = "";
                        $table_detail .= "<table cellpadding='2' border='1' class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                        foreach ($data_detail_kuk as $keys => $values) {
                            $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                        }
                        $table_detail .= "</table>";
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                    } else {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                    }
                } else {
                    $this->db->where('id_kuk', $value->id_kuk);
                    $this->db->where('id_mma', $id);
                    $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                    $array_detail_kuk = count($data_detail_kuk);
                    if ($array_detail_kuk > 0) {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                        $table_detail = "";
                        $table_detail .= "<table cellpadding='2' border='1'  class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                        foreach ($data_detail_kuk as $keys => $values) {
                            $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                        }
                        $table_detail .= "</table>";
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                    } else {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                    }
                }
            } else {
                $table .= ' <tr>
                             <td align="center"> ' . $no . ' </td>
                             <td> ' . $value->id_unit_kompetensi . ' </td>
                             <td colspan="2"> <b>' . $value->unit_kompetensi . '</b> </td>
                            </tr>';
                $table .= ' <tr style="font-weight:normal;">
                             <td align="center"></td>
                             <td></td>
                             <td colspan="2"> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                          </tr>';
                //var_dump($value->kuk);
                $this->db->where('id_kuk', $value->id_kuk);
                $this->db->where('id_mma', $id);
                $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                $array_detail_kuk = count($data_detail_kuk);
                //var_dump($data_detail_kuk);die();

                if ($array_detail_kuk > 0) {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                    $table_detail = "";
                    $table_detail .= "<table border='1' cellpadding='2' cellspacing='2'  class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                    foreach ($data_detail_kuk as $keys => $values) {
                        $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                    }
                    $table_detail .= "</table>";
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                } else {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                }


                $no++;
            }
            $real_unit = $value->id_unit_kompetensi;
            $real_elemen = $value->id_elemen_kompetensi;
        }
        $table .= '</table>';
        $data['table'] = $table;
        $data['mma'] = $row_skema;
        $this->load->view('skema/mpa', $data);
    }

    function mma($id) {
        $this->db->where('id', $id);
        $row_skema = $this->db->get(kode_lsp() . 'mma')->row();


        $skema = kode_lsp() . 'skema';
        $skema_detail = kode_lsp() . 'skema_detail';
        $unit_kompetensi = kode_lsp() . 'unit_kompetensi';
        $elemen_kompetensi = kode_lsp() . 'elemen_kompetensi';
        $kuk = kode_lsp() . 'kuk';
        $kuk_detail = kode_lsp() . 'kuk_detail';

        $this->db->select("a.*,c.id_unit_kompetensi,c.unit_kompetensi,d.elemen_kompetensi,e.id_elemen_kompetensi,e.kuk,e.id as id_kuk", false);
        $this->db->from("$skema a");
        $this->db->join("$skema_detail b", "b.id_skema=a.id");
        $this->db->join("$unit_kompetensi c", "c.id=b.id_unit_kompetensi");
        $this->db->join("$elemen_kompetensi d", "d.id_unit_kompetensi=c.id");
        $this->db->join("$kuk e", "e.id_elemen_kompetensi=d.id");
        //$this->db->join("$kuk_detail f", "f.id_kuk=e.id",'LEFT');

        $this->db->where("a.id", $row_skema->id_skema);
        $d = $this->db->get()->result();

        $table = '<table  width="100%" class="table table-stripped table-bordered" border="1">
                        <tr align="center" style="font-weight:bold;">
                            <td  align="center"> No </td>
                            <td> Kode Unit </td>
                            <td> Judul Unit Kompetensi / Elemen Kompetensi / <br/> Kriteria Unjuk Kerja(KUK)</td>

                            <td width="30px" align="center"> Edit KUK</td>
                        </tr>';
        $no = 1;
        $real_unit = "";
        $real_elemen = "";
        $real_kuk = "";
        foreach ($d as $key => $value) {
            //var_dump($value->id_kuk.'--');
            if ($real_unit == $value->id_unit_kompetensi) {
                if ($real_elemen != $value->id_elemen_kompetensi) {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                          </tr>';
                    //if($real_elemen == $value->id_elemen_kompetensi){
                    $this->db->where('id_kuk', $value->id_kuk);
                    $this->db->where('id_mma', $id);
                    $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                    $array_detail_kuk = count($data_detail_kuk);
                    if ($array_detail_kuk > 0) {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                        $table_detail = "";
                        $table_detail .= "<table cellpadding='2' border='1' class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                        foreach ($data_detail_kuk as $keys => $values) {
                            $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                        }
                        $table_detail .= "</table>";
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                    } else {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                    }
                } else {
                    $this->db->where('id_kuk', $value->id_kuk);
                    $this->db->where('id_mma', $id);
                    $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                    $array_detail_kuk = count($data_detail_kuk);
                    if ($array_detail_kuk > 0) {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                        $table_detail = "";
                        $table_detail .= "<table cellpadding='2' border='1'  class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                        foreach ($data_detail_kuk as $keys => $values) {
                            $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                        }
                        $table_detail .= "</table>";
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                    } else {
                        $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                    }
                }
            } else {
                $table .= ' <tr>
                             <td align="center"> ' . $no . ' </td>
                             <td> ' . $value->id_unit_kompetensi . ' </td>
                             <td colspan="2"> <b>' . $value->unit_kompetensi . '</b> </td>
                            </tr>';
                $table .= ' <tr style="font-weight:normal;">
                             <td align="center"></td>
                             <td></td>
                             <td colspan="2"> <b>' . ltrim($value->elemen_kompetensi) . '</b> </td>
                          </tr>';
                //var_dump($value->kuk);
                $this->db->where('id_kuk', $value->id_kuk);
                $this->db->where('id_mma', $id);
                $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();
                $array_detail_kuk = count($data_detail_kuk);
                //var_dump($data_detail_kuk);die();

                if ($array_detail_kuk > 0) {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center" ></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>
                          </tr>';
                    $table_detail = "";
                    $table_detail .= "<table border='1' cellpadding='2' cellspacing='2'  class='table_detail'><tr><th>Nama Bukti</th><th>Jenis Bukti</th><th>Metode Uji</th></tr>";
                    foreach ($data_detail_kuk as $keys => $values) {
                        $table_detail .= ' <tr style="font-weight:normal;">
                            <td> ' . ltrim($values->deskripsi_bukti) . ' </td>
                            <td> ' . ltrim($values->jenis_bukti) . ' </td>
                            <td> ' . ltrim($values->metode_bukti) . ' </td>

                          </tr>';
                    }
                    $table_detail .= "</table>";
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td colspan="2"> ' . $table_detail . ' </td>


                          </tr>';
                } else {
                    $table .= ' <tr style="font-weight:normal;">
                            <td align="center"></td>
                            <td></td>
                            <td> ' . ltrim($value->kuk) . ' </td>
                            <td align="center"> <a href="' . base_url() . 'skema/mma_detail/' . $value->id_kuk . '/' . $id . '">Edit</a></td>

                          </tr>';
                }


                $no++;
            }
            $real_unit = $value->id_unit_kompetensi;
            $real_elemen = $value->id_elemen_kompetensi;
        }
        $table .= '</table>';
        $data['table'] = $table;
        $data['mma'] = $row_skema;

        $this->load->view('skema/mma', $data);
    }

    function mma_detail($id, $id_mma) {
        $this->db->where('id_kuk', $id);
        $data_detail_kuk = $this->db->get(kode_lsp() . 'kuk_detail')->result();

        $this->db->where('id', $id);
        $data_kuk = $this->db->get(kode_lsp() . 'kuk')->row();

        $array_detail_kuk = count($data_detail_kuk);
        $data['data'] = $data_detail_kuk;
        $data['data_kuk'] = $data_kuk;

        $data['id_kuk'] = $id;
        $data['id_mma'] = $id_mma;
        //$data['kuk'] = str_replace('%20', ' ', $kuk);
        $this->load->view('skema/mma_detail', $data);
    }

    function mma_add() {
        $deskripsi_bukti = $this->input->post('deskripsi_bukti');
        $jenis_bukti = $this->input->post('jenis_bukti');
        $metode_bukti = $this->input->post('metode_bukti');
        $id = $this->input->post('id_kuk');
        $kuk = $this->input->post('kuk');
        $id_mma = $this->input->post('id_mma');
        if ($deskripsi_bukti != "") {
            $data = array('deskripsi_bukti' => $deskripsi_bukti, 'jenis_bukti' => $jenis_bukti, 'metode_bukti' => $metode_bukti, 'id_kuk' => $id, 'id_mma' => $id_mma);
            if ($this->db->insert(kode_lsp() . 'kuk_detail', $data)) {
                $this->db->where('id', $id);
                $array_kuk = array('kuk' => $kuk);
                $this->db->update(kode_lsp() . 'kuk', $array_kuk);
            }
        } else {
            $this->db->where('id', $id);
            $array_kuk = array('kuk' => $kuk);
            $this->db->update(kode_lsp() . 'kuk', $array_kuk);
        }
        redirect(base_url() . 'skema/mma_detail/' . $id . '/' . $id_mma);
    }

    function mma_delete($id_kuk, $id_mma, $id) {
        $this->db->where('id', $id);
        $this->db->delete(kode_lsp() . 'kuk_detail');
        redirect(base_url() . 'skema/mma_detail/' . $id_kuk . '/' . $id_mma);
    }

    function cetak($id, $type = "pdf", $all = "") {
        $hasil_rekomendasi_asesor = '';

        $this->db->where('id', $id);
        $data['skema_sertifikasi'] = $this->db->get(kode_lsp() . 'skema')->row();

        $this->db->where('id', $data['skema_sertifikasi']->id_lsp);
        $data['aplikasi'] = $this->db->get('lsp')->row();
        $data['global_setting'] = $this->db->get('r_konfigurasi_aplikasi')->row();

        $this->db->where('id_skema', $data['skema_sertifikasi']->id);
        $data['syarat_skema'] = $this->db->get(kode_lsp() . 'skema_syarat')->result();
        //var_dump($data['skema_sertifikasi']->id);die();

        $data['array_catatan_apl01'] = array();
        $data['data_asesi'] = array();
        $data['data_pekerjaan'] = "";
        $this->load->model('asesi_model');
        $unit_kompetensi = $this->asesi_model->data_unit_kompetensi($id);
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $elemen = "";
        $elemen_mma = "";
        $unit_mak = "";
        $no = 0;
        //var_dump($unit_kompetensi);die();
        foreach ($unit_kompetensi as $key => $value) {
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= '<label style="font-size:10px;">' . ($key + 1) . '. ' . $value->unit_kompetensi . '</label><br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            //var_dump($query_elemen);die();
            $detail_elemen = "";
            $detail_elemen_mma = "";
            $detail_poin_observasi = "";
            $elemen_aja = "";
            if (count($query_elemen) > 0) {
                foreach ($query_elemen as $keys => $values) {
                    //var_dump($query_elemen->bukti_tambahan);die();

                    //echo $detail_poin_observasi;die();
                    $detail_kuk = 'Hasil observasi ' . clean($values->elemen_kompetensi) ;
                    $detail_elemen .= '
                <table nobr="true" style="width: 100%; border-collapse: collapse;" border="1">
                <tr nobr="true">
                    <td rowspan="2" style="width: 5%; text-align: center; font-weight: bold;">No.</td>
                    <td rowspan="2" style="width: 10%; padding: 5px; font-weight: bold; text-align: center;">Langkah Kerja </td>
                    <td rowspan="2" style="width: 30%; padding: 5px; font-weight: bold; text-align: center;">Poin Yang Diobservasi</td>
                    <td colspan="2" style="width: 13%; text-align: center; font-weight: bold;">Pencapaian</td>
                    <td colspan="2" style="width: 13%; text-align: center; font-weight: bold;">Penilaian</td>
                </tr>
                <tr nobr="true">
                    <td style="width: 4%; text-align: center; font-weight: bold; border-left: 0px;"> Ya </td>
                    <td style="width: 4%; text-align: center; font-weight: bold;"> Tdk </td>
                    <td style="width: 4%; text-align: center; font-weight: bold;"> K </td>
                    <td style="width: 4%; text-align: center; font-weight: bold;"> BK </td>
                </tr>';

                $query_kuk = $this->asesi_model->kuk($values->id);
                $jumlah_kuk = count($query_kuk) + 1;
                    if (count($query_kuk) > 0) {
//                        $detail_poin_observasi="";
//                           $detail_poin_observasi='<table border="1" style="width:100%;"> ';
//                        foreach ($query_kuk as $k => $v) {
//                            $detail_poin_observasi .= '<tr width:5px;><td style="width:9%">' . ($k + 1) . '. </td><td style="width:89%">' . $v->poin_kuk . '</td></tr>';
//                        }
//                        $detail_poin_observasi.='</table>';
//                    }else{
//
//
//                    }
                $detail_elemen .='<tr nobr="true">
                        <td rowspan='.$jumlah_kuk.' style="width: 5%; text-align: center; font-weight: bold;">' . ($keys + 1) . '. </td>
                        <td rowspan='.$jumlah_kuk.' style="width: 25%;padding:5px;">' . clean($values->elemen_kompetensi) . ' </td>

                    </tr>';
                foreach ($query_kuk as $k => $v) {
                    $detail_elemen .='<tr nobr="true">
                        <td style="width: 54%;border-left:none;padding:2px;" >' . ucfirst(strtolower(clean($v->poin_kuk))) . '</td>
                        <td style="width: 6,5%;"> </td>
                        <td style="width: 6,5%; "> </td>
                        <td style="width: 6,5%;"> </td>
                        <td style="width: 6,5%;"> </td>
                    </tr>';
                }
                    }
                $detail_elemen.='</table><br>';
                    if ($values->bukti_dpl != "") {
                        //var_dump($values->bukti_tambahan);die();
                        $data_bukti_tidak_langsung[]= array('pertanyaan'=>$values->pertanyaan,'jawaban'=>$values->jawaban,'perangkat_bukti_tambahan'=>'DPL','no_kuk'=>$values->no_kuk,'unit_kompetensi'=>$value->unit_kompetensi,'kode_unit_kompetensi'=>$value->id_unit_kompetensi,'bukti'=>$values->bukti_dpl,'dimensi'=>$values->dimensi_kompetensi,'elemen'=>$values->elemen_kompetensi);
                        $detail_elemen_mma .= '
                        <tr>
                            <td rowspan="2" style="width: 20%; vertical-align: middle; padding: 5px;">' . ucwords(clean($values->elemen_kompetensi) ) . '</td>
                            <td style="width: 30%;  padding-left:5px;">' . $detail_kuk . '</td>
                            <td style="width: 6%;font-size:10px;text-align:center;">L</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;font-size:9px;text-align:center;">CLO</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                        </tr>
                        <tr>
                            <td style="width: 25%; vertical-align: middle; border-left:none;padding:5px;">' . ucwords(clean($values->bukti_dpl)) . '</td>
                            <td style="width: 6%;font-size:10px;text-align:center;">T</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;font-size:9px;text-align:center;">DPL</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                        </tr>';
                    } else {
                        $detail_elemen_mma .= '
                        <tr>
                            <td style="width: 20%; vertical-align: middle; padding: 5px;">' . ucwords(clean($values->elemen_kompetensi) ). '</td>
                            <td style="width: 30%; vertical-align: middle; padding-right:5px;padding-left:5px;">' . $detail_kuk . '</td>
                            <td style="width: 6%;font-size:10px;text-align:center;">L</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;font-size:9px;text-align:center;">CLO</td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                            <td style="width: 3%;"></td>
                        </tr>
                       ';
                    }
                    $no++;
                    $elemen_aja .= '
                            <table  style="width: 97%; border-collapse: collapse;" border="1">
                            <tr>
                                <td style="width: 5%; text-align: center">' . $no . ' </td>
                                <td style="width: 95%; padding: 5px;">' . $values->elemen_kompetensi . ' </td>
                            </tr>
                            </table>
                            ';
                }
            } else {
                $detail_elemen = '';
//                $detail_elemen .= '
//                <table style="width: 100%; border-collapse: collapse;" border="1">
//                <tr nobr="true">
//                    <td rowspan="2" style="width: 4%; text-align: center;">No.</td>
//                    <td rowspan="2" style="width: 25%; padding: 5px; text-align: center;">Langkah Kerja </td>
//                    <td rowspan="2" style="width: 45%; padding: 5px; text-align: center;">Poin Yang Diobservasi</td>
//                    <td colspan="2" style="width: 13%; padding: 5px;">Pencapaian</td>
//                    <td colspan="2" style="width: 13%; padding: 5px;">Penilaian</td>
//                </tr>
//                <tr nobr="true">
//                    <td style="width: 4%; text-align: center;"> Ya </td>
//                    <td style="width: 4%; text-align: center;"> Tdk </td>
//                    <td style="width: 4%; text-align: center;"> K </td>
//                    <td style="width: 4%; text-align: center;"> BK </td>
//                </tr>
//                </table><br>';
            }
            $elemen_kuk .= '<table style="width:100%;background-color: #'.$data['aplikasi']->warna_default_table.';font-size:13px;height: auto; border-collapse: collapse; margin-top: 25px;" border="1" >
                          <tr>
                            <td rowspan="2" style="width:28%;font-weight:bold;">Unit Kompetensi No. ' . ($key + 1) . ' </td>
                            <td style="width:15%; padding: 5px;">Kode Unit</td>
                            <td style="width: 2%; text-align: center;"> : </td>
                            <td style="width: 65%; font-weight: bold; padding: 5px;">' . $value->id_unit_kompetensi . ' </td>
                          </tr>
                          <tr>
                          <td style="wdith: 15%; padding: 5px; border-left: 0px;"> Judul Unit </td>
                          <td style="width: 2%; text-align: center;"> : </td>
                          <td style="width: 65%; padding: 5px;">' . $value->unit_kompetensi . '</td>
                          </tr>
                        </table><br/>' . $detail_elemen;
            $elemen_mma .= '<table style="width:97%;font-size:13px;border-collapse: collapse; margin-top: 25px;" border="1" >
                          <tr style="background-color: #'.$data['aplikasi']->warna_default_table.'">
                            <td rowspan="2" style="width:23%;font-weight:bold;">Unit Kompetensi No. ' . ($key + 1) . ' </td>
                            <td style="width:15%; padding: 5px;">Kode Unit</td>
                            <td style="width: 2%; text-align: center;"> : </td>
                            <td style="width: 50%; font-weight: bold; padding: 5px;">' . $value->id_unit_kompetensi . ' </td>
                          </tr>
                          <tr style="background-color: #'.$data['aplikasi']->warna_default_table.'">
                          <td style="wdith: 15%; padding: 5px; border-left: 0px;"> Judul Unit </td>
                          <td style="width: 2%; text-align: center;"> : </td>
                          <td style="width: 65%; padding: 5px;">' . $value->unit_kompetensi . '</td>
                          </tr>
                        </table><br/>
                        <table style="width: 100%; border-collapse: collapse;font-size:9px;" border="1">
                          <tr style="font-size:10px;">
                            <td style="hegiht:200px;" rowspan="2" style="width: 29%; padding: 5px; font-weight: bold; text-align: center; ">ELEMEN</td>
                            <td rowspan="2" style="width: 40%; padding: 5px; font-weight: bold; text-align: center;">Bukti - Bukti</td>
                            <td rowspan="2" style="width: 6%; padding: 5px; font-weight: bold; text-align: center;">Jenis Bukti (TL, L, T)*</td>
                            <td colspan="8" style="width: 24%;  text-align: center;padding-bottom:-20px;">
                            Metode dan Perangkat Asesmen
                              <br>
                              CLO : Ceklis Observasi, CLP : Verifikasi Portofolio, VPK: Verifikasi Pihak Ketiga, DPL: Daftar Pertanyaan Lisan, DPT: Daftar Pertanyaan Tertulis, SK : Studi Kasus, PW: Pertanyaan Wawancara)
                            </td>
                          </tr>
                          <tr>
                            <td style="width: 3%; padding-top: 42px;border-left:none;">
                            <div style="rotate: 90;">Verifikasi PortoFolio</div>
                            </td>
                            <td style="width: 3%; padding-top: 42px;">
                              <div style="rotate: 90;">Observasi Demonstrasi</div>
                            </td>
                            <td style="width: 3%; padding-top: 42px;">
                            <div style="rotate: 90;">Tes Lisan</div>
                            </td>
                           <td style="width: 3%; padding-top: 42px;">
                              <div style="rotate: 90;">Tes Tertulis</div>
                            </td>
                            <td style="width: 3%; padding-top: 48px; padding-left: 5px;">
                              <div style="rotate: 90;">Wawancara</div>
                            </td>
                            <td style="width: 3%; padding-top: 35px;">
                              <div style="rotate: 90;">Verifikasi Pihak Ketiga</div>
                            </td>
                            <td style="width: 3%; padding-top: 48px;">
                              <div style="rotate: 90;">Studi Kasus</div>
                            </td>
                            <td style="width: 3%; padding-top: 48px;">
                              <div style="rotate: 90;">Lainnya</div>
                            </td>
                          </tr>
                          ' . $detail_elemen_mma . '
                        </table>
                        ';
            $unit_mak .= '<tr>
                            <td colspan="2" style="width:45%">
                            ' . $value->unit_kompetensi . '
                            </td>
                            <td style="width:10%">  </td>
                            <td style="width:10%">  </td>
                            <td style="width:35%">  </td>
                          </tr>';
            $elemen .= $elemen_aja;
        }
        //var_dump($data_bukti_tidak_langsung);die();
        //'.//$detail_elemen.'
        $data['data_bukti_tidak_langsung'] = count(@$data_bukti_tidak_langsung) > 0 ? @$data_bukti_tidak_langsung : array();
        $data['unit_mak'] = $unit_mak;
        $data['elemen_kuk'] = $elemen_kuk;
        $data['elemen'] = $elemen;
        $data['mma'] = $elemen_mma;
        //var_dump($unit_kompetensi);die();
        $data['unit_kompetensi'] = $unit_kompetensi;
        $data['asesi_detail'] = array();
        $data['nama_asesor'] = '-';
        $data['no_reg_asesor'] = '-';
        $data['unit_res'] = array();
        $data['asesmen_manduiri_kuk'] = $this->apl02cc($unit_kompetensi,$data['aplikasi']);
        $data['implode_portofolio'] = "";
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";
        //dp($detail_asesi[0]['v']);die();
        //$data['apl02'] = $this->apl02($unit_kompetensi);

        $data['kode_unit'] = $kode_unit;
        $data['unit'] = $unit;
        $data['qr_asesi'] = "/qrcode/asesi/";
        $this->load->model('pra_asesmen_model');
        $data['asesor_pra_asesmen'] = array();
        $data['ttd_asesor'] = "oip";
        $this->db->where('id', $data['skema_sertifikasi']->id_lsp);
        $row_lsp = $this->db->get('lsp')->row();
        //var_dump($row_lsp);die();
        //$this->load->view('skema/cetak', $data);
$data['type'] = $type ;
        $view = $this->load->view('skema/cetak', $data, true);
        $this->load->library("htm12pdf");
        $this->htm12pdf->pdf_create($view,str_replace(' ','_',$data['skema_sertifikasi']->skema).'.pdf' , false, true);
//        //}
    }

    function apl02($unit_kompetensi) {
        $kode_unit = '';
        $unit = '';
        $elemen_kuk = "";
        $unit_mak = "";
        $index_kuk = 0;
        //var_dump($unit_kompetensi);die();
        foreach ($unit_kompetensi as $key => $value) {
            //var_dump($value);
            $kode_unit .= ($key + 1) . '. ' . $value->id_unit_kompetensi . '<br/>';
            $unit .= ($key + 1) . '. ' . $value->unit_kompetensi . '<br/>';
            $query_elemen = $this->asesi_model->elemen($value->id_unit_kompetensi);
            //var_dump($query_elemen);die();

            $detail_elemen_isi = "";
            $detail_elemen = "";

            if (count($query_elemen) > 0) {

                foreach ($query_elemen as $keys => $values) {
                    $detail_elemen_isi .= '
                <tr>
                    <td style="width:7%;text-align:center;">' . ($keys + 1) . '</td>
                    <td style="width: 40%;" >' . strtolower($values->elemen_kompetensi) . ' ?</td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="width: 29%;max-width: 45px;display: inline-block;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;"></td>
                </tr>';
                    //$index_kuk++;
                }

                $detail_elemen .= '
<tr  nobr="true">
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 7%;">Nomor <br/> Elemen</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)<br/>Apakah anda dapat? / Is you can</td>
    <td colspan="2" style="text-align: center;font-weight: bold;width: 8%;">Penilaian</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 29%;">Bukti-bukti Pendukung</td>
    <td colspan="4" style="text-align: center;font-weight: bold;width: 16%;">Diisi Asesor</td>
</tr>
<tr  nobr="true">
    <td style="text-align: center;font-weight: bold;width: 4%;border-left:0px solid red;">K</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">BK</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">V</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">A</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">T</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">M</td>
</tr>' . $detail_elemen_isi;
            } else {
                $detail_elemen_isi .= '<tr>
                    <td style="width:7%;text-align:center;">' . ($key + 1) . '.1</td>
                    <td style="width: 40%;" >' . strtolower($value->unit_kompetensi) . ' ?</td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="width: 29%;max-width: 45px;display: inline-block;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;"></td>
                </tr>';
                $detail_elemen .= '
                <tr  nobr="true">
                    <td rowspan="2" style="text-align: center;font-weight: bold;width: 7%;">Nomor <br/> Elemen</td>
                    <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)<br/>Apakah anda dapat? / Is you can</td>
                    <td colspan="2" style="text-align: center;font-weight: bold;width: 8%;">Penilaian</td>
                    <td rowspan="2" style="text-align: center;font-weight: bold;width: 29%;">Bukti-bukti Pendukung</td>
                    <td colspan="4" style="text-align: center;font-weight: bold;width: 16%;">Diisi Asesor</td>
                </tr>
                <tr  nobr="true">
                    <td style="text-align: center;font-weight: bold;width: 4%;border-left:0px solid red;">K</td>
                    <td style="text-align: center;font-weight: bold;width: 4%;">BK</td>
                    <td style="text-align: center;font-weight: bold;width: 4%;">V</td>
                    <td style="text-align: center;font-weight: bold;width: 4%;">A</td>
                    <td style="text-align: center;font-weight: bold;width: 4%;">T</td>
                    <td style="text-align: center;font-weight: bold;width: 4%;">M</td>
                </tr>' . $detail_elemen_isi;
            }


            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr>
                            <td colspan="2" style="width:47%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:53%;">' . $value->id_unit_kompetensi . '</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="width:47%;font-weight:bold;"> Unit Kompetensi </td>
                            <td colspan="7" style="width:53%;">' . $value->unit_kompetensi . '</td>
                          </tr>
                          ' . $detail_elemen . '
                        </table><br/>';
        }

        return $elemen_kuk;
    }


 function apl02cc($unit_kompetensi,$aplikasi){
        $kode_unit = '';
        $unit = '';
        $elemen_kuk ="";
        $unit_mak ="";
        $index_kuk = 0;
        //var_dump($unit_kompetensi);die();
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

                   $detail_kuk.='
                <tr>
                    <td style="width:7%;text-align:center;">'.($keys+1).'.'.($k+1).'</td>
                    <td style="width: 40%;" >' . ($v->poin_kuk =="" ? strtolower($v->kuk) : strtolower($v->poin_kuk)).' ? </td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="text-align: center;width: 4%;"></td>
                    <td style="width: 29%;max-width: 45px;display: inline-block;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;text-align: center;"></td>
                    <td style="width:4%;"></td>
                </tr>';
                $index_kuk++;
                }
                }
                $detail_elemen .= '  <tr>

    <td colspan="9"><b>Elemen Kompetensi</b> : '.($keys+1).'. '.$values->elemen_kompetensi.'</td>
</tr>
<tr  nobr="true">
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 7%;">Nomor <br/> KUK</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 40%;">Daftar Pertanyaan <br/> (Assesmen Mandiri/Self Assesment)<br/>Apakah anda dapat? / Is you can</td>
    <td colspan="2" style="text-align: center;font-weight: bold;width: 8%;">Penilaian</td>
    <td rowspan="2" style="text-align: center;font-weight: bold;width: 29%;">Bukti-bukti Pendukung</td>
    <td colspan="4" style="text-align: center;font-weight: bold;width: 16%;">Diisi Asesor</td>
</tr>
<tr  nobr="true">
    <td style="text-align: center;font-weight: bold;width: 4%;border-left:none;">K</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">BK</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">V</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">A</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">T</td>
    <td style="text-align: center;font-weight: bold;width: 4%;">M</td>
</tr>'.$detail_kuk;
            }
            }else{
                $detail_elemen .= '';
            }
            $elemen_kuk .= '<table style="width:100%;font-size:10px;border-collapse: collapse;" border="1" >
                          <tr style="background-color:#'.$aplikasi->warna_default_table.'">
                            <td colspan="2" style="width:47%;font-weight:bold;"> Kode Unit Kompetensi </td>
                            <td colspan="7" style="width:53%;">'.$value->id_unit_kompetensi.'</td>
                          </tr>
                          < <tr style="background-color:#'.$aplikasi->warna_default_table.'">
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

//     function export($id_skema)
//     {
//         if (!$id_skema) {
//             data_not_found();
//             exit;
//         }

//         $this->load->library("PHPExcel/PHPExcel");
//         $this->load->library("PHPExcel/PHPExcel/IOFactory");

//         $data['result'] = $this->skema_model->export_skema($id_skema);

//         $excel = new PHPExcel();
//         $skema = $excel->createSheet(0);
//         $excel->setActiveSheetIndex(0);
//         $page = $excel->getActiveSheet();
//         $page->setTitle("SKEMA SERTIFIKASI");

//         $header_style = array(
//                             "borders" => array(
//                                 "allborders" => array(
//                                     "style" => PHPExcel_Style_Border::BORDER_THIN
//                                 )
//                             ),
//                             "alignment" => array(
//                                 "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                                 "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
//                             ),
//                             "font" => array(
//                                 "bold" => true
//                             ),
//                             'fill' => array(
//                                 'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                                 'color' => array('rgb' => '#5bc0de')
//                             )
//         );
//         $body_style_huruf = array(
//                                 "borders" => array(
//                                     "allborders" => array(
//                                         "style" => PHPExcel_Style_Border::BORDER_THIN
//                                         )
//                                     ),
//                                     "alignment" => array(
//                                         "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
//                                         "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
//                                     )
//         );
//         $italic_center = array(
//                             "borders" => array(
//                                 "allborders" => array(
//                                     "style" => PHPExcel_Style_Border::BORDER_THIN
//                             )
//                                 ),
//                             "alignment" => array(
//                                 "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                                 "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
//                             ),
//                             "font" => array(
//                                 "italic" => true,
//                                 "bold" => false
//                             )
//         );
//         $center = array(
//                     "borders" => array(
//                         "allborders" => array(
//                             "style" => PHPExcel_Style_Border::BORDER_THIN
//                         )
//                     ),
//                     "alignment" => array(
//                         "horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                         "vertical" => PHPExcel_Style_Alignment::VERTICAL_CENTER
//                     )
//         );
//         $bordered = array(
//                         "borders" => array(
//                             "allborders" => array(
//                             "style" => PHPExcel_Style_Border::BORDER_THIN
//                             )
//                         )
//         );

//         $skema->getColumnDimension("A")->setWidth(10);
//         $a="A";
//         for($i=0;$i<=6;$i++){
//                 $a++;
//                 $skema->getColumnDimension("$a")->setWidth(20);;
//         }
//         $skema->setCellValue("A1","No");
//         $a="A";
//         $judul=array(
//             "KODE SKEMA",
//             "NAMA SKEMA",
//             "KODE UNIT",
//             "UNIT KOMPETENSI",
//             "ELEMEN KOMPETENSI",
//             "KUK",
//             "PERTANYAAN OBSERVASI"
//         );

//         for($i=0;$i<=6;$i++){
//             $a++;
//             $skema->setCellValue($a."1",$judul[$i]);
//             $skema->mergeCells($a."1:".$a."1");
//         }
//         $skema->getStyle("A1:H1")->applyFromArray($header_style);
//         $skema->getStyle("A1")->applyFromArray($center);

//         $pos = 4;
//         $no=0;

//         $temp_id = false;
//         $temp_unit = false;
//         $temp_elemen = false;
//         $temp_kuk = false;

//         //var_dump($data['result']); die();
//         //$skema->fromArray($data['result'], null, 'A1');
//         for($i=0;$i<count($data['result']);$i++){
//         $no++;
// // // // //        $skema->insertNewRowBefore(9, 1);
// // // //             //$skema->getStyle("B". ($i + 4))->applyFromArray($center);
// 		 			// if ($temp_id != $data['result'][$i]['skema']) {
// 		 			//     $temp_id = $data['result'][$i]['skema'];
// 		 			//     $skema->setCellValue("A".($i+2), $i + 1);
// 		 			//     $skema->setCellValue("B".($i+2), $data['result'][$i]['kode_skema']);
// 		 			//     $skema->setCellValue("C".($i+2), $data['result'][$i]['skema']);
// 		 			// }else{
// 		 			//     $skema->setCellValue("B".($i+2), "");
// 		 			//     $skema->setCellValue("C".($i+2), "");
// 		 			}
// // // //             // if ($temp_unit != $data['result'][$i]['id_unit_kompetensi']) {
// // // //             //     $temp_unit = $data['result'][$i]['id_unit_kompetensi'];
// // // //             //     $skema->setCellValue("D".($i+3), $data['result'][$i]['id_unit_kompetensi']);
// // // //             //     $skema->setCellValue("E".($i+3), $data['result'][$i]['unit_kompetensi']);


// // // //             // }else {
// // // //             //     $skema->setCellValue("D".($i+3), "");
// // // //             //     $skema->setCellValue("E".($i+3), "");
// // // //             // }
// // // //             if ($temp_elemen != $data['result'][$i]['id_elemen_kompetensi']) {
// // // //                 $temp_elemen = $data['result'][$i]['id_elemen_kompetensi'];
// // // //                 //$skema->setCellValue("G".($i+ 3), '');
// // // //                 $skema->setCellValue("F".($i+4), clean(str_replace('', '', $data['result'][$i]['elemen_kompetensi'])));
// // // //                 $skema->setCellValue("G".($i+ 5), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));
// // // //             }else {

// // // //                 //$skema->setCellValue("F".($i+5), '');
// // // //                 //$skema->setCellValue("G".($i+ 5), '');
// // // //                 $skema->setCellValue("G".($i+ 5), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));

// // // //                 //$skema->setCellValue("G".($i+ 6), '');
// // // //                 //$page->insertNewRowBefore($i+4,1);
// // // //             }
// // // //             // if ($temp_kuk != $data['result'][$i]['poin_kuk']) {
// // // //             //     $skema->setCellValue("G".($i+ 4), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));
// // // //             // }



//             if($temp_unit == $data['result'][$i]['id_unit_kompetensi']){
//                 if($temp_elemen != $data['result'][$i]['id_elemen_kompetensi']){
//                 	$skema->setCellValue("B".($i+2), '');
//                 	$skema->setCellValue("C".($i+2), '');
//                     $skema->setCellValue("D".($i+3), '');
//                     $skema->setCellValue("E".($i+3), '');
//                     $skema->setCellValue("F".($i+4), clean(str_replace('', '', $data['result'][$i]['elemen_kompetensi'])));
//                     $skema->setCellValue("G".($i+4), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));

//                     //$page->insertNewRowBefore(10, 5);
//                     //$skema->writeBlank(1,1)
//                     $aa[] = $data['result'][$i]['poin_kuk'];
//                 }else {
//                 	$skema->setCellValue("B".($i+2), '');
//                 	$skema->setCellValue("C".($i+2), '');
//                     $skema->setCellValue("D".($i+3), '');
//                     $skema->setCellValue("E".($i+3), '');
//                     $skema->setCellValue("F".($i+4), '');
//                     $skema->setCellValue("G".($i+4), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));

//                     //$aa[] = $data['result'][$i]['poin_kuk'];
//                 }
//             }else {
//                 $skema->setCellValue("D".($i+3), $data['result'][$i]['id_unit_kompetensi']);
//                 $skema->setCellValue("E".($i+3), $data['result'][$i]['unit_kompetensi']);
//                 $skema->setCellValue("F".($i+4), clean(str_replace('', '', $data['result'][$i]['elemen_kompetensi'])));
//                 $skema->setCellValue("G".($i+ 4), clean(str_replace(' ', ' ', $data['result'][$i]['poin_kuk'])));

//                 //$aa[] = $data['result'][$i]['poin_kuk'];
//             }
//             $test[] = $data['result'][$i]['id_elemen_kompetensi'];
//             $temp_unit = $data['result'][$i]['id_unit_kompetensi'];
//             $temp_elemen = $data['result'][$i]['id_elemen_kompetensi'];
//             $pos++;
//         }

//         //$c_kuk = array_count_values($test);
//         $dis = (array_keys(array_unique($test)));
// foreach ($dis as $key => $value) {
// 	//if($key !== 0){
// 		$page->insertNewRowBefore($value + 3 + 2, 1);
// 	//}
// 	$bb[] = $value;
// }
// //$page->insertNewRowBefore(14, 1);
// //print_r($bb); die();
//         $objWriter = IOFactory::createWriter($excel, 'Excel5');
//         $objWriter->save("assets/files/excels/3.xls");
//         redirect ("assets/files/excels/3.xls");
//     }

    function export($id_skema)
    {
     $skema = kode_lsp().'skema';
     $skema_detail = kode_lsp().'skema_detail';
     $unit_kompetensi = kode_lsp().'unit_kompetensi';
     $elemen_kompetensi = kode_lsp().'elemen_kompetensi';
     $kuk = kode_lsp().'kuk';
     $asesi = kode_lsp().'asesi';
     $asesi_detail = kode_lsp().'asesi_detail';

     $d = $this->skema_model->export_skema($id_skema);
     $table='<table  width="250%" class="table table-stripped table-bordered" border="1">
     <tr align="center" style="font-weight:bold;">
     	<td  align="center"> No </td>
     	<td class"skema"> Kode Skema </td>
     	<td> Skema Sertifikasi </td>
     	<td> Kode Unit </td>
     	<td> Judul Unit Kompetensi</td>
     	<td> Elemen Kompetensi</td>
        <td> Dimensi</td>
     	<td  align="center">KUK</td>
     	<td> Pertanyaan Observasi</td>
     </tr>';
     $no=1;
     $real_unit = "";
     $real_elemen = "";
     $real_skema = "";
     foreach($d as $key=>$value){
     	if ($real_skema != $value->skema) {
     		$real_skema = $value->skema;
     			$table.=' <tr style="font-weight:normal;">
     			<td align="center"> '.$no.' </td>
     			<td class"kode_skema">'.ltrim($value->kode_skema).'</td>
     			<td class="kode_skema">'.ltrim($value->skema).'</td>
     			<td></td>
                <td></td>
     			<td></td>
     			<td> </td>
     			<td> </td>
     			<td> </td>
     			</tr>';
     	}
     	if($real_unit == $value->id_unit_kompetensi){
     		if($real_elemen != $value->id_elemen_kompetensi){
     			$table.=' <tr style="font-weight:normal;">
     			<td align="center"></td>
     			<td></td>
     			<td></td>
     			<td></td>
     			<td></td>
     			<td class="elemen">'.ltrim($value->elemen_kompetensi).'</td>
                <td>'.ltrim($value->dimensi_kompetensi).'</td>
     			<td> </td>
     			<td></td>
     			</tr>';
                          //if($real_elemen == $value->id_elemen_kompetensi){
     			$table.=' <tr style="font-weight:normal;">
     			<td align="center"></td>
     			<td></td>
     			<td></td>
     			<td></td>
     			<td>  </td>
     			<td>  </td>
                <td> </td>
     			<td class="kuk"> '.ltrim($value->poin_kuk).'</td>
     			<td> '.ltrim($value->pertanyaan).' </td>
     			</tr>';
     		}else{

     			$table.=' <tr style="font-weight:normal;">
     			<td align="center"></td>
     			<td></td>
     			<td></td>
     			<td></td>
     			<td>  </td>
     			<td> </td>
                <td> </td>
     			<td>'.ltrim($value->poin_kuk).'</td>
     			<td>'.ltrim($value->pertanyaan).'    			</td>
     			</tr>';
     		}
     	}else{
     		$table.=' <tr>
     		<td align="center"></td>
     		<td></td>
     		<td></td>
     		<td class="kode_unit"> '.$value->id_unit_kompetensi.' </td>
     		<td class="unit"> <b>'.$value->unit_kompetensi.'</b> </td>
     		<td align="center"> </td>
            <td> </td>
     		<td align="center"> </td>
     		<td>
     		</td>
     		</tr>';
     		$table.=' <tr style="font-weight:normal;">
     		<td align="center"></td>
     		<td></td>
     		<td></td>
     		<td></td>
            <td> </td>
            <td class="elemen"><b>'.ltrim($value->elemen_kompetensi).'</b> </td>
     		<td> </td>
     		<td> </td>
     		<td>
     		</td>
     		</tr>';
     		$table.=' <tr style="font-weight:normal;">
     		<td align="center"></td>
     		<td></td>
            <td> </td>
     		<td></td>
     		<td></td>
     		<td>  </td>
     		<td ></td>
     		<td class="kuk"> '.ltrim($value->poin_kuk).' </td>
     		<td class="select_bukti">
     		</td>
     		</tr>';
     		$no++;

     	}

     	$real_unit = $value->id_unit_kompetensi;
     	$real_elemen = $value->id_elemen_kompetensi;
     }
     $table .= '</table>';

		//var_dump($table); die();
     	$data['title'] = $d[0]->kode_skema;
		$data['data'] = $table;

		//var_dump($data); die();
    	$this->load->view('skema/export', $data);
    }

    function search() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $view = $this->load->view('skema/search', array(), TRUE);
            echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
        } else {
            block_access_method();
        }
    }

}
