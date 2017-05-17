<?php
include "header1.php";
require "config.php";
$p = $_GET['q'];


//end of code


$db = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "SELECT * FROM report WHERE order=$p";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_row($result);
?>
<div class="container" style="margin:45px;">
    <div class="table-responsive">
        <form action="editCom.php?q=<?php echo $p; ?>" method="post" enctype="multipart/form-data">
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
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[0]; ?>" readonly>
                <select name="c[]">
                    <option  value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[1]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                        <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">LCD Display</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[2]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[3]; ?>" readonly>
                <select name="c[]">
                <option  value="<?php echo $row[3]; ?>"><?php echo $row[3]; ?></option>
                <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Ear Speaker</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[4]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[4]; ?>"><?php echo $row[4]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[5]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[5]; ?>"><?php echo $row[5]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Microphone</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[6]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[6]; ?>"><?php echo $row[6]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[7]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[7]; ?>"><?php echo $row[7]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Proximity Sensor</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[8]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[7]; ?>"><?php echo $row[7]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[9]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[9]; ?>"><?php echo $row[9]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Front Camera</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[10]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[10]; ?>"><?php echo $row[10]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[11]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[11]; ?>"><?php echo $row[11]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Flash Check</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[12]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[12]; ?>"><?php echo $row[12]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[13]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[13]; ?>"><?php echo $row[13]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Volume Button</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[14]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[14]; ?>"><?php echo $row[14]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[15]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[15]; ?>"><?php echo $row[15]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Power Button</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[16]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[16]; ?>"><?php echo $row[16]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[17]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[17]; ?>"><?php echo $row[17]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Sim Card Slot</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[18]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[18]; ?>"><?php echo $row[18]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[19]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[19]; ?>"><?php echo $row[19]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">All screws</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[20]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[20]; ?>"><?php echo $row[20]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[21]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[21]; ?>"><?php echo $row[21]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Body Frame</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[22]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[22]; ?>"><?php echo $row[22]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[23]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[23]; ?>"><?php echo $row[23]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Touch Sensitivity</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[24]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[24]; ?>"><?php echo $row[24]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[25]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[25]; ?>"><?php echo $row[25]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Wifi</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[26]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[26]; ?>"><?php echo $row[26]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[27]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[27]; ?>"><?php echo $row[27]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Loud Speaker</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[28]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[28]; ?>"><?php echo $row[28]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[29]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[29]; ?>"><?php echo $row[29]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Headset Jack</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[30]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[30]; ?>"><?php echo $row[30]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[31]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[31]; ?>"><?php echo $row[31]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Gyroscope</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[32]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[32]; ?>"><?php echo $row[32]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[33]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[33]; ?>"><?php echo $row[33]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Back Camera</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[34]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[34]; ?>"><?php echo $row[34]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[35]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[35]; ?>"><?php echo $row[35]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Charging</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[36]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[36]; ?>"><?php echo $row[36]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[37]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[37]; ?>"><?php echo $row[37]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Home Button</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[38]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[38]; ?>"><?php echo $row[38]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[39]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[39]; ?>"><?php echo $row[39]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Soft Keys</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[40]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[40]; ?>"><?php echo $row[40]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[41]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[41]; ?>"><?php echo $row[41]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Vibration</td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[42]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[42]; ?>"><?php echo $row[42]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"><input type="text" value="<?php echo $row[43]; ?>" readonly>
                    <select name="c[]">
                    <option  value="<?php echo $row[43]; ?>"><?php echo $row[43]; ?></option>
                    <option  value="NULL">NULL</option>
                    <option value="Unchecked">Unchecked</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
                </td>
                <td class="tg-yw4l"></td>
            </tr>

            </tbody>
        </table>
        <input class="form-control input-lg" type="file" name="fileToUpload" >
        <button name="submit" type="submit" class="btn-primary">SAVE</button>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
