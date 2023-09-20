<?php 
require "config/connectdb.php";
function check_trung_key($table_name, $key, $value){
    global $conn;
    $sql = "SELECT * FROM $table_name WHERE $key = '$value'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}
function insert_db($table_name, $data=array(), $key, $value_key){
    global $conn;
    if(!empty($data)){
        if(check_trung_key($table_name, $key, $value_key)){
            return false;
        }else{
            //xử lí thêm values vào db
            // Chuyển mảng $data thành một chuỗi các trường và giá trị tương ứng
            $columns = implode(", ", array_keys($data));
            $values = "'" . implode("', '", $data) . "'";
            // Tạo câu truy vấn SQL thêm dữ liệu
            $sql = "INSERT INTO $table_name ($columns) VALUES ($values)";
            // Thực thi câu truy vấn
            if ($conn->query($sql) === TRUE) {
                return true; // Thêm dữ liệu thành công
            } else {
                return false; // Lỗi khi thêm dữ liệu
            }
        }
    }
}
function delete_db($table_name, $key, $value){
    global $conn;
    $sql = "DELETE FROM $table_name WHERE $key = '$value'";
    if ($conn->query($sql) === TRUE) {
        return true; // Xóa dữ liệu thành công
    } else {
        return false; // Lỗi khi Xóa dữ liệu
    }
}
function update_db($table_name, $data=array(), $key, $value){
    global $conn;
    if(!empty($data)){
        if(!check_trung_key($table_name, $key, $value)){
            return false;
        }else{
            $string ="";
            foreach($data as $k=>$v){
                $string .= "`$k` = '$v',";
            }
            $string =substr($string,0,-1);
            $sql =  "UPDATE $table_name SET $string WHERE $key = '$value'";
            if ($conn->query($sql) === TRUE) {
                return true; // update dữ liệu thành công
            } else {
                return false; // Lỗi khi update dữ liệu
            }
        }
    }
}
function search_data($table_name,$data="",$datafield="",$bool=true){
    global $conn;
    if($data != ""&&$bool==true){
        $sql = "SELECT * FROM  $table_name  WHERE $datafield= $data";
    }else if($data != ""&&$bool==false){
        $sql = "SELECT * FROM $table_name WHERE $datafield LIKE '%$data%'";
    }
    else{
        $sql = "SELECT * FROM  $table_name  ";
    }
    // echo $sql;
    $result= $conn->query($sql);
    return $result;
}