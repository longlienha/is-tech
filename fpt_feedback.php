<?php
    include 'login-page/php/config.php';

    if(isset($_POST['submit'])){
        if(empty($_POST['student_id'])   or empty($_POST['score']) or empty($_POST['comments'])){
            echo'<p style = "color:red"> Vui long dien day du thong tin</p>';
        }else{
            $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
            $score = mysqli_real_escape_string($conn, $_POST['score']);
            $comments = mysqli_real_escape_string($conn, $_POST['comments']);

            $sql = "SELECT * FROM `danhgiathamquan` WHERE `student_id` like '$student_id'";
            $query = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if($num == 0){
                $sql2= "INSERT INTO `danhgiathamquan` (`student_id`, `score`, `feedback`) VALUES ('$student_id','$score',N'$comments')";

                $add = mysqli_query($conn,$sql2);
                if($add){
                    echo('<p style = "color:#059824">Đăng kí thành công</p>');
                    header("location: record_successful.html");
                }else{
                    echo('<p style = "color:red">Đăng kí thất bại</p>');
                }
            }else{
                echo('<p style = "color:red">Mã sinh viên đã tồn tại</p>');
            }
            }
        }
?>





                        