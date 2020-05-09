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
$id = $_REQUEST['product_ID'];
$name = $_REQUEST['p_Name'];
$cate = $_REQUEST['p_Cate'];
$price = $_REQUEST['p_Price'];
$desc = $_REQUEST['p_Des'];

echo $id;
echo $name;
echo $cate;
echo $price;
echo $desc;

// Attempt insert query execution
$sql4 = 'INSERT INTO public."Product" (
  "product_ID","p_Name","p_Cate","p_Price","p_Des") 
  VALUES ('." '$id'::character varying,'$name'::character varying,'$cate'::character varying,'$price'::integer,'$desc'::character varying)".' 
  returning "product_ID"';
  if(pg_query($link, $sql4)){
    echo "Records added successfully.";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
  }
pg_close($link);
?>

