<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($koneksi,"select * from Nama where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Name: <strong><?php echo $drow['name']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
 
            </div>
        </div>
    </div>
<!-- /.modal -->
 
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($koneksi,"SELECT `N`.`id`,`N`.`name`,`H`.`name`AS `work`,`K`.`salary` AS `salary` FROM `Nama` AS `N` JOIN `Work` AS `H` ON `N`.`id_work`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_salary`=`K`.`id` WHERE `N`.`id`='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
                <center>
                    <div class="form-group">
                        <p><input type="text" class="form-control" name="name" placeholder="<?php echo $erow['name']; ?>"></p>
                        <p><select class="form-control" name="work" >
                                <option disabled selected><?php echo $erow['work']; ?></option>
                                <option value="1">Frontend Dev</option>
                                <option value="2">Backend Dev</option>
                            </select></p>
                        <p><select class="form-control" name="salary" >
                                <option disabled selected><?php echo $erow['salary']; ?></option>
                                <option value="1">10.000.000</option>
                                <option value="2">12.000.000</option>
                            </select></p>
                    </div>
                </center>
                <div class="modal-footer">
                        <button type="submit"  name="edit" class="btn btn-warning">Edit</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->