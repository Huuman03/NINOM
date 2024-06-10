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
                        <h1 class="page-head-line">PRODUCT </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                       <div >
                       <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <input class="form-control" type="text" name="name">
                                            <p class="help-block">Inut Name here.</p>
                                        </div>
                                 <div class="form-group">
                                            <label>Number Product</label>
                                            <input class="form-control" type="number" name="sdt">
                                     <p class="help-block">Inut number here.</p>
                                        </div>
                                            <div class="form-group">
                                            <label >Picture Product</label>
                                            
                                                <input type="file" class="form-control" name="img">
                                           
                                            <p class="help-block">Inut number here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Category Product</label>
                                                <br>
                                                <select  id="" class="form-control" name="sp">
                                                    <option value="Chưa chọn sản phẩm" >--Chọn loại sản phẩm--</option>
                                                    <option value="Thực phẩm" >--Thực phẩm--</option>
                                                    <option value="Thời trang" >--Thời trang--</option>
                                                    <option value="Điện tử" >--Điện tử--</option>
                                                </select>
                                           
                                            <p class="help-block">Inut selectnumber here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Date Product</label>
                                            
                                                <input type="date" class="form-control" name="ngay">
                                           
                                            <p class="help-block">Inut Date here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Price Product</label>
                                            
                                                <input type="number" class="form-control" name="price">
                                           
                                            <p class="help-block">Inut number here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Description Product</label>
                                            
                                                
                                                
                                            <input type="text" class="form-control" name="des">
                                           
                                            <p class="help-block">Inut description here.</p>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info" name="insert">Insert </button>

                                    </form>

                                    <?php
                                    include('control.php');
                                    $get_data=new datapro();
                                    if(isset($_POST['insert']))
                                    {
                                        move_uploaded_file($_FILES['img']['tmp_name'],
                                         'upload/'.$_FILES['img']['name']);

                                         

                                        $in_pr=$get_data->insertpr($_POST['name'],
                                        $_POST['sdt'],$_FILES['img']['name'],$_POST['sp'],
                                        $_POST['ngay'],$_POST['price'],$_POST['des']);

                                        if($in_pr){
                                            echo "<script> alert('Thêm sản phẩm thành công'); </script>";
                                        }
                                        else echo "<script> alert ('Thêm sản phẩm không thành công'); </script>";
                                    }

                                    ?>
                                    <a href="select.php">Hiển thị</a>

     
     
      
      
 </div>
                    </div>
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
