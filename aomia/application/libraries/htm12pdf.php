<?php

ini_set("memory_limit", "64M");

 require_once(dirname(__FILE__). '/html2pdf/vendor/autoload.php');

class CI_htm12pdf {
	
	function __construct() {
		
	}

	function pdf_create($html, $filename, $attachment = TRUE, $stream=TRUE, $portrait = 'P')
	{
		 
        $this->pdf = new HTML2PDF($portrait,'A4','en');
		if ($stream) {
			$this->pdf->WriteHTML($html);
			//$this->pdf->Output($filename);
            //$path_simpan = BASEPATH.'..\assets\files\pdf\\';
            $this->pdf->Output($filename);
		} else {
			
			$CI =& get_instance();			
			$CI->load->helper('file');
			
		}
	}
}