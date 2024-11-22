<?php 
    class connect {
        private $host = 'localhost';
        private $dbname = 'one';
        private $username = 'root';
        private $password = '';
        private $port = '3306'; 
        private $charset = 'utf8mb4';
        private $conn;
        //
        function __construct(){
            try {
                // Tạo kết nối đến cơ sở dữ liệu
                $this->conn = new PDO(
                    "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}",
                    $this->username,
                    $this->password
                );                
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected to the database successfully.";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        //
        function queryAll($sql) {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchALL();  
            return $result;
        }
        
    
        function query_user($sql, $params) {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }
        function queryOne($sql){
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = $stmt->fetch();  
            return $result;

        }
        
        public function __destruct()
        {
            $this->$conn=null;
        }
        
        
    }