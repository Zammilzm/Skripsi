<?php
class Kriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $data['rows'] = $this->kriteria_model->tampil($this->input->get('search'));
        $data['title'] = 'Kriteria';

        load_view('kriteria', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules( 'kode', 'Kode', 'required|is_unique[tb_kriteria.kode_kriteria]' );
        $this->form_validation->set_rules( 'nama', 'Nama', 'required' );
        $this->form_validation->set_rules( 'minmax', 'MinMax', 'required' );
        $this->form_validation->set_rules( 'bobot', 'Bobot', 'required' );
        $this->form_validation->set_rules( 'tipe', 'Tipe Preferensi', 'required' );
        $this->form_validation->set_rules( 'par_q', 'Parameter Q', 'required' );
        $this->form_validation->set_rules( 'par_p', 'Parameter P', 'required' );

        $data['title'] = 'Tambah Kriteria';

        if ($this->form_validation->run() === FALSE)
        {
            load_view('kriteria_tambah', $data);
        }
        else
        {
            $fields = array(
                'kode_kriteria' => $this->input->post('kode'),
                'nama_kriteria' => $this->input->post('nama'),
                'minmax' => $this->input->post('minmax'),
                'bobot' => $this->input->post('bobot'),
                'tipe' => $this->input->post('tipe'),
                'par_q' => $this->input->post('par_q'),
                'par_p' => $this->input->post('par_p'),
            );
            $this->kriteria_model->tambah($fields);
            redirect('kriteria');
        }
    }

    public function ubah( $ID = null )
    {
        $this->form_validation->set_rules( 'nama', 'Nama', 'required' );
        $this->form_validation->set_rules( 'minmax', 'MinMax', 'required' );
        $this->form_validation->set_rules( 'bobot', 'Bobot', 'required' );
        $this->form_validation->set_rules( 'tipe', 'Tipe Preferensi', 'required' );
        $this->form_validation->set_rules( 'par_q', 'Parameter Q', 'required' );
        $this->form_validation->set_rules( 'par_p', 'Parameter P', 'required' );

        $data['title'] = 'Ubah Kriteria';

        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->kriteria_model->get_kriteria($ID);
            load_view('kriteria_ubah', $data);
        }
        else
        {
            $fields = array(
                'nama_kriteria' => $this->input->post('nama'),
                'minmax' => $this->input->post('minmax'),
                'bobot' => $this->input->post('bobot'),
                'tipe' => $this->input->post('tipe'),
                'par_q' => $this->input->post('par_q'),
                'par_p' => $this->input->post('par_p'),
            );
            $this->kriteria_model->ubah($fields, $ID);
            redirect('kriteria');
        }
    }

    public function hapus( $ID = null )
    {
        $this->kriteria_model->hapus($ID);
        redirect('kriteria');
    }

    public function cetak( $search ='' )
    {
        $data['rows'] = $this->kriteria_model->tampil($search);
        load_view_cetak('kriteria_cetak', $data);
    }
}