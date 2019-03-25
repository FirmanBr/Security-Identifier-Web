<html>

<head>

	<style>
		div.container 
	{
		margin: 0 auto;
		max-width:760px;
	}
	div.header 
	{
		margin: 100px auto;
		line-height:30px;
		max-width:760px;
	}
	body 
	{
		background: #f7f7f7;
		color: #333;
		font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
	}
	</style>
</head>

<body class="hold-transition skin-black-light sidebar-mini">

	<?php

include '../koneksi.php';
include '../services/function/tanggal.php';	
$kd = $_GET['kd'];

$ch = curl_init('http://localhost/sid/services/view/Demographics.php');
$jsonData = array( 'REGISTRATION NUMBER' => $kd);
$jsonDataEncoded = json_encode($jsonData);

curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
 
$result = curl_exec($ch);
curl_close($ch);
$sess_arr = json_decode($result, true);

foreach ($sess_arr as $row) 
{
	if($row['REGISTRATION NUMBER']==$kd )
	{
		?>
	<form class="form-horizontal" method="POST" Action="update.php">

		<section>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Seafarers Code</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="SeafarersCode" id="SeafarersCode" value="<?php echo strtoupper($row['SEAFARER CODE']);?>"
					 required>
				</div>
				<label for="tiga" class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="Tanggal" id="Tanggal" value="<?php $timestamp=$row['DOB']['date'];$timestampa = strtotime($timestamp);echo strtoupper(tanggal_indo(date("
					 Y-m-d ", $timestampa)));?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Nama Belakang</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="NamaBelakang" id="NamaBelakang" value="<?php echo strtoupper($row['LAST NAME']);?>"
					 required>
					<input hidden type="text" name="User" id="User" value="<?php echo $row['APPLICANT NAME'];?>">
					<input hidden type="text" name="pengenal" id="pengenal" value="<?php echo $kd;?>">
				</div>
				<label for="tiga" class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="Tempat" id="Tempat" value="<?php echo strtoupper($row['PLACE OF BIRTH']);?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Nama Depan</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="NamaDepan" id="NamaDepan" value="<?php echo strtoupper($row['FIRST NAME']);?>"
					 required>
				</div>
				<label for="tiga" class="col-sm-2 control-label">Kewarnegaraan</label>

				<?php
					if($row['NATIONALITY'] =='1')
					{
						$negara = 'WNI';	
					}
					else
					{
						$negara = 'WNA';	
					}
					?>

				<div class="col-sm-4">
					<select disabled name="combo" class="form-control">
						<option value="<?php echo $row['NATIONALITY'];?>">
							<?php echo strtoupper($negara);?>
						</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Nama Tengah</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="NamaTengah" id="NamaTengah" value="<?php echo strtoupper($row['MIDDLE NAME']);?>"
					 required>
				</div>
				<label for="tiga" class="col-sm-2 control-label">Jenis Permohonan</label>
				<?php
					if($row['REASON FOR ISSUANCE'] =='1')
					{
						$reason = 'Permohonan Baru';	
					}
					else if ($row['REASON FOR ISSUANCE'] =='2')
					{
						$reason = 'Perpanjangan';	
					}
					else 
					{
						$reason = 'Penggantian';	
					}
					?>
				<div class="col-sm-4">
					<select disabled name="combo" class="form-control">
						<option value="<?php echo $row['REASON FOR ISSUANCE'];?>">
							<?php echo strtoupper($reason) ?>
						</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Jenis Kelamin</label>
				<?php
						if($row['GENDER ID'] =='1')
						{
							$gender = 'Pria';	
						}
						else if ($row['GENDER ID'] =='2')
						{
							$gender = 'Wanita';	
						}
						else 
					{
						$gender = 'X';	
					}
					?>
				<div class="col-sm-4">
					<select disabled name="combo" class="form-control">
						<option value="<?php echo $row['GENDER ID'] ;?>">
							<?php echo strtoupper($gender); ?>
						</option>
					</select>
				</div>
			</div>
		</section>

		<section>
			<h5><B>Data Alamat </h5></B>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Jalan</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="Jalan" id="Jalan" value="<?php echo strtoupper($row['P STREET']);?>"
					 required>
				</div>

				<label for="tiga" class="col-sm-2 control-label">Telepon Rumah</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="telprumah" id="telprumah" value="<?php echo strtoupper($row['HOME PHONE']);?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Kota</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="Kota" id="Kota" value="<?php echo strtoupper($row['P CITY']);?>"
					 required>
				</div>
				<label for="tiga" class="col-sm-2 control-label">Telepon Kantor</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="telpkantor" id="telpkantor" value="<?php echo strtoupper($row['WORK PHONE']);?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Negara</label>

				<?php
	if($row['P COUNTRY'] =='1')
	{
		$countryp= 'INDONESIA';											
	}
	else 
	{
		$countryp = 'OTHERS';	
	}
	?>
				<div class="col-sm-4">
					<select disabled name="combo" class="form-control">
						<option value="<?php echo $row['P COUNTRY'] ;?>">
							<?php echo strtoupper($countryp) ;?>
						</option>
					</select>
				</div>

				<label for="tiga" class="col-sm-2 control-label">Nomor Handphone</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="HP" id="HP" value="<?php echo strtoupper($row['CELL PHONE']) ;?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Kode Pos</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="KodePos" id="KodePos" value="<?php echo strtoupper($row['P POSTAL CODE']) ;?>"
					 required>
				</div>
			</div>

		</section>

		<section>

			<h5><B>Alamat Surat</h5></B>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Jalan</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="JalanSrt" id="JalanSrt" value="<?php echo strtoupper($row['M STREET']);?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Kota</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="KotaSrt" id="KotaSrt" value="<?php echo strtoupper($row['M CITY']) ;?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Negara</label>
				<?php
	if($row['M COUNTRY'] =='1')
	{
		$countrym= 'INDONESIA';	
	}
	else 
	{
		$countrym = 'OTHERS';	
	}
	?>

				<div class="col-sm-4">
					<select disabled name="combo" class="form-control">
						<option value="<?php echo 	$$row['M COUNTRY'] ; ?>">
							<?php echo 	strtoupper($countrym) ; ?>
						</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Kode Pos</label>
				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="KodePosSrt" id="KodePosSrt" value="<?php echo strtoupper($row['M POSTAL CODE'] );?>"
					 required>
				</div>
			</div>

			<h5><B>Lokasi Rekam Data</h5></B>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Lokasi</label>

				<?php
	if($row['ENROLLMENT LOCATION'] =='1')
	{
		$enroll= 'Jakarta';	
	}
	else 
	{
		$enroll = 'Tanjung Benoa';	
	}
	?>

				<div class="col-sm-4">
					<input disabled type="text" class="form-control" name="Lokasi" id="Lokasi" value="<?php echo strtoupper($enroll) ;?>"
					 required>
				</div>
			</div>

			<div class="form-group">
				<label for="tiga" class="col-sm-2 control-label">Tanggal Approval</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" name="Approv" id="Approv" value="" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-4" style="float: center;">
					<button id="send" name="send" class="btn btn-default">Send</button>
				</div>
			</div>

		</section>
	</form>

</body>

</html>
<?php
}
}
?>