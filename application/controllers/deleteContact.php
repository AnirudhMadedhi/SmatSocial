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
        $type=$this->input->post('data_store');
        if($type == "DATABASE")
        {
        $this->db->delete('contacts', array('id'=>$id));
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
        }

        else if($type == "CRM")
        {
            $ch = curl_init();
            $url="https://domain.freshsales.io/api/contacts/$id";
            $access="TRcytqeHoqGV-49FGcKn6Q";
            $header[] = 'Content-Type:  application/json';
            $header[] = 'Authorization: Token token='.$access;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
           // curl_setopt($ch, CURLOPT_POSTFIELDS, $id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
           // $result = json_decode($result);
            curl_close($ch);

            return $result;
        }
	}


}