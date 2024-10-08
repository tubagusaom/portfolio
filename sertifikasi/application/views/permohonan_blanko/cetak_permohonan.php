<page backtop="15mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <div>
            <img src="<?php echo site_url().'assets/img/kop_atas.jpg';?>" width="750" height="149" />
        </div>
        <br />
    </page_header>
    <page_footer>
    </page_footer>
    <table style="width: 97%; margin-top: 100px;" border="0">
    	<tr>
    		<td style="width: 15%;">Nomor </td>
    		<td style="widht: 2%;"> : </td>
    		<td style="width: 50%;"> <?= $pb->nomor_permohonan ?> </td>
    		<td style="width: 33%; text-align: right;"> Jakarta, <?= tgl_indo($pb->tgl_permohonan); ?> </td>
    	</tr>
    	<tr>
    		<td style="width: 15%;">Lampiran </td>
    		<td style="widht: 2%;"> : </td>
    		<td style="width: 50%;"> 1 (Satu) berkas </td>
    	</tr>    
    	<tr>
    		<td style="width: 15%;">Perihal </td>
    		<td style="widht: 2%;"> : </td>
    		<td style="width: 50%;"> Permohonan Blanko Sertifikat Kompetensi</td>
    	</tr>        		
    </table>
    <p style="margin-left: 3px; margin-bottom: 10px; line-height: 2;">
        Yth. Ketua Badan Nasional Sertifikasi Profesi (BNSP) <br>
        di Jakarta
    </p>
    <p style="margin-left: 3px;">
		Bersama ini kami melaporkan bahwa <?=$aplikasi->nama_unit?> telah melaksanakan uji kompetensi<br>
		dengan rincian (terlampir) sebagai berikut :    
		<p>
			<table style="width: 97%; margin-left: 25px;" border="0"> 
				<tr>
					<td style="width: 3%;">1.</td>
					<td style="width: 40%;">
						Kompeten anggaran BNSP
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
						<?= $asesi_k ?>
					</td>
					<td style="width: 10%;">
						Orang
					</td>
				</tr>
				<tr>
					<td style="width: 3%;">2.</td>
					<td style="width: 40%;">
						Kompeten Anggaran Kementerian
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
						-
					</td>
					<td style="width: 10%;">
						Orang
					</td>					
				</tr>	
				<tr>
					<td style="width: 3%;">3.</td>
					<td style="width: 40%;">
						Kompeten Anggaran Mandiri
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
                       -                 
					</td>
					<td style="width: 10%;">
						Orang
					</td>					
				</tr>	
				<tr>
					<td style="width: 3%;">4.</td>
					<td style="width: 40%;">
						Kompeten RCC
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
						-
					</td>
					<td style="width: 10%;">
						Orang
					</td>					
				</tr>
				<tr>
					<td style="width: 3%;">4.</td>
					<td style="width: 40%;">
						Belum Kompeten 1+2+3+4
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
                                            <?= isset($asesi_bk) ? $asesi_bk : '-' ?>
					</td>
					<td style="width: 10%;">
						Orang
					</td>					
				</tr>                                
				<tr>
					<td style="width: 3%;"></td>
					<td style="width: 40%;">
						Total
					</td>
					<td style="width: 2%;">
						:
					</td>
					<td style="width: 10%; text-align: right;">
						<?= $asesi_k + $asesi_bk ?>
					</td>
					<td style="width: 10%;">
						Orang
					</td>					
				</tr>							
			</table>
		</p>
    </p>
    <p style="margin-left: 3px;">
    Sehubungan dengan hal tersebut diatas, kami membutuhkan blanko sertifikat sesuai jumlah peserta yang kompeten sebanyak <?= $asesi_k ?> <b><?= ' ('.terbilang($asesi_k).') lembar' ?> </b>.
    </p>
    <p style="margin-left: 3px;">
Blanko sertifikat kompetensi yang diberikan oleh BNSP akan kami pertanggungjawabkan <br>
sesuai dengan keperuntukannya.    
    </p>
    <p style="width: 3px;">
    	Demikian permohonan kami, atas perhatiannya diucapkan terima kasih.
    </p>
    <p>
        <div style="font-weight: none; font-size: 14px; margin-right: 99px; text-align: right; margin-top: 25px;">Direktur </div>
        <div style="font-weight: none; font-size: 14px; margin-bottom: 60px; text-align: right;margin-right:40px;"><?=$aplikasi->nama_unit?></div>
        <br>
        <div style="font-weight: none; font-size: 14px; margin-right: 60px; text-align: right;">(<?= $aplikasi->ketua ?>)</div>
    </p>
</page>
