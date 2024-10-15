<style>
    td,th{
        padding: 1mm;
    }
    .hr_cover{
        height: 10px;
        background-color: #165d89;
        border: #165d89;
    }
</style>

<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 50%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br />
    <table style="width:100%;" border="0" cellpadding="4" cellspacing="3">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 40px;font-weight: bold;border-bottom-color: beige 4px;">
                <hr class="hr_cover"/>MUK
            </td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 20px;font-weight: bold;border-bottom-color: beige 4px;">
                <hr class="hr_cover"/>SKEMA SERTIFIKASI :<br />
                <font style="font-size: 16px;"><?= $data_asesi->skema ?></font>
            </td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 14px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/>TUK <?= $data_asesi->tuk ?><br /><?= $data_asesi->alamat_tuk ?><br /><?= $data_asesi->telp_tuk ?></td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 14px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/>Tanggal <?= tgl_indo($data_asesi->tanggal_mulai) ?> - <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>

        </tr>
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;font-size: 50px;font-weight: bold;border-bottom-color: beige 4px;"><hr class="hr_cover"/><?php echo date('Y', strtotime($data_asesi->tanggal_mulai)); ?><hr class="hr_cover"/></td>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center;font-size: 40px;height: 100px;font-style: italic;vertical-align: bottom;"><?= $data_asesi->nama_lengkap ?><hr /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;font-size: 30px;font-style: italic;">
                <?= $data_asesi->no_uji_kompetensi ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 35mm;"></qrcode>
            </td>
        </tr>

    </table>

</page>


<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4> FR-MAK-01 :  CEKLIS MENGASES KOMPETENSI  </h4>
    <br/>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td style="width:16%;"> Nama Peserta </td>
            <td style="width:2%;"> : </td>
            <td style="width:35%;"> <?= $data_asesi->nama_lengkap ?> </td>
            <td style="width:10%;"> Tanggal </td>
            <td style="width:2%;"> : </td>
            <td style="width:36%;">  <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>
        </tr>
        <tr>
            <td style="width:16%;"> Nama Asesor </td>
            <td style="width:2%;"> : </td>
            <td style="width:35%;">  <?= $nama_asesor ?></td>
            <td style="width:10%;"> Tempat </td>
            <td style="width:2%;"> : </td>
            <td style="width:36%;"> <?= $data_asesi->tuk ?></td>
        </tr>
    </table>
    <br/>
    <br/>

    <table style="width:100%;font-size: 11px;" border="1"  style="border-collapse: collapse;">
        <tr style="text-align:center;">
            <td colspan="2" style="background-color:#3aabf2 ;width: 30%;font-size: 12px;"> LANGKAH </td>
            <td style="background-color:#3aabf2 ;width: 30%;font-size: 12px;"> SKENARIO </td>
            <td style="background-color:#3aabf2 ;width: 10%;font-size: 12px;"> KETERANGAN </td>
        </tr>
        <tr>
            <td colspan="4" style="font-size: 11px;"> 1. Menyiapkan dan memelihara lingkungan asesmen </td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 1.1 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">
                Tempatkan peserta sertifikasi di posisi yang nyaman sebagai salah satu cara untuk memberikan lingkungan asesmen
                yang nyaman . </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mengucapkan salam.
                Mempersilahkan peserta duduk.
                Menegur sapa dan kabar.
                Menayakan maksud dan tujuan
            </td>
            <td style="width:15%; text-align: center;font-size: 11px;">
              <?php echo $checklist; ?>
            </td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 1.2 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Pastikan peserta anda sudah diterima menjadi peserta sertifikasi dan
                benar-benar memiliki kompetensi yang akan diases. </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Membaca permohonan dan asesmen mandiri yang sudah diisi oleh
                peserta anda direkomendasikan untuk mengikuti proses selanjutnya </td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td colspan="4" style="font-size: 11px;"> 2. Mengumpulkan bukti yang berkualitas</td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 2.1 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Bersama peserta sertifikasi, kaji ulang acuan pembanding dan rencana
                asesmen termasuk jenis bukti, metode, sumber daya yang akan digunakan pada asesmen.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Memeriksa SKKNI, bukti langsung dan tidak langsung dan tambahan,
                metode observasi, DPT, DPL dan sumber daya yang akan digunakan pada asesmen / tidak usah membawa apa-apa Karena
                semua sudah di siapkan oleh organiser. </td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 2.2 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menerapkan prinsip asesmen dan aturan bukti dalam pengumpulan bukti
                yang dijelaskan melaui MMA 01 yang telah dibuat.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menjelaskan prinsip asesmen dan aturan bukti dalam pengumpulan bukti. </td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 2.3 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menentukan kesempatan pengumpulan bukti pada saat bekerja atau dalam
                aktifitas kerja yang disimulasikan bersama peserta berdasarkan APL 02 yang telah dikumpulkan bukti-buktinya.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Bukti-bukti yang relevan telah anda penuhi sesuai dengan bidang
                pekerjaan saudara berdasarkan asesmen mandiri yang saudara isi.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 2.4 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mengidentifikasi kesempatan untuk aktifitas asesmen terpadu dan jika
                memungkinkan memodifikasi perangkat asesmen.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Perangkat yang dipergunakan adalah CLO, DPT, DPL dan Proses Wawancara</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 2.5 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Membahas kebijakan yang relevan dan memastikan bahwa peserta mengerti
                implikasinya.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menjelaskan prosedur dan ketentuan yang ada di LSP</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 2.6 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mendokumentasikan semua kesepakatan di atas lembar persetujuan termasuk
                persetujuan tanggal, tempat, waktu serta durasi asesmen lanjut.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menyampaikan Kapan asesi siap untuk di uji ?
                Tanggal …, Tempat …. Dan lama  waktu pelaksanaan</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>


        <tr>
            <td colspan="4" style="font-size: 11px;"> 3. Mendukung Peserta</td>

        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 3.1 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menempatkan peserta sertifikasi pada situasi yang nyaman sebagai
                persiapan pembimbingan.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mengarahkan peserta untuk bisa mengikuti pelaksanaan program asesmen </td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 3.2 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menggunakan keterampilan komunikasi interpersonal pada saat menggunakan
                perangkat asesmen, termasuk mengomunikasikan penyesuaian yang memungkinkan.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menilai sesuai dengan criteria unjuk kerja dan menyesuaikan perangkat
                yang akan di gunakan.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 3.3 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menyediakan dukungan spesialis bila diperlukan.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menyampaikan tenaga spesialis yang akan membantu dalam pelaksaaan
                asesmen.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 3.4 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mengelola kesehatan dan keselamatan kerja pada saat pelaksanaan asesmen.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menyampaikan kepada peserta agar mengikuti standarr k3 yang telah di
                tetapkan. Dan memberikan informasi kepada asesor apabila ada suatu kondisi yang mana asesi merasa tidak nyaman.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 3.5 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Mencatat hasil asesmen sesuai dengan metode dan  perangkat yang
                digunakan.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Melakukan pencatatan hasil asesmen sesuai dengan metode dan perangkat
                yang dipergunakan.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 3.6 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Jika seluruh bukti sudah dikumpulkan, sediakan waktu untuk anda
                mempertimbangkan hasil pengumpulan bukti.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Memberikan waktu kepada peserta setelah melaksanakan asesmen untuk
                menunggu hasil pengumpulan bukti pada tempat yang telah di sediakan sementara asesor merekap pelaksanaan asesmen.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>


        <tr>
            <td colspan="4" style="font-size: 11px;"> 4. Membuat keputusan dan umpan balik asesmen</td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 4.1 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Pastikan peserta sertifikasi diberikan umpan balik yang konstruktif.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Berikan peserta umpan balik yang dapat membangun kompetensi nya menjadi
                lebih baik lagi.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>
        <tr>
            <td style="width:5%;font-size: 11px;"> 4.2 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Selesaikan dan tanda tangani laporan hail asesmen.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Menandatangani semua format yang berkaitan dengan asesmen.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>

        <tr>
            <td style="width:5%;font-size: 11px;"> 4.3 </td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Ucapkan selamat atau memberikan motivasi kepada peserta sertifikasi.</td>
            <td style="width:40%; text-align:justify;font-size: 11px;">Memberikan ucapan selamat dan motivasi yang baik kepada peserta agar
                dapat mempergunakan hasil asesmen dengan tepat guna dan sasaran.</td>
            <td style="width:15%; text-align: center;">
              <?php echo $checklist; ?>
            </td>
        </tr>
    </table>
</page>


<page backtop="10mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4> FR-MAK-02  :  FORMULIR BANDING ASESMEN </h4>
    <br/>


    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td colspan="3" style="width:100%;"> Nama Peserta : <?= strtoupper($data_asesi->nama_lengkap) ?></td>

        </tr>
        <tr>
            <td colspan="3" style="width:100%;"> Nama Asesor : <?= $nama_asesor ?></td>

        </tr>
        <tr>
            <td colspan="3" style="width:100%;"> Tanggal Asesmen : <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>

        </tr>
        <tr>
            <td style="width:80%;"> Jawablah dengan <strong>Ya</strong> atau <strong>Tidak</strong> pertanyaan-pertanyaan berikut ini :</td>
            <td style="width:10%;" text-align="center;"> YA </td>
            <td style="width:10%;" text-align="center;"> TIDAK </td>
        </tr>
        <tr>
            <td style="width:80%;"> Apakah Proses Banding telah dijelaskan kepada Anda? </td>
            <td style="width:10%;">   </td>
            <td style="width:10%;">   </td>
        </tr>
        <tr>
            <td style="width:80%;"> Apakah Anda telah mendiskusikan Banding dengan Asesor? </td>
            <td style="width:10%;">   </td>
            <td style="width:10%;">   </td>
        </tr>
        <tr>
            <td style="width:80%;"> Apakah Anda mau melibatkan “orang lain” membantu Anda dalam Proses Banding? </td>
            <td style="width:10%;">   </td>
            <td style="width:10%;">   </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%;">Banding ini diajukan atas Keputusan Asesmen yang dibuat terhadap Unit Kompetensi berikut :
                <br/> No. Unit Kompetensi   :
                <br/>
                Judul Unit Kompetensi :
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%;"> Banding ini diajukan atas alasan sebagai berikut :
                <br/>
                <br/>
                <br/>
                <br/>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%;">Anda mempunyai hak mengajukan banding jika Anda mendapatkan hasil yang <strong>Tidak Sah</strong> dan/atau <strong>Proses Tidak Sah</strong> atau <strong>Tidak Adil</strong>.
                <br/>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%;">
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                Tanda tangan Asesi : <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode> . Tanggal :
        </td></tr></table>
</page>



<page backtop="10mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <h4> FR-MAK-03  :  FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN </h4>
    <!-- <br/> -->
    <!-- <br/> -->

    <table style="width:100%;" border="1" cellpadding="3" cellspacing="0">
        <tr>
            <td colspan="2"> Persetujuan Asesmen ini untuk menjamin bahwa Peserta telah diberi arahan secara rinci tentang proses asesmen </td>

        </tr>

        <tr>
            <td style="width:25%;">Nama Calon Peserta  </td>
            <td style="width:75%;"> <?= strtoupper($data_asesi->nama_lengkap) ?></td>
        </tr>

        <tr>
            <td style="width:25%;">Nama Asesor  </td>
            <td style="width:75%;"> <?= $nama_asesor ?></td>
        </tr>

        <tr>
            <td style="width:25%;">Judul Skema Kompetensi  </td>
            <td style="width:75%;"> <?= strtoupper($data_asesi->skema) ?></td>
        </tr>

        <tr>
            <td style="width:25%;">Bukti Yang Dikumpulkan :  </td>
            <td style="width:75%;">
              <?php
                foreach ($files_bukti as $nofb => $files_bukti) {
                    echo "(" .($nofb+1). ")." .ucfirst(str_replace('_', " ", $files_bukti->nama_dokumen))." &nbsp;";
                }
              ?>
            </td>
        </tr>

        <tr>
            <td colspan="2">Pelaksanaan asesmen akan dilaksanakan pada:
                <br/>
                Hari/ Tanggal : <?= tgl_indo($data_asesi->tanggal_mulai) ?>
                <br/>
                Tempat    : <?= $data_asesi->tuk ?>
            </td>

        </tr>

        <tr>
            <td colspan="2" ><strong>Peserta Sertifikasi:</strong>
                <br/>
                <br/>
                <strong>Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk
                    pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.
                </strong>
            </td>

        </tr>
        <tr>
            <td colspan="2"><strong>Asesor:</strong>
                <br/>
                <br/>
                <strong>Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai asesor
                    dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan
                    dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.
                </strong>
            </td>

        </tr>

        <tr>
            <td colspan="2">
                <br/>
                <br/>
                Tanda tangan Peserta  : <qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode>        Tanggal : <?= tgl_indo($data_asesi->tanggal_mulai) ?>
        <br/>
        <br/>
        <br/>
        <br/>
        Tanda tangan Asesor   : <qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode>        Tanggal :  <?= tgl_indo($data_asesi->tanggal_mulai) ?>
        <br/><br/>
        </td>
        </tr>
    </table>
</page>


<!-- xxx -->

<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%">
                    <img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" />
                </td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4> FR-MAK- 04 :  KEPUTUSAN DAN UMPAN BALIK ASESMEN </h4>
    <br/>
    <!-- <br/> -->

    <table style="width:100%" border="0"  style="border-collapse: collapse;">
        <tr>
            <td style="width:25%;font-weight: bold;"> <strong>Skema Sertifikasi</strong> </td>
            <td style="width:2%;text-align: center;"> : </td>
            <td style="width:60%;"> <?= $data_asesi->skema ?></td>

        </tr>

        <tr>
            <td style="width:25%;font-weight: bold;"> <strong>Nomor Skema </strong> </td>
            <td style="width:2%;text-align: center;"> : </td>
            <td style="width:60%;"> <?= $data_asesi->kode_skema ?></td>

        </tr>
    </table>


    <br/>
    <!-- <br/> -->

    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td style="width:17%;"> Nama Peserta </td>
            <td style="width:2%;text-align: center;"> : </td>
            <td style="width:30%;">  <?= strtoupper($data_asesi->nama_lengkap) ?> </td>
            <td style="width:15%;"> Tanggal Waktu </td>
            <td style="width:4%;"> : </td>
            <td style="width:32%;"> <?= tgl_indo($data_asesi->tanggal_mulai) ?></td>
        </tr>
        <tr>
            <td style="width:17%;"> Tim Asesor </td>
            <td style="width:2%;text-align: center;"> : </td>
            <td style="width:30%;">  <?= $nama_asesor ?> </td>
            <td style="width:15%;"> Tempat </td>
            <td style="width:4%;"> : </td>
            <td style="width:32%;">  <?= $data_asesi->tuk ?> </td>
        </tr>
    </table>

    <br/>
    <!-- <br/> -->

    <table style="width:100%" border="0"  style="border-collapse: collapse;">
        <tr>
            <td colspan="2" style="width:100%;"> <strong>Penjelasan untuk Asesor :</strong> </td>

        </tr>
        <tr>
            <td style="width:5%;">1.</td>
            <td style="width:85%;">Asesor mengorganisasikan pelaksanaan asesmen berdasarkan metoda dan instrumen/sumber-sumber asesmen seperti yang tercantum dalam perencanaan asesmen. </td>
        </tr>
        <tr>
            <td style="width:5%;">2.</td>
            <td style="width:85%;">Asesor melaksanakan kegiatan pengumpulan bukti serta mendokumentasikan seluruh bukti pendukung yang dapat ditunjukkan oleh Asesi sesuai dengan kriteria unjuk kerja yang dipersyaratkan. </td>
        </tr>
        <tr>
            <td style="width:5%;">3.</td>
            <td style="width:85%;">Asesor membuat keputusan apakah Asesi sudah Kompeten <strong>(K)</strong>,  Belum kompeten <strong>(BK)</strong> atau Asesmen Lanjut (AL), untuk setiap kriteria unjuk kerja berdasarkan bukti-bukti. </td>
        </tr>
        <tr>
            <td style="width:5%;">4.</td>
            <td style="width:85%;">Asesor mengorganisasikan pelaksanaan asesmen berdasarkan metoda dan instrumen/sumber-sumber asesmen seperti yang tercantum dalam perencanaan asesmen. </td>
        </tr>
        <tr>
            <td style="width:5%;">5.</td>
            <td style="width:85%;">Asesor mengorganisasikan pelaksanaan asesmen berdasarkan metoda dan instrumen/sumber-sumber asesmen seperti yang tercantum dalam perencanaan asesmen. </td>
        </tr>
        <tr>
            <td style="width:5%;">6.</td>
            <td style="width:85%;">Asesor mengorganisasikan pelaksanaan asesmen berdasarkan metoda dan instrumen/sumber-sumber asesmen seperti yang tercantum dalam perencanaan asesmen. </td>
        </tr>


    </table>

    <br/>
    <!-- <br/> -->

    <h4> PENCAPAIAN KOMPETENSI: </h4>
    <?= $elemen_kuk ?>

    <br/>
    <br/>
    <!-- <br/> -->

    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td> <strong>Umpan balik terhadap pencapaian unjuk kerja : </strong>
                <br/>
                <br/>

                <?php
                    $ra = $data_asesi->rekomendasi_asesor;
                    if ($ra == 2) {
                      echo "Terdapat KUK yang tidak tercapai";
                    }elseif ($ra == 1)  {
                      echo "Tidak Ada kesenjangan";
                    }else {
                      echo "-";
                    }
                ?>

                <br/>
                <br/>
            </td>
        </tr>

        <tr>
            <td> <strong>Identifikasi kesenjangan pencapaian unjuk kerja : </strong>
                <br/>
                <br/>

                <?php
                    $ra = $data_asesi->rekomendasi_asesor;
                    if ($ra == 2) {
                      echo "Tidak ada";
                    }elseif ($ra == 1)  {
                      echo "Tidak ada";
                    }else {
                      echo "-";
                    }
                ?>

                <br/>
                <br/>
            </td>
        </tr>

        <tr>
            <td style="width:100%;"> <strong>Saran tindak lanjut hasil asesmen  : </strong>
                <br/>
                <br/>

                <?php
                    $ra = $data_asesi->rekomendasi_asesor;
                    if ($ra == 2) {
                      echo "Tingkatkan kompetensi terhadap KUK yang belum dicapai";
                    }elseif ($ra == 1)  {
                      echo "pertahankan dan pelihara kompetensi yang telah dicapai";
                    }else {
                      echo "-";
                    }
                ?>

                <br/>
                <br/>
            </td>
        </tr>

    </table>

    <br/>
    <br/>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td style="width:40%;"><strong>Rekomendasi Asesor :</strong></td>
            <td colspan="2" style="width:60%;"><strong>Peserta :</strong></td>
        </tr>
        <tr>
            <td rowspan="6" style="width: 40%;">&nbsp;
                <?php
                    $ra = $data_asesi->rekomendasi_asesor;
                    if ($ra == 2) {
                      echo "Belum Kompeten";
                    }elseif ($ra == 1)  {
                      echo "Kompeten";
                    }else {
                      echo "-";
                    }
                ?>
            </td>
            <td style="width:30%;">Nama</td>
            <td style="width:30%;"><?= strtoupper($data_asesi->nama_lengkap) ?> </td>
        </tr>
        <tr>
            <td>
                <p>Tanda Tangan &amp; Tanggal</p>
                <font style="font-size: 10px"><?= tgl_indo($data_asesi->pra_asesmen_date) ?></font>
            </td>
            <td><qrcode value="<?php echo $qr_asesi; ?>" ec="Q" style="width: 15mm;"></qrcode></td>
        </tr>
        <tr>
            <td><strong>Asesor :</strong></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $nama_asesor ?></td>
        </tr>
        <tr>
            <td>No.Reg</td>
            <td><?= $no_reg_asesor ?></td>
        </tr>
        <tr>
            <td>
                <p>Tanda Tangan &amp; Tanggal</p>
                <font style="font-size: 10px"><?= tgl_indo($data_asesi->pra_asesmen_date) ?></font>
            </td>
            <td><qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode></td>
        </tr>
    </table>

</page>

<!-- xxx -->


<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4> FR-MAK-05  :  UMPAN BALIK DARI ASESI </h4>
    <br/>
    <!-- <br/> -->
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr align="center">
            <td rowspan="2" style="width:45%;">Komponen</td>
            <td colspan="2" style="width:16%;">Hasil</td>
            <td rowspan="2" style="width:49%;">Catatan / Komentar Asesi</td>
        </tr>

        <tr align="center">
            <td style="width:8%;">Ya</td>
            <td style="width:8%;">Tidak</td>
        </tr>

        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">1. </td>
                        <td style="width:95%;">Saya mendapatkan penjelasan yang cukup memadai mengenai proses asesmen/uji kompetensi </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[0]) && $mak05[0]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[0]) && $mak05[0]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[0]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">2. </td>
                        <td style="width:95%;">Asesor memberikan kesempatan untuk mendiskusikan/ menegosiasikan metoda,
                            instrumen dan sumber asesmen serta jadwal asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[1]) && $mak05[1]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[1]) && $mak05[1]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[1]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">3. </td>
                        <td style="width:95%;">Asesor berusaha menggali seluruh bukti pendukung yang sesuai dengan latar belakang pelatihan dan pengalaman yang saya miliki </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[2]) && $mak05[2]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[2]) && $mak05[2]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[2]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">4. </td>
                        <td style="width:95%;">Saya mendapatkan jaminan kerahasiaan hasil asesmen serta penjelasan penanganan dokumen asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[3]) && $mak05[3]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[3]) && $mak05[3]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[3]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">5. </td>
                        <td style="width:95%;">Saya sepenuhnya diberikan kesempatan untuk mendemonstrasikan kompetensi yang saya miliki selama asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[4]) && $mak05[4]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[4]) && $mak05[4]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[4]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">6. </td>
                        <td style="width:95%;">Saya mendapatkan penjelasan yang memadai mengenai keputusan asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[5]) && $mak05[5]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[5]) && $mak05[5]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[5]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">7. </td>
                        <td style="width:95%;">Asesor memberikan umpan balik yang mendukung setelah asesmen serta tindak lanjutnya </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[6]) && $mak05[6]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[6]) && $mak05[6]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[6]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">8. </td>
                        <td style="width:95%;">Asesor menggunakan keterampilan komunikasi yang efektif selama asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[7]) && $mak05[7]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[7]) && $mak05[7]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[7]; ?></td>
        </tr>
        <tr>
            <td style="width:45%;">
                <table border="0"  style="border-collapse: collapse;">
                    <tr style="text-align:justify;">
                        <td style="width:3%;">9. </td>
                        <td style="width:95%;">Asesor bersama saya menandatangani semua dokumen hasil asesmen </td>
                    </tr>
                </table>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[8]) && $mak05[8]=='1'?''. $checklist .'':$checklist)?>
            </td>
            <td style="width:8%;text-align: center;">
                <?php echo (isset($mak05[8]) && $mak05[8]=='0'?''. $checklist .'':'')?>
            </td>
            <td style="width:49%;text-align: center;"><?php echo $mak05a[8]; ?></td>
        </tr>
    </table>

</page>
<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4> FR-MAK-06  :  FORMULIR LAPORAN ASESMEN </h4>

    <br/>
    <table style="width:100%" border="1"  style="border-collapse: collapse;">
        <tr>
            <td style="width:20%;font-weight: bold;" >Nama Peserta</td>
            <td style="width:30%;" ><?= strtoupper($data_asesi->nama_lengkap) ?></td>
            <td colspan="2" style="width:20%;font-weight: bold;" >Nama Asesor</td>
            <td style="width:30%;"><?= $nama_asesor ?></td>
        </tr>
        <tr>
            <td style="width:20%;font-weight: bold;">Tanggal Pencapaian Kompetensi :</td>
            <td style="width:30%;"><?= tgl_indo($data_asesi->pra_asesmen_date) ?></td>
            <td colspan="2" style="width:20%;text-align: center;font-weight: bold;">Tanda Tangan Asesor dan Tanggal :</td>
            <td style="width:30%;"><qrcode value="<?php echo $ttd_asesor_uji; ?>" ec="Q" style="width: 15mm;"></qrcode></td>
        </tr>
        <tr align="center">
            <td style="font-weight: bold;" colspan="2">Unit Kompetensi</td>
            <td style="text-align: center;font-weight: bold;">K</td>
            <td style="text-align: center;font-weight: bold;">BK</td>
            <td style="font-weight: bold;">Keterangan</td>
        </tr>
        <?= $unit_mak ?>
    </table>

    <br/>
    <table style="width:100%;border-collapse: collapse;" border="1"  >
        <tr align="center">
            <td style="width:35%;font-weight: bold;" >Aspek Negatif dan Positif Dalam Asesmen</td>
            <td style="width:35%;font-weight: bold;" >Pencatatan Penolakan Hasil Asesmen</td>
            <td style="width:35%;font-weight: bold;" >Saran Perbaikan :
                (Asesor/Personil  Terkait)</td>
        </tr>
        <tr>
            <td style="height: 150px;width:33%;"> <br/> <?php echo $mak06b[0] ?> <br/> </td>
            <td style="width:33%;"> <br/> <?php echo $mak06b[1] ?> <br/> </td>
            <td style="width:34%;"> <br/> <?php echo $mak06b[2] ?> <br/> </td>
        </tr>
        <tr>
            <td colspan="3"><p>Kode File : (Diisi oleh LSP)</p></td>
        </tr>
    </table>

    <br/>
    <br/>
    <b> Catatan : Format dapat dimodifikasi sesuai dengan jumlah unit kompetensi yang diakses </b>
<!--
    <br/>
    <br/> -->

</page>


<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url() . 'assets/img/logo48.png'; ?>" /></td>
                <td style="text-align: left;    width: 54%;font-weight: lighter;"><?= $aplikasi->nama_unit ?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 25%"><?=$aplikasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 55%"> <?=$aplikasi->alamat?> <?=$aplikasi->no_telpon?></td>
                <td style="text-align: right;    width: 20%">Halaman [[page_cu]] / [[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <h4> FR-MAK-07  :  MENINJAU PROSES ASESMEN </h4>
    <br>
    <table style="width:100%;border-collapse: collapse;" border="1"  >
        <tr>
            <td style="width:40%;"> <strong>Skema Sertifikasi (Unit/klaster/kualifikasi)</strong> </td>
            <td style="width:4%;text-align: center;"> : </td>
            <td style="width:55%;"><?= $data_asesi->skema ?></td>

        </tr>

        <tr>
            <td style="width:40%;"> <strong>Nomor Skema Sertifikasi   </strong> </td>
            <td style="width:4%;text-align: center;"> : </td>
            <td style="width:55%;"><?= $data_asesi->kode_skema ?></td>

        </tr>

    </table>
    <br>
    <table style="width:100%;border-collapse: collapse;" border="1"  >
  <tr align="center">
    <td style="width:55%;" rowspan="2"><strong> Aspek yang dikaji ulang</strong></td>
    <td colspan="4" style="width:45%;"><strong> Pemenuhan terhadap prinsip - prinsip Asesmen</strong></td>
  </tr>
  <tr align="center">
    <td style="width:11%;"><em>Valid</em></td>
    <td style="width:11%;"><em>Reliable</em></td>
    <td style="width:11%;"><em>Flexible</em></td>
    <td style="width:12%;"><em>Fair</em></td>
  </tr>
  <tr>
    <td>
      <p><strong> Prosedur Asesmen:</strong></p>
      <p> Perencanaan asesmen</p>
    </td>
    <td style="text-align: center;">
      <p>&nbsp;</p>
      <p><?=(isset($mak07[0]) && $mak07[0]=='on' ?$checklist:'')?></p>
    </td>
    <td style="text-align: center;">
      <p>&nbsp;</p>
      <p><?=(isset($mak07[1]) && $mak07[1]=='on' ? ''. $checklist .'' :'')?></p>
    </td>
    <td style="text-align: center;">
      <p>&nbsp;</p>
      <p><?=(isset($mak07[2]) && $mak07[2]=='on' ? ''. $checklist .'' :'')?></p>
    </td>
    <td style="text-align: center;">
      <p>&nbsp;</p>
      <p><?=(isset($mak07[3]) && $mak07[3]=='on' ? ''. $checklist .'' :'')?></p>
    </td>
  </tr>
  <tr>
    <td> Pra asesmen</td>
    <td style="text-align: center;"><?=(isset($mak07[4]) && $mak07[4]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[5]) && $mak07[5]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[6]) && $mak07[6]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[7]) && $mak07[7]=='on' ? ''. $checklist .'' :'-')?></td>
  </tr>
  <tr>
    <td> Pelaksanaan asesmen</td>
    <td style="text-align: center;"><?=(isset($mak07[8]) && $mak07[8]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[9]) && $mak07[9]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[10]) && $mak07[10]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[11]) && $mak07[11]=='on' ? ''. $checklist .'' :'-')?></td>
  </tr>
  <tr>
    <td> Keputusan asesmen</td>
    <td style="text-align: center;"><?=(isset($mak07[12]) && $mak07[12]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[13]) && $mak07[13]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[14]) && $mak07[14]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[15]) && $mak07[15]=='on' ? ''. $checklist .'' :'-')?></td>
  </tr>
  <tr>
    <td> Umpan balik asesmen</td>
    <td style="text-align: center;"><?=(isset($mak07[16]) && $mak07[16]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[17]) && $mak07[17]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[18]) && $mak07[18]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[19]) && $mak07[19]=='on' ? ''. $checklist .'' :'-')?></td>
  </tr>
  <tr>
    <td> Pencatatan asesmen</td>
    <td style="text-align: center;"><?=(isset($mak07[20]) && $mak07[20]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[21]) && $mak07[21]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[22]) && $mak07[22]=='on' ? ''. $checklist .'' :'-')?></td>
    <td style="text-align: center;"><?=(isset($mak07[23]) && $mak07[23]=='on' ? ''. $checklist .'' :'-')?></td>
  </tr>
  <tr>
    <td colspan="5"> Rekomendasi perbaikan :
    <p>&nbsp;</p></td>
  </tr>
</table>

    <br>


    <table style="width:100%;border-collapse: collapse;" border="1"  >
        <tr align="center">
            <td style="width:55%;" rowspan="2"><strong> Aspek yang dikaji ulang</strong></td>
            <td colspan="4" style="width:45%;"><strong> Pemenuhan terhadap Dimensi Kompetensi</strong></td>
        </tr>
        <tr align="center">
            <td style="width:11%;font-size: 10px;"><em>Task Skill</em></td>
            <td style="width:11%;font-size: 10px;"><em>Task Management Skill</em></td>
            <td style="width:11%;font-size: 10px;"><em>Contingency Management Skill</em></td>
            <td style="width:12%;font-size: 10px;"><em>Environment Management Skill</em></td>
        </tr>
        <tr>
            <td style="width:55%;"><p><strong> Konsistensi keputusan asesmen</strong></p>
                <p>&nbsp; Bukti dari rentang asesmen di periksa terhadap  </p>
                <p>&nbsp; konsisten dimensi kompetensi</p>
            </td>
            <td style="text-align: center;"><?=(isset($mak07[24]) && $mak07[24]=='on' ? ''. $checklist .'' :'-')?></td>
            <td style="text-align: center;"><?=(isset($mak07[25]) && $mak07[25]=='on' ? ''. $checklist .'' :'-')?></td>
            <td style="text-align: center;"><?=(isset($mak07[26]) && $mak07[26]=='on' ? ''. $checklist .'' :'-')?></td>
            <td style="text-align: center;"><?=(isset($mak07[27]) && $mak07[27]=='on' ? ''. $checklist .'' :'-')?></td>
        </tr>
        <tr>
            <td colspan="5" style="height: 90px;"> Rekomendasi perbaikan : <br> &nbsp;
                <?=$mak07[28]?>
            </td>
        </tr>
    </table>
</page>
