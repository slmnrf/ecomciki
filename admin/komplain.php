<?php
include '../koneksi.php';
include '../config.php';
include '../assets/lib/function.php';
$page = "komplain";


$sql = $con->query("SELECT a.*, b.*, c.* FROM faktur as a, pelanggan as b, komplain as c WHERE c.kd_faktur=a.kd_faktur AND b.email_plg=a.userid  ORDER BY c.tgl DESC LIMIT 5");
$row = $sqlkom->fetch(PDO::FETCH_LAZY);
$trow = $sqlkom->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link rel="icon" href="../images/favicon.ico"> -->

        <title></title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/admin.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="../assets/css/datatables/dataTables.bootstrap.min.css">
	    <link rel="stylesheet" href="../assets/css/sweetalert.css">
	    <link rel="stylesheet" href="../assets/css/datepicker/jquery-ui.css">
	    <style>
		    .ui-datepicker{ z-index:1151 !important; }
		</style>
    </head>
    <body class="skin-blue">
    	<!-- memanggil file header -->
		<?php include 'header.php'; ?>

		<div class="wrapper row-offcanvas row-offcanvas-left">

			<!-- memanggil file sidemenu -->
			<?php include 'sidemenu.php'; ?>
			
			<aside class="right-side">
                <!-- Main content -->
				<section class="content">
				    <!-- Main row -->
				    <div class="row">
				        <div class="col-lg-12">
							<div class="panel">
				                <header class="panel-heading">
				                    Data Order
				                </header>
				                <div class="panel-body table-responsive">
				                	<!-- Tombol tambah -->
				                	<a data-toggle="modal" href='#modal-id' class="btn btn-success btn-sm"><span class="fa fa-print"></span> Cetak Laporan Penjualan</a>
				                	&nbsp;
				                	
				                	<br><br>

				                	<!-- Tabel -->
				                    <table id="tabel" class="table table-bordered table-striped" cellspacing="0" width="100%" style="font-size: 12px">
				                        <thead>
				                            <tr>
				                                <th>Kd. Komplain</th>
				                                <th>Kd. Faktur</th>
				                                <th>Tanggal</th>
				                                <th>Alasan</th>
				                                <th>Status</th>
				                                <th>Aksi</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                        <?php do{
				                        	$kd_komplain=$row['kd_komplain'];
				                        ?>
				                            <tr style="<?php echo $tebal; ?>">
				                                <td width="10%"><?php echo $row['kd_komplain']; ?></td>
				                                <td width="10%"><?php echo $row['kd_faktur']; ?></td>
				                                <td width="15%"><?php echo $row['tgl']; ?></td>
				                                <td width="15%"><?php echo $row['alasan']; ?></td>
				                                <td width="15%"><?php echo $row['stts']; ?></td>
                                                <?php if ($rowkom['stts'] == "pengajuan") { ?>
                                                    <td width="15%"><button type="submit" name="btnproses" value="y" class="btn btn-danger">Proses</button></td>
                                                <?php }elseif ($rowkom['stts'] == "proses") { ?>
                                                    <td width="10%"><a type="button" class="btn btn-info">Detail</a><a type="button" class="btn btn-success">Selesai</a></td>
                                                <?php }?>
				                            </tr>
				                        <?php } while ($row = $sql->fetch(PDO::FETCH_LAZY)); ?>
				                        </tbody>
				                    </table>
				                </div>
				            </div>
						</div>
				  	</div> <!-- /.row -->
				</section><!-- /.content -->

            </aside><!-- /.right-side -->
		</div><!-- ./wrapper -->

        <!-- JavaScript
        ================================================== -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/app.js"></script>

        <!-- tabel -->
        <script src="../assets/js/datatables/jquery.dataTables.js"></script>
	    <script src="../assets/js/datatables/dataTables.bootstrap.min.js"></script>

    </body>
</html>