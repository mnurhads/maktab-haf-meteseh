<?php
/**
* 
*/
class Connection
{
	//local
	var $host		= "localhost";
	var $username	= "root";
	var $password	= "";
	var $db			= "maktab";

	function conn() {
		$koneksi = mysqli_connect($this->host, $this->username, $this->password) or die("Gagal koneksi database! msg: ". mysqli_connect_error());
		$select_db = mysqli_select_db($koneksi, $this->db) or die("Database tidak ditemukan! msg: ". mysqli_error($koneksi));
		return $koneksi;
	}

	function query($request){
		return mysqli_query($this->conn(), $request);
	}
	
	function num_rows($request){
		return mysqli_num_rows(mysqli_query($this->conn(), $request));
	}

	function fetch_assoc($request) {
		return mysqli_fetch_assoc(mysqli_query($this->conn(), $request));
	}

	function fetch_array($request) {
		return mysqli_fetch_array(mysqli_query($this->conn(), $request));
	}

	// list function global restful api

	function convertNumberRoman($number) {
	    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
	    $returnValue = '';
	    while ($number > 0) {
	        foreach ($map as $roman => $int) {
	            if($number >= $int) {
	                $number -= $int;
	                $returnValue .= $roman;
	                break;
	            }
	        }
	    }
	    return $returnValue;
	}

	function generateReferral($username, $length)
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    $generateUser = substr(md5($username), 4, 4);
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $generateUser.$randomString;
	}

	function get_token($panjang){
		$token = array(
		 range(1,50),
		 range('a','z'),
		 range('A','Z'),
		);
	  
		$karakter = array();
		foreach($token as $key=>$val){
		 foreach($val as $k=>$v){
		  $karakter[] = $v;
		 }
		}
	  
		$token = null;
		for($i=1; $i<=$panjang; $i++){
		 // mengambil array secara acak
		 $token .= $karakter[rand($i, count($karakter) - 3)];
		}
	  
		 return $token;
	}
}

?>