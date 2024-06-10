<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Man Man store</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!--PAGE LEVELC STYLES-->
    <link href="assets/css/invoice.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Man Man store</a>
            </div>

            <div class="header-right">

                    
                <a href="login.php" class="btn btn-danger" title="Logout">Login</i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                               <span style="font-size: 18px;"> Nguyễn Hữu Mẫn</span>
                            <br />
                                <h5> Chủ cửa hàng online </h5>
                            </div>
                        </div>

                    </li>
                    <li>
                        <a class="active-menu" href="product.php"><i class="fa fa-flash "></i>Add product </a>
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           
                             <li>
                                <a href="select.php"><i class="fa fa-desktop "></i>All product </a>
                            </li>
                            <li>
                                <a href="invoice.php"><i class="fa fa-coffee "></i>All Invoice </a>
                            </li>
                             
                           
                        </ul>
                    </li>
                  
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Data Table</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-6">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default" style="width: 200%;">
                        <div class="panel-heading" >
                            Product
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php
                            include('control.php');
                            $get_data=new datapro();
                            $select_product=$get_data->selectpr();
                            ?>
                            <form role="form" method="POST" enctype="multipart/form-data">

                                <table class="table table-striped table-bordered table-hover">
                                    
                                
                <tr class="k2">
                    <td><h4>Tên sản phẩm</h4></td>
                    <td><h4>Số lượng</h4></td>
                    <td><h4>Ảnh minh hoạ</h4></td>
                    <td><h4>Loại</h4></td>
                    <td><h4>Ngày</h4></td>
                    <td><h4>Giá</h4></td>
                    <td><h4>Mô tả</h4></td>
                    <td><h4>Sửa</h4></td>
                    <td><h4>xóa</h4></td>
                </tr>

            <?php
            
            foreach ($select_product as $i_dk)
            {
                ?>
                <tr class="k2">
                    <td><?php echo $i_dk['name'] ?></td>
                    <td><?php echo $i_dk['sdt'] ?></td>
                    <td><img src="upload/<?php echo $i_dk['pict'] ?>" alt="" width="100px" height="50px"></td>
                    
                    <td><?php echo $i_dk['cate'] ?></td>
                    
                    <td><?php echo $i_dk['date'] ?></td>
                    <td><?php
                    $string=strval($i_dk['pric']);
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
                      ?></td>
                    <td><?php echo $i_dk['des'] ?></td>
                    
                    <td ><a href="update.php?up=<?php echo $i_dk['id_product']?>" class="btn btn-primary"> Sửa </a></td>

                    <td><a href="delete.php?del=<?php echo $i_dk['id_product']?>" class="btn btn-danger"
                    onclick="if(confirm('Bạn có chắc muốn xóa'))return true;
                    else return false";> Xóa </td>
                </tr> 
                <?php
            }
   
            
            ?>
                                    
                                </table>
        </form>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
