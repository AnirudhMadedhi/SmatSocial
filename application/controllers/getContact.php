<?php
   
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
     
class getContact extends REST_Controller {
    
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
        $id=$this->input->post('contact_id');
        $type=$this->input->post('data_store');
        if($type =="DATABASE")
        {
        if(!empty($id)){
            $data = $this->db->get_where("contacts", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("contacts")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
        }
        
        else if($type == "CRM")
        {
            $url="https://domain.freshsales.io/api/contacts/.$id.?include=sales_accounts";
            $access="TRcytqeHoqGV-49FGcKn6Q";
            $header[] = 'Content-type:  application/json';
            $header[] = 'Authorization: Token token='.$access;
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            print_r($data);
        }

	}


}