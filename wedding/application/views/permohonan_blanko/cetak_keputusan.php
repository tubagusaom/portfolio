<style>
    table.keputusan td{
        text-align: justify;
    }
    table.timbangan td{
        text-align: justify;
    }
</style>
<?php foreach ($array_jadwal as $key => $value) { ?>
<page backtop="38mm" backbottom="10mm" backleft="15mm" backright="15mm">
    <page_header>
        <div>
            <img src="<?php echo site_url().'assets/img/kop_atas.jpg';?>" width="750" height="149" />
        </div>
        <br />
    </page_header>
    <page_footer>
    </page_footer>
    <div align="center" style="font-weight: bold; font-size: 14px; margin-top: 0px;">KEPUTUSAN KETUA <?=$aplikasi->nama_unit?> </div>
    <div align="center" style="font-weight: bold; font-size: 14px;">NOMOR:
    <?php
      $nomor_keputusan = json_decode($pb->nomor_keputusan, true);
      $bln = substr($info_jadwal[$value]->tanggal, 5, 2);
      echo substr($nomor_keputusan[$value], 0,-5)."/".substr($info_jadwal[$value]->tanggal, 0, 4);
    ?>
    </div>

    <br>
    <div align="center" style="font-weight: bold; font-size: 14px;">TENTANG</div>
    <div align="center" style="font-weight: bold; font-size: 14px;">PELAKSANAAN UJI KOMPETENSI UNTUK <br> <?= strtoupper($skema_uji[$value]->skema) ?> </div>
    <div align="center" style="font-weight: bold; font-size: 14px;">DI <?= strtoupper($info_jadwal[$value]->tuk) ?></div>
    <div align="center" style="font-weight: bold; font-size: 14px;">PADA PELAKSANAAN PSKK TAHUN 2019 </div>
    <hr style="width: 100%;">
    <div align="center" style="font-weight: bold; font-size: 14px; margin-top: 15px;">KETUA LSP it-konsultan</div>
    <table style="width: 97%; margin-top: 25px;" border="0" class="timbangan">
    	<tr>
    		<td style="width: 17%;" valign="top">Menimbang  </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 5%;" valign="top">a. </td>
    		<td style="width: 75%;">
				bahwa dalam rangka meningkatkan pengakuan tenaga kerja indonesia pada dunia
				usaha/industri bidang/sektor <?= $skema_uji[$value]->bidang ?>, maka perlu
				diadakan uji kompetensi untuk Skema <?= ucwords(strtolower($skema_uji[$value]->skema)) ?> di <?= $info_jadwal[$value]->tuk ?>
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;"></td>
    		<td style="width: 3%;"></td>
    		<td style="width: 5%;" valign="top">b. </td>
    		<td style="width: 75%;">
			bahwa untuk itu perlu ditetapkan dengan Surat Keputusan Ketua LSP it-konsultan
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Mengingat  </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 5%;" valign="top">1. </td>
    		<td style="width: 75%;">
    		Undang-undang Nomor 13 Tahun 2003 tentang Ketenagakerjaan (Lembar Negara Tahun 2003 Nomor 36, Tambahan Lembaran Negara Nomor 4279)
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;"></td>
    		<td style="width: 3%;"></td>
    		<td style="width: 5%;" valign="top">2. </td>
    		<td style="width: 75%;">
				Peraturan Pemerintah Nomor: 23 Tahun 2004 tentang Badan Nasional Sertifikasi Profesi (Lembaran Negara Tahun 2004 nomor 78, tambahan Lembaran Negara Nomor 4428)
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;"></td>
    		<td style="width: 3%;"></td>
    		<td style="width: 5%;" valign="top">3. </td>
    		<td style="width: 75%;">
				Surat Keputusan BNSP No. KEP.0135/BNSP/III/2019 tentang Lisensi kepada LSP it-konsultan
    		</td>
    	</tr>

    	<tr>
    		<td style="width: 17%;" valign="top">Memperhatikan  </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 5%;" valign="top">1. </td>
    		<td style="width: 75%;">
				Surat Ketua <?= $info_jadwal[$value]->tuk ?>, tentang Kesanggupan <?= $info_jadwal[$value]->tuk ?>
                                sebagai tempat pelaksanaan uji kompetensi pada Pelaksanaan Sertifikasi
				Kompetensi Kerja Tahun 2019.
    		</td>
    	</tr>
    </table>
    <div style="font-weight: bold; margin-top: 15px; text-align: center; font-size: 16px;">Memutuskan</div>
    <table style="width: 97%;" border="0" cellspacing="10" class="keputusan">
    	<tr>
    		<td style="width: 17%;" valign="top">Menetapkan </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Tim Pelaksana yang terdiri dari Penanggungjawab, Sekretariat Penyelenggara,
				Pengadminstrasi, Asesor Kompetensi dan Peserta Uji, pada kegiatan Pelaksanaan Uji
				Kompetensi untuk Skema <?= ucwords(strtolower($skema_uji[$value]->skema)) ?>  di <?= $info_jadwal[$value]->tuk ?>
				pada Pelaksanaan Sertifikasi Tahun 2019
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Kesatu </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Menunjuk personal Tim Pelaksana yang namanya tercantum dalam lampiran keputusan ini sebagai Penanggungjawab, Sekretariat Penyelenggara,
				Pengadministrasi, Asesor Kompetensi dan Peserta Uji Kompetensi
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Kedua </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Tim sebagaimana dimaksud dalam Diktum Kesatu keputusan ini, bertugas sebagai berikut:
				<table style="width: 100%;" border="0">
					<tr>
						<td style="width: 5%;" valign="top">
						a.
						</td>
						<td style="width: 85%;">
							Penanggungjawab <br>
							Memantau terhadap Pelaksanaan Uji Kompetensi mulai dari persiapan,
							pelaksanaan dan sampai pelaporan.
						</td>
					</tr>
					<tr>
						<td style="width: 5%;" valign="top">
						b.
						</td>
						<td style="width: 85%;">
							Sekretariat Penyelenggara <br>
							Membantu pelaksanaan kegiatan Pelaksanaan Uji Kompetensi secara teknis
						</td>
					</tr>
					<tr>
						<td style="width: 5%;" valign="top">
						c.
						</td>
						<td style="width: 85%;">
							Pengadminstrasi <br>
							Membuat adminstrasi absensi, pembayaran dan penyusunan laporan kegiatan Pelaksanaan Uji Kompetensi sesuai dengan format yang telah ditentukan.
						</td>
					</tr>
					<tr>
						<td style="width: 5%;" valign="top">
						d.
						</td>
						<td style="width: 85%;">
							Asesor Kompetensi <br>
							Melaksanakan penilaian terhadap peserta pada kegiatan Pelaksanaan Uji Kompetensi sesuai dengan skema/jabatan yang telah ditetapkan
						</td>
					</tr>
					<tr>
						<td style="width: 5%;" valign="top">
						e.
						</td>
						<td style="width: 85%;">
							Peserta Uji Kompetensi <br>
							Mengikuti uji kompetensi yang dilaksanakan oleh Asesor Kompetensi
						</td>
					</tr>
				</table>
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Ketiga </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Tim sebagaimana di maksud dalam Diktum kedua akan diberikan Surat Perintah
				Tugas (SPT) dan dalam melaksanakan tugas harus dengan penuh tanggungjawab
				dan melaporkan hasilnya kepada Ketua LSP it-konsultan
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Keempat </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Kegiatan Pelaksanaan Uji Kompetensi untuk Skema <?= ucwords(strtolower($skema_uji[$value]->skema)) ?> di
				 <?= $info_jadwal[$value]->tuk ?> pada Pelaksanaan Sertifikasi Tahun
                                 2019 akan dilaksanakan pada tanggal <?php echo intval(date('d', strtotime($info_jadwal[$value]->tanggal))).' '.getBulan(substr($info_jadwal[$value]->tanggal, 5, 2)).' '.substr($info_jadwal[$value]->tanggal, 0, 4); ?>
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Kelima </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
    			Biaya yang timbul akibat ditetapkannya Keputusan ini dibebankan pada Anggaran Pelaksanaan Sertifikasi Kompetensi Kerja dari Badan Nasional Sertifikasi Profesi
    		</td>
    	</tr>
    	<tr>
    		<td style="width: 17%;" valign="top">Keenam </td>
    		<td style="width: 3%;" valign="top"> : </td>
    		<td style="width: 80%;">
				Keputusan ini berlaku sejak tanggal ditetapkan dengan ketentuan apabila dikemudian hari terdapat kekeliruan/kekurangan dalam penetapan ini akan diadakan perbaikan sebagaimana mestinya.
    		</td>
    	</tr>
    </table>
    <div style="text-decoration: underline; margin-top: 15px;">* Coret yang tidak perlu </div>
    <table style="width: 70%; padding-right: 25px; margin-top: 15px;" border="0" align="right">
    	<tr>
    		<td style="width:30%;">Dikeluarkan di </td>
    		<td style="width: 5%;"> : </td>
    		<td style="width:30%;">Jakarta </td>
    	</tr>
    	<tr>
    		<td style="width:30%;">Pada tanggal </td>
    		<td style="width: 5%;"> : </td>
                <td style="width:30%;"><?= tgl_indo( date('Y-m-d', strtotime($info_jadwal[$value]->tanggal)));  ?> </td>
    	</tr>
    </table>
    <div style="margin-top: 15px;">
    	<span style="text-decoration: underline;"> Tembusan :  </span> <span style="margin-left: 280px;">KETUA LSP it-konsultan </span>
    </div>
    <div>
    	<ol style="margin-left: -17px;">
    		<li>Ketua BNSP</li>
    		<li>Ketua <?= $info_jadwal[$value]->tuk ?></li>
    	</ol>
    </div>
    <div align="right" style="margin-right: 107px;">
    (<?= $aplikasi->ketua ?>)
    </div>
</page>

<page backtop="50mm" backbottom="10mm" backleft="15mm" backright="15mm">
    <page_header>
        <div>
            <img src="<?php echo site_url().'assets/img/kop_atas.jpg';?>" width="750" height="149" />
        </div>
        <br />
    </page_header>
    <page_footer>
    </page_footer>
    <table style="width: 97%; font-weight: bold; font-size: 14px; margin-top: -50px;" border="0">
    	<tr>
    		<td style="width: 25%;">Lampiran 1. </td>
    		<td style="width: 5%;"> : </td>
    		<td style="width: 80%;"> Keputusan Ketua LSP it-konsultan</td>
    	</tr>
    	<tr>
    		<td style="width: 25%;">Nomor </td>
    		<td style="width: 5%;"> : </td>
    		<td style="width: 80%;">
          <?php
              $nomor_keputusan = json_decode($pb->nomor_keputusan, true);
              $bln = substr($info_jadwal[$value]->tanggal, 5, 2);
              echo substr($nomor_keputusan[$value], 0,-5)."/".substr($info_jadwal[$value]->tanggal, 0, 4);
          ?>
        </td>
    	</tr>
    </table>
    <div style="text-align: center; font-weight:bold; font-size: 14px; margin-top: 5px;"> TIM PELAKSANAAN UJI KOMPETENSI UNTUK <br> SKEMA <?= strtoupper($skema_uji[$value]->skema) ?>
     </div>
    <div style="text-align: center; font-weight:bold; font-size: 14px;">DI <?= strtoupper($info_jadwal[$value]->tuk) ?></div>
    <div style="text-align: center; font-weight:bold; font-size: 14px;">PADA PELAKSANAAN KOMPETENSI TAHUN 2019</div>
    <table style="width: 97%; border-collapse: collapse; margin-top: 5px;" border="1">
        <thead style="font-size: 12px">
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">No </td>
                <td style="width: 45%; font-weight: bold; text-align: center; padding: 2px;">Nama </td>
                <td style="width: 45%; font-weight: bold; text-align: center; padding: 2px;">Jabatan Dalam Organisasi </td>
            </tr>
        </thead>
        <tbody style="font-size: 12px">
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">I.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;">Penanggung Jawab</td>
                <td style="width: 45%; text-align: center; padding: 2px;"></td>
            </tr>
            <tr>
                <td style="width: 10%; text-align: center; padding: 2px;">1.</td>
                <td style="width: 45%; padding: 2px;">Epik Finilih, S.Si.</td>
                <td style="width: 45%; text-align: center; padding: 2px;">Manager Sertifikasi</td>
            </tr>
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">II.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;">Sekretariat Penyelenggara Uji</td>
                <td style="width: 45%; text-align: center; padding: 2px;"></td>
            </tr>
            <tr>
                <td style="width: 10%; text-align: center; padding: 2px;">1.</td>
                <td style="width: 45%; padding: 2px;">Humairoh, S.S.</td>
                <td style="width: 45%; text-align: center; padding: 2px;">Sekertaris LSP</td>
            </tr>
            <tr>
                <td style="width: 10%; text-align: center; padding: 2px;">2.</td>
                <td style="width: 45%; padding: 2px;">Ila Nurholipah</td>
                <td style="width: 45%; text-align: center; padding: 2px;">Staf Administrasi</td>
            </tr>
            <!-- <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">1.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;"><?= isset($info_jadwal[$value]->ketua_tuk) ? $info_jadwal[$value]->ketua_tuk : '-' ?></td>
                        <td style="width: 45%; text-align: center; padding: 2px;"><?= isset($info_jadwal[$value]->ketua_tuk) ? 'Ketua TUK' : '-' ?></td>
            </tr>
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">2.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;"><?= isset($info_jadwal[$value]->bid_mutu) ? $info_jadwal[$value]->bid_mutu : '-' ?></td>
                        <td style="width: 45%; text-align: center; padding: 2px;"><?= isset($info_jadwal[$value]->bid_mutu) ? 'Bid. Mutu' : '-' ?></td>
            </tr>
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">3.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;"><?= isset($info_jadwal[$value]->bid_teknis) ? $info_jadwal[$value]->bid_teknis : '-' ?></td>
                <td style="width: 45%; text-align: center; padding: 2px;"><?= isset($info_jadwal[$value]->bid_teknis) ? 'Bid. Teknis' : '-' ?></td>
            </tr> -->
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">III.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;">Asesor Kompetensi </td>
                <td style="width: 45%; text-align: center; padding: 2px;"></td>
            </tr>
            <?php foreach ($asesor_uji[$value] as $no => $values){ ?>
            <tr>
                <td style="width: 10%; text-align: center; padding: 2px;"><?= ($no+1).'.' ?></td>
                <td style="width: 45%; padding: 2px;"> <?= $values->users ?>  </td>
                <td style="width: 45%; text-align: center; padding: 2px;">Asesor</td>
            </tr>
            <?php } ?>
            <tr>
                <td style="width: 10%; font-weight: bold; text-align: center; padding: 2px;">IV.</td>
                <td style="width: 45%; font-weight: bold; padding: 2px;">Peserta Uji </td>
                <td style="width: 45%; text-align: center; padding: 2px;"></td>
            </tr>
            <?php foreach ($asesi_ba[$value] as $no => $values){ ?>
            <tr>
                <td style="width: 10%; text-align: center; padding: 2px;"><?= ($no+1).'.' ?></td>
                <td style="width: 45%; padding: 2px;"> <?= ucwords(strtolower($values->nama_lengkap)) ?>  </td>
                <td style="width: 45%; text-align: center; padding: 2px;">Asesi</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table style="width: 70%; margin-top: 10px;" border="0" align="right">
    	<tr>
    		<td style="width:30%;font-size: 12px">Dikeluarkan di </td>
    		<td style="width: 5%;font-size: 12px"> : </td>
    		<td style="width:30%;font-size: 12px">Jakarta </td>
    	</tr>
    	<tr>
    		<td style="width:30%;font-size: 12px">Pada tanggal </td>
    		<td style="width: 5%;font-size: 12px"> : </td>
    		<td style="width:30%;font-size: 12px"> <?= tgl_indo( date('Y-m-d', strtotime($info_jadwal[$value]->tanggal))); ?> </td>
    	</tr>

    </table>
</page>
<?php } ?>
