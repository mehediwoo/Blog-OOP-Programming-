<?php 

	/**
	 * Date Formate
	 */
	class Format{
		
		public function dateformate($date){
			return date('F j, Y, g:i a',strtotime($date));
		}

		public function textShorten($text){
			return $text = substr($text, 0,300).'......';
		}

		public function regex($data){
			if (!preg_match('/^[A-Za-z0-9]/', $data)) {
				echo "<script>alert('You can use only A-Z,a-z,0-9')</script>";
			}
		}
		public function regexCate($data){
			if (!preg_match('/^[A-Za-z]/', $data)) {
				echo "<script>alert('You can use only A-Z,a-z')</script>";
			}
		}
		public function title(){
			$path  = $_SERVER['SCRIPT_FILENAME'];
			$title = basename($path,'.php');
			if ($title== 'index') {
				$title = 'Home';
			}elseif ($title=='contact') {
				$title = 'Contact';
			}
			return $title;
		}
	}




 ?>