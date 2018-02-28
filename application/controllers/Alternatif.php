<?php
class Alternatif extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alternatif_model');
        $this->load->model('relasi_model');
    }

    public function index()
    {
        $data['rows'] = $this->alternatif_model->tampil($this->input->get('search'));
        $data['title'] = 'Alternatif';

        load_view('alternatif', $data);
    }

    public function lahan_user(){
        $data['lahan'] = $this->alternatif_model->peringkat_lahan();
       load_view_user('user/alternatif_lahan',$data);
    }

    public function detail_lahan_user($ID = NULL){
        $data['rows'] = $this->alternatif_model->get_alternatif_lahan_user($ID);
        $data['nilainya'] = $this->relasi_model->get_relasi($ID);
        load_view_user('user/detail_lahan_user', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules( 'kode_alternatif', 'Kode Alternatif', 'required|is_unique[tb_alternatif.kode_alternatif]' );
        $this->form_validation->set_rules( 'nama_alternatif', 'Nama Alternatif', 'required' );
        $this->form_validation->set_rules( 'lat', 'Latitute', 'required' );
        $this->form_validation->set_rules( 'lng', 'Longitude', 'required' );

        $data['title'] = 'Tambah Alternatif';

        if ($this->form_validation->run() === FALSE)
        {
            load_view('alternatif_tambah', $data);
        }
        else
        {
            $fields = array(
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->alternatif_model->tambah($fields);
            redirect('relasi/ubah/'. $this->input->post('kode_alternatif'));
        }
    }

    public function ubah( $ID = null )
    {
        $this->form_validation->set_rules( 'kode_alternatif', 'Kode Alternatif', 'required' );
        $this->form_validation->set_rules( 'nama_alternatif', 'Nama Alternatif', 'required' );
        $this->form_validation->set_rules( 'lat', 'Latitute', 'required' );
        $this->form_validation->set_rules( 'lng', 'Longitude', 'required' );

        $data['title'] = 'Ubah Alternatif';

        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->alternatif_model->get_alternatif($ID);
            load_view('alternatif_ubah', $data);
        }
        else
        {
            $fields = array(
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->alternatif_model->ubah($fields, $ID);
            redirect('alternatif');
        }
    }


    public function detail( $ID = null )
    {
        $data['row'] = $this->alternatif_model->get_alternatif($ID);
        $data['title'] = $data['row']->nama_alternatif;
        load_view('alternatif_detail', $data);

    }

    public function hapus( $ID = null )
    {
        $this->alternatif_model->hapus($ID);
        redirect('alternatif');
    }

    public function cetak( $search ='' )
    {
        $data['rows'] = $this->alternatif_model->tampil($search);
        load_view_cetak('alternatif_cetak', $data);
    }
}