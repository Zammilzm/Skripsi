<?php

function load_view($view, $data = array())
{
    $CI =&get_instance();
    $CI->load->view('header', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer', $data);    
}

function load_view_user($view, $data = array())
{
    $CI =&get_instance();
    $CI->load->view('user/header_user', $data);
    $CI->load->view($view, $data);
    $CI->load->view('user/footer_user', $data);
}

function load_view_cetak($view, $data = array())
{
    $CI =&get_instance();
    $CI->load->view('header_cetak', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_cetak', $data);    
}

function load_message($message = '', $type = 'danger')
{
    if($type=='danger') 
    {
        $data['title'] = 'Error';
    }
    else 
    {
        $data['title'] = 'Success';
    }
    
    $data['class'] = $type;
    $data['message'] = $message;
    
    load_view('message', $data);
    
}

function kode_oto($field, $table, $prefix, $length){
    $CI =& get_instance();
    $query = $CI->db->query("SELECT $field AS kode FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");    
    $row = $query->row_object();    
    
    if($row){
        return $prefix . substr( str_repeat('0', $length) . (substr($row->kode, - $length) + 1), - $length );
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_kriteria_option($selected = ''){
    $CI =& get_instance();    
    $rows = $CI->kriteria_model->tampil();
    
    $a = '';
    foreach($rows as $row){
        if($selected==$row->kode_kriteria)
            $a.="<option value='$row->kode_kriteria' selected>$row->nama_kriteria</option>";
        else
            $a.= "<option value='$row->kode_kriteria'>$row->nama_kriteria</option>";
    }
    return $a;
}

function get_minmax_option($selected = ''){
    $atribut = array('maksimasi'=>'Maksimasi', 'minimasi'=>'Minimasi');   
    $a = '';
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_tipe_option($selected = ''){
    $atribut = array(
        '1'=>'Tipe 1', 
        '2'=>'Tipe 2',
        '3'=>'Tipe 3',
        '4'=>'Tipe 4',
        '5'=>'Tipe 5',
    );   
    $a = '';
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function print_error(){
    return validation_errors('<div class="alert alert-danger" alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
}