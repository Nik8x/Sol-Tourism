<?php
include('header.php');
?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .mySlides {display:none;}
</style>
<body>

<h2 class="w3-center">Let's Explore The Expanse</h2>

<div class="w3-content w3-section" style="max-width:1000px">
    <img class="mySlides" src="img/sol1.jpg" style="width:100%">
    <img class="mySlides" src="img/sol2.jpg" style="width:100%">
    <img class="mySlides" src="img/sol3.jpg" style="width:100%">
    <img class="mySlides" src="img/sol4.jpg" style="width:100%">
    <img class="mySlides" src="img/sol5.jpg" style="width:100%">
   <!-- <div class="carousel-caption">
        <h3>Let's Explore The Expanse</h3> -->
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>

</body>
</html>



<?php include('footer.php');?>