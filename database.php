<?php
$link = pg_connect("host=ec2-52-6-143-153.compute-1.amazonaws.com
                    dbname=d36fi1m1rhc6ru
                    user=djgwisrvfqhrpx
                    port=5432
                    password=d82f1045e62f7d737dbde5d1c755f3df3231d6a84c3bbf08ed34327abd13401b");
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

