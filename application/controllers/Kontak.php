<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontak extends My_Controller
{
     protected $access = array('Admin','Pelanggan');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kontak = $this->Kontak_model->get_all();

        $title = array(
            'title' => 'kontak',
        );

        $data = array(
            'kontak_data' => $kontak,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('kontak/kontak_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'email' => $row->email,
		'no_tlp' => $row->no_tlp,
	    );

            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('kontak/kontak_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kontak/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'email' => set_value('email'),
	    'no_tlp' => set_value('no_tlp'),
	);
         $title = array(
            'title' => 'Detail',
            );
        $this->load->view('cover/header', $title);
        $this->load->view('kontak/kontak_form', $data);
        $this->load->view('cover/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_tlp' => $this->input->post('no_tlp',TRUE),
	    );
        
            $this->Kontak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kontak/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'email' => set_value('email', $row->email),
		'no_tlp' => set_value('no_tlp', $row->no_tlp),
	    );
            
            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('kontak/kontak_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_tlp' => $this->input->post('no_tlp',TRUE),
	    );

            $this->Kontak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $this->Kontak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kontak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kontak.xls";
        $judul = "kontak";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "No Tlp");

	foreach ($this->Kontak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_tlp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kontak.doc");

        $data = array(
            'kontak_data' => $this->Kontak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kontak/kontak_doc',$data);
    }

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-19 20:48:20 */
/* http://harviacode.com */