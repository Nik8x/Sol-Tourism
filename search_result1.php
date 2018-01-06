<?php session_start();

include('db-settings.php');

if(!isset($_POST['search'])) {
    header("Location:index.php");
}
$search_sql="select * from products where product_name like '%".$_POST['search']."%'";
$search_query = mysql_query($search_sql);
if(mysql_num_rows($search_query)!=0) {
    $search_rs = mysql_fetch_array($search_query);
}
?>

<?php if(mysql_num_rows($search_query)!=0) {
    do {?>
<p><?php echo $search_rs['name']; ?></p>

<?php } while( $search_rs=mysql_fetch_assoc($search_query));
} else {
    echo"NO results found";
}
?>
