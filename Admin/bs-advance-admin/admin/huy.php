<?php
    include('control.php');
    $get_data=new datapro();
    
    $in_pr=$get_data->deletehd($_GET['huy']);

    if($in_pr) {
        echo "<script> alert('Đã huỷ đơn hàng'); 
        window.location='invoice.php'</script>";
    }
    else echo "<script> alert ('Chưa huỷ được sản phẩm'); </script>";

?>