<?php
   
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
     
class createContact extends REST_Controller {
    
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
        $input = $this->input->post();
        $type=$this->input->post('data_store');
        if($type=="DATABASE")
        {
        $newinput['first_name']=$this->input->post('first_name');
        $newinput['last_name']=$this->input->post('last_name');
        $newinput['email']=$this->input->post('email');
        $newinput['mobile_number']=$this->input->post('mobile_number');
        $this->db->insert('contacts',$newinput);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
        }

        else if($type=="CRM")
        {
            //curl -H ("Authorization: Token token=sfg999666t673t7t82" -H "Content-Type: application/json" -d '{"lead":{"first_name":, "last_name":"Sampleton (sample)", "mobile_number":"1-926-652-9503", "company": {"name":"Widgetz.io (sample)"} }}' -X POST "https://domain.freshsales.io/api/leads");
            $newinput['first_name']=$this->input->post('first_name');
            $newinput['last_name']=$this->input->post('last_name');
            $newinput['email']=$this->input->post('email');
            $newinput['mobile_number']=$this->input->post('mobile_number');
            $data = array("contact" => $newinput);
            $data_string = json_encode($data);
            $ch = curl_init(); 
            $url="https://techdeccan.freshsales.io/api/contacts";
            $access="TRcytqeHoqGV-49FGcKn6Q";
            $header = array();
            $header[] = 'Content-length: '. strlen($data_string);
            $header[] = 'Content-type:  application/json';
            $header[] = 'Authorization: Token token='.$access;
            $postData='';
           // $data_string = json_encode(array("contact" =>$newinput));
          // $data_string = urlencode(json_encode($newinput));
         
            // foreach($newinput as $k => $v) 
            // { 
            //     $postData .= $k . '='.$v.'&'; 
            // }
            //     $postData = rtrim($postData, '&');
 
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            // $headr = array();
            // $headr[] = 'Content-length: 0';
            // $headr[] = 'Content-type: application/json';
            // $headr[] = 'Authorization: OAuth '.$access;
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            //curl_setopt($ch, CURLOPT_POST, $newinput);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);    

            $output=curl_exec($ch);

            curl_close($ch);
            print_r($output);
        }
    } 


}