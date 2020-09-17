<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="test task for TrueCare24">
    <meta name="author" content="Ibraheem Barbahan">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>TrueCare24 - Matched Providers</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">

</head>
<?php require_once('include/connect.php');
 $sql = "SELECT * from `matchedproviders` ";
 $query = mysqli_query($con,$sql);
 $status = [
    "1" => "contacting",
    "2" => "Talkedtotheclient",
    "3" => "Assessmentscheduled",
    "4" => "ContractSigned",
    "5" => "Canceltheclient",
];
$contracted = [
    "0" => "noncontracted",
    "1" => "contracted",
];
$type = [
    "0" => "homecareagency",
    "1" => "IC",
];
 $sid='ACe6be3fbdf1b89841ec4b8e518258afc8';
 $token='03dfcbc3701f0d3b3d8b8cd611ee86e8';
putenv("TWILIO_ACCOUNT_SID=$sid"); 
putenv("TWILIO_AUTH_TOKEN=$token"); 
 
?>
<body>

    <!-- Preloader - style you can find in spinners.css -->

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include "include/topbar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include "include/sidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
              
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Matched providers</h5>
                                 
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th scope="col">Type</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            while($row = mysqli_fetch_assoc($query))
                                            {
                                                ?>
                                            <tr style="<?php if($row['status']==5) echo 'background-color: #FFEFF2;'; ?>">
                                            <th scope="row">
                                            <img src="assets/images/icons/<?php echo $contracted[$row['contracted']]; ?>.png" class="img-fluid  p-2"  />
                                            <img src="assets/images/icons/<?php echo $type[$row['type']]; ?>.png" class="img-fluid ml-auto p-2"  />
                                            </th>
                                            <td style="font-weight: bold;"><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td> 
                                            <a class="  dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="assets/images/icons/<?php echo $status[$row['status']]; ?>.png" class="img-fluid ml-auto p-2"  />
                                            <?php echo $status[$row['status']]; ?>
                                            
                                            </a>
                                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                                <a class="dropdown-item" href="crude/updatests.php?id=1&prov_id=<?php echo $row['id'] ?>"><img src="assets/images/icons/contacting.png" class="img-fluid ml-auto p-2"  />Contacting <hr></a>
                                                <a class="dropdown-item" href="crude/updatests.php?id=2&prov_id=<?php echo $row['id'] ?>"><img src="assets/images/icons/Talkedtotheclient.png" class="img-fluid ml-auto p-2"  />Talked to the client <hr></a>
                                                <a class="dropdown-item" href="crude/updatests.php?id=3&prov_id=<?php echo $row['id'] ?>"><img src="assets/images/icons/Assessmentscheduled.png" class="img-fluid ml-auto p-2"  />Assesment scheduled <hr></a>
                                                <a class="dropdown-item" href="crude/updatests.php?id=4&prov_id=<?php echo $row['id'] ?>"><img src="assets/images/icons/ContractSigned.png" class="img-fluid ml-auto p-2"  />Contract signed  <hr></a>
                                                <a class="dropdown-item" href="crude/updatests.php?id=5&prov_id=<?php echo $row['id'] ?>"><img src="assets/images/icons/Canceltheclient.png" class="img-fluid ml-auto p-2"  />Cancel the client </a>
                                                </div>
                                            </td>
                                            <td><button type="button" class="btn btn-primary">CHAT</button></td>
                                            <td>
                                            <form id="contactForm" method="post" action="call.php?userPhone=<?php echo $row['phone']; ?>&name=<?php echo $row['name']; ?>" role="form" >
                                            
                                                
                                                    <input type="text" class="form-control" id="userPhone" name="userPhone"  value="+79313989523"
                                                        hidden>
                                                        <input type="text" class="form-control" id="salesPhone" name="salesPhone"  value="+79214198720"
                                                        hidden>
                                              
                                                <button type="submit" class="btn btn-success">CALL</button>
                                            </form>
                                               

                                            </td>
                                            <td>
                                            <a class="  dropdown-toggle text-muted waves-effect waves-dark  " href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/icons/menu.png" alt="user"  ></a>
                                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                                    <a class="dropdown-item" href="javascript:void(0)">Send Info</a>
                                                    <a class="dropdown-item" href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal">provide feedback</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Send reminder</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Background check</a>
                                                </div>
                                            </td>
                                        </tr>


                                           <?php
                                                
                                            }
                                        ?>
                                        
                                 
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
               
                <!-- ============================================================== -->
                <!-- modal -->
                <!-- ============================================================== -->
                <div class="modal fade bd-example-modal-sm bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Set the rating and provide the feedback note: </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star notchecked"></span>
                        </div>
                        <textarea name="feedback" id="feedback" cols="30" rows="5" class="form-control " placeholder="Type here"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block">SAVE</button>
                    </div>
                    </div>
                </div>
                </div>
                 <!-- ============================================================== -->
                <!-- end of modal -->
                <!-- ============================================================== -->          
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
          
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!-- crude code -->
    <script src="dist/js/crude.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/vendor/intl-phone/js/intlTelInput.min.js"></script>
	<script src="/app.js"></script>
</body>

</html>