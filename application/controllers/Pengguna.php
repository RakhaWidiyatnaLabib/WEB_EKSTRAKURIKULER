<?php
if (defined('basepath')) exit('No direct access script allowed');

class Pengguna extends CI_Controller{
    
    var $message;
    
    function __construct(){
        parent::__construct();
        $this->load->model('GlobalCrud','crud');
        $this->load->model('UserModel','user');
        if($this->session->userdata('role') != 1){
            redirect('login');
        }
    }
    
    function create(){
        $this->validation();
        if($this->form_validation->run() == FALSE){
            $this->message = "Komponen Pembina Wajib Diisi !";
            $this->session->set_flashdata('warning', $this->message);            
            redirect('admin/pengguna');
        } else {
            $query = array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
            );
            $this->crud->insert('pembina', $query);
            $this->message = "Pembina Baru Berhasil Disimpan :)";
            $this->session->set_flashdata('success', $this->message);
            redirect('admin/pengguna');
        }
    }
    
    public function update() {
        $this->validation();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('warning', "Komponen Pengguna Wajib Diisi !");
            redirect('admin/pengguna');
        } else {
            $query = array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
            );
            $this->crud->update('pembina', $query, 'id_pembina', $this->input->post('id_pembina'));
            $this->session->set_flashdata('success', "Pengguna Berhasil Diubah :)");
            redirect('admin/pengguna');
        }
    }
    
    public function destroy($id) {
        $this->crud->delete('pembina', 'id_pembina', $id);
        $this->session->set_flashdata('success', "Pengguna berhasil dihapus :)");
        redirect('admin/pengguna');
    }
    
    function validation(){
        $this->form_validation->set_rules('nama', '', 'required');
        $this->form_validation->set_rules('jabatan', '', 'required');
    }
}
