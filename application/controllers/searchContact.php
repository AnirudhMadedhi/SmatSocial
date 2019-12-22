<?php
   
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
     
class searchContact extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('contact_search');
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
        $name=$this->input->post('name');
        $final=$this->contact_search->search($name);
        // $data = $this->db->where("contacts", ['first_name' => $name])->get();
        // $data2 = $this->db->select('*')->from('contacts')
        // ->group_start()
        //         ->where('first_name', $name)
        //         ->or_group_start()
        //                 ->where('last_name', $name)
        //         ->group_end()
        // ->group_end()->get();
          //  $data2=$this->db->query("select email from contacts where first_name='".$name."' or last_name='".$name."'");
        //   function get_search($example)
        //   {
        //         $this->db->from('contacts');
        //       $this->db->where('first_name=', $example);
        //       $this->db->or_where('last_name', $example);
        //     //   $this->db->or_like('Plaats', $match);
        //     //   $this->db->or_like('Telefoonnummer', $match);
        //     //   $this->db->or_like('Email', $match);
        //     //   $this->db->or_like('Website', $match);
        //     //   $this->db->or_like('Profiel', $match);
        //     //   $this->db->or_like('Adres', $match);
        //       $query = $this->db->get();
          
        //       return $query->result();
        //   }

        //   $data3=get_search($name);
     
        $this->response($final, REST_Controller::HTTP_OK);
    }
        
   

	


}