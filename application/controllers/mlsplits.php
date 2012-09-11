<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mlsplits extends CI_Controller {

	public function index()
	{
	       // load model, connect to database
	       $this->load->model('mlsplitsmodel');
	       $this->load->library('form_validation');
	       
	       $this->load->view('header');
	       $this->load->view('main_view');
	       $this->load->view('footer');
	}
	
	function playersearch()
	{
		
	    // load model, connect to database   
	    $this->load->library('form_validation');
	    $this->load->model('mlsplitsmodel');
	    
	    if(!$_POST)
	       { redirect('/mlsplits'); }
            
            $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[90]|xss_clean');
            $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[90]|xss_clean');
            
            // assign name vars
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
                        
            if ($this->form_validation->run() == FALSE) // failure
            {
                $this->load->view('header');
		$this->load->view('main_view');
		$this->load->view('footer');
            }
            else // success, pass the array
            {
		// query db with firstname/lastname (it will be escaped/cleaned there)
                $data['players'] = $this->mlsplitsmodel->playersearch($firstname, $lastname);
                
                $this->load->view('header');
		$this->load->view('main_view', $data);
		$this->load->view('footer');
            }
	       
	}
	function playerinfo()
	{
		// load model, connect to database
	       $this->load->model('mlsplitsmodel');
	       
	       // get the mlbamid from the URL
	       $mlbamid = $this->uri->segment(3, 0);
	       
	       if($mlbamid == 0)
	       { redirect('/mlsplits'); }
	       
	       $data['mlbamid'] = $mlbamid;
	       
	       // give me the player's name
	       $data['playername'] = $this->mlsplitsmodel->playername($mlbamid);
	       
	       // give me league average data
	       $leagues = $this->mlsplitsmodel->averageleagues($mlbamid);
	       
	       if($leagues)
		{
		foreach($leagues as $key => $value)
		{
		 $data['leagues'][$key] = $value;
		}
	       }
	       
	       // give me the player's information - batters
	       $data['playerinfo'] = $this->mlsplitsmodel->playerquery($mlbamid);
	       $data['playerinfopark'] = $this->mlsplitsmodel->parkadjplayerquery($mlbamid);
	       $data['playerinfomle'] = $this->mlsplitsmodel->mleadjplayerquery($mlbamid);
	       $data['playertotalmle'] = $this->mlsplitsmodel->mletotalquery($mlbamid);
           
               // give me the player's information - pitchers
	       $data['pitcherinfo'] = $this->mlsplitsmodel->pitcherquery($mlbamid);
	       $data['pitcherinfopark'] = $this->mlsplitsmodel->parkadjpitcherquery($mlbamid);
	       $data['pitcherinfomle'] = $this->mlsplitsmodel->mleadjpitcherquery($mlbamid);
	       $data['pitchertotalmle'] = $this->mlsplitsmodel->mletotalpitcherquery($mlbamid);
	       
	       $this->load->view('playerinfo_view', $data);
	       $this->load->view('footer');
	}
	
	function top30batters()
	{
		// load model, connect to database
	       $this->load->model('mlsplitsmodel');
	       
	       // list the top 30 batters
	       $data['playerinfomle'] = $this->mlsplitsmodel->top30mletotalquery();
	       
	       $this->load->view('top30batters_view', $data);
	       $this->load->view('footer');
	}
	
	function mlecalc()
	{
		$this->load->view('mlecalc_view');
	        $this->load->view('footer');
	}
}