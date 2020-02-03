<?php
$hostname="localhost";//"futurecalls.com";
$username="root";
$password="";
$dbname="grt_crm";


//create connection
$db=mysqli_connect($hostname,$username,$password,$dbname);
// check connection
if(!$db) {
   die ("connection failed:" .mysqli_connect_error());
  }
 
 /*
 How to reset ID after  deleting one row 
 ----------------------------------------

 SET @num := 0;

UPDATE your_table SET id = @num := (@num+1);

ALTER TABLE tableName AUTO_INCREMENT = 1;



between query
BETWEEN "'. date('Y-m-d', strtotime($this->input->post('start_date'))). '" and "'. date('Y-m-d', strtotime($this->input->post('end_date')))
 */
  ?>