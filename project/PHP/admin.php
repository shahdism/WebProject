<?php
try{
    echo "hiii";
    $date=date('Y-m-d');
    echo $date;
    $db = new mysqli("localhost", "root", "", "autisim");
    if (isset($_POST['user-id']) and isset($_POST['user-pass'])) {

        $user_id = $_POST ['user-id'];
        $user_pass = $_POST ['user-pass'];

        $qry ="SELECT * FROM `login` ";
        $result = $db->Query($qry);
        $row = $result->fetch_object();

        if ( $row -> user_name == $user_id and $row ->  password == $user_pass  )
        {
            echo "welcome";
            exit();
        }
        else {
            echo "Wrongggg";
            exit();
        }
    }}
catch (Exception $e){
    $e->getTrace();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>test</title>
</head>
<body>
<form action="admin.php" method="post">
    <label>user name: </label>
    <input type="text" name="user-id">
    <br><br>
    <label>password</label>
    <input type="text" name="user-pass">
    <br>
    <input type="submit" value="submit">
</form>
</body>
</html>
