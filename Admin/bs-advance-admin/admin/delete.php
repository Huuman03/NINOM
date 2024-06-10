<?php
    include('control.php');
    $get_data=new datapro();
    
    $in_pr=$get_data->deletepr($_GET['del']);

    if($in_pr) {
        echo "<script> alert('Đã xóa bài viết'); 
        window.location='select.php'</script>";
    }
    else echo "<script> alert ('Chưa xóa được sản phẩm'); </script>";

?>