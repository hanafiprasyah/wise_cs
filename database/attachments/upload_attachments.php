<?php

if (isset($_POST['btnUploadAttach'])) {
    $file       = $_FILES['file'];
    move_uploaded_file($file["tmp_name"], "../../uploads/" . $file["name"]);
    header("Refresh:0; url=../../pages/screen/attachments.php?id=9150101");
}
