<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    Public $_indiantime;
  
     function __construct() {
	   parent::__construct();
	    $this->load->helper('url');
		$this->load->model('Users');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('image_lib');
        error_reporting(0);
        $this->_indiantime = $this->Users->getIndianTime();
        
        if(!$this->session->userdata('id')){
        	return redirect('Snmy');
        }
        
	}
	
    public function index(){
        $header['title'] = 'Dashboard';
      $data['Indiantime']= $this->_indiantime;
      $this->load->view('header.php',$header);
      $this->load->view('sidebar.php');
      $this->load->view('dashboard/index', $data);
      $this->load->view('footer.php');
      }

    public function userslist(){
        $data = array();
       $data['Countuser']= $this->Users->countUserlist(); 
  	  $data['userslists']= $this->Users->userlistData(); 
      $this->load->view('userslist', $data);
    }

    public function addcelebrity(){
   
   
        $config['upload_path'] = './assets/images/user_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['image']['name'])));
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = array(
            'image' => $config['file_name']
        );

        $path = './assets/images/user_image/' . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['image']['name'])));
        $this->Addcelebrities($path );


        $upload_data = $this->upload->data();
        $upload_img_data = getimagesize($upload_data['full_path']);
        $water_mark = "";
        $configrez['image_library'] = 'gd2';
        $configrez['source_image'] = $path;
        $configrez['create_thumb'] = TRUE;
        $configrez['maintain_ratio'] = FALSE;
        
        if ($upload_img_data[0] > $upload_img_data[1]) {
            
            $configrez['width'] = $upload_img_data[1];
            $configrez['height'] = $upload_img_data[1];
            $configrez['x_axis'] = ($upload_img_data[0] - $upload_img_data[1]) / 2;
            $configrez['y_axis'] = 0;
            $water_mark = $upload_img_data[1];
            
        } else {
            
            $configrez['width'] = $upload_img_data[0];
            $configrez['height'] = $upload_img_data[0];
            $configrez['x_axis'] = 0;
            $configrez['y_axis'] = ($upload_img_data[1] - $upload_img_data[0]) / 2;
            $water_mark = $upload_img_data[0];
            
        }


        $this->image_lib->initialize($configrez);
        $this->image_lib->crop();
        $this->Addcelebrities();

        $configrez2['image_library'] = 'gd2';
        $configrez2['source_image'] = $path;
        $configrez2['create_thumb'] = TRUE;
        $configrez2['maintain_ratio'] = FALSE;
        $configrez2['width'] = "800";
        $configrez2['height'] = "800";
        $this->image_lib->initialize($configrez2);
        $this->image_lib->resize();
        $this->Addcelebrities();

        $configwm['source_image'] = $path;
        $configwm['wm_overlay_path'] = './assets/images/user_image/watermark.png';
        $configwm['wm_type'] = 'overlay';
        $configwm['wm_opacity'] = '100';
        $configwm['wm_vrt_alignment'] = 'middle';
        $configwm['wm_hor_alignment'] = 'center';

         $this->image_lib->initialize($configwm);
         $this->image_lib->watermark();
        

         echo 'Successfuly Uploaded';
     
                
    }
    
   public function Addcelebrities(){
        
       // echo $gaurav;
        $celebrity = [
                         'name'        => $this->input->post('Name'),
                         'nick_name'   => $this->input->post('nick_name'),
                         'dob'         =>$this->input->post('dob'),
                         'birth_place' =>$this->input->post('birth_place'),
                         'Nationality' =>$this->input->post('Nationality'),
                         'Weight'      =>  $this->input->post('Weight'),
                         'social_media_links' => $this->input->post('Social_Platform'),
                         'small_desc' =>$this->input->post('Small_Description'),
                         'measurements'=>$this->input->post('Measurement'),

                         

             ];
            
            ///$celebrity = $img;

             $data['addcelebrity']= $this->Users->addCelerity($celebrity);

   }
    public function subscriberslist(){

        $data = array();
	    $data['email_notification']= $this->Users->countSubscriberlist(); 
      $data['subscriberlist']= $this->Users->subscriberData(); 
      $this->load->view('subscriberslist', $data);
      
    }

    public function celebritylist(){
        
     $data = array();

     $data['celebrity']= $this->Users->countcelebritylist(); 
     $data['celebritylistData']= $this->Users->celebrityData(); 
     $this->load->view('celebritylist',$data);

    }
    

    }
