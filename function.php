<?
//подключения к базы данных
function db_connect(){
        $host = 'localhost';
        $user = 'root';
        $pswd = '';
        $db = 'kaf';
        
        $connection = mysql_connect($host, $user, $pswd);
        if(!$connection || !mysql_select_db($db,$connection))
        {
            return false;
        }
        return $connection;
    }

    
    
    function db_result_to_array($result){
        $res_array = array();
        
        $count = 0;
        
        while($row = mysql_fetch_array($result))
        {
            $res_array[$count] = $row;
            $count++;
        }
        return $res_array;
    }
    
    
    function get_products($table){
        db_connect();
        
        $query = "SELECT * FROM $table";
        
        $result = mysql_query($query);
        
        $result = db_result_to_array($result);
        
        return $result;
    }

    //Вывод одного книга
    function get_product($id,$table){
        //первый параметр принимает id товара
        //второй таблицу.
        db_connect();
        $query=("SELECT * FROM $table WHERE id='$id' ");
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        return $row;
    }

    //добавления в корзину
    function add_to_cart($id){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
            return true;
        }else{
            $_SESSION['cart'][$id]=1;
            return true;
        }
        return false; 
    }
    //Обновления корзины
    function update_cart(){
        foreach ($_SESSION['cart'] as $id => $qty) {
            if($_POST[$id] == '0'){
                unset($_SESSION['cart'][$id]);
            }else{
                $_SESSION['cart'][$id]=$_POST[$id];
            }
        }
    }
    //Общий количество товаров в корзине
    function total_items($cart){
        $num_items = 0;
        if(is_array($cart)){
            foreach ($cart as $id => $qty) {
                $num_items = $num_items + $qty;
            }
        }
        return $num_items;
    }

    //Общий сумма товаров (книг)
     function total_price($cart){
        $total_price = 0.0;
        db_connect();
        if(is_array($cart)){
            foreach($cart as $id => $qty) {
                $query = "SELECT price FROM python WHERE id='$id' ";
                $result = mysql_query($query);
                if($result){
                    $item_price = mysql_result($result,0,'price');
                    $total_price = $total_price + $item_price * $qty;
                }
            }
        }
        return $total_price;
    }