<?php

// Creating Connection to Database
    require_once "configNew.php";

// Staring Session
    session_start();

$sql = "SELECT * FROM events_details_information WHERE eventDepartment ='Electronics and Telecommunication'";

$result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

</head>

<body>

<!--Navbar PHP -->
<?php include_once "includes/navbar.php";?>

    <?php
                if($result->num_rows >0) {

echo  '<div class="container mt-5">';
echo '<h1 class="text-danger text-center mb-5 font-sans">WELCOME TO EXTC EVENTS</h1>';
echo '<div class="row">';

   
$i =0;

                    while($row= $result->fetch_assoc()){
$i++;
                        $eventName = $row["eventName"];
                        $eventImage = $row["eventImage"];
                        $eventPrice = $row["eventPrice"];
 
?>
    <div class="col-md-4 mb-5">
        <div class="card shadow text-center">
            <img src=<?php echo $eventImage ?> class="img-fluid">
            <h5 class="text-danger my-3">Entry Fee &#x20b9;<?php echo $eventPrice ?></h5>

            <form method="post" action="Paytm/PaytmKit/TxnTest.php">
                <input type="hidden" name="eventName" value='<?php echo $eventName; ?>'>
                <input type="hidden" name="eventPrice" value='<?php echo $eventPrice?>'>
                <input type="submit" class="btn btn-primary text-uppercase btn-block mb-2 rounded-pill" value="Click here to Register">
            </form>

            <button type ='button' data-toggle="modal" data-target= '#modal<?php echo $i; ?>'
              class ='btn btn-secondary mb-3 rounded-pill 
             text-uppercase'>View Event Information<button>

        </div>
    </div>

    
                    

    <?php
                    }
                }

                ?>

    </div>
    </div>




<!--Modals of the Event-->

<!--  Paper Modal -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Rules for Paper Presentation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 modal1">
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:150/-</h4>

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:1500/-</h4>

                                <h4 class="font-weight-bold text-warning">Topics:-</h4>

                                <p>Any latest topic related to Electronics & Telecommunication Department.</p>


                                <h4 class="font-weight-bold  text-warning">Submission Guidelines:-</h4>

                                <ol>

                                    <li> Submissions must include title, author’s details, abstract, keywords and full
                                        paper
                                        should
                                        not exceed 6 pages and must be in the standard IEEE format. </li>
                                    <li> Selected participants should bring 1 hard copy of their paper & softcopy of
                                        presentation in
                                        ppt format. </li>
                                    <li>Seven minutes for presentation and three minutes for queries.</li>
                                </ol>

                                <h4 class="font-weight-bold  text-warning">General Regulation:-</h4>

                                <ol>

                                    <li> ID card is mandatory</li>
                                    <li>Time management will be strictly followed</li>
                                    <li>A team can have 2 participants</li>
                                    <li>Preference will be given to original papers.</li>
                                    <li>No participant can be a part of more than one team.</li>
                                    <li>There are no restrictions on the number of teams from same college.</li>
                                </ol>

                                <h4 class="font-weight-bold text-warning">Important Dates:-</h4>
                                <p> The Abstract of Paper Presentation topic in .pdf or .doc format should be mailed to
                                    vishalbait01@gmail.com on or before March 6th, 2020.</p>

                                <h4 class="font-weight-bold text-warning">Co-ordinators:-</h4>
                                <ul>
                                    <li><strong>Chief-Coordinator:- </strong> Vishal Bait</li>
                                    <li><strong>Mobile No:- </strong> 9373241085</li>
                                </ul>

                                
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Poster Modal -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Rules for Poster Presentation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 modal1">
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:100/-</h4>

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:1200/-</h4>
                                <h4 class="font-weight-bold text-warning">Topics:-</h4>
                                <p>Any topic related to Electronics & Telecommunication Department.</p>
                                <h4 class="font-weight-bold  text-warning">Rules and Regulations:-</h4>
                                <ol>
                                    <li> One panel is available for display of each poster. To fit comfortably within
                                        the poster frame, posters must not exceed 36 inches wide x 48 inch high with 1”
                                        margin on all side. </li>
                                    <li> Electrical outlets will not be provided in the poster presentation area.</li>
                                    <li>Posters should be readable from a distance of 6 feet (2 meters).</li>
                                    <li>The poster should be self-explanatory.</li>
                                    <li>Neither commercial activities nor any advertising may be displayed on the
                                        posters.</li>
                                    <li>Proper explanation must be essential of each and every parameter visualize in
                                        the poster.</li>
                                </ol>

                                <h4 class="font-weight-bold  text-warning">General Regulation:-</h4>

                                <ol>

                                    <li> ID card is mandatory</li>
                                    <li>Time management will be strictly followed</li>
                                    <li>A team can have 2 participants</li>
                                    <li>No participant can be a part of more than one team.</li>
                                    <li>There are no restrictions on the number of teams from same college.</li>
                                </ol>

                                <h4 class="font-weight-bold text-warning">Important Dates:-</h4>
                                <p>A poster should be submitted/registered on or before 07/03/2020.</p>
                                <p>Participants will be informed about the selection of the respective poster by
                                    05/03/2020.</p>

                                <h4 class="font-weight-bold text-warning">Co-ordinators:-</h4>
                                <ul>
                                    <li><strong>Chief-Coordinator:- </strong>Suraj Mohite</li>
                                    <li><strong>Mobile No:- </strong> 9823148308</li>
                                </ul>
                                                       
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Project Modal -->
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Rules for Poster Presentation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 modal1">
                                <h4 class="text-success text-center">MINI-PROJECT FOR DIPLOMA STUDENT</h4>
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:150/-</h4>


                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:1500/-</h4>




                                <h4 class="font-weight-bold text-warning">Topics:-</h4>

                                <p>Any Project related to Electronics & Telecommunication, Computer & IT Department.</p>


                                <h4 class="font-weight-bold  text-warning">Rules and Regulations:-</h4>

                                <ol>

                                    <li> Participants will be provided with only one table and one electricity
                                        connections socket. </li>
                                    <li>An abstract of not more than 500 words should be submitted.</li>
                                    <li>It should contain all major details about project.</li>
                                    <li>Participants will be informed about selection of respective models.</li>
                                    <li>If any special type of material is required in the project, the requirement for
                                        the same should be submitted well in advance.</li>

                                </ol>

                                <br>
                                <br>

                                <h4 class="text-success text-center">MAJOR-PROJECT FOR DEGREE STUDENT</h4>
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:200/-</h4>

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:2000/-</h4>

                                <h4 class="font-weight-bold text-warning">Topics:-</h4>

                                <p>Any Project related to Electronics & Telecommunication, Computer & IT Department.</p>

                                <h4 class="font-weight-bold  text-warning">Rules and Regulations:-</h4>

                                <ol>
                                    <li> Participants will be provided with only one table and one electricity
                                        connections socket. </li>
                                    <li>An abstract of not more than 500 words should be submitted.</li>
                                    <li>It should contain all major details about project.</li>
                                    <li>Participants will be informed about selection of respective models.</li>
                                    <li>If any special type of material is required in the project, the requirement for
                                        the same should be submitted well in advance.</li>
                                </ol>

                                <h4 class="font-weight-bold  text-warning">General Regulation:-</h4>

                                <ol>

                                    <li> ID card is mandatory</li>
                                    <li>Time management will be strictly followed</li>
                                    <li>A team can have 3 participants for Mini-Project and 4 Participants for Major
                                        Project.</li>
                                    <li>No participant can be a part of more than one team.</li>
                                    <li>There are no restrictions on the number of teams from same college.</li>
                                </ol>

                                <h4 class="font-weight-bold text-warning">Important Dates:-</h4>
                                <p>Participants will be informed about the selection of the respective models by
                                    1/3/2020 and last date of registration is 05/03/2020.</p>

                                <h4 class="font-weight-bold text-warning">Co-ordinators:-</h4>
                                <ul>
                                    <li><strong>Chief-Coordinator:- </strong>Avdhoot Pandharkame</li>
                                    <li><strong>Mobile No:- </strong> 8793940327</li>
                                </ul>
                                
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  CalciWar Modal -->
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Rules for CalciWar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 modal1">

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:50/-</h4>

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:800/-</h4>
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Second Prize:500/-</h4>

                                <h4 class="font-weight-bold  text-warning">Rules and Regulations:-</h4>

                                <ol>

                                    <li>The maximum time limit for designing the program is as follows:- </li>
                                    <ul>
                                        <li>Round-I: 20 min.</li>
                                        <li>Round-II: 40min</li>
                                        <li>Round-III: 1 Hr.</li>
                                        <li>Spot entries are allowed.</li>
                                    </ul>

                                </ol>


                                <h4 class="font-weight-bold  text-warning">General Regulation:-</h4>

                                <ol>

                                    <li> ID card is mandatory</li>
                                    <li>Time management will be strictly followed</li>
                                    <li>Only One Participant are allowed</li>

                                </ol>

                                <h4 class="font-weight-bold text-warning">Important Dates:-</h4>
                                <p>Last date of registration is 07/03/2020.</p>

                                <h4 class="font-weight-bold text-warning">Co-ordinators:-</h4>
                                <ul>
                                    <li><strong>Chief-Coordinator:- </strong>Samprit Gowd</li>
                                    <li><strong>Mobile No:- </strong> 9623291361</li>
                                </ul>
                                
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!--  logo contest Modal -->
    <div class="modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Rules for Logo Contest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 modal1">

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Entry Fees:100/-</h4>

                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    First Prize:1400/-</h4>
                                <h4
                                    class="font-weight-bold text-center text-uppercase text-danger animated heartBeat slow">
                                    Second Prize:600/-</h4>

                                <h4 class="font-weight-bold  text-warning">Rules and Regulations:-</h4>

                                <ol>
                                    <li>This game requires pencil for making Logo</li>
                                    <li>We will provide multiple logo on projector screen for 5 minutes.</li>
                                    <li>The decision of the judge will be final and binding.</li>
                                    <li>Spot entries will be allowed.</li>
                                </ol>

                                <h4 class="font-weight-bold  text-warning">General Regulation:-</h4>
                                <ol>
                                    <li> ID card is mandatory</li>
                                    <li>Time management will be strictly followed</li>
                                    <li>A maximum of 2 participants per team are allowed.</li>
                                </ol>

                                <h4 class="font-weight-bold text-warning">Important Dates:-</h4>
                                <p>Last date of registration is 07/03/2020.</p>

                                <h4 class="font-weight-bold text-warning">Co-ordinators:-</h4>
                                <ul>
                                    <li><strong>Chief-Coordinator:- </strong>Vipul Gandhi</li>
                                    <li><strong>Mobile No:- </strong> 7776825102</li>
                                </ul>
                                                         
                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modals of the event end-->

     <!-- Footer PHP -->
    <?php include_once "includes/footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

     <?php
    // closing Database Connnection
     $conn->close(); 
     ?>
 
</body>

</html>