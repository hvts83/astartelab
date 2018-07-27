<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table width="60%">
        <tr>
            <td width="100px"><img src="<?php echo e(asset('img/astartelogobn.jpg')); ?>" height="100px" width="100px"/></td>
            <td><p align="center">23 Calle Poniente #1249, Colonia Layco<br>San Salvador, Tel. 2226-9299</p></td>
        </tr>
    </table>

<p>Dr(a) <?php echo e($citologia->doctor); ?></p>
<p><?php echo e($citologia->paciente); ?></p> 

<script type="text/javascript"> 
      this.print(); 
</script

</body>
</html>







