<?php
include "header1.php";
require "config.php";
$p = $_GET['q'];

?>
<div class="container" style="margin:45px;">
    
        <p><h1>Status Screenshots:</h1><br>
        <?php
        $dirname = "assets/img/report_image/$p/";
$images = glob($dirname."*.*");

foreach($images as $image) {

    ?>
    <img src="<?php echo $image; ?>" class="img-rounded" alt="image" width="300" height="300">
    <?php
    
} 
?>

    </div>
</div>

<?php
include "footer.php";
?>
