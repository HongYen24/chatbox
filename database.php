<?php
$link = pg_connect("host=ec2-35-171-31-33.compute-1.amazonaws.com
                    dbname=dcir8dce76on7c
                    user=gdeglixrbthkwc
                    port=5432
                    password=61b0ba60ee377a7e7170d2e64ee5e8c8a32ef3e3cdc763b4887b67e888a66934");
if($link === false){
  die("ERROR: cannot connection");
}
else{
  echo "Connection into Heroku PostGres successfully";
}
$username = $_REQUEST['Username'];
$mess = $_REQUEST['Mess'];

echo $username;
echo $mess;

// Attempt insert query execution
$sql4 = 'INSERT INTO public."message" (
  "Username","Mess") 
  VALUES ('." '$username'::character varying,'$mess'::character varying)".' 
  returning "Username"';
  if(pg_query($link, $sql4)){
    echo "Records added successfully.";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
  }
pg_close($link);
?>

