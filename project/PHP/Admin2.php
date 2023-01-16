<?php


$db = new mysqli("localhost", "root", "", "autisim");

//if(!$DBConnection) {
  //  echo "Unable to connect the database!";
//}
if($db){
    echo "connected";
}
    else {
        //To determine the number of addicts.
        $SQL = 'SELECT Addict_ID  FROM addicttable';
        $Result = mysqli_query($DBConnection, $SQL);
        $rowCountOfAddicts = mysqli_num_rows($Result);


        //To determine the number of psychologists.
        $SQL = 'SELECT Psycho_ID  FROM psychologisttable';
        $Result = mysqli_query($DBConnection, $SQL);
        $rowCountOfPsycho = mysqli_num_rows($Result);


        //To determine the number of applicants.
        $SQL = 'SELECT Applicant_ID  FROM jobapplicanttable';
        $Result = mysqli_query($DBConnection, $SQL);
        $rowCountOfApplicants = mysqli_num_rows($Result);


        //To determine the number of appointments.
        $SQL = 'SELECT Appointment_Number  FROM appointmenttable';
        $Result = mysqli_query($DBConnection, $SQL);
        $rowCountOfAppointments = mysqli_num_rows($Result);

        $SQL = 'SELECT * FROM drugtable';
        $Result = mysqli_query($DBConnection, $SQL);

        //fetch the resulting rows of drug table as an array
        $DrugsIDs = array();
        $DrugsNames = array();
        $DrugsTypes = array();
        $numberOfDrugs = mysqli_num_rows($Result);

        for ($i = 0; $i < $numberOfDrugs; $i++) {
            $k = 0;
            $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
            $DrugsIDs[$i] = $Array[$k];
            $DrugsNames[$i] = $Array[$k + 1];
            $DrugsTypes[$i] = $Array[$k + 2];
        }


        //fetch the resulting rows from psycho table as an array.
        $psychoIDs= array();
        $PsychoFNames = array();
        $PsychoSNames = array();
        $PsychoLNames= array();
        $PsychoCity = array();

        $SQL = 'SELECT Psycho_ID, First_Name, Middle_Name, Last_Name, City FROM psychologisttable';
        $Result = mysqli_query($DBConnection, $SQL);

        $numberOfPsycho = mysqli_num_rows($Result);

        for ($i = 0; $i < $numberOfPsycho; $i++) {
            $k = 0;
            $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
            $PsychoIDs[$i] = $Array[$k];
            $PsychoFNames[$i] = $Array[$k + 1];
            $PsychoSNames[$i] = $Array[$k + 2];
            $PsychoLNames[$i] = $Array[$k + 3];
            $PsychoCity[$i] = $Array[$k + 4];
        }


        //fetch the resulting rows from children table as an array.
        $childID= array();
        $childName = array();
        $birthDate = array();
        $regDate= array();
        $parentID = array();
        $parentName = array();
        $phone = array();
        $email = array();

        $SQL = 'SELECT child_id, child_name, bitrthDate, regDate, parent_id, parent_name,phone,email FROM childeren';
        $Result = mysqli_query($db, $SQL);

        $numberOfChildren = mysqli_num_rows($Result);

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

        //I have checked how many job requests we have in road to recovery hub in the previous code.
        //Now I'll fetch the data from
        $SQL = 'SELECT Job_ID, Applicant_ID, First_Name, Middle_Name, Last_Name, City  FROM  jobapplicanttable';
        $Result = mysqli_query($DBConnection, $SQL);

        //fetch the resulting rows from Applicant table as an array.
        $JobID = array();
        $ApplicantID = array();
        $ApplicantFName = array();
        $ApplicantSName = array();
        $ApplicantLName = array();
        $ApplicantCity = array();

        for ($i = 0; $i < $rowCountOfApplicants; $i++) {
            $k = 0;
            $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
            $JobID[$i] = $Array[$k];
            $ApplicantID[$i] = $Array[$k + 1];
            $ApplicantFName[$i] = $Array[$k + 2];
            $ApplicantSName[$i] = $Array[$k + 3];
            $ApplicantLName[$i] = $Array[$k + 4];
            $ApplicantCity[$i] = $Array[$k + 5];
        }

        //fetch the resulting rows from jobs table as an array.
        $SQL = 'SELECT Job_ID, Specialization, AnnouncementDate, ApplicationDeadline, Salary  FROM  jobtable';
        $Result = mysqli_query($DBConnection, $SQL);
        $numberOfJobs = mysqli_num_rows($Result);

        $JobsID = array();
        $Specialization = array();
        $AnnouncementDate = array();
        $ApplicationDeadline = array();
        $Salary = array();

        for ($i = 0; $i < $numberOfJobs; $i++) {
            $k = 0;
            $Array = mysqli_fetch_array($Result, MYSQLI_NUM);
            $JobsID[$i] = $Array[$k];
            $Specialization[$i] = $Array[$k + 1];
            $AnnouncementDate[$i] = $Array[$k + 2];
            $ApplicationDeadline[$i] = $Array[$k + 3];
            $Salary[$i] = $Array[$k + 4];
        }


        mysqli_free_result($Result);

        //Close the connection
        mysqli_close($DBConnection);
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
    <p class = "Logo"> <span>  R</span>oad-  <span>  T</span>o- <span>   R</span>ecovery</p>
    <a href = "#" class = "icon-a DashboardBtn"> <i class = "fa fa-dashboard icons"></i> &nbsp; &nbsp; Dashboard </a>
    <a href = "#" class = "icon-a AnnouncementsBtn"> <i class = "fa fa-hospital-o icons"></i> &nbsp; &nbsp; Job Announcements </a>
    <a href = "#" class = "icon-a RequestsBtn"> <i class = "fa fa-briefcase icons"></i> &nbsp; &nbsp; Job Requests </a>
    <a href = "#" class = "icon-a PsychoListBtn"> <i class = "fa fa-user-md icons"></i> &nbsp; &nbsp; Psychologists List </a>
    <a href = "#" class = "icon-a AddictsListBtn"> <i class = "fa fa-group icons"></i> &nbsp; &nbsp; Addicts List </a>
    <a href = "#" class = "icon-a JobsListBtn"> <i class = "fa fa-tasks icons"></i> &nbsp; &nbsp; Announced Jobs List </a>
    <a href = "#" class = "icon-a ApplicantsListBtn"> <i class = "fa fa-id-card icons"></i> &nbsp; &nbsp; Job Applicants List </a>
    <a href = "../HTMLFiles/index.html" class = "icon-a"> <i class = "fa fa-arrow-circle-left icons"></i> &nbsp; &nbsp; Log Out </a>
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

        <div class = "ClearFix"></div>
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

            <?php
            for($i = 0; $i < $rowCountOfApplicants; $i++) {
                echo "<tr>";
                echo "<td> &nbsp;&nbsp; $ApplicantID[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $ApplicantFName[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ApplicantSName[$i] </td>";
                echo "<td> &nbsp;&nbsp; $ApplicantLName[$i] </td>";
                echo "<td> $ApplicantCity[$i] </td>";
                echo "<td> &nbsp; $JobID[$i] </td>";
                echo "</tr>";
            }
            ?>
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

            <?php
            for($i = 0; $i < $numberOfJobs; $i++) {
                echo "<tr>";
                echo "<td> $JobsID[$i] </td>";
                echo "<td> $Specialization[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $AnnouncementDate[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ApplicationDeadline[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $Salary[$i] </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


    <!--    //////////////////////////////////  children List ///////////////////////////////////-->
    <div class = "AddictsList">
        <p class = "HeaderText"> Addicts List </p>
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


    <!--    //////////////////////////////////  Psycho List ///////////////////////////////////-->
    <div class = "PsychologistsList">
        <p class = "HeaderText"> Psychologists List </p>
        <br/>
        <table class = "TablesText">
            <tr>
                <th> Psychologist ID </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Last Name </th>
                <th> &nbsp;&nbsp;&nbsp;&nbsp; City </th>
            </tr>
            <?php
            for($i = 0; $i < $numberOfPsycho; $i++) {
                echo "<tr>";
                echo "<td> &nbsp;&nbsp;&nbsp; $PsychoIDs[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $PsychoFNames[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $PsychoSNames[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $PsychoLNames[$i] </td>";
                echo "<td> &nbsp;&nbsp;&nbsp; $PsychoCity[$i] </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!--    //////////////////////////////////  Job Requests ///////////////////////////////////-->
    <div class = "JobRequests">
        <p class = "HeaderText"> Job Applications List </p>

        <div class = "Applicant1 textStyle" id = "app1">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[0]?> <?php echo $ApplicantSName[0]?> <?php echo $ApplicantLName[0]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[0] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[0] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[0] ?> </p>
            <button type = "submit" class = "ApproveBtn" onclick = "approveCard1()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard1()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant2 textStyle" id = "app2">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[1]?> <?php echo $ApplicantSName[1]?> <?php echo $ApplicantLName[1]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[1] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[1] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[1] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard2()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard2()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant3 textStyle" id = "app3">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[2]?> <?php echo $ApplicantSName[2]?> <?php echo $ApplicantLName[2]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[2] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[2] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[2] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard3()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard3()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant4 textStyle" id = "app4">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[3]?> <?php echo $ApplicantSName[3]?> <?php echo $ApplicantLName[3]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[3] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[3] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[3] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard4()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard4()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant5 textStyle" id = "app5">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[4]?> <?php echo $ApplicantSName[4]?> <?php echo $ApplicantLName[4]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[4] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[4] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[4] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard5()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard5()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant6 textStyle" id = "app6">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[5]?> <?php echo $ApplicantSName[5]?> <?php echo $ApplicantLName[5]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[5] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[5] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[5] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard6()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard6()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant7 textStyle" id = "app7">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[6]?> <?php echo $ApplicantSName[6]?> <?php echo $ApplicantLName[6]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[6] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[6] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[6] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard7()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard7()"> <p> Reject </p></button>
        </div>

        <div class = "Applicant8 textStyle" id = "app8">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[7]?> <?php echo $ApplicantSName[7]?> <?php echo $ApplicantLName[7]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[7] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[7] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[7] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard8()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard8()"> <p> Reject </p></button>
        </div>

        <div class = "Applicant9 textStyle" id = "app9">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[8]?> <?php echo $ApplicantSName[8]?> <?php echo $ApplicantLName[8]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[8] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[8] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[8] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard9()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard9()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant10 textStyle" id = "app10">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[9]?> <?php echo $ApplicantSName[9]?> <?php echo $ApplicantLName[9]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[9] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[9] ?> </p>
            <p> <br> <span  class = "shadow"> City: </span> <?php echo $ApplicantCity[9] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard10()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard10()"> <p> Reject </p></button>
        </div>

        <div class = "Applicant11 textStyle" id = "app11">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[10]?> <?php echo $ApplicantSName[10]?> <?php echo $ApplicantLName[10]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[10] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[10] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[10] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard11()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard11()"> <p> Reject </p></button>
        </div>


        <div class = "Applicant12 textStyle" id = "app12">
            <p> <span class = "shadow"> Name: </span> <?php echo $ApplicantFName[11]?> <?php echo $ApplicantSName[11]?> <?php echo $ApplicantLName[11]?></p>
            <p> <br> <span class = "shadow"> Applicant ID: </span> <?php echo $ApplicantID[11] ?> </p>
            <p> <br> <span class = "shadow"> Job ID: </span> <?php echo $JobID[11] ?> </p>
            <p> <br> <span class = "shadow"> City: </span> <?php echo $ApplicantCity[11] ?> </p>
            <button class = "ApproveBtn" onclick = "approveCard12()"> <p> Approve</p> </button>
            <button class = "RejectBtn" onclick="deleteCard12()"> <p> Reject </p></button>
        </div>
    </div>


    <!--    /////////////////////////////////////////////////////////////////////-->
    <div class = "JobAnnouncements">
        <div class="container-contact100">

            <form method = "POST" class="contact100-form validate-form" action="ConfirmJob.php">
                <div class="wrap-input100 validate-input" data-validate="The specialization is required" style="width: 400px">
                    <input class="input100" type="text" ID = "specialization" name="Specialization" placeholder="Enter the required specialization" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "The date is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Announcement-Date" name="AnnouncementDate" placeholder="Enter the announcement date" onfocus="(this.type='date')" onfocusout="(this.type='text')" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The deadline is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Deadline-Date" name="Deadline" placeholder="Enter the application deadline" onfocus="(this.type='date')" onfocusout="(this.type='text')" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="The salary is required" style="width: 400px">
                    <input class="input100" type="text" ID = "Salary" name="Salary" placeholder="Enter the salary" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
<!--                    <input type="submit" name="SubmitBtn">-->
                    <button class="contact100-form-btn" type = "submit" name = "confirm" value = "Confirm">
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
            <p> <?php echo "$rowCountOfPsycho"?>
                <br/> <span>Psychologists</span></p>
            <i class = "fa fa-stethoscope box-icon"></i>
        </div>
    </div>

    <div class = "Col-Div-3">
        <div class = "Box">
            <p> <?php echo "$rowCountOfAddicts"?>
                <br/> <span>Addicts</span></p>
            <i class = "fa fa-users box-icon"></i>
        </div>
    </div>

    <div class = "Col-Div-3">
        <div class = "Box">
            <p> <?php echo "$rowCountOfApplicants"?>
                <br/> <span>Job Applicants</span></p>
            <i class = "fa fa-vcard box-icon"></i>
        </div>
    </div>

    <div class = "Col-Div-3">
        <div class = "Box">
            <p> <?php echo "$rowCountOfAppointments"?>
                <br/> <span>Appointments</span></p>
            <i class = "fa fa-handshake-o box-icon"></i>
        </div>
    </div>

    <div class = "ClearFix"></div>
    <br/> <br/>

   <!-- <div class = "Col-Div-8">
        <div class = "Box-8">
            <div class = "Content-Box DrugsList">
                          <p> The Most Addictive Drugs <span> View All</span></p>
                <p> The Addictive Drugs By Our Addicts </p>
                <br/>
                <table>
                    <tr>
                        <th> Drug ID </th>
                        <th> Drug Name </th>
                        <th> Drug Type </th>
                    </tr>

        Job Applicants

                </table>
            </div>
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

    <div class = "ClearFix"></div>
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
    $(".DashboardBody").css('margin-top', '-500px');
    $(".JobAnnouncements").css('margin-top', '-600px');
    $(".JobRequests").css('margin-top', '-500px');
    $(".PsychologistsList").css('margin-top', '-500px');
    $(".AddictsList").css('margin-top', '-500px');
    $(".JobsList").css('margin-top', '-500px');
    // $(".ApplicantsList").css('margin-top', '-500px');
    $(".DashboardBody").css('visibility', 'visible');


    $(".DashboardBtn").click(function() {
        $(".DashboardBody").css('visibility', 'visible');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });

    $(".AnnouncementsBtn").click(function() {
        $(".JobAnnouncements").css('visibility', 'visible');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });

    $(".RequestsBtn").click(function() {
        $(".JobRequests").css('visibility', 'visible');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });


    $(".PsychoListBtn").click(function() {
        $(".PsychologistsList").css('visibility', 'visible');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });

    $(".AddictsListBtn").click(function() {
        $(".AddictsList").css('visibility', 'visible');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".JobsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });

    $(".JobsListBtn").click(function() {
        $(".JobsList").css('visibility', 'visible');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
        $(".ApplicantsList").css('visibility', 'hidden');
    });

    $(".ApplicantsListBtn").click(function() {
        $(".ApplicantsList").css('visibility', 'visible');
        $(".JobsList").css('visibility', 'hidden');
        $(".AddictsList").css('visibility', 'hidden');
        $(".JobRequests").css('visibility', 'hidden');
        $(".JobAnnouncements").css('visibility', 'hidden');
        $(".DashboardBody").css('visibility', 'hidden');
        $(".PsychologistsList").css('visibility', 'hidden');
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
    }

    function deleteCard1() {
        var myobj = document.getElementById("app1");
        myobj.remove();
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
