<?php
echo "hhhhhhhhheeeeeeeellllllllo";
try {

    $db = new mysqli("localhost", "root", "", "autisim");



//fetch the resulting rows from children table as an array.
    $childID = array();
    $childName = array();
    $birthDate = array();
    $regDate = array();
    $parentID = array();
    $parentName = array();
    $phone = array();
    $email = array();

    $qry = 'SELECT child_id, child_name, bitrthDate, regDate, parent_id, parent_name,phone,email FROM childeren';
    $Result = $db->Query($qry);

    $numberOfChildren = mysqli_num_rows($Result);
    //echo $numberOfChildren;
    for ($i = 0; $i < $numberOfChildren; $i++) {
        $k = 0;
        $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
        $childID[$i] = $Array[$k];
        $childName[$i] = $Array[$k + 1];
        $birthDate[$i] = $Array[$k + 2];
        $regDate[$i] = $Array[$k + 3];
        $parentID[$i] = $Array[$k + 4];
        $parentName[$i] = $Array[$k + 5];
        $phone[$i] = $Array[$k + 6];
        $email[$i] = $Array[$k + 7];
    }
    ///////////////////////////////////////// Employeeee/////////////////////////////////////
    $empID = array();
    $empName = array();
    $empPhone = array();
    $empEmail = array();
    $empPosition = array();

    $qry2 = 'SELECT emp_id, emp_name, emp_phone, emp_email, position FROM employee';
    $Result = $db->Query($qry2);
    $numberOfEmployee = mysqli_num_rows($Result);

    for ($i = 0; $i < $numberOfEmployee; $i++) {
        $k = 0;
        $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
        $empID[$i] = $Array[$k];
        $empName[$i] = $Array[$k + 1];
        $empPhone[$i] = $Array[$k + 2];
        $empEmail[$i] = $Array[$k + 3];
        $empPosition[$i] = $Array[$k + 4];
    }
    //////////////////////////// get appointments/////////////////////////////////////////////////////
    $doctorID = array();
    $doctorName = array();
    $childIDapp = array();
    $childNameapp = array();
    $date = array();
    $time = array();

    $qry3="SELECT * FROM `appointments` WHERE status='no'";
    $Result = $db->Query($qry3);
    $numberOfApp = mysqli_num_rows($Result);
    for ($i = 0; $i < $numberOfApp; $i++) {
        $k = 1;
        $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
        $doctorID[$i] = $Array[$k];
        $childIDapp[$i] = $Array[$k + 1];
        $date[$i] = $Array[$k + +2];
        $time[$i] = $Array[$k + 3];
    }
    for ($i=0; $i<$numberOfApp;$i++){
        $qry="SELECT emp_name FROM `employee` WHERE emp_id='".$doctorID[$i]."'";
        $Result = $db->Query($qry);
        $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
        $doctorName[$i] = $Array[0];
    }
    for ($i=0; $i<$numberOfApp;$i++){
        $qry="SELECT child_name FROM `childeren` WHERE child_id='".$childIDapp[$i]."'";
        $Result = $db->Query($qry);
        $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
        $childNameapp[$i] = $Array[0];
    }


}
catch (Exception $e){

}

?>

<!--HTML CODE-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Administrator Profile </title>
    <link rel="icon" href="../Images/Logo.png">
    <link rel = "stylesheet" href = "../css/Profile.css" type = "text/css">
    <link rel = "stylesheet" href = "../css/Admin.css" type = "text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class = "SideNav" id = "MySideNav">
    <p class = "Logo"> <span>  S</span>anad-  <span>     A</span>ssociation</p>
    <a href = "#" class = "icon-a DashboardBtn"> <i class = "fa fa-dashboard icons"></i> &nbsp; &nbsp; Dashboard </a>
    <a href = "#" class = "icon-a AnnouncementsBtn"> <i class = "fa fa-hospital-o icons"></i> &nbsp; &nbsp; Add Child </a>
    <a href = "#" class = "icon-a ApplicantsListBtn"> <i class = "fa fa-id-card icons"></i> &nbsp; &nbsp; Add Employee </a>
    <a href = "#" class = "icon-a JobsListBtn"> <i class = "fa fa-id-card icons"></i> &nbsp; &nbsp; Add Free time </a>
    <a href = "#" class = "icon-a RequestsBtn"> <i class = "fa fa-briefcase icons"></i> &nbsp; &nbsp; Appointments </a>
    <a href = "#" class = "icon-a PsychoListBtn"> <i class = "fa fa-user-md icons"></i> &nbsp; &nbsp; Employee List </a>
    <a href = "#" class = "icon-a AddictsListBtn"> <i class = "fa fa-group icons"></i> &nbsp; &nbsp; Children List </a>
   <!-- <a href = "#" class = "icon-a JobsListBtn"> <i class = "fa fa-tasks icons"></i> &nbsp; &nbsp; Announced Jobs List </a> -->
    <a href = "../html/homePage.html" class = "icon-a"> <i class = "fa fa-arrow-circle-left icons"></i> &nbsp; &nbsp; Log Out </a>
    <!--  <a href = "#" class = "icon-a"> <i class = "fa fa-mail-reply icons"></i> &nbsp; &nbsp; Log Out </a>-->

</div>

<div id = "Main">
    <div class = "Head">
        <div class = "Col-Div-6">
            <span style = "font-size: 30px; cursor: pointer; color: white;" class = "Nav"> &#9776; Dashboard</span>
            <span style="font-size: 30px; cursor: pointer; color: white;" class = "Nav2">&#9776; Dashboard</span>
        </div>

        <div class = "Col-Div-6">
            <div class = "Profile">
                <img src = "../Images/Admin.png" class = "pro-image">
                <p style = "font-size: 18px"> ADMIN </p>
            </div>
        </div>

        <div class = "ClearFix">
        </div>
    </div>

    <!--    //////////////////////////////////  Applicants List ///////////////////////////////////-->
    <div class = "ApplicantsList">
        <p class = "HeaderText"> Applicants List </p>
        <br/>
        <table>
            <tr>
                <th> Applicant ID </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Last Name </th>
                <th> City </th>
                <th> Job ID </th>
            </tr>

        </table>
    </div>

    <!--    //////////////////////////////////  Jobs List ///////////////////////////////////-->
    <div class = "JobsList">
        <p class = "HeaderText"> Jobs List </p>
        <br/>
        <table>
            <tr>
                <th> Job ID </th>
                <th> Specialization </th>
                <th> Announcement Date </th>
                <th> ApplicationDeadline </th>
                <th> &nbsp;&nbsp;&nbsp;&nbsp; Salary </th>
            </tr>
        </table>
    </div>

    <!--    //////////////////////////////////  children List ///////////////////////////////////-->
    <div class = "AddictsList">
        <p class = "HeaderText"> Children List </p>
        <br/>
        <table>
            <tr>
                <th> Child ID </th>
                <th> Child Name </th>
                <th> Birth Date </th>
                <th> Registration Date </th>
                <th> Parent ID </th>
                <th> Parent Name </th>
                <th> Phone </th>
                <th> Email </th>
            </tr>
            <?php
            for($i = 0; $i < $numberOfChildren; $i++) {
                echo "<tr>";
                echo "<td> $childID[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $childName[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $birthDate[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $regDate[$i] </td>";
                echo "<td> $parentID[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $parentName[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $phone[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $email[$i] </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


    <!--    //////////////////////////////////  Employee List ///////////////////////////////////-->
    <div class = "PsychologistsList">
        <p class = "HeaderText"> Employee List </p>
        <br/>
        <table class = "TablesText">
            <tr>
                <th> Employee ID </th>
                <th> Employee Name </th>
                <th> Employee Phone </th>
                <th> Employee Email </th>
                <th> &nbsp;&nbsp;&nbsp;&nbsp; Position </th>
            </tr>
            <?php
            for($i = 0; $i < $numberOfEmployee; $i++) {
                echo "<tr>";
                echo "<td> $empID[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $empName[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $empPhone[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $empEmail[$i] </td>";
                echo "<td> $empPosition[$i] </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!--    //////////////////////////////////  Job Requests ///////////////////////////////////-->
    <div class = "JobRequests">
        <p class = "HeaderText"> Appointments List </p>
        <?php
        for ($i=0 ;$i<$numberOfApp;$i++){
        echo '
        <div class = "Applicant1 textStyle" id = "app1"> 
            <p> <span class = "shadow"> Doctor ID : </span>'. $doctorID[$i] .'</p>
            <p> <br> <span class = "shadow"> Doctor Name : </span>'. $doctorName[$i] .'</p>
            <p> <br> <span class = "shadow"> Child ID : </span>'. $childIDapp[$i] .'</p>
            <p> <br> <span class = "shadow"> Child Name : </span>'.$childNameapp[$i].'</p>
            <p> <br> <span class = "shadow"> Date: </span>'. $date[$i].' </p>
            <p> <br> <span class = "shadow"> Time: </span>'. $time[$i].' </p>
            <button type = "submit" class = "ApproveBtn" onclick = "approveCard1()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard1()"> <p> Reject </p></button>
        </div>';
    }
    ?>

    </div>

    <!--    /////////////////////////////////////////////////////////////////////-->
    <!--<div class = "AddFreeTime">
        <div class="container-contact100">
            <form method = "POST" class="contact100-form validate-form" action="">
                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="empID" placeholder="Enter Doctor ID" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "The date is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Announcement-Date" name="birthDate" placeholder="Enter Date" onfocus="(this.type='date')" onfocusout="(this.type='text')" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "The date is required" style="width: 400px">
                    <input class="input100" type="time" ID = "Announcement-Date" name="birthDate" placeholder="Enter Time" onfocus="(this.type='date')" onfocusout="(this.type='text')" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <!--                    <input type="submit" name="SubmitBtn">-->
                   <!-- <button class="contact100-form-btn" type = "submit" name = "confirm" value = "ADD">
						<span>
							Confirm
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div> -->
    <!-- ////////////////////////////////////////////////////////////////////////////////////////-->


    <div class = "JobAnnouncements">
        <div class="container-contact100">

            <form method = "POST" class="contact100-form validate-form" action="addChild.php">
                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="childID" placeholder="Enter Child ID" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="childName" placeholder="Enter Child Name" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "The date is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Announcement-Date" name="birthDate" placeholder="Enter Child BithDate" onfocus="(this.type='date')" onfocusout="(this.type='text')" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="parentID" placeholder="Enter Parent ID" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The salary is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Salary" name="parentName" placeholder="Enter Parent Name" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="phone" placeholder="Enter Phone Number and Email" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <!--                    <input type="submit" name="SubmitBtn">-->
                    <button class="contact100-form-btn" type = "submit" name = "confirm" value = "ADD">
						<span>
							Confirm
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class = "AddEmployee">
        <div class="container-contact100">

            <form method = "POST" class="contact100-form validate-form" action="addEmployee.php">
                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="empID" placeholder="Enter Employee ID" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="empName" placeholder="Enter Employee Name" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="empPhone" placeholder="Enter Employee Phone" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The salary is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Salary" name="empEmail" placeholder="Enter Employee Email" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="empPosition" placeholder="Enter Employee Position" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <!--                    <input type="submit" name="SubmitBtn">-->
                    <button class="contact100-form-btn" type = "submit" name = "confirm" value = "ADD">
						<span>
							Confirm
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!--    /////////////////////////////////////////////////////////////////////-->







    <div class = "DashboardBody">

        <div class = "Col-Div-3">
            <div class = "Box">
                <p> <?php echo "$numberOfEmployee"?>
                    <br/> <span>Employee</span></p>
                <i class = "fa fa-stethoscope box-icon"></i>
            </div>
        </div>

        <div class = "Col-Div-3">
            <div class = "Box">
                <p> <?php echo "$numberOfChildren"?>
                    <br/> <span>Children</span></p>
                <i class = "fa fa-users box-icon"></i>
            </div>
        </div>

        <div class = "Col-Div-3">
            <div class = "Box">
                <p> <?php echo "$numberOfApp"?>
                    <br/> <span>Appointments</span></p>
                <i class = "fa fa-handshake-o box-icon"></i>
            </div>
        </div>

        <div class = "ClearFix"></div>
        <br/>
         <div class = "Col-Div-8">
             <div class = "Box-8">
                <img src="../images/admin22.png" width="570px" height="338px">
             </div>
         </div>-->

        <!-- <div class = "Col-Div-4">
             <div class = "Box-4">
                 <div class = "Content-Box">
                     <!--          <p> Total Percentage Of Addiction <span> View All</span> </p>
                     <p> Total Percentage Of Addiction </p>
                     <div class = "Circle-Wrap">
                         <div class = "Circle">
                             <div class = "Mask Full">
                                 <div class = "Fill"></div>
                             </div>
                             <div class = "Mask Half">
                                 <div class = "Fill"></div>
                             </div>
                             <div class = "inside-circle"> 80% </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div> -->

    </div>
</div>


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script type = "text/javascript">


    $(".Main").css('visibility', 'visible');
    $(".ApplicantsList").css('visibility', 'hidden');
    $(".JobsList").css('visibility', 'hidden');
    $(".AddictsList").css('visibility', 'hidden');
    $(".JobRequests").css('visibility', 'hidden');
    $(".PsychologistsList").css('visibility', 'hidden');
    $(".JobAnnouncements").css('visibility', 'hidden');
    $(".AddEmployee").css('visibility', 'hidden');
    $(".AddFreeTime").css('visibility', 'hidden');
    $(".DashboardBody").css('margin-top', '-500px');
    $(".JobAnnouncements").css('margin-top', '-600px');
    $(".AddEmployee").css('margin-top', '-600px');
    $(".JobRequests").css('margin-top', '-500px');
    $(".PsychologistsList").css('margin-top', '-500px');
    $(".AddictsList").css('margin-top', '-500px');
    $(".JobsList").css('margin-top', '-500px');
    $(".AddFreeTime").css('margin-top', '-500px');
    // $(".ApplicantsList").css('margin-top', '-500px');
    $(".DashboardBody").css('visibility', 'visible');


    $(".DashboardBtn").click(function() {
        $(".DashboardBody").css('visibility', 'visible');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });

    $(".AnnouncementsBtn").click(function() {
        $(".JobAnnouncements").css('visibility', 'visible');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });

    $(".RequestsBtn").click(function() {
        $(".JobRequests").css('visibility', 'visible');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });


    $(".PsychoListBtn").click(function() {
        $(".PsychologistsList").css('visibility', 'visible');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });

    $(".AddictsListBtn").click(function() {
        $(".AddictsList").css('visibility', 'visible');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });

    $(".JobsListBtn").click(function() {
        $(".AddFreeTime").css('visibility', 'visible');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
        $(".AddEmployee").css('visibility', 'hidden');
    });

    $(".ApplicantsListBtn").click(function() {
        $(".AddEmployee").css('visibility', 'visible');
        $(".JobsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddFreeTime").css('visibility', 'hidden');
    });




    $(".Nav").click(function() {
        $("#MySideNav").css('width', '70px');
        $("#Main").css('margin-left', '70px');
        $(".Logo").css('visibility', 'hidden');
        $(".Logo span").css('visibility', 'visible');
        $(".Logo span").css('margin-left', '-10px');
        $(".icon-a").css('visibility', 'hidden');
        $(".icons").css('visibility', 'visible');
        $(".icons").css('margin-left', '-8px');
        $(".Nav").css('display', 'none');
        $(".Nav2").css('display', 'block');
        $(".wrap-input100").css('margin-left', '100px');
        $(".contact100-form-btn").css('margin-left', '-450px');

    });

    $(".Nav2").click(function() {
        $("#MySideNav").css('width', '300px');
        $("#Main").css('margin-left', '300px');
        $(".Logo").css('visibility', 'visible');
        $(".Logo span").css('visibility', 'visible');
        $(".icon-a").css('visibility', 'visible');
        $(".icons").css('visibility', 'visible');
        $(".Nav").css('display', 'block');
        $(".Nav2").css('display', 'none');
        $(".contact100-form-btn").css('margin-left', '-350px');
    });

    //Cards of the job applicants
    //Card1
    function approveCard1() {
        var myobj = document.getElementById("app1");
        myobj.remove();
        //location.href="accept.php";


    }

    function deleteCard1() {
        var myobj = document.getElementById("app1");
        myobj.remove();
        //location.href="reject.php";
    }

    //Card2
    function approveCard2() {
        var myobj = document.getElementById("app2");
        myobj.remove();
    }

    function deleteCard2() {
        var myobj = document.getElementById("app2");
        myobj.remove();
    }

    //Card3
    function approveCard3() {
        var myobj = document.getElementById("app3");
        myobj.remove();
    }

    function deleteCard3() {
        var myobj = document.getElementById("app3");
        myobj.remove();
    }

    //Card4
    function approveCard4() {
        var myobj = document.getElementById("app4");
        myobj.remove();
    }

    function deleteCard4() {
        var myobj = document.getElementById("app4");
        myobj.remove();
    }

    //Card5
    function approveCard5() {
        var myobj = document.getElementById("app5");
        myobj.remove();
    }

    function deleteCard5() {
        var myobj = document.getElementById("app5");
        myobj.remove();
    }

    //Card6
    function approveCard6() {
        var myobj = document.getElementById("app6");
        myobj.remove();
    }

    function deleteCard6() {
        var myobj = document.getElementById("app6");
        myobj.remove();
    }

    //Card7
    function approveCard7() {
        var myobj = document.getElementById("app7");
        myobj.remove();
    }

    function deleteCard7() {
        var myobj = document.getElementById("app7");
        myobj.remove();
    }

    //Card8
    function approveCard8() {
        var myobj = document.getElementById("app8");
        myobj.remove();
    }

    function deleteCard8() {
        var myobj = document.getElementById("app8");
        myobj.remove();
    }


    //Card9
    function approveCard9() {
        var myobj = document.getElementById("app9");
        myobj.remove();
    }

    function deleteCard9() {
        var myobj = document.getElementById("app9");
        myobj.remove();
    }


    //Card10
    function approveCard10() {
        var myobj = document.getElementById("app10");
        myobj.remove();
    }

    function deleteCard10() {
        var myobj = document.getElementById("app10");
        myobj.remove();
    }

    //Card11
    function approveCard11() {
        var myobj = document.getElementById("app11");
        myobj.remove();
    }

    function deleteCard11() {
        var myobj = document.getElementById("app11");
        myobj.remove();
    }

    //Card12
    function approveCard12() {
        var myobj = document.getElementById("app12");
        myobj.remove();
    }

    function deleteCard12() {
        var myobj = document.getElementById("app12");
        myobj.remove();
    }

</script>
<!--<script src="../ContactForm/ContactFromCode/js/main.js"></script>-->

</body>
</html>



