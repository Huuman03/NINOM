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
                <div class="row" >
                    <div class="col-md-12">
                        <h1 class="page-head-line" >Product</h1>
                        <h1 class="page-subhead-line">Add new prodoct - WePHP - teacherVan </h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row" >
            <div class="col-md-6 col-sm-6 col-xs-12" >
               <div class="panel panel-info" style="width: 200%;">
                        <div class="panel-heading">
                           PRODUCT
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" enctype="multipart/form-data">
                            <?php
                            include('control.php');
                            $get_data=new datapro();
                            $data_update=$get_data->id($_GET['up']);
                            foreach($data_update as $i_da)
                            ?>  
                                        <div class="form-group">
                                            <label>Name Product</label>
                                            <input class="form-control" type="text" name="name" value="<?php echo $i_da['name']?>">
                                            <p class="help-block">Inut Name here.</p>
                                        </div>
                                 <div class="form-group">
                                            <label>Number Product</label>
                                            <input class="form-control" type="number" name="sdt" value="<?php echo $i_da['sdt']?>">
                                     <p class="help-block">Inut number here.</p>
                                        </div>
                                            <div class="form-group">
                                            <label >Picture Product</label>
                                            
                                                <input type="file" class="form-control" name="img" >
                                                
                                           
                                            <p class="help-block">Inut number here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Category Product</label>
                                                <br>
                                                <select  id="" class="form-control" name="sp">
                                                    <option value="<?php echo $i_da['cate']?>" ><?php echo $i_da['cate']?></option>
                                                    <option value="sản phẩm 1" >--sản phẩm 1--</option>
                                                    <option value="sản phẩm 2" >--sản phẩm 2--</option>
                                                    <option value="sản phẩm 3" >--sản phẩm 3--</option>
                                                </select>
                                           
                                            <p class="help-block">Inut selectnumber here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Date Product</label>
                                            
                                                <input type="date" class="form-control" name="ngay" value="<?php echo $i_da['date']?>">
                                           
                                            <p class="help-block">Inut Date here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Price Product</label>
                                            
                                                <input type="number" class="form-control" name="price" 
                                                value="<?php echo $i_da['pric']?>">
                                           
                                            <p class="help-block">Inut number here.</p>
                                        </div>

                                        <div class="form-group">
                                            <label >Description Product</label>
                                            <input type="text" class="form-control" name="des" value="<?php echo $i_da['des']?>">
                                           
                                            <p class="help-block">Inut description here.</p>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info" name="insert">Update</button>

                                    </form>

                                    <?php
                                    
                                    if(isset($_POST['insert']))
                                    {
                                        move_uploaded_file($_FILES['img']['tmp_name'],
                                         'upload/'.$_FILES['img']['name']);
                                         if(empty($_FILES['img']['name']))
                                         {
                                            foreach($data_update as $i_da)
                                            {
                                               $_FILES['img']['name']=$i_da['pict'];
                                            }
                                            
                                         }

                                         

                                         $in_pr=$get_data->updatepr($_POST['name'],
                                         $_POST['sdt'],$_FILES['img']['name'],$_POST['sp'],
                                         $_POST['ngay'],$_POST['price'],$_POST['des'],$_GET['up']);
 
                                        if($in_pr){
                                            echo "<script> alert('Thay đổi sản phẩm thành công'); 
                                            window.location='select.php'</script>";
                                        }
                                        else echo "<script> alert ('Thay đổi sản phẩm không thành công'); </script>";
                                    }

                                    ?>


                            </div>
                        </div>
                            </div>

          
                            <hr>
                            
    

</body>
</html>
