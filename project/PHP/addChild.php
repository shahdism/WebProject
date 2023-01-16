<?php
$childID = $_POST['childID'];
$childName = $_POST['childName'];
$birthDate = $_POST['birthDate'];
$parentID = $_POST['parentID'];
$parentName = $_POST['parentName'];
$phone = $_POST['phone'];
$regDate=date('Y-m-d');
$arr=explode(" ",$phone);
$phone=$arr[0];
$email=$arr[1];
try {
    $db = new mysqli("localhost", "root", "", "autisim");
    if (!empty($childID) || !empty($childName) || !empty($birthDate) || !empty($parentID) || !empty($parentName) || !empty($phone)) {
        $qry = "INSERT INTO `childeren`(`child_id`, `child_name`, `bitrthDate`, `regDate`,  `parent_id`, `parent_name`, `phone`, `email`)
    VALUES ('" . $childID . "','" . $childName . "','" . $birthDate . "','" . $regDate . "','" . $parentID . "','" . $parentName . "','" . $phone . "','" . $email . "')";
        $res = $db->query($qry);
        $db->commit();
        if ($res == 1) {
            header("Location: ../PHP/addddd.php");
        }
        $db->close();
    }
}
catch (Exception $e){

}
?>