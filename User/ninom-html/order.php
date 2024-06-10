<?php session_start() ?>
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

          <?php
          include('../../Admin/bs-advance-admin/admin/control.php');
          $getdata=new datapro();
          if(!empty($_SESSION['id']))
          {
            $select_user=$getdata->selectuserid($_SESSION['id']);
          foreach($select_user as $in_user)
          
          ?>
          <span class="collapse navbar-collapse" id="navbarSupportedContent"
          style="color: aliceblue;">Hello: <span style="color: green;
          font-weight: bold; margin-left: 3px;"><?php echo $in_user['name'] ?></span></span>
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
  

  <!-- end nav section -->

  <!-- fruit section -->
  <form method="POST">
  <?php
    
    
    
      $sp=$_GET['sp'];
      $select_frui=$getdata->selectprid($sp);
    
    
    $id=$_SESSION['id'];
    
  ?>
  <section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
          Order
        </h2>
        </div>
        <?php
        foreach($select_frui as $in_od){
            
        
        ?>
        <style>
            td{
                text-align: center;
                padding: 10px;
                border: 2px black solid;
                font-weight: bold;
                font-size: 18px;
            }
        </style>
        <table >
            <tr>
                <td>
                    TÊN SẢN PHẨM 
                </td>
                <td>
                    ẢNH MINH HỌA
                </td>
                <td>
                    SỐ LƯỢNG
                </td>
                <td>
                    GIÁ
                </td>
                <td>
                    UPDATE
                </td>
                <td>
                 DELETE
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $in_od['name'] ?>
                </td>
                <td>
                <img src="../../Admin/bs-advance-admin/admin/upload/<?php echo $in_od['pict']?>
                " alt="" height="200px" width="200px">
                </td>
                <td>
                  <?php
                  $sl='';
                  
                  
                  if(isset($_POST['up'])){
                          
                    $_SESSION['sl']=$_POST['sdt'];
                  }
                  if(!empty($_SESSION['sl'])){
                    $sl=$_SESSION['sl'];
                  }
                  else{
                    $sl=1;
                  }
                  ?>
                    
                    <input type="text" name="sdt" value="<?php echo $sl?>">
                </td>
                <td>
                <?php
                $string=strval($in_od['pric']);
                $mang=str_split($string);
                $count=count($mang);
                for($i=0;$i<$count;$i++)
                {
                  echo $mang[$i];
                  if($count<=4)
                      {
                        if($count%2==0)
                        {
                          if($i==0) echo ".";
                        }
                        else
                        {
                          if($i==1) echo ".";
                        }
                      }
                  if($count<=6 && $count>4)
                  {
                    if($count%2==0)
                    {
                      if($i==2) echo ".";
                    }
                    else
                    {
                      if($i==1) echo ".";
                    }
                  }
                  if($count<=7 && $count>6)
                  {
                    if($count%2==0)
                    {
                      if($i==2) echo ".";
                      if($i==5) echo ".";
                    }
                    else
                    {
                      if($i==0) echo ".";
                      if($i==3) echo ".";
                    }
                  }
                  if($count<=9 && $count>7)
                  {
                    if($count%2==0)
                    {
                      if($i==1) echo ".";
                      if($i==4) echo ".";
                    }
                    else
                    {
                      if($i==0) echo ".";
                      if($i==3) echo ".";
                    }
                  }
                }
                ?> Đồng
                
                </td>
                <td>
                    <button class="btn btn-primary" name='up'>Update</button>
                    <?php
                        if(isset($_POST['up'])){
                          
                            
                    
                            if(empty($_POST['sdt'])){
                                echo "<script>  alert('Bạn chưa nhập số lượng')</script>";
                            }
                            
                            else {
                                if($_POST['sdt']<=0){
                                    echo "<script>  alert('Số lượng quá ít')</script>";
                                }
                                if($_POST['sdt']>$in_od['sdt']){
                                    echo "<script>  alert('Số lượng trong kho không đủ')</script>";
                                }
                            }
                            
                            
                        }
                    ?>
                </td>
                <td>
                <button class="btn btn-danger" name='de'>Delete</button>
                <?php
                if(isset($_POST['de'])){
                  echo "<script> window.location='index.php'</script>";
                }
                  
                ?>
                </td>
            </tr>
        </table>
        <h3>Số lượng còn lại trong kho : <span style="color: green;"><?php echo $in_od['sdt'] ?></span></h3>
        
        <?php } 
        
        if(empty($_POST['sdt'])){
          $_POST['sdt']=1;
        }
          ?>
        <div>
           <?php $tong=$_POST['sdt']*$in_od['pric'] ?> 
         <h2>Tổng giá : <span style="color: green;">
                <?php
                
                $string=strval($tong);
                $mang=str_split($string);
                $count=count($mang);
                for($i=0;$i<$count;$i++)
                {
                  echo $mang[$i];
                  if($count<=4)
                      {
                        if($count%2==0)
                        {
                          if($i==0) echo ".";
                        }
                        else
                        {
                          if($i==1) echo ".";
                        }
                      }
                  if($count<=6 && $count>4)
                  {
                    if($count%2==0)
                    {
                      if($i==2) echo ".";
                    }
                    else
                    {
                      if($i==1) echo ".";
                    }
                  }
                  if($count<=7 && $count>6)
                  {
                    if($count%2==0)
                    {
                      if($i==2) echo ".";
                      if($i==5) echo ".";
                    }
                    else
                    {
                      if($i==0) echo ".";
                      if($i==3) echo ".";
                    }
                  }
                  if($count<=9 && $count>7)
                  {
                    if($count%2==0)
                    {
                      if($i==1) echo ".";
                      if($i==4) echo ".";
                    }
                    else
                    {
                      if($i==0) echo ".";
                      if($i==3) echo ".";
                    }
                  }
                }
                ?> Đồng</span> </h2>             

        </div>
        <Button class="btn btn-success" style="float: right; 
        margin-right: 200px; font-size: 25px;" name="tt">Thanh toán</Button>
      
    </div>
  </section>
  </form>
  <?php

                $select_frui=$getdata->selectprid($sp);
                $select_user=$getdata->selectuserid($_SESSION['id']);

                foreach($select_frui as $pr)
                {
                    foreach($select_user as $user)
                    {
                        if(isset($_POST['tt'])){
                            
        
                            if(empty($_POST['sdt'])){
                                echo "<script>  alert('Bạn chưa nhập số lượng')</script>";
                            }
                            
                            else {
                                if($_POST['sdt']<=0){
                                    echo "<script>  alert('Số lượng quá ít')</script>";
                                }
                                if($_POST['sdt']>$in_od['sdt']){
                                    echo "<script>  alert('Số lượng trong kho không đủ')</script>";
                                }
                                else
                                {
                                $in_don=$getdata->insertdon($user['name'],$pr['name'],
                                $_POST['sdt'],$tong,$pr['pict']);
                                echo "<script>  alert('Tạo đơn thành công')
                                window.location='invoice.php?sp=$sp'</script>";
                                }
                                
                                }
                        }

                    }
                }

                
                  
                
              ?>
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