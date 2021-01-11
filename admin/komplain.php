<?php
include '../koneksi.php';
include '../config.php';
include '../assets/lib/function.php';
$page = "komplain";

if ((isset($_POST["fhapus"])) && ($_POST["fhapus"] == "y")) {

    $kd_kategori  = $_POST['kd_kategori'];

    $con->exec("DELETE FROM kategori WHERE kd_kategori = '$kd_kategori'");

    // pesan berhasil
    tampilPesan("Berhasil Dihapus!","Data yang dipilih berhasil dihapus!","success","kategori");
}


	$sql = $con->query("SELECT * FROM komplain");
	$row = $sql->fetch(PDO::FETCH_LAZY);
	$trow = $sql->rowCount();
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
				                    Komplain
				                </header>
				                <div class="panel-body table-responsive">
				                	<!-- Tombol tambah -->
				                	<!-- <a href="kategori_tambah" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Tambah</a> -->
				                	<br><br>

				                	<!-- Tabel -->
				                    <table id="tabel" class="table table-bordered table-striped" cellspacing="0" width="100%">
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
				                        	// $kd_komplain=$row['kd_komplain'];
				                        ?>
				                            <tr style="<?php echo $tebal; ?>">
				                                <td width="10%"><?php echo $row['kd_komplain']; ?></td>
				                                <td width="10%"><?php echo $row['kd_faktur']; ?></td>
				                                <td width="15%"><?php echo $row['tgl']; ?></td>
				                                <td width="15%"><?php echo $row['alasan']; ?></td>
				                                <td width="15%"><?php echo $row['stts']; ?></td>
                                                <?php if ($row['stts'] == "pengajuan") { ?>
                                                    <td width="15%"><button type="submit" name="btnproses" value="y" class="btn btn-danger">Proses</button></td>
                                                <?php }elseif ($row['stts'] == "proses") { ?>
                                                    <td width="10%"><a type="button" class="btn btn-info">Detail</a>&nbsp;<a type="button" class="btn btn-success">Selesai</a></td>
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
	    <script>
	        $(document).ready(function() {
	            $('#tabel').dataTable({
	                "columnDefs": [{
	                    "targets": [1],
	                    "searchable": false,
	                    "orderable": false,
	                    }]
	            });
	        });
	    </script>

        <!-- konfirmasi -->
        <script src="../assets/js/sweetalert.js"></script>
		<script>
			$('.submit').on('click',function(e){
			    e.preventDefault();
			    var form = $(this).parents('form');
			    swal({
			        title: "Apakah anda yakin?",
			        text: "Data yang terhapus tidak dapat dikembalikan!",
			        type: "warning",
			        showCancelButton: true,
			        confirmButtonColor: "#DD6B55",
			        confirmButtonText: "Ya, hapus saja!",
			        cancelButtonText: "Batal",
			        closeOnConfirm: false
			    }, function(isConfirm){
			        if (isConfirm) form.submit();
			    });
			})
		</script>
    </body>
</html>