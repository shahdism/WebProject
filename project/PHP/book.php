<?php
$parentID=$_POST['ParentID'];
$date=$_POST['Date'];
$time=$_POST['time'];

try {
    $db = new mysqli("localhost", "root", "", "autisim");
    if (!empty($parentID) || !empty($date) || !empty($time) ) {
        $qry ="INSERT INTO `appointments`(`id`, `doctorID`, `childID`, `date`, `time`, `status`) 
        VALUES ('','12345','".$parentID."','".$date."','".$time."','no')";
        $res = $db->query($qry);
        $db->commit();
        if ($res == 1) {
            header("Location: ../html/userBookDate.html");
        }
        $db->close();
    }
}
catch (Exception $e){
$e->getMessage();
}

?>