<?php
session_start();
include ("PHPMailer/src/Exception.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");
include ("PHPMailer/src/OAuth.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../../Admin/bs-advance-admin/admin/control.php');
                        $get_data=new datapro();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ninom</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="index.html">
        <span>
          Ninom
        </span>
      </a>
    </div>
    <!-- end header section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Category.php">Category </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="invoice.php">invoice </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="#">Login</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-2 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              SIGUP
            </h2>
          </div>
        </div>
      
      

      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">

            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name" name="name" />
                  </div>

                  <div>
                    <input type="email" placeholder="Email" name="email"/>
                  </div>

                  <div>
                    <input type="text" placeholder="Password" name="pass"/>
                  </div>
                  
                    <input type="file" style="padding-top: 7px;" name="img"/>
                  
                  <div>
                    <button text="submit" name="sigup" >sigup</button>
                    
                  </div>
                </div>
              </div>
            </form>
            <?php
            if(isset($_POST['sigup']))
                        {
                          
                          if(empty($_POST['img'])){
                          $_FILES['img']['name']="f-5.jpg";
                        }
                        else
                        {
                          move_uploaded_file($_FILES['img']['tmp_name'],
                                         'upload/'.$_FILES['img']['name']);
                        }
                        
                        if(empty($_POST['email']) || empty($_POST['name']) || empty($_POST['pass']))
                        {
                          echo "<script> alert ('Bạn chưa nhập đủ thông tin'); </script>";
                        }
                        else
                        {
                          $checkk=$get_data->selectuser();
                          foreach($checkk as $kiemtra)
                          {
                            if($_POST['email']==$kiemtra['email'])
                            {
                              echo "<script> alert ('Email đã tồn tại'); </script>";
                              break;
                              $number=1;
                            }
                            

                          }
                          
                          if($number!=1)
                          {
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
                                echo "<script> window.location='xacnhan.php'</script>";
                                
                                }
                            catch(Exception $e)
                                {
                                  echo "<script> alert ('Email gửi thất bại'); </script>";
                                } 
                          }  
                            
                        }      
                        }
            
            
                        
            ?>


          </div>
          <div class="col-md-6 px-0">
            <div class="map_container">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          NiNom
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                Passages of Lorem Ipsum available
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                Call : +012334567890
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

 

</body>

</html>