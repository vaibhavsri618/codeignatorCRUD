<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adduser extends CI_Controller
{

    public $id;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function user()
    {
        $inputdata = array();
        $email=$this->input->post('email');
        $this->load->model('Adduser_model');
        $row=$this->Adduser_model->login($email);
       // print_r($row);
        $len=count($row);
        //echo $len;

        if(($len)==0)
        {
            
        


        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('adddata');

        } else {
            $data = $this->input->post();
            $data['dateofsignup'] = date('Y-m-d');
            $row = $this->Adduser_model->insert($data);
            $this->session->set_flashdata('success', 'Record Entered Successfully!!!');

            redirect(base_url() . 'index.php/Adduser/login');
        }
    }
    else if($len!=0)
    {
        $this->session->set_flashdata('failure', 'Same Email already present!!!');
       //redirect(base_url() . 'index.php/Adduser/user');
       
       $this->load->view('adddata');
    }

    }

    public function show()
    {
        // $data = array();
        
        if($this->session->userdata('userdata') == true)
        {
            $this->load->model('Adduser_model');
            $userdata = $this->Adduser_model->show();
            $data['details'] = $userdata;
            //print_r($userdata);
            // $_SESSION['data'] = $userdata;
    
            $this->load->view('list', $data);
    
        } else 
        {
            print_r($this->id);
            $this->load->view('login');
            
        }

    }

    public function edit($id)
    {

        // $data = array();
        $this->load->model('Adduser_model');
        $userdata = $this->Adduser_model->editdata($id);

        $data['edit'] = $userdata;
        $this->load->view('edit', $data);
    }

    public function update($id)
    {
        $this->load->model('Adduser_model');
       

        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $data['email'] = $this->input->post('email');
        $data['user_name'] = $this->input->post('user_name');
        $data['user_id'] = $id;


		$this->Adduser_model->updatedata($id, $data);
		
		$this->session->set_flashdata('success', 'Record Updated Successfully!!!');

        redirect(base_url() . 'index.php/Adduser/show');
	}
	
	public function delete($id)
    {
        $this->load->model('Adduser_model');
       



		$this->Adduser_model->delete($id);
		
		$this->session->set_flashdata('success', 'Record Deleted Successfully!!!');

        redirect(base_url() . 'index.php/Adduser/show');
	}
	function login()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        
       
		if ($this->form_validation->run() == false) {
            $this->load->view('login');

		} else 
		{
		$array=$this->input->post();
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		$this->load->model('Adduser_model');
		$data=$this->Adduser_model->login($email);
		if(!empty($data))
		{
			foreach($data as $key=>$val)
			{
			if($password==$val['password'])
			{
                $this->id=$this->session->set_userdata('userdata', $email);
				redirect(base_url().'index.php/Adduser/show');
			} else
			{
				$this->session->set_flashdata('failure', 'Password doesnt matched!!!');
				redirect(base_url().'index.php/Adduser/login');
			}
			}
		} else
		{
			$this->session->set_flashdata('failure', 'User doesnt exist!!!');

		}
	}

    }
    
    function logout()
    {
       $this->session->sess_destroy('userdata');
        redirect(base_url().'index.php/Adduser/login');
    }
}
