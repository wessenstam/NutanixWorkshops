<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>
<?php
$hostname = "@@{MariaDB.address}@@";
$username = "webusr";
$password = "nutanix/4u";
$db = "test";
$dbconnect=mysqli_connect($hostname,$username,$password,$db);
if ($dbconnect->connect_error) {
die("Database connection failed: " . $dbconnect->connect_error);
}
?>
<table border="1" align="center">
<tr>
<td>First Name</td>
<td>Last name</td>
<td>Email address</td>
</tr>
<?php
$query = mysqli_query($dbconnect, "SELECT * FROM test.tbl_test") or die (mysqli_error($dbconnect));
while ($row = mysqli_fetch_array($query)) {
echo
"<tr>
<td>{$row['firstname']}</td>
<td>{$row['lastname']}</td>
<td>{$row['email']}</td>
</tr>\n";
}
?>
</table>
<?php
echo "Server IP: ".$_SERVER['SERVER_ADDR'];
echo "\nClient IP: ".$_SERVER['REMOTE_ADDR'];
echo "\nX-Forwarded-for: ".$_SERVER['HTTP_X_FORWARDED_FOR'];
?>
</body>
</html>
EOF
