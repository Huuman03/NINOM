<?php session_start() ;

include ("PHPMailer/src/Exception.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");
include ("PHPMailer/src/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <hr />
                                    <h5>Password retrieval</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Email " 
                                            name="email"/>
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your new Password" 
                                            name="pass"/>
                                            </div>
                                        
                                        <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Rewrite your new password" 
                                            name="rpass"/>
                                            </div>
                                     
                                     
                                        <button type="submit" name="login" 
                                        class="btn btn-primary ">Change</button>
                                    <hr />
                                    Not register ? <a href="../../../User/ninom-html/sigup.php" >click here </a> or go to 
                                    <a href="../../../User/ninom-html/fruit.php">Home</a> 
                                    </form>
                            </div>
                           
                        </div>
        </div>
    </div>

    <?php   

                                    include('control.php');
                                    $get_data=new datapro();
                                    
                                    if(isset($_POST['login']))
                                    {

                                        if($_POST['pass']==$_POST['rpass'])
                                        {
                                            $checkk=$get_data->selectuser();
                                        foreach($checkk as $kiemtra)
                                        {
                                            if($_POST['email']==$kiemtra['email'])
                                            {
                                            $number=1;
                                            break;
                                            }
                                            else
                                            {
                                                $number=0;
                                            }
                                        }

                                        if($number==1)
                                            {
                                                $_SESSION['email']=$_POST['email'];
                                                $_SESSION['pass']=$_POST['pass'];

                                                $maxn=random_int(1000,9999);
                        $_SESSION['maxn']=$maxn;
                            $mail=new PHPMailer(true);
                            try{
                                $mail->SMTPDebug=0;
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->Username='nguyenhuuman2003@gmail.com';
                                $mail->Password = 'bejthtadrkizzsxn';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port = 587;
                                $mail->CharSet ='UTF-8';
                                $mail->setFrom('nguyenhuuman2003@gmail.com'); 
                                $mail->addAddress($_POST['email'],'Huu Man'); //email nguoi nhan
                                $mail->isHTML(true);
                                $mail->Subject='Mã xác nhận(Tuyệt đối không cung cấp mã này cho người khác)';    // Tieu de
                                  // noi dung
                                $mail->Body = $maxn;  // noi dung
                                $mail->send();
                                $mail->AltBody = 'cố gắng ngheng';
                                //echo "<script> alert ('Email đã được gửi'); </script>";
                                $_SESSION['email']=$_POST['email'];
                                $_SESSION['name']=$_POST['name'];
                                $_SESSION['pass']=$_POST['pass'];
                                $_SESSION['img']=$_FILES['img']['name'];
                                echo "<script>
                                                window.location='../../../User/ninom-html/xacnhan.php?uppass=xacnhan'</script>";
                                
                                }
                            catch(Exception $e)
                                {
                                  echo "<script> alert ('Email gửi thất bại'); </script>";
                                } 

                                                
                                                
                                                
                                            }
                                            else
                                            {
                                                echo "<script>alert('Email chưa tồn tại!'); </script>";
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Mật khẩu nhập lại không đúng'); </script>";
                                        }
                                        
                                        

                                       

                                    }

                                    

                                    ?>   

</body>
</html>
