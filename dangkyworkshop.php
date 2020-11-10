<?php
    include 'login-page/php/config.php';

    if(isset($_POST['submit'])){
        if(empty($_POST['name'])   or empty($_POST['birth_date']) or empty($_POST['reason']) or
        empty($_POST['email'])  or empty($_POST['student_id']) or
        empty($_POST['major'])  or empty($_POST['phone'])){
            // echo'<p style = "color:red"> Vui long dien day du thong tin</p>';
            header("location: failed.html");
        }else{
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
            $fb = mysqli_real_escape_string($conn, $_POST['fb']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
            $major = mysqli_real_escape_string($conn, $_POST['major']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            // $infor = mysqli_real_escape_string($conn, $_POST['infor']);
            $reason = mysqli_real_escape_string($conn, $_POST['reason']);
            
            if(strlen($phone) < 10 ){
                echo'<p style = "color:red">Số điện thoại không chính xác</p>';
            }else{
                    $sql = "SELECT * FROM `dangkyworkshop` WHERE `email` like '$email' or `student_id` like '$student_id'";
                    $query = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($query);
                    if($num == 0){
                        $sql2= "INSERT INTO `dangkyworkshop` (`stu_name`, `sex`, `birth_date`, `fb`, `email`, `student_id`, `major`, `phone`, `reason`) VALUES (N'$name','$sex',N'$birth_date',N'$fb',N'$email',N'$student_id','$major',N'$phone',N'$reason')";

                        $add = mysqli_query($conn,$sql2);
                        if($add){
                            // echo('<p style = "color:#059824">Đăng kí thành công</p>');
                            header("location: succeed.html");
                        }else{
                            // echo('<p style = "color:red">Đăng kí thất bại</p>');
                            header("location: failed.html");
                        }
                    }else{
                        // echo('<p style = "color:red">Email hoặc mã sinh viên đã tồn tại</p>');
                        header("location: failedemail.html");
                    }
                }
            }
        }
?>





                        