<?php 
class user extends connect {
    function login ($email, $password){
        $sql ='select * from users where email =?';
        $params= [$email];
        $stmt = $this->query_user($sql,$params);
        $data = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($data){
            if(password_verify ($password,$data['password'])){
                unset($data['password']);
                $_SESSION['user']=$data;    
                return true;
            } else {
                return false;
            }
        }
    }

    // đăng kí
    function register($data){
        $check_mail_sql = 'select count(*) from users where email = ?';
        $check_mail_pramas = [$data['email']];
       $stmt = $this->query_user($check_mail_sql,$check_mail_pramas);
       $mail_count = $stmt->fetchColumn();
       if($mail_count > 0){
        return 'Email đã toàn tại!';
    } else {
        $password_hash = password_hash($data['password'],PASSWORD_DEFAULT);
        $sql = 'insert into users (email, password,role) values (?,?,?)';
        $params = [
            $data['email'],
            $password_hash,
            $data['role']
        ];
        $result = $this -> query_user($sql,$params);
        return 'Đăng ký thành công, vui lòng đăng nhập';
       }
    }
}