<?php 
	include '../../../admin/include/koneksi.php';
    $id = $_REQUEST['id'];
    $nama_berkas=$_REQUEST['berkas'];

	$uploadThirdTo = null;
	if(isset($_FILES['permohonan'])){
	  $permohonan_image_name = $_FILES['permohonan']['name'];
	  $permohonan_image_size = $_FILES['permohonan']['size'];
	  $permohonan_image_tmp = $_FILES['permohonan']['tmp_name'];
	  $uploadThirdTo = "images/".$permohonan_image_name;
	  $moveThird = move_uploaded_file($permohonan_image_tmp,$uploadThirdTo );
	}

	$uploadMainTo = null;
	if(isset($_FILES['uraian'])){
	  $main_image_name = $_FILES['uraian']['name'];
	  $main_image_size = $_FILES['uraian']['size'];
	  $main_image_tmp = $_FILES['uraian']['tmp_name'];
	  $uploadMainTo = "images/".$main_image_name;
	  $moveMain = move_uploaded_file($main_image_tmp,$uploadMainTo);
	}

	$uploadSecondTo = null;
	if(isset($_FILES['invoice'])){
	  $second_image_name = $_FILES['invoice']['name'];
	  $second_image_size = $_FILES['invoice']['size'];
	  $second_image_tmp = $_FILES['invoice']['tmp_name'];
	  $uploadSecondTo = "images/".$second_image_name;
	  $moveSecond = move_uploaded_file($second_image_tmp,$uploadSecondTo );
	}

	

	$uploadPdfTo = null;
	if(isset($_FILES['katalog'])){
	  $pdf_name = $_FILES['katalog']['name'];
	  $pdf_size = $_FILES['katalog']['size'];
	  $pdf_tmp = $_FILES['katalog']['tmp_name'];
	  $uploadPdfTo = "images/".$pdf_name;
	  $movepdf = move_uploaded_file($pdf_tmp,$uploadPdfTo);
	}
	$date=date('Y-m-d');

    if ($nama_berkas!="") {
   		$sql = "UPDATE newdata SET id_user = '$id_user',
                                   nama_berkas = '$nama_berkas',
                                   permohonan = '$permohonan_image_name',
                                   uraian = '$main_image_name',
                                   invoice = '$second_image_name', 
                                   katalog = '$pdf_name',
                                   status_data = 'new',
                                   tgl = '$date',
                                   reject = ''
                                   WHERE id_newdata = '$id' ");
   		$query = mysqli_query($db,$sql);
   		echo "
				<script>
					alert('Update Success');
					window.location = '?hal=content.php'
				</script>
   		";
    } else {
   		echo "
				<script>
					alert('Update Failed');
					window.location = '?hal=content.php'
				</script>
   		";
		}
	mysqli_close($db);

?>