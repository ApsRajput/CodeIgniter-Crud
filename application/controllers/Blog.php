<?php
class Blog extends CI_Controller {
 
    public function index()
    {
    	$data['todo_list'] = array('First Object', 'Second Object', 'Third Object');
    	$data['title'] = "Title";
    	$data['heading'] = "Heading";

        $this->load->view('cwblogview', $data);
    }
}