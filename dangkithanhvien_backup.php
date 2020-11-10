<?php
    include 'login-page/php/config.php';

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])   or empty($_POST['birth_date']) or empty($_POST['city']) or
        empty($_POST['email'])  or empty($_POST['student_id']) or  empty($_POST['infor']) or
        empty($_POST['major']) or empty($_POST['class']) or empty($_POST['phone'])){
            echo'<p style = "color:red"> Vui long dien day du thong tin</p>';
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $fb = mysqli_real_escape_string($conn, $_POST['fb']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $isvnu = mysqli_real_escape_string($conn, $_POST['isvnu']);
            $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
            $major = mysqli_real_escape_string($conn, $_POST['major']);
            $class = mysqli_real_escape_string($conn, $_POST['class']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $infor = mysqli_real_escape_string($conn, $_POST['infor']);
            $reason = mysqli_real_escape_string($conn, $_POST['reason']);
            
            if(strlen($phone) < 10 ){
                echo'<p style = "color:red">Số điện thoại không chính xác</p>';
            }else{
                    $sql = "SELECT * FROM `dangkythamquan` WHERE `email` like '$email' or `student_id` like '$student_id'";
                    $query = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($query);
                    if($num == 0){
                        $sql2= "INSERT INTO `dangkythamquan` (`stu_name`, `sex`, `birth_date`, `city`, `fb`, `email`, `isvnu`, `student_id`, `major`, `class`, `phone`, `infor`, `reason`) VALUES (N'$name','$sex','$birth_date',N'$city','$fb','$email','$isvnu','$student_id','$major','$class','$phone',N'$infor',N'$reason')";

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
        }
?>





                        