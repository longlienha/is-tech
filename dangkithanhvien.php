<?php
    include 'login-page/php/config.php';

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])   or empty($_POST['birth_date']) or empty($_POST['email'])  or  empty($_POST['Grade']) or
        empty($_POST['major']) or empty($_POST['department']) or empty($_POST['phone']) or empty($_POST['school'])){
            echo'<p style = "color:red"> Vui long dien day du thong tin</p>';
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $major = mysqli_real_escape_string($conn, $_POST['major']);
            $grade = mysqli_real_escape_string($conn, $_POST['Grade']);
            $department = mysqli_real_escape_string($conn, $_POST['department']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $school = mysqli_real_escape_string($conn, $_POST['school']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            
            $sql = "SELECT * FROM `dangkythanhvien` WHERE `email` like '$email'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if($num == 0){
                $sql2= "INSERT INTO `dangkythanhvien` (`name`, `birth_date`, `major`, `sex`, `email`, `phone`, `school`, `grade`,`department`) 
                VALUES (N'$name','$birth_date','$major','$sex','$email','$phone','$school','$grade','$department')";

                $add = mysqli_query($conn,$sql2);
                if($add){
                    echo('<p style = "color:#059824">Đăng kí thành công</p>');
                    header("location: succeed.html");
                }else{
                    echo('<p style = "color:red">Đăng kí thất bại</p>');
                }
            }else{
                echo('<p style = "color:red">Email hoặc mã sinh viên đã tồn tại</p>');
            }
            }
        }
?>





                        