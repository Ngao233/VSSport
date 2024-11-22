<?php 
class cart extends connect{
    function add_cart($id_product){
        $conn = new connect();
        $sql = "INSERT INTO cart(id_product,id_user) values(?,?)";
        $params = [$id_product,$_SESSION['user']['id_user']];
        $result = $this -> query_user($sql,$params);
    }
}