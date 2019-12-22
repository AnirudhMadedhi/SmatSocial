<?php
   
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
     
class updateContact extends REST_Controller {
    
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
        $type=$this->input->post('data_store');
        if($type == "DATABASE")
        {
        $id = $this->input->post('contact_id');
        $newinput['mobile_number']=$this->input->post('mobile_number');
        $newinput['email']=$this->input->post('email');
        $this->db->update('contacts', $newinput, array('id'=>$id));

     

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
        }

        else if($type == "CRM")
        {
            $id = $this->input->post('contact_id');
            $url="https://techdeccan.freshsales.io/api/contacts/'.$id.'";
            $access="TRcytqeHoqGV-49FGcKn6Q";
            $newinput['first_name']=$this->input->post('first_name');
            $newinput['last_name']=$this->input->post('last_name');
            $newinput['email']=$this->input->post('email');
            $newinput['mobile_number']=$this->input->post('mobile_number');
            $data = array("contact" => $newinput);
            $data_string = json_encode($data);
            $ch = curl_init($url);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
            curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json', 
                'Authorization: Token token='.$access,                                                                               
                'Content-Length: ' . strlen($data_string))                                                                       
                                );                                                                                                                   
            $result = curl_exec($ch);
            print_r($result);
        }
	}


}