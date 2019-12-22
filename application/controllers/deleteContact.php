<?php
   
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
     
class deleteContact extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
	{
        
        $id = $this->input->post('contact_id');
        $this->db->delete('contacts', array('id'=>$id));
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
	}


}