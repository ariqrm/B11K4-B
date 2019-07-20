<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "arkademy";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
?>
<head>
    <title>number 7</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
        }

        .container {
            padding: 100px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ARKADEMY BOOTCAMP</a>
            </div>
        </div>
    </nav>
    <div class="container" ng-app="">
        <p><a type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal"
                data-target="#myModalAdd">ADD</a></p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Name</th>
                    <th>Work</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
			<tbody>
			<?php
				$query=mysqli_query($koneksi,"SELECT `N`.`id`,`N`.`name`,`H`.`name`AS `work`,`K`.`salary` AS `salary` FROM `Nama` AS `N` JOIN `Work` AS `H` ON `N`.`id_work`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_salary`=`K`.`id` ORDER BY `N`.`id`");
				if(mysqli_num_rows($query) == 0){
                    echo '<tr><td colspan="4">Data Tidak Ada.</td></tr>';
                }else{
                    while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['work']; ?></td>
						<td><?php echo $row['salary']; ?></td>
						<td>
							<a href="#del<?php echo $row['id']; ?>" class="btn btn-link" data-toggle="modal">
                            <span class="glyphicon glyphicon-trash" style="color: red"></span></a>  
							<a href="#edit<?php echo $row['id']; ?>" class="btn btn-link" data-toggle="modal" >
                            <span class="glyphicon glyphicon-edit" style="color: green"></span></a>
							<?php include('updel.php'); ?>
						</td>
					</tr>
					<?php
                }
            }
 
			?>
			</tbody>
        </table>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="myModalAdd" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ADD DATA</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <center>
                            <div class="form-group">
                                <p><input type="text" maxlength="25" class="form-control" name="nama" placeholder="Name..."></p>
                                <p><select class="form-control" name="work" >
                                        <option disabled selected>work...</option>
                                        <?php 
                                        $sql = mysqli_query($koneksi, "SELECT * FROM `Work` ORDER BY `id`");
                                        while($hsl = mysqli_fetch_object($sql)){?>
                                        <option value="<?=$hsl->id_salary;?>-<?=$hsl->name;?>-<?=$hsl->id;?>"><?=$hsl->name;?></option>
                                        <?php } ?>
                                    </select></p>
                                <p><select class="form-control" name="salary" >
                                        <option disabled selected>salary...</option>
                                        <?php
                                        $sql = mysqli_query($koneksi, "SELECT * FROM `Kategori` ORDER BY `id`");
                                        while($hsl = mysqli_fetch_object($sql)){?>
                                        <option value="<?=$hsl->id;?>-<?=$hsl->salary;?>"><?=$hsl->salary;?></option>
                                        <?php } ?>
                                    </select></p><br>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  name="add" class="btn btn-warning">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['add'])){
            $nama = $_POST['nama'];
            $work = explode("-",$_POST['work']);
            $salary = explode("-",$_POST['salary']);
            if((empty($work[0])) or (empty($salary[0])) or (empty($nama))){
                    echo '
                    <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Tidak boleh kosong!</div>
                    ';
            }elseif($work[0] != $salary[0]){
                    echo '
                    <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data work tidak sesuai dengan kategori!</div>
                    ';
            }else{
                $sql = mysqli_query($koneksi, "INSERT INTO `Nama` VALUES (NULL, '$nama', '$work[2]', '$salary[0]')")or die(mysqli_error());
                if($sql){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Benar.</div>';
                }
            }
        }
    ?>

</body>
