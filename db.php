<?php
class DatabaseClass{	
    
	private  $servername = "localhost";
    private  $username = "root";
    private  $password = "";
    private  $dbname = "groceryStore";
    private $connection = null;

    // this function is called everytime this class is instantiated		
    public function __construct(){

        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
              
	
    }

    // Insert a row/s in a Database Table
    public function Insert( $query = "" , $params = [] ){

        echo($params);
	
        try{
		
        $stmt = $this->executeStatement( $query , $params );

        if($stmt->rowCount() > 0 ){

            return "RECORD SAVED";
        }else{
            return 'PROBLEM with DATABASE '.$stmt->errorInfo();
        }
     
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }

    // Select a row/s in a Database Table
    public function SelectRecord( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->executeStatement( $query , $params );
		
            $result = $stmt->fetchAll();			
		
            return $result;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }

    // Update a row/s in a Database Table
    public function Update( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params );
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }		

    // Remove a row/s in a Database Table
    public function Remove( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params );
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }		

    // execute statement
    private function executeStatement( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->connection->prepare( $query );
		
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
		
            if( $params ){

              
                foreach($params as $key=> &$param){

                    $stmt->bindParam($key+1, $param);
                   

                }
               		
            }
		
            $stmt->execute();
		
            return $stmt;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
    }
		
}

?>