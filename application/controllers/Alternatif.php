<?php

class Alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alternatif_model');
        $this->load->model('relasi_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['rows'] = $this->alternatif_model->tampil();
        $data['title'] = 'Alternatif';

        load_view('alternatif', $data);
    }

    public function lahan_user()
    {
        $data['lahan'] = $this->alternatif_model->peringkat_lahan();
        load_view_user('user/alternatif_lahan', $data);
    }

    public function tampil_peta()
    {
        $data['rows'] = $this->alternatif_model->tampil();
        $this->load->view('user/peta_lahan', $data);
    }

    public function detail_lahan_user($ID = NULL)
    {
        $data['row'] = $this->alternatif_model->get_alternatif_lahan_user($ID);
        $data['nilainya'] = $this->relasi_model->get_relasi($ID);
        $data['booking'] = $this->alternatif_model->cek_status_booking($ID);
        load_view_user('user/detail_lahan_user', $data);
    }

    public function tambah()
    {

        $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|is_unique[tb_alternatif.kode_alternatif]');
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('lat', 'Latitute', 'required');
        $this->form_validation->set_rules('lng', 'Longitude', 'required');
        $data['title'] = 'Tambah Alternatif';

        if ($this->form_validation->run() === FALSE) {
            load_view('alternatif_tambah', $data);
        } else {
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->upload->initialize($config);
                $this->upload->do_upload();
                $dataInfo[] = $this->upload->data();
            }
            $fields = array(
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar1' => $dataInfo[0]['file_name'],
                'gambar2' => $dataInfo[1]['file_name'],
                'gambar3' => $dataInfo[2]['file_name']
            );
            $this->alternatif_model->tambah($fields);
            redirect('relasi/ubah/' . $this->input->post('kode_alternatif'));
        }
    }

    public function ubah($ID = null)
    {
        $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('lat', 'Latitute', 'required');
        $this->form_validation->set_rules('lng', 'Longitude', 'required');

        $data['title'] = 'Ubah Alternatif';

        if ($this->form_validation->run() === FALSE) {
            $data['row'] = $this->alternatif_model->get_alternatif($ID);
            load_view('alternatif_ubah', $data);
        } else {
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->upload->initialize($config);
                $this->upload->do_upload();
                $dataInfo[] = $this->upload->data();
            }
            $fields = array(
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'keterangan' => $this->input->post('keterangan'),
                'gambar1' => $dataInfo[0]['file_name'],
                'gambar2' => $dataInfo[1]['file_name'],
                'gambar3' => $dataInfo[2]['file_name']
            );
            $this->alternatif_model->ubah($fields, $ID);
            redirect('alternatif');
        }
    }


    public function detail($ID = null)
    {
        $data['row'] = $this->alternatif_model->get_alternatif($ID);
        $data['title'] = $data['row']->nama_alternatif;
        $this->load->view('user/alternatif_detail', $data);
    }

    public function hapus($ID = null)
    {
        $this->alternatif_model->hapus($ID);
        redirect('alternatif');
    }

    public function cetak()
    {
        $data['rows'] = $this->alternatif_model->tampil();
        load_view_cetak('alternatif_cetak', $data);
    }
}