<?php
    include("config/autoload.php");

    $user_id = @$REQUEST->user_id;
    $sql = "
        SELECT 
            order_history.*,
            product.*,
            user.* 
        FROM order_history 
            INNER JOIN product ON product.p_id=order_history.type
            INNER JOIN user ON user.user_order=order_history.user_order
    ";
    $obj = $DATABASE->QueryObj($sql);

    echo json_encode(array(
        "status"=>true,
        "datas"=>$obj
    ));
