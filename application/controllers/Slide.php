<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slide extends My_Controller
{
     protected $access = array('Admin','Pelanggan');

    function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $slide = $this->Slide_model->get_all();

        $title = array(
            'title' => 'slide',
        );

        $data = array(
            'slide_data' => $slide,
        );
        $this->load->view('cover/header', $title);
        $this->load->view('slide/slide_list', $data);
        $this->load->view('cover/footer');
    }

    public function read($id) 
    {
        $row = $this->Slide_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'lokasi' => $row->lokasi,
	    );

            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('slide/slide_read', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('slide/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'lokasi' => set_value('lokasi'),
	);
         $title = array(
            'title' => 'Detail',
            );
        $this->load->view('cover/header', $title);
        $this->load->view('slide/slide_form', $data);
        $this->load->view('cover/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );
        
            $this->Slide_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slide'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('slide/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'lokasi' => set_value('lokasi', $row->lokasi),
	    );
            
            $title = array(
            'title' => 'Detail',
            );
            $this->load->view('cover/header', $title);
            $this->load->view('slide/slide_form', $data);
            $this->load->view('cover/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );

            $this->Slide_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slide'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $this->Slide_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slide'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "slide.xls";
        $judul = "slide";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");

	foreach ($this->Slide_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=slide.doc");

        $data = array(
            'slide_data' => $this->Slide_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('slide/slide_doc',$data);
    }

}

/* End of file Slide.php */
/* Location: ./application/controllers/Slide.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-19 20:48:20 */
/* http://harviacode.com */