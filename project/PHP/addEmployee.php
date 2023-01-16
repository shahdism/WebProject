<?php
$empID = $_POST['empID'];
$empName = $_POST['empName'];
$empPhone = $_POST['empPhone'];
$empEmail = $_POST['empEmail'];
$empPosition = $_POST['empPosition'];

try {
    $db = new mysqli("localhost", "root", "", "autisim");
    if (!empty($empID) || !empty($empName) || !empty($empPhone) || !empty($empEmail) || !empty($empPosition)) {
        $qry = "INSERT INTO `employee`(`emp_id`, `emp_name`, `emp_phone`, `emp_email`, `position`)
    VALUES ('" . $empID . "','" . $empName . "','" . $empPhone . "','" . $empEmail . "','" . $empPosition . "')";

        $res = $db->query($qry);
        $db->commit();
        if ($res == 1) {
            header("Location: ../PHP/addddd.php");
        }
        else{
            echo "wrong";
        }
        $db->close();
    }
}
catch (Exception $e){
    echo $e ->getMessage();

}
?>