<?php
    include('control.php');
    $get_data=new datapro();
    $select_hd=$get_data->selecthdid($_GET['duyet']);
    foreach ($select_hd as $i_hd)

    $in_sp=$get_data->selectprname($i_hd['name_sp']);
    foreach($in_sp as $i)
    
    if($i['sdt']<$_GET['sl'])
    {
        echo "<script> alert ('Số lượng trong kho không đủ!');
        window.location='invoice.php' </script>";

    }
    else
    {
        $in_sp=$get_data->updatett('ok',$i_hd['id_don']);

        

        $soluong=$i['sdt']-$_GET['sl'];

        $in_pr=$get_data->updatesl($soluong,$i_hd['name_sp']);

        if($in_pr) {
        echo "<script> alert('Đã Duyệt đơn hàng'); 
        window.location='invoice.php'</script>";
        }
        else echo "<script> alert ('Chưa Duyệt được sản phẩm'); </script>";
    }

?>S