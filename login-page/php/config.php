<?php
    $conn=mysqli_connect("is-technology.com","istech","Vnu.edu.vn.2020","istech"); 
    // thay host, username database, pass, tên database vào
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
        die("Lỗi kết nối tới cơ sở dữ liệu");
    }
?>