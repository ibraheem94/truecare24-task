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

 $sql1 = "SELECT * from `info` ";
 $query1 = mysqli_query($con,$sql1);
 $res1=mysqli_fetch_assoc($query1);
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
                                <h5 class="card-title">Add providers</h5>
                                <form id="addProvider" action="crude/insert.php" method="POST">
                                <div class="form-group">
                                        <label for="exampleFormControlSelect1">Provider type</label>
                                        <select class="form-control" id="providertype" name="providertype">
                                            <option value="1">IC</option>
                                            <option value="0">Home Care Agency</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">  Name</label>
                                        <input type="text" class="form-control" id="Name" name="Name"
                                            placeholder="provider name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">  Phone</label>
                                        <input type="text" class="form-control" id="Phone" name="Phone"
                                            placeholder="provider Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="provider@example.com">
                                    </div>
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add twilio information</h5>
                                <form id="addinfo" action="crude/updateinfo.php" method="POST">
                                
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">  AccountSid</label>
                                        <input type="text" class="form-control" id="AccountSid" name="AccountSid" value="<?php echo $res1['AccountSid'] ?>"
                                            >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">  AuthToken</label>
                                        <input type="password" class="form-control" id="AuthToken" name="AuthToken" value="<?php echo $res1['AuthToken'] ?>"
                                            >
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleFormControlInput1">Twilio Number</label>
                                        <input type="text" class="form-control" id="twilionumber" name="twilionumber" value="<?php echo $res1['twilionumber'] ?>"
                                             >
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleFormControlInput1">  Admin Number</label>
                                        <input type="text" class="form-control" id="adminnumber" name="adminnumber" value="<?php echo $res1['adminnumber'] ?>"
                                             >
                                    </div>
                                   
                                    </div>
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </form>


                            </div>
                        </div>
                    </div>

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
    
    </script>
</body>

</html>