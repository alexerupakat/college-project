<?php 
session_start();
if(!isset($_SESSION['admin_uname']))
{
    header('Location:index.php');
}
include 'includes/connection.php';
?>
<?php include('includes/head.php'); ?>

<?php include('includes/css.php'); ?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

<?php 
    include('includes/topbar.php');
    include('includes/sidebar.php'); 
?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Restore Database</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Restore Database</h4>
                                        <p class="text-muted m-b-30 ">Use this form to Restore the Database</p>
        
                                        <form class="" action="" method="POST" enctype="multipart/form-data">
                                           
                                            <div class="form-group">
                                                <label>Database Name</label>
                                                <input type="text" class="form-control" required placeholder="Enter Database Name" name="dbname" />
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label>Upload File</label>
                                                <div>
                                                    <input type="file" class="form-control" required placeholder="Enter File Name" name="database" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="restore-btn">
                                                        Restore
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col --> <!-- end col -->
                        </div> <!-- end row -->        

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
               <?php    
    // EXAMPLE: IMPORT_TABLES("localhost","user","pass","db_name", "my_baseeee.sql"); //TABLES WILL BE OVERWRITTEN
                // P.S. IMPORTANT NOTE for people who try to change/replace some strings  in SQL FILE before importing, MUST READ:  https://goo.gl/2fZDQL
// https://github.com/tazotodua/useful-php-scripts 
if(isset($_REQUEST['restore-btn']))
{
//echo "<script>alert('Inside');</script>";
$host='localhost:3308';
$username='root';
$password='';
$dbname=$_REQUEST['dbname'];
$connection=mysqli_connect($host,$username,$password);
if(mysqli_select_db($connection,$dbname))
{
  if($_FILES["database"]["name"] != '')
 {
    $array = explode(".", $_FILES["database"]["name"]);
    $extension = end($array);
    if($extension == 'sql')
    {
        $file_data = $_FILES["database"]["tmp_name"];
         IMPORT_TABLES($host,$username,$password,$dbname, $file_data);
     }
    else
     {
      echo "<script>alert('Invalid File!!');</script>";
     }
 }
 else
 {
    echo "<script>alert('Please add a File!!');</script>";
 }
    //echo "<script>alert('Inside IF');</script>";
   
}
else
{
    echo "<script>alert('No Such Databse Is Found!!');</script>";
}
}
function IMPORT_TABLES($host,$user,$pass,$dbname, $sql_file_OR_content){
    set_time_limit(3000);
    $SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );  
    $allLines = explode("\n",$SQL_CONTENT); 
    $mysqli = new mysqli($host, $user, $pass, $dbname); if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();} 
        $zzzzzz = $mysqli->query('SET foreign_key_checks = 0');         preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$mysqli->query('DROP TABLE IF EXISTS '.$table);}         $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    $mysqli->query("SET NAMES 'utf8'");   
    $templine = ''; // Temporary variable, used to store current query
    foreach ($allLines as $line)    {                                           // Loop through each line
        if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line;    // (if it is not a comment..) Add this line to the current segment
            if (substr(trim($line), -1, 1) == ';') {        // If it has a semicolon at the end, it's the end of the query
                if(!$mysqli->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
            }
        }
    }   return 'Importing finished. Now, Delete the import file.';
}   //see also export.php 
?>


<?php include('includes/footer.php'); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            
<?php include('includes/script.php'); ?>

        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Parsley js -->
        <script src="assets/plugins/parsleyjs/parsley.min.js"></script>

<?php include('includes/script-bottom.php'); ?>

        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

    </body>

</html>