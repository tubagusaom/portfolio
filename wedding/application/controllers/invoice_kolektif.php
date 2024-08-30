<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_kolektif extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('invoice_kolektif_model');
    }

    function upload() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = $this->invoice_kolektif_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->invoice_kolektif_model->check_unique($data)) {
                    if (isset($_FILES['fileToUpload']['tmp_name']) && !empty($_FILES['fileToUpload']['tmp_name'])) {
                        $data['file_bukti'] = str_replace(' ', '_', $_FILES['fileToUpload']['name']);
                        $config['upload_path'] = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/invoice/';
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '512000000';

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('fileToUpload')) {
                            echo json_encode(array('msgType' => 'error', 'msgValue' => $this->upload->display_errors()));
                            exit();
                        }
                    } else {
                        $data['file_bukti'] = "";
                    }
                   
                    if ($this->invoice_kolektif_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", strip_tag($this->invoice_kolektif_model->get_validation()))));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }

   
    function download($id = false) {
        if (!$id) {
            block_access_method();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $docs = $this->invoice_kolektif_model->get(intval($id));
                if (sizeof($docs) == 1) {
                    $doc = $this->invoice_kolektif_model->get_single($docs);
                    $files = substr(__dir__, 0, strpos(__dir__, "application")) . 'assets/files/invoice_kolektif/' . $doc->file_perangkat;
                    if (file_exists($files)) {
                        header('Cache-Control: public');
                        header('Content-Disposition: attachment; filename="' . $doc->file_perangkat . '"');
                        readfile($files);
                        //$this->db->query("UPDATE t_repositori SET jumlah_download=jumlah_download+1 WHERE id= $id");
                        //
                        //redirect(base_url());
                        die();
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'File tidak dapat ditemukan'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan'));
                }
            }
        }
    }


    function edit_upload($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->invoice_kolektif_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->invoice_kolektif_model->check_unique($data, intval($id))) {
                    
                    $data['file_hidden'] = $this->input->post('file_hidden');
                    if ($this->invoice_kolektif_model->update(intval($id), $data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->invoice_kolektif_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        }
    }

    

    function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->load->library('grid');
            $grid = $this->grid->set_properties(array('model' => 'invoice_kolektif_model', 'controller' => 'invoice_kolektif', 'options' => array('id' => 'invoice_kolektif', 'pagination', 'rows_number')))->load_model()->set_grid();
            $view = $this->load->view('invoice_kolektif/index', array('grid' => $grid), true);
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
            $id_asesor = $this->auth->get_user_data()->pegawai_id;

            //var_dump($jenis_user);
            if ($jenis_user == 2) {
                $array_asesor = $this->invoice_kolektif_model->get_id_asesor($id_asesor);

                $user_id = $this->auth->get_user_data()->id;
                $where[kode_lsp() . 'invoice_kolektif.id IN (' . $array_asesor . ') AND ' . kode_lsp() . 'invoice_kolektif.id !='] = '';
            } else if ($jenis_user == 1) {
                $user_id = $this->auth->get_user_data()->pegawai_id;
                $query_asesi = $this->db->query("SELECT b.id,c.nama_lengkap,a.tanggal,a.download_time
FROM lsp508_jadual_asesmen a
JOIN lsp508_invoice_kolektif b ON a.id_perangkat=b.id
JOIN lsp508_asesi c ON c.jadwal_id=a.id WHERE c.id=$user_id")->row();
                //$this->db->where('id',$query_asesi->id)
                $val1 = $query_asesi->tanggal . ' ' . $query_asesi->download_time;
                date_default_timezone_set('Asia/Jakarta');
                $val2 = date('Y-m-d H:i:s');
                $datetime1 = new DateTime($val1);
                $datetime2 = new DateTime($val2);

                if ($datetime1 < $datetime2) {

                    $where[kode_lsp() . 'invoice_kolektif.id'] = $query_asesi->id;
                } else {
                    $where[kode_lsp() . 'invoice_kolektif.id'] = "";
                }
            }

            if (isset($_POST['nama_perangkat']) && !empty($_POST['nama_perangkat'])) {
                $where['nama_perangkat like'] = '%' . $this->input->post('nama_perangkat') . '%';
            }


            if (isset($where))
                $params['_where'] = $where;
            $data['total'] = isset($where) ? $this->invoice_kolektif_model->count_by($where) : $this->invoice_kolektif_model->count_all();
            $this->invoice_kolektif_model->limit($row, $offset);
            $order = $this->invoice_kolektif_model->get_params('_order');
            //$rows = isset($where) ? $this->invoice_kolektif_model->order_by($order)->get_many_by($where) : $this->invoice_kolektif_model->order_by($order)->get_all();
            $rows = $this->invoice_kolektif_model->set_params($params)->with(array('pembuat', 'skema'));
            $data['rows'] = $this->invoice_kolektif_model->get_selected()->data_formatter($rows);
            echo json_encode($data);
        } else {
            block_access_method();
        }
    }

    function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->invoice_kolektif_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->invoice_kolektif_model->check_unique($data)) {
                    if ($this->invoice_kolektif_model->insert($data) !== false) {
                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->invoice_kolektif_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $this->load->model('skema_model');
            $skema = $this->skema_model->dropdown('id', 'skema');

            echo json_encode(array('msgType' => 'success', 'msgValue' => $this->load->view('invoice_kolektif/add', array('skema_perangkat' => $skema), TRUE)));
        }
    }

    function edit($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->invoice_kolektif_model->set_validation()->validate();
            if ($data !== false) {
                if ($this->invoice_kolektif_model->check_unique($data, intval($id))) {
                    if ($this->invoice_kolektif_model->update(intval($id), $data) !== false) {
                       

                        echo json_encode(array('msgType' => 'success', 'msgValue' => 'Data berhasil disimpan !'));
                    } else {
                        echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat disimpan !'));
                    }
                } else {
                    echo json_encode(array('msgType' => 'error', 'msgValue' => implode("<br/>", $this->invoice_kolektif_model->get_validation())));
                }
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => validation_errors()));
            }
        } else {
            $invoice_kolektif = $this->invoice_kolektif_model->get(intval($id));
            if (sizeof($invoice_kolektif) == 1) {
                $data_aplikasi = $this->db->get('r_konfigurasi_aplikasi')->row();
                $view = $this->load->view('invoice_kolektif/edit', array('data_aplikasi' => $data_aplikasi,'url' => base_url() . 'invoice_kolektif/edit_upload/' . $id, 'data' => $this->invoice_kolektif_model->get_single($invoice_kolektif)), TRUE);
                echo json_encode(array('msgType' => 'success', 'msgValue' => $view));
            } else {
                echo json_encode(array('msgType' => 'error', 'msgValue' => 'Data tidak dapat ditemukan !'));
            }
        }
    }

   

    function combogrid($segmen = false, $id = false) {
        //$this->load->model('invoice_kolektif_model');
        $row = intval($this->input->post('rows')) == 0 ? 20 : intval($this->input->post('rows'));
        $page = intval($this->input->post('page')) == 0 ? 1 : intval($this->input->post('page'));
        $offset = $row * ($page - 1);
        $data = array();
        $params = array('_return' => 'data');
        if (isset($_POST['q'])) {
            $where['nama_lengkap LIKE'] = "%" . $this->input->post('q') . "%";
        }
        if ($segmen != false) {
            $where['id_users IS NULL AND id !='] = "";
        }

        if (isset($where))
            $params['_where'] = $where;
        $data['total'] = isset($where) ? $this->invoice_kolektif_model->count_by($where) : $this->invoice_kolektif_model->count_all();
        $this->invoice_kolektif_model->limit($row, $offset);
        $order_criteria = "ASC";
        $_order_escape = TRUE;
        if ($id) {
            $order = "FIELD(id, " . intval($id) . ")";
            $order_criteria = "DESC";
            $_order_escape = FALSE;
        } else {
            $order = $this->invoice_kolektif_model->get_params('_order');
        }
        $rows = isset($where) ? $this->invoice_kolektif_model->order_by($order, $order_criteria, $_order_escape)->get_many_by($where) : $this->invoice_kolektif_model->order_by($order, $order_criteria, $_order_escape)->get_all();
        $data['rows'] = $this->invoice_kolektif_model->get_selected()->data_formatter($rows);
        //var_dump($data);
        echo json_encode($data);
    }

    function delete($id = false) {
        if (!$id) {
            data_not_found();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dokumen = $this->invoice_kolektif_model->get(intval($id));
			if(sizeof($dokumen) == 1)
			{
				if($this->invoice_kolektif_model->delete(intval($id)))
				{
					unlink(substr(__dir__,0, strpos( __dir__,"application")) . 'assets/files/repositori/' . $dokumen->nama_file);
					echo json_encode(array('msgType'=>'success', 'msgValue'=>'Data berhasil dihapus'));
				}
				else
				{
					echo json_encode(array('msgType'=>'error', 'msgValue'=>'Data tidak berhasil dihapus !'));
				}
			}
			else
			{
				echo json_encode(array('msgType'=>'error', 'msgValue'=>'Data tidak dapat ditemukan !'));
			}
        } else {
            block_access_method();
        }
    }
}
