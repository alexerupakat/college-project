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
                                    <h4 class="page-title">Backup Database</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Backup Database</h4>
                                        <p class="text-muted m-b-30 ">Use this form to Backup the Database</p>
        
                                        <form class="" action="" method="POST">
                                           
                                            <div class="form-group">
                                                <label>Database Name</label>
                                                <input type="text" class="form-control" required placeholder="Enter Database Name" name="dbname" />
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label>File Name</label>
                                                <div>
                                                    <input type="text" class="form-control" required placeholder="Enter File Name" name="filename" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="backup-btn">
                                                        Submit
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
    if(isset($_POST['backup-btn'])){
    $dir            =   __dir__."/backups"; // directory files
    //$db_name      =   "blog";
    //$output_name  =   time()."-".$db_name; // output name sql backup
    $db_host        =   "localhost:3308";
    $db_user_name   =   "root";
    $db_user_pass   =   "";
    if(!empty($_REQUEST['dbname']))
    {
        $DbName             = $_REQUEST['dbname'];
    if(!empty($_REQUEST['filename']))
    {
        $output_name=time()."-".$_REQUEST['filename'];
    }
    else
    {
        echo "<script>alert('Please enter the File Name!!');</script>";
    }
   // $backup_name        = "mybackup.sql";
    //$tables             = array("eyeweb_users");
    //echo "<script>alert('".$tables."');</script>";
        $res=backup_database($dir, $output_name,$db_host,$db_user_name,$db_user_pass,$DbName); // execute'
        echo "<script>alert('".$res."');</script>";
    }
    else
    {
        echo "<script>alert('Please enter the Database Name!!');</script>";
    }
    }
    

/**
 * MYSQL EXPORT TO GZIP 
 * exporting database to sql gzip compression data.
 * if directory writable will be make directory inside of directory if not exist, else wil be die
 *
 * @param string directory , as the directory to put file
 * @param $outname as file name just the name !, if file exist will be overide as numeric next ++ as name_1.sql.gz , name_2.sql.gz next ++
 *
 * @param string $dbhost database host
 * @param string $dbuser database user
 * @param string $dbpass database password
 * @param string $dbname database name
 *
 */
function backup_database( $directory, $outname, $dbhost, $dbuser, $dbpass ,$dbname ) {
  
  // check mysqli extension installed
  if( ! function_exists('mysqli_connect') ) {
    die(' This scripts need mysql extension to be running properly ! please resolve!!');
  }
    $mysqli = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if( $mysqli->connect_error ) {
        print_r( $mysqli->connect_error );
        return false;
    }
    $dir = $directory;
    $result = ' Could not create backup directory on :'.$dir.' Please Please make sure you have set Directory on 755 or 777 for a while.';  
    $res = true;
    if( ! is_dir( $dir ) ) {
      if( ! @mkdir( $dir, 755 )) {
        $res = false;
      }
    }
  $n = 1;
  if( $res ) {
    $name     = $outname;
    # counts
    if( file_exists($dir.'/'.$name.'.sql.gz' ) ) {
      for($i=1;@count( file($dir.'/'.$name.'_'.$i.'.sql.gz') );$i++){
        $name = $name;
        if( ! file_exists( $dir.'/'.$name.'_'.$i.'.sql.gz') ) {
          $name = $name.'_'.$i;
          break;
        }
      }
    }
    $fullname = $dir.'/'.$name.'.sql.gz'; # full structures
    if( ! $mysqli->error ) {
      $sql = "SHOW TABLES";
      $show = $mysqli->query($sql);
      while ( $r = $show->fetch_array() ) {
        $tables[] = $r[0];
      }
      if( ! empty( $tables ) ) {
  //cycle through
  $return = '';
  foreach( $tables as $table )
  {
    $result     = $mysqli->query('SELECT * FROM '.$table);
    $num_fields = $result->field_count;
    $row2       = $mysqli->query('SHOW CREATE TABLE '.$table );
    $row2       = $row2->fetch_row();
    $return    .= 
"\n
-- ---------------------------------------------------------
--
-- Table structure for table : `{$table}`
--
-- ---------------------------------------------------------
".$row2[1].";\n";
    for ($i = 0; $i < $num_fields; $i++) 
    {
      $n = 1 ;
      while( $row = $result->fetch_row() )
      { 
        
        if( $n++ == 1 ) { # set the first statements
          $return .= 
"
--
-- Dumping data for table `{$table}`
--
";  
        /**
         * Get structural of fields each tables
         */
        $array_field = array(); #reset ! important to resetting when loop 
         while( $field = $result->fetch_field() ) # get field
        {
          $array_field[] = '`'.$field->name.'`';
          
        }
        $array_f[$table] = $array_field;
        // $array_f = $array_f;
        # endwhile
        $array_field = implode(', ', $array_f[$table]); #implode arrays
          $return .= "INSERT INTO `{$table}` ({$array_field}) VALUES\n(";
        } else {
          $return .= '(';
        }
        for($j=0; $j<$num_fields; $j++) 
        {
          
          $row[$j] = str_replace('\'','\'\'', preg_replace("/\n/","\\n", $row[$j] ) );
          if ( isset( $row[$j] ) ) { $return .= is_numeric( $row[$j] ) ? $row[$j] : '\''.$row[$j].'\'' ; } else { $return.= '\'\''; }
          if ($j<($num_fields-1)) { $return.= ', '; }
        }
          $return.= "),\n";
      }
      # check matching
      @preg_match("/\),\n/", $return, $match, false, -3); # check match
      if( isset( $match[0] ) )
      {
        $return = substr_replace( $return, ";\n", -2);
      }
    }
    
      $return .= "\n";
  }
$return = 
"-- ---------------------------------------------------------
--
--
-- Host Connection Info: ".$mysqli->host_info."
-- Generation Time: ".date('F d, Y \a\t H:i A ( e )')."
-- Server version: ".$mysqli->get_server_info()."
-- PHP Version: ".PHP_VERSION."
--
-- ---------------------------------------------------------\n\n
SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET time_zone = \"+00:00\";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
".$return."
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
# end values result
    @ini_set('zlib.output_compression','Off');
    $gzipoutput = gzencode( $return, 9);
 if(  @ file_put_contents( $fullname, $gzipoutput  ) ) { # 9 as compression levels
  
    $result = 'Backup Successfull!! File Saved in Backup Folder With Name: \n'.$name.'.sql.gz'; # show the name
  
  } else { # if could not put file , automaticly you will get the file as downloadable
    $result = false;   
    // various headers, those with # are mandatory
    header('Content-Type: application/x-download');
    header("Content-Description: File Transfer");
    header('Content-Encoding: gzip'); #
    header('Content-Length: '.strlen( $gzipoutput ) ); #
    header('Content-Disposition: attachment; filename="'.$name.'.sql.gz'.'"');
    header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
    header('Connection: Keep-Alive');
    header("Content-Transfer-Encoding: binary");
    header('Expires: 0');
    header('Pragma: no-cache');
    
    echo $gzipoutput;
  }
       } else {
         $result = 'Error when executing database query to export.'.$mysqli->error;
       
       }
     }
 } else {
      $result = 'Wrong mysqli input';
 }
 
 if( $mysqli && ! $mysqli->error ) {
      @$mysqli->close();
 }
  return $result;
}
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