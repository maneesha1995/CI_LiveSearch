<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {




    public function index() {
        $this->load->model('AutoComplete');
        $data['names']=$this->AutoComplete->getname_query();
		$this->load->view('crud_view',$data);

	}


	

}
