<?php
include '../koneksi.php';
include '../config.php';
include '../assets/lib/function.php';
include '../hapus_otomatis.php';
$page = "index";

include 'total.php';

if ((isset($_POST['btnproses']) && ($_POST['btnproses'] == "y"))) {
	$stts = "proses";
	$komplainfaktur = $_POST['kfaktur'];
	$komplainkomplain = $_POST['kkomplain'];
	$alasan = $_POST['alasan'];
	$tanggal = date("Y-m-d h:i:s");
	$emailadmin = $_POST['email'];
	$emailplg = $_POST['emailplg'];
	$kd_inbox = $_POST['id_max'];

	$judul = "KOMPLAIN ".$komplainfaktur;
	$pesan = "Pesanan dengan no faktur ".$komplainfaktur." mengajukan komplain atas alasan ".$alasan."
				untuk mengetahui lebih detail tentang kendala yang dialami, Anda bisa melakukan chat di forum ini. Terimakasih.";

	// update status pada tabel komplain
	$con->exec("UPDATE komplain SET stts='$stts' WHERE kd_faktur='$komplainfaktur'");

	// insert pada inbox untuk mengajukan komplain ke user dari Admin
	$con->exec("INSERT INTO inbox (kd_inbox, pengirim, judul, tujuan) VALUES (
				'".$kd_inbox."',
				'".$emailadmin."',
				'".$judul."',
				'".$emailplg."'
				)");

	$con->exec("INSERT INTO inbox_detail (kd_inbox, userid, pesan) VALUES (
				'".$kd_inbox."',
				'".$emailadmin."',
				'".$pesan."'
				)");
}

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
        <link rel="stylesheet" href="../assets/css/ionicons.min.css">
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
				    <div class="row" style="margin-bottom:5px;">
				        <div class="col-md-3">
				            <div class="sm-st clearfix">
				                <span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>
				                <div class="sm-st-info">
				                    <span><?php echo $trow_tplg ?></span>
				                    Total Pelanggan
				                </div>
				            </div>
				        </div>
				        <div class="col-md-3">
				            <div class="sm-st clearfix">
				                <span class="sm-st-icon st-blue"><i class="fa fa-archive"></i></span>
				                <div class="sm-st-info">
				                    <span><?php echo $trow_tbarang ?></span>
				                    Total Produk
				                </div>
				            </div>
				        </div>
				        <div class="col-md-3">
				            <div class="sm-st clearfix">
				                <span class="sm-st-icon st-green"><i class="fa fa-shopping-basket"></i></span>
				                <div class="sm-st-info">
				                    <span><?php echo $trow_torder ?></span>
				                    Total Transaksi
				                </div>
				            </div>
				        </div>
				        <div class="col-md-3">
				            <div class="sm-st clearfix">
				                <span class="sm-st-icon st-red"><i class="fa fa-warning"></i></span>
				                <div class="sm-st-info">
				                    <span><?php echo $trow_tkomplain ?></span>
				                    Total Komplain
				                </div>
				            </div>
				        </div>
				        <div class="col-md-3">
				            <div class="sm-st clearfix">
				                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
				                <div class="sm-st-info">
				                    <span><?php echo $trow_tinbox ?></span>
				                    Total Inbox
				                </div>
				            </div>
				        </div>
				    </div>

				    <!-- Main row -->
				    <?php
						// transaksi
				    	$sql = $con->query("SELECT a.*, b.* FROM faktur as a, pelanggan as b WHERE b.email_plg=a.userid AND a.total_biaya_barang!='' ORDER BY a.tgl DESC LIMIT 5");
						$row = $sql->fetch(PDO::FETCH_LAZY);
						$trow = $sql->rowCount();

						// komplain
						// $sqlkom = $con->query("SELECT * FROM komplain ORDER BY tgl DESC LIMIT 5");
						$sqlkom = $con->query("SELECT a.*, b.*, c.* FROM faktur as a, pelanggan as b, komplain as c WHERE c.kd_faktur=a.kd_faktur AND b.email_plg=a.userid  ORDER BY c.tgl DESC LIMIT 5");
						$rowkom = $sqlkom->fetch(PDO::FETCH_LAZY);
						$trowkom = $sqlkom->rowCount();

						// mencari produk yang habis
				    	$sql_cari_produk_habis = $con->query("SELECT * FROM produk WHERE stok=0");
				    	$row_cari_produk_habis = $sql_cari_produk_habis->fetch(PDO::FETCH_LAZY);
				    	$trow_cari_produk_habis = $sql_cari_produk_habis->rowCount();

				    	if (!empty($trow_cari_produk_habis)) {
				    		$col_transaksi = "col-lg-9";
				    	} else {
				    		$col_transaksi = "col-lg-12";
						}
						
						$sql_max_inbox  = $con->query("SELECT *, MAX(kd_inbox) AS max_inbox FROM inbox");
						$row_max_inbox  = $sql_max_inbox->fetch(PDO::FETCH_LAZY);
						$trow_max_inbox = $sql_max_inbox->rowCount();
						$max            = $row_max_inbox['max_inbox'];
						$id_max         = $max+1;
				    	
				    ?>
				    <div class="row">
				        <div class="<?php echo $col_transaksi; ?>">
							<div class="panel">
				                <header class="panel-heading">
				                    5 Transaksi Terakhir
				                </header>
				                <div class="panel-body table-responsive">
								<!-- Tabel -->
			                    <table class="table table-bordered" style="font-size: 12px">
			                        <thead>
			                            <tr>
			                                <th>KD. Faktur</th>
			                                <th>Pelanggan</th>
			                                <th>Total Biaya</th>
			                                <th>Kurir</th>
			                                <th>Tgl. Order</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        <?php do{

			                        	$kd_faktur=$row['kd_faktur'];
			                        ?>
			                            <tr>
			                                <td width="10%">
			                                	<a href="detail_order?kd_faktur=<?php echo $kd_faktur; ?>&&pelanggan=<?php echo $row['userid'] ?>">
			                                	<?php echo $row['kd_faktur']; ?>
			                                	</a>
			                                </td>
			                                <td width="15%"><?php echo $row['nama_plg']; ?></td>
			                                <td width="15%"><?php echo uang($row['total_biaya_barang']); ?></td>
			                                <td width="10%"><?php echo tampilKurir($row['kurir']); ?></td>
			                                <td width="15%"><?php echo longDateTs($row['tgl']); ?></td>
			                            </tr>
			                        <?php } while ($row = $sql->fetch(PDO::FETCH_LAZY)); ?>
			                        </tbody>
			                    </table>
				                </div>
				            </div>
						</div>
						
						<!-- Produk habis (akan tampil jika ada produk yang habis)
						========================================= -->
					    <?php if (!empty($trow_cari_produk_habis)): ?>
				        <div class="col-lg-3">
							<div class="panel">
				                <header class="panel-heading">
				                    Produk Habis
				                </header>
				                <div class="panel-body table-responsive">
								<?php do{ ?>
									<a href="produk_edit?kd_produk=<?php echo $row_cari_produk_habis['kd_produk']; ?>">
		                            <?php echo $row_cari_produk_habis['nama_produk']; ?>
		                            </a>
		                            <br>
		                        <?php } while ($row_cari_produk_habis = $sql_cari_produk_habis->fetch(PDO::FETCH_LAZY)); ?>
				                </div>
				            </div>
						</div>
				      <?php endif ?>

					  <!-- Menu Komplain  -->
					  <div class="<?php echo $col_transaksi; ?>">
							<div class="panel">
				                <header class="panel-heading">
				                    5 Daftar Komplain Terakhir
				                </header>
				                <div class="panel-body table-responsive">
								<!-- Tabel -->
			                    <table class="table table-bordered" style="font-size: 12px">
			                        <thead>
			                            <tr>
			                                <th>KD. Komplain</th>
			                                <th>KD. Faktur</th>
			                                <th>Tanggal</th>
			                                <th>Alasan</th>
			                                <th>Status</th>
			                                <th>Aksi</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        <?php do{
			                        	$kd_komplain=$rowkom['kd_komplain'];
			                        ?>
										<form method="POST">
			                            <tr>
			                                <td width="10%"><?php echo $rowkom['kd_komplain']; ?></td>
			                                <td width="10%">
			                                	<a href="detail_order?kd_faktur=<?php echo $kd_faktur; ?>&&pelanggan=<?php echo $row['userid'] ?>">
			                                	<?php echo $rowkom['kd_faktur']; ?>
			                                	</a>
			                                </td>			                                
			                                <td width="15%"><?php echo longDateTs($rowkom['tgl']); ?></td>
			                                <td width="15%"><?php echo $rowkom['alasan']; ?></td>
			                                <td width="15%"><?php echo $rowkom['stts']; ?></td>
											<?php if ($rowkom['stts'] == "pengajuan") { ?>
												<td width="15%"><button type="submit" name="btnproses" value="y" class="btn btn-danger">Proses</button></td>
											<?php }elseif ($rowkom['stts'] == "proses") { ?>
												<td width="15%"><button type="submit" name="btnselesai" value="y" class="btn btn-success">Selesai</button></td>
											<?php }?>
											<td style="display:none;"><input type="hidden" name="kfaktur" value="<?php echo $rowkom['kd_faktur'];?>"></input>
											<input type="hidden" name="kkomplain" value="<?php echo $rowkom['kd_komplain'];?>"></input>
											<input type="hidden" name="alasan" value="<?php echo $rowkom['alasan'];?>"></input>
											<input type="hidden" name="email" value="<?php echo $email_akun;?>"></input>
											<input type="hidden" name="emailplg" value="<?php echo $rowkom['userid'];?>"></input>
											<input type="hidden" name="id_max" value="<?php echo $id_max;?>"></input></td>
			                            </tr>
										</form>
			                        <?php } while ($rowkom = $sqlkom->fetch(PDO::FETCH_LAZY)); ?>
			                        </tbody>
			                    </table>
				                </div>
				            </div>
						</div>
					  <!-- Tutup Menu Komplain -->
				  </div>
				   
				</section><!-- /.content -->

            </aside><!-- /.right-side -->
		</div><!-- ./wrapper -->
        <!-- JavaScript
        ================================================== -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/app.js"></script>
    </body>
</html>