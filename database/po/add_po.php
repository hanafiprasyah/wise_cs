<?php
require_once '../configures/koneksi.php';

if (isset($_POST['btnAddPO'])) {
    date_default_timezone_set("Asia/Bangkok");
    
    $user       = $_GET['user'];
    $entry_by   = mysqli_real_escape_string($conn, $user);
    
    $wise_string        = "WISE-";
    $po_query           = $_POST['po_number'];
    $progress           = 16.6667;
    $id_quotation       = $_POST['id_quotation'];
    $id_rel             = $_POST['id_rel'];
    $id_product         = $_POST['id_product'];
    $qty                = $_POST['item_qty'];
    $delivery_target    = $_POST['delivery_target'];
    $sending_date       = $_POST['sending_date'];
    $desc               = $_POST['po_desc'];
    $po_date            = $_POST['po_date'];
    $detail_progress    = $_POST['detail_progress'];
    $po_status          = $_POST['po_status'];
    $po_number          = '' . $wise_string . '' . $po_query;


        $conn->query("INSERT INTO `purchase_order`(
            `po_number`, 
            `id_quotation`, 
            `id_rel`, 
            `entry_by`, 
            `po_date`,
            `sending_date`,
            `id_product`, 
            `item_qty`, 
            `delivery_target`, 
            `progress`, 
            `detail_progress`, 
            `po_status`, 
            `po_desc`
            ) VALUES (
                '".$po_number."',
                '".$id_quotation."',
                '".$id_rel."',
                '".$entry_by."',
                '".$po_date."',
                '".$sending_date."',
                '".$id_product."',
                '".$qty."',
                '".$delivery_target."',
                '".$progress."',
                '".$detail_progress."',
                '".$po_status."',
                '".$desc."'
                )");

        $conn->query("UPDATE `activity_tracker` SET 
        `po_number`='" . $po_number . "',
        `po_submit`='" . $sending_date . "',
        `status`='Finished' 
        WHERE id_quotation='" . $id_quotation . "';");
        
        header('location:../../pages/screen/purchase_order.php?id=405007');
        mysqli_refresh($conn, MYSQLI_REFRESH_GRANT);
}
