<?php
require('database.php');
$sql="select * from altitude where operation_id ='2022-04-24 20:00:30' ";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>altitude</td><td>date_time</td><td>operation_id</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['height'].'</td><td>'.$row['timer'].'</td><td>'.$row['operation_id'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>