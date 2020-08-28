<?php
namespace admin\util;

class DatabaseLoader {
    private static $instance = null;
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "bike_rental_system";
	private $conn;
	
    private function __construct() {
        $this->conn = $this->getConnection();
    }  

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DatabaseLoader();
        }

        return self::$instance;
    }

    public function getConnection() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }
    
    public function runBaseQuery($query) {
        $result = $this->conn->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
    
    
    public function runQuery($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }

    public function runQueryFetchObject($query, $param_type, $param_value_array) {
        $classname = "Admin";
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_object()) {
                $resultset[] =  $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }

      /* 
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        $sql = $conn->prepare("INSERT INTO table_exp (department,name,email) VALUES (?, ?, ?)");  
		$department=$_POST['department'];
		$sql->bind_param("sss", $department, $name, $email); 
	    $sql->execute()
		$sql->close();   
        $conn->close(); */
        
    public function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    
    public function insert($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }
    
    public function update($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        
    }

/*     function getLastInsertID(){
        $result = mysqli_insert_id($this->conn);
        return $result;
    } */

   

}
?>