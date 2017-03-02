<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	//Page info
	protected $data = Array();
	protected $pageName = FALSE;
	protected $template = "main";
	protected $hasNav = TRUE;
	//Page contents
	protected $javascript = array();
	protected $css = array();
	protected $fonts = array();
	//Page Meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $keywords = FALSE;
	protected $author = FALSE;
	
	function __construct()
	{	

		parent::__construct();
		$this->data["uri_segment_1"] = $this->uri->segment(1);
		$this->data["uri_segment_2"] = $this->uri->segment(2);
		$this->title = $this->config->item('site_title');
		$this->description = $this->config->item('site_description');
		$this->keywords = $this->config->item('site_keywords');
		$this->author = $this->config->item('site_author');
		
		$this->pageName = strToLower(get_class($this));
                
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('url','form'));
                //$this->load->database('default');
	}
	 
	
	protected function _render($view,$renderData="FULLPAGE", $folder) {    
        switch ($renderData) {
        case "AJAX"     :
            $this->load->view($view,$this->data);
        break;
        case "JSON"     :
            echo json_encode($this->data);
        break;
        case "FULLPAGE" :
        default         : 
		//static
		$toTpl["javascript"] = $this->javascript;
		$toTpl["css"] = $this->css;
		$toTpl["fonts"] = $this->fonts;
		
		//meta
		$toTpl["title"] = $this->title;
		$toTpl["description"] = $this->description;
		$toTpl["keywords"] = $this->keywords;
		$toTpl["author"] = $this->author;
		
		//data
		$toBody["content_body"] = $this->load->view($view,array_merge($this->data,$toTpl),true);
		
		//check if user has logged in and load admin skeleton
		
		//nav menu
		if($this->hasNav){
			$this->load->helper("nav");
			$toMenu["pageName"] = $this->pageName;
			$toHeader["nav"] = $this->load->view($folder."/nav",$toMenu,true);
		}
		$toHeader["basejs"] = $this->load->view($folder."/basejs",$this->data,true);
		
		$toBody["header"] = $this->load->view($folder."/header",$toHeader,true);
		$toBody["footer"] = $this->load->view($folder."/footer",'',true);
		
		$toTpl["body"] = $this->load->view($folder."/".$this->template,$toBody,true);
		
		
		//render view
		$this->load->view($folder."/skeleton",$toTpl);
		 break;
    }
	}        
        
}
