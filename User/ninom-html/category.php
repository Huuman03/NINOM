<?php session_start()?>
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
  <?php
  include('../../Admin/bs-advance-admin/admin/control.php');
  $getdata=new datapro();
  ?>
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
          
          <?php
          if(!empty($_SESSION['id']))
          {
            $select_user=$getdata->selectuserid($_SESSION['id']);
          foreach($select_user as $in_user)
          
          ?>
          <span class="collapse navbar-collapse" id="navbarSupportedContent"
          style="color: aliceblue;">Hello: <span 
          style="color: green; margin-left: 3px;
          font-weight: bold;"><?php echo $in_user['name'] ?></span></span>
          <?php
          }
          ?>
          

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
                  <a class="nav-link" href="../../Admin/bs-advance-admin/admin/login.php">Login</a>
                </li>

                <?php
                    if(!empty($_SESSION['id'])){
                     ?> 
                     <li class="nav-item">
                  <a class="nav-link"  href="logout.php"
                  onclick="if(confirm('Bạn có chắc muốn đăng xuất!'))
                     return true;else return false" name="out" 
                     style="color: red; font-weight: bold;">Log out</a>
                </li>
                      <?php
                    }
                    ?>
                
                
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
  <?php
    
    
  ?>

  <!-- end nav section -->

  <!-- fruit section -->

  <section class="fruit_section layout_padding">
    
    <div class="container-fluid">

      <div class="fruit_container">

      <form role="form" method="POST" enctype="multipart/form-data">
      <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
          Top 3 sản phẩm mới nhất
        </h2>
      </div>
    </div>
                                        
                                 
                                        <div class="form-group" style="width: 100%;">
                                                
                                                
                                                <?php
                                                $balan=0;
                                                
                                                $select_frui=$getdata->category();
                                                foreach($select_frui as $i_da)
                                                {
                                                    ?><a href="order.php?sp=<?php echo $i_da['id_product'] ?>">
                                                    <div style="float: left;margin: 30px; text-align: center;">
                                                      <img src="../../Admin/bs-advance-admin/admin/upload/<?php echo $i_da['pict']?>"
                                                       alt="" width="200px" height="200px">
                                                      <p class="help-block" style="font-weight: bold;
                                                      margin-top: 10px;"><?php echo $i_da['name'] ?></p>
                                                      <p class="help-block">"<?php echo $i_da['des'] ?>"</p>
                                                      <br>
                                                      </div>
                                                      </a>
                                                    <?php
                                                $balan=$balan+1;
                                                if($balan==3) break;
                                              }
                                                ?> 
                                           
                                        </div>

                                        
                                  
                                              
                                    </form>
                                    <?php
                                    
                                    if(isset($_POST['insert']))
                                    {
                                         $in_des=$getdata->updatedes($_POST['des'],$_POST['sp']);
 
                                        if($in_des){
                                            echo "<script> alert('Mô tả sản phẩm thành công'); </script>";
                                        }
                                        else echo "<script> alert ('Mô tả sản phẩm không thành công'); </script>";
                                    }

                                    ?>                                             
                                    
      </div>
    </div>
  </section>

  <!-- end fruit section -->


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