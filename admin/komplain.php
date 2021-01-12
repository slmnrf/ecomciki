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


	$sql = $con->query("SELECT a.*, b.*, c.* FROM faktur as a, pelanggan as b, komplain as c WHERE c.kd_faktur=a.kd_faktur AND b.email_plg=a.userid  ORDER BY c.tgl");
	$row = $sql->fetch(PDO::FETCH_LAZY);
	$trow = $sql->rowCount();

	function getDataChat($kdfaktur){
		$data = $_GET['kdfaktur'];
		echo $data;
	}
?>
<style type="text/css">#tdfaktur{display:none;}</style>
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
				                                <th>Kd. Komplain</th>
				                                <th>Kd. Faktur</th>
				                                <th>Tanggal</th>
				                                <th>Alasan</th>
				                                <th>Status</th>
				                                <th>Tindakan</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                        <?php do{
				                        	// $kd_komplain=$row['kd_komplain'];
				                        ?>
				                            <tr style="<?php echo $tebal; ?>">
												<td><input type="text" id="kdfaktur" value="<?php echo $row['kd_faktur'];?>"></input></td>
				                                <td width="10%"><?php echo $row['kd_komplain']; ?></td>
				                                <td width="10%">
													<a id="kdfaktur" href="detail_order?kd_faktur=<?php echo $row['kd_faktur']; ?>&&pelanggan=<?php echo $row['userid'] ?>">
													<?php echo $row['kd_faktur']; ?>
													</a>	
												</td>
				                                <td width="15%"><?php echo $row['tgl']; ?></td>
				                                <td width="15%"><?php echo $row['alasan']; ?></td>
				                                <td width="15%"><?php echo $row['stts']; ?></td>
                                                <?php if ($row['stts'] == "pengajuan") { ?>
                                                    <td width="15%"><button type="submit" name="btnproses" value="y" class="btn btn-danger">Proses</button></td>
                                                <?php }elseif ($row['stts'] == "proses") { ?>
                                                    <td width="10%"><button onclick="cekdata(<?php echo $row['kd_faktur'];?>)" class="btn btn-info" data-toggle="modal" data-target="#detail_pesan"?>Detail</button></td>
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

		<div class="modal fade" id="detail_pesan">
        	<?php
				$sql_max_inbox  = $con->query("SELECT *, MAX(kd_inbox) AS max_inbox FROM inbox");
				$row_max_inbox  = $sql_max_inbox->fetch(PDO::FETCH_LAZY);
				$trow_max_inbox = $sql_max_inbox->rowCount();
				$max            = $row_max_inbox['max_inbox'];
				$id_max         = $max+1;
        	?>
        	<div class="modal-dialog modal-lg">
        		<div class="modal-content">
					<div class="row">
							<div id="panelPesan" class="col-lg-12">
								<div class="panel">
									<header class="panel-heading">
									<h4 class="modal-title">Detail</h4>
									</header>
									<div class="panel-body table-responsive">
										<!-- Tombol tambah -->
										<!-- Tabel -->
										<table id="tabel" class="table table-hover table-striped" cellspacing="0" width="100%" style="font-size: 13px">
											<thead>
												<tr class="hidden">
													<th>Hapus</th>
													<th>Pelanggan</th>
													<th>Isi</th>
													<th>Tanggal</th>
												</tr>
											</thead>
											<tbody>
											<?php do{ 
												$kd_inbox=$row['kd_faktur'];
												echo $kd_inbox;
												$sql_dpesan = $con->query("SELECT * FROM inbox_detail WHERE kd_inbox='$kd_inbox' ORDER BY tgl DESC ");
												$row_dpesan = $sql_dpesan->fetch(PDO::FETCH_LAZY);
												$trow_dpesan = $sql_dpesan->rowCount();
												$emailadmin = $row_dpesan['userid'];

												$sql_cariadmin = $con->query("SELECT * FROM admin WHERE email='$emailadmin' ");
												$row_cariadmin = $sql_cariadmin->fetch(PDO::FETCH_LAZY);
												$trow_cariadmin = $sql_cariadmin->rowCount();
												$nama = $row_cariadmin['nama_admin'];

												if ($row_dpesan['status'] == "N" AND $row_dpesan['userid'] != $userid) {
													$tebal = "style='font-weight: bold; vertical-align: middle;'";
												} else {
													$tebal = "style='vertical-align: middle;'";
												}
												
											?>	
												<tr data-id="<?php echo $kd_inbox; ?>">
													<td width="1%" <?php echo $tebal; ?>>
														<form method="POST">
															<?php if(!empty($trow)): ?>
																<button type="submit" class='submit btn btn-default btn-sm'>
																	<i class="fa fa-trash" aria-hidden="true"></i>
																</button> 
															<?php endif; ?>
															<input type="hidden" name="fhapus" value="y" />
															<input type="hidden" name="kd_inbox" value="<?php echo $row['kd_inbox']; ?>" />
														</form>
													</td>
													<td width="auto" <?php echo $tebal; ?>><?php echo $nama; ?></td>
													<td width="auto" <?php echo $tebal; ?>>
														<div class="view_pesan">
															<a href="javascript:void(0)" style="color: black" class="sidebar-hide-btn" >
																<h4 style="font-weight: bolder; color: #20B0A8;"><?php echo $row['judul']; ?></h4>
																<p><?php echo substr($row_dpesan['pesan'],0,50).'..'; ?></p>
															</a>
														</div>
													</td>
													<td width="auto" align="right" <?php echo $tebal; ?>>
														<small><i style="padding-right: 20px"><?php echo timeAgo(strtotime($row_dpesan['tgl'])); ?></i></small>
													</td>
												</tr>
											<?php } while ($row = $sql->fetch(PDO::FETCH_LAZY)); ?>
												</tbody>
										</table>
									</div>
								</div>
							</div>
							<div id="panelSlide" class="col-lg-4 hidden pull-right">
								<section class="panel">
									<header class="panel-heading">
										Detail Pesan
										<button id="tutupPanelSlide" class="btn btn-default btn-sm pull-right"><i class="fa fa-times"></i></button>
									</header>
									<div class="panel-body" id="noti-box">
										<div id="hasil"></div>
									
								</section>
							</div>
						</div>

					</div>

            </div>
            <!-- /.row -->
        		</div>
        	</div>
        </div>

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

		<script type="text/javascript">
			function cekdata(kd_faktur){
				var kdfaktur = kd_faktur;
				$.ajax({
					type : "GET",
					url : "getdatachat.php",
					data : "kdfaktur="+ kdfaktur,
					success : function(cek){
						alert(cek);
					}
				})
			}
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

		<script>
	        $(document).ready(function(){
	          $(".view_pesan").click(function(){
	            var id = $(this).parents('tr').data('id');
	                $.ajax({
	                    type:"post",
	                    url:"inbox_slide.php",
	                    data:"q="+ id,
	                    success: function(data){
	                      $("#hasil").html(data);
	                    }
	                });
	           });
	        });
	    </script>
		<script>
			var a = false;
			var delay=300;
			$(".sidebar-hide-btn").click(function() {

			    $('#panelPesan').removeClass('col-lg-12');
			    $('#panelPesan').addClass('col-lg-8');
			    $('#panelPesan').addClass('animasi');
			    a = true;
			    if (a == true) {
				    setTimeout(function() {
				    $('#panelSlide').removeClass('hidden');
				    $('#panelSlide').addClass('visible');
				    $('#panelSlide').addClass('animasi');
					}, delay);
			    };
			});

			$("#tutupPanelSlide").click(function() {
				$('#panelPesan').removeClass('col-lg-8');
			    $('#panelPesan').addClass('col-lg-12');
			    $('#panelPesan').addClass('animasi');
		
			    $('#panelSlide').removeClass('visible');
			    $('#panelSlide').addClass('hidden');
			    $('#panelSlide').addClass('animasi');
			});
		</script>
    </body>
</html>