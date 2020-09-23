<!DOCTYPE html>
<html>
<head>
	<title><?php foreach ($siswa as $row):?> <?php echo ($f['r'] == $row['student_nis']) ? $row['student_full_name'] : '' ?><?php endforeach; ?></title>
	<style type="text/css">
		@page {
			margin-top: 0.8cm;
			margin-bottom: 0.4cm;
			margin-left: 0.3cm;
			margin-right: 0.5cm;
			margin-bottom: 0.4cm;
			}
			.name-school{
				font-size: 14pt;
				font-weight: bold;
				padding-bottom: -13px;
			}
			.alamat{
				font-size: 10pt;
				margin-bottom: -14px;
			}
			.detail{
				font-size: 10pt;
				font-weight: bold;
				padding-top: -15px;
				padding-bottom: -12px;
			}
			
			}
			.colom{
				font-size: 6pt;
				font-weight: bold;
				padding-top: -15px;
				padding-bottom: -12px;
			}
			body {
				font-family: Calibri (Body);
			}
			table {
				font-family: Calibri (Body);
				font-weight: ;
				border-width: none;
				/*border-color: #ffffff;*/
				
				border-collapse: collapse;
  				font-size: 9pt;
  				width: 100%;
			}

			th {
				padding-bottom: 10px;
				padding-top: 8px;
				border-color: #ffffff;
				background-color:#ffffff;
				/*border-bottom: solid;*/
				text-align: left;
			}

			td {
				text-align: left;
				border-color: #ffffff;
				background-color: #ffffff;
			}

			hr {
				border: none;
				height: 1px;
				/* Set the hr color */
				color: #; /* old IE */
				background-color: #; /* Modern Browsers */
			}
			.container {
				position: relative;
			}

			.topright {
				position: absolute;
				top: 0;
				right: 0;
				font-size: 25px;
				border-width: thin;
				padding: 5px;
			}
			.topright2 {
				position: absolute;
				top: 30px;
				right: 50px;
				font-size: 30px;
				border: 1px solid;
				padding: 5px;
				color: black;
			}
	</style>
</head>
<body>
	<div>
		
	</div>
	<div class="container">
		<div class="topright">Bukti Pembayaran</div>
	</div>
	<p class="name-school"><?php echo $setting_school['setting_value']; ?></p>
	<p class="alamat"><?php echo $setting_address['setting_value']; ?><br>Telp : <?php echo $setting_phone['setting_value']; ?></p>
	<br>
	<hr>

	<table width="100%" border="1" style="white-space: nowrap;">
        <tr>
          <th style="height: 30px;">NO</th>
          <th>Pembayaran</th>
          <th>Total Tagihan</th>
          <th>Jumlah Pembayaran</th>
        </tr>
			<?php
				$i =1;
        		foreach ($log as $row) :
				if($row['bulan_bulan_id']!=NULL){
				$namePay = $row['posmonth_name'].' - T.A '.$row['period_start_month'].'/'.$row['period_end_month'];
				$mont = ($row['month_id']<=6) ? $row['period_start_month'] : $row['period_end_month'];
			?>
          	<tr>
          	  	<td><?php echo $i ?></td>
				<td ><?php echo $namePay.' - ('.$row['month_name'].' '. $mont.')' ?></td>
				<td ><?php echo 'Rp. ' . number_format($row['bulan_bill'], 0, ',', '.') ?></td>
				<td >Rp. </td>
				<td ><?php echo number_format($row['bulan_bill'], 0, ',', '.') ?></td>
          	</tr>
			  <?php
            }else{
            $namePayFree = $row['posbebas_name'].' - T.A '.$row['period_start_bebas'].'/'.$row['period_end_bebas'];
        	?>
        	<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $namePayFree .' - ('.$row['bebas_pay_desc'].')' ?></td>
				<td><?php echo 'Rp. ' . number_format($row['bebas_bill'], 0, ',', '.') ?></td>
				<td>Rp. </td>
				<td><?php echo number_format($row['bebas_pay_bill'], 0, ',', '.') ?></td>
			</tr>
				<?php }
        	  	$i++;
        		endforeach
        	?>
				<tr>
			<td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;"> </td>
			<td style=" font-weight:; border-bottom: 1px solid;">Total Pembayaran</td></u>
			<td style="font-weight:;border-bottom: 1px solid;">Rp. </td>
			<td style=" font-weight:;border-bottom: 1px solid; text-align: right;"><?php echo number_format($sum_m+$sum_b, 0, ',', '.') ?> &nbsp;</td>
		</tr>
      </table>
	  <h4><?php echo $setting_district['setting_value'] ?>, <?php echo pretty_date(date('Y-m-d'),'d F Y',false) ?></h4>
	  <br>
	  <br>
	  <br>
	  <h4>(<?php echo ucfirst($this->session->userdata('ufullname')); ?>)></h4>
	<br>
</body>
</html>