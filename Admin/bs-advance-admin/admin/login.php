<?php session_start() ?>
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
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Email " 
                                            name="email"/>
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" 
                                            name="pass"/>
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="remember"/> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="forgetpass.php" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     
                                        <button type="submit" name="login" 
                                        class="btn btn-primary ">Login Now</button>
                                    <hr />
                                    Not register ? <a href="../../../User/ninom-html/sigup.php" >click here </a> or go to 
                                    <a href="../../../User/ninom-html/index.php">Home</a> 
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
                                        if(empty($_POST['email']) || empty($_POST['pass'])){
                                            echo "<script>alert('Bạn chưa nhập đủ thông tin!'); </script>";
                                            
                                        }
                                        else{
                                            $in_des=$get_data->selectuser();
                                        foreach($in_des as $i_user)
                                        {
                                            if($_POST['email']=='admin')
                                            {
                                                if($_POST['pass']=='admin2003')
                                                {
                                                    echo "<script>alert('Xin chào admin.'); 
                                                    window.location='product.php'</script>";
                                                }

                                            }
                                            if($_POST['email']==$i_user['email'])
                                            {
                                                if($_POST['pass']==$i_user['pass'])
                                                {
                                                    if(!empty($_GET['sp'])){
                                                        $sp=$_GET['sp'];
                                                        $print=1;
                                                    $_SESSION['id']=$i_user['id_user'];
                                                    echo "<script>alert('Đăng nhập thành công'); 
                                                    window.location='../../../User/ninom-html/order.php?sp=$sp'</script>";
                                                    
                                                    return;
                                                    }
                                                    else
                                                    {
                                                    $_SESSION['id']=$i_user['id_user'];
                                                    echo "<script>alert('Đăng nhập thành công'); 
                                                    window.location='../../../User/ninom-html/index.php'</script>";
                                                    $print=1;
                                                    return;
                                                    }
                                                    
                                                }
                                                else{
                                                    $print=0;
                                                    
                                                }
                                            }
                                            else{
                                                $print=0;
                                                
                                            }
                                            
                                        }
                                            if($print==0)
                                            {
                                                echo "<script>alert('Bạn nhập sai tài khoản hoặc mật khẩu'); </script>";
                                            }
                                        }


                                    }

                                    

                                    ?>   

</body>
</html>
