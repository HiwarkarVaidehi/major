
if(isset($_POST['submit']))
  {
   $_SESSION['q1'] = $_POST['q1'];
   $_SESSION['q2'] = $_POST['q2'];
   $_SESSION['q3'] = $_POST['q3'];
   $_SESSION['q4'] = implode(',', $_POST['birthplace']);
   $_SESSION['q5'] = implode(',', $_POST['countrylived']);

   $q1 = mysql_real_escape_string($_SESSION['q1']);
   $q2 = mysql_real_escape_string($_SESSION['q2']);
   $q3 = mysql_real_escape_string($_SESSION['q3']);
   $q4 = mysql_real_escape_string($_SESSION['q4']);
   $q5 = mysql_real_escape_string($_SESSION['q5']);

   $required = array('q1', 'q2', 'q3', 'q4', 'q5');
   $error = false;
   foreach($required as $field) {
     if (empty($_POST[$field])) {
       $error = true;
     }
   }
echo "Hello"
   if ($error) {
      echo "Oooops!! It seems you did not answer all the questions. Please not that all fields are required.";
   } 
  else {

       $query="INSERT INTO test (q1, q2, q3, q4, q5) VALUES ('$q1', '$q2', '$q3', '" . $q4 . "', '" . $q5 . "')";
        mysql_query($query) or die (mysql_error() );
        header('Location: Thankyou.php'); 
        exit;
     }
}
    ?>