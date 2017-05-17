<?php
include "header1.php";
require "config.php";
$p = $_GET['q'];
$db = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "SELECT * FROM `report` WHERE `order_report`=$p ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_row($result);
?>
<div class="container" style="margin:45px;">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>

                <th>Services</th>
                <th>Pre Repair</th>
                <th>Post Repair</th>
                <th>Remark</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-yw4l">Screen/Display</td>
                <td class="tg-yw4l"><?php echo $row[0]; ?></td>
                <td class="tg-yw4l"><?php echo $row[1]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">LCD Display</td>
                <td class="tg-yw4l"><?php echo $row[2]; ?></td>
                <td class="tg-yw4l"><?php echo $row[3]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Ear Speaker</td>
                <td class="tg-yw4l"><?php echo $row[4]; ?></td>
                <td class="tg-yw4l"><?php echo $row[5]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Microphone</td>
                <td class="tg-yw4l"><?php echo $row[6]; ?></td>
                <td class="tg-yw4l"><?php echo $row[7]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Proximity Sensor</td>
                <td class="tg-yw4l"><?php echo $row[8]; ?></td>
                <td class="tg-yw4l"><?php echo $row[9]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Front Camera</td>
                <td class="tg-yw4l"><?php echo $row[10]; ?></td>
                <td class="tg-yw4l"><?php echo $row[11]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Flash Check</td>
                <td class="tg-yw4l"><?php echo $row[12]; ?></td>
                <td class="tg-yw4l"><?php echo $row[13]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Volume Button</td>
                <td class="tg-yw4l"><?php echo $row[14]; ?></td>
                <td class="tg-yw4l"><?php echo $row[15]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Power Button</td>
                <td class="tg-yw4l"><?php echo $row[16]; ?></td>
                <td class="tg-yw4l"><?php echo $row[17]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Sim Card Slot</td>
                <td class="tg-yw4l"><?php echo $row[18]; ?></td>
                <td class="tg-yw4l"><?php echo $row[19]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">All screws</td>
                <td class="tg-yw4l"><?php echo $row[20]; ?></td>
                <td class="tg-yw4l"><?php echo $row[21]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Body Frame</td>
                <td class="tg-yw4l"><?php echo $row[22]; ?></td>
                <td class="tg-yw4l"><?php echo $row[23]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Touch Sensitivity</td>
                <td class="tg-yw4l"><?php echo $row[24]; ?></td>
                <td class="tg-yw4l"><?php echo $row[25]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Wifi</td>
                <td class="tg-yw4l"><?php echo $row[26]; ?></td>
                <td class="tg-yw4l"><?php echo $row[27]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Loud Speaker</td>
                <td class="tg-yw4l"><?php echo $row[28]; ?></td>
                <td class="tg-yw4l"><?php echo $row[29]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Headset Jack</td>
                <td class="tg-yw4l"><?php echo $row[30]; ?></td>
                <td class="tg-yw4l"><?php echo $row[31]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Gyroscope</td>
                <td class="tg-yw4l"><?php echo $row[32]; ?></td>
                <td class="tg-yw4l"><?php echo $row[33]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Back Camera</td>
                <td class="tg-yw4l"><?php echo $row[34]; ?></td>
                <td class="tg-yw4l"><?php echo $row[35]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Charging</td>
                <td class="tg-yw4l"><?php echo $row[36]; ?></td>
                <td class="tg-yw4l"><?php echo $row[37]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Home Button</td>
                <td class="tg-yw4l"><?php echo $row[38]; ?></td>
                <td class="tg-yw4l"><?php echo $row[39]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Soft Keys</td>
                <td class="tg-yw4l"><?php echo $row[40]; ?></td>
                <td class="tg-yw4l"><?php echo $row[41]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Vibration</td>
                <td class="tg-yw4l"><?php echo $row[42]; ?></td>
                <td class="tg-yw4l"><?php echo $row[43]; ?></td>
                <td class="tg-yw4l"></td>
            </tr>

            </tbody>
        </table>
        <p>Status Screenshots:<br>
        <?php
        $dirname = "assets/img/report_image/$p/";
$images = glob($dirname."*.*");

foreach($images as $image) {

    ?>
    <img src="<?php echo $image; ?>" class="img-rounded" alt="image" width="150" height="150">
    <?php
    
} 
?>

    </div>
</div>

<?php
include "footer.php";
?>
