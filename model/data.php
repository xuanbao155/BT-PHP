<?php 
	/**
	 * summary
	 */
	session_start();
	ob_start();
	class danhba{
		var $iddb;
		var $idnhan;
		var $tendb;
		var $emaildb;
		var $sdtdb;

	    /**
	     * summary
	     */
	    function __construct($iddb,$idnhan, $tendb, $emaildb, $sdtdb){
	    	$this->iddb    = $iddb;
	    	$this->idnhan  = $idnhan;
	    	$this->tendb   = $tendb;
	    	$this->emaildb = $emaildb;
	    	$this->sdtdb  = $sdtdb;
	    }
	    static function connect(){
	    	$con = new mysqli("localhost","root","","contact");
	    	$con->set_charset("utf8");
	    	if ($con->connect_error) {
	    		die("ket noi that bai:" .$con->connect_error );
	    	}
	    	return $con;
	    }
	    static function getListDB(){
	    	$con = danhba::connect();
			// thao tac voi csdl
			// var $sql;
	    	if (isset($_SESSION["login"])) {
	    		$ssuser = $_SESSION["login"];

	    		$sql = "SELECT danhba.* FROM danhba INNER JOIN nhandan ON danhba.maNhan=nhandan.maNhan WHERE nhandan.maUser= $ssuser";
	    	}
	    	else{
	    		$sql = "SELECT * FROM `danhba`";
	    	}
	    	
	    	$result= $con->query($sql);
	    	$lsDanhBa = array();
	    	if($result->num_rows >= 0){
	    		while ($row = $result->fetch_assoc()) {
	    			$db =new danhba($row["maDB"],$row["maNhan"],$row["tenDB"], $row["email"], $row["Sdt"]);
	    			array_push($lsDanhBa,$db);
	    		}
	    	}
			// giai phong ket noi
	    	$con->close();
	    	return $lsDanhBa;
	    }
	    static function getListDBforNhom($mn){
	    	$con = danhba::connect();
			// thao tac voi csdl
	    	// $ssuser = $_SESSION["login"];
	    	$sql = "SELECT * FROM `danhba` WHERE maNhan=$mn ";
	    	$result= $con->query($sql);
	    	$lsDanhBa = array();
	    	if($result->num_rows >= 0){
	    		while ($row = $result->fetch_assoc()) {
	    			$db =new danhba($row["maDB"],$row["maNhan"],$row["tenDB"], $row["email"], $row["Sdt"]);
	    			array_push($lsDanhBa,$db);
	    		}
	    	}
			// giai phong ket noi
	    	$con->close();
	    	return $lsDanhBa;
	    }
	    static function addDB($tenadd, $emailadd, $phoneadd,$nhomadd){
	    	$con = danhba::connect();
			// thao tac voi csdl
	    	$ssuser = $_SESSION["login"];
	    	$sql = "INSERT INTO `danhba` (`maDB`, `maNhan`, `tenDB`, `email`, `Sdt`) VALUES (NULL, '$nhomadd', '$tenadd', '$emailadd', '$phoneadd')";
	    	$result= $con->query($sql);
	    	
	    	$con->close();
	    }
	    static function showname(){
	    	$con = danhba::connect();
			// thao tac voi csdl
	    	$ssuser = $_SESSION["login"];
	    	$sql = "SELECT  * FROM `user` WHERE maUser= $ssuser";
	    	$result= $con->query($sql);
	    	if($result->num_rows >= 0){
	    		while ($row = $result->fetch_assoc()) {
	    			$db =$row['Ten'];
	    		}
	    	}
	    	$con->close();
	    	return $db;
	    }
	}

	
	class nhom
	{
		var $maNhom;
		var $tenNhom;
		function __construct($maNhom, $tenNhom){
			$this->maNhom  =$maNhom;
			$this->tenNhom =$tenNhom;
		}
		static function connect(){
			$con = new mysqli("localhost","root","","contact");
			$con->set_charset("utf8");
			if ($con->connect_error) {
				die("ket noi that bai:" .$con->connect_error );
			}
			return $con;
		}
		static function getListNhom(){
			$con = nhom::connect();
			$ssuser = $_SESSION["login"];
			$sql = "SELECT * FROM `nhandan` WHERE maUser= $ssuser";
			$result = $con->query($sql);
			$lsNhom= array();
			if ($result->num_rows >=0) {
				while ($row = $result->fetch_assoc()) {
					$nhom = new nhom($row["maNhan"], $row["tenNhan"]);
					array_push($lsNhom, $nhom);
				}
			}
			$con->close();
			return $lsNhom;
		}
		static function addNhom($nhomadd){
			$con = nhom::connect();
			$ssuser = $_SESSION["login"];
			$sql = "INSERT INTO `nhandan` (`maNhan`, `maUser`, `tenNhan`) VALUES (NULL, $ssuser ,'$nhomadd')";
			$result = $con->query($sql);
			$con->close();
		}
	}
	
	
	?>