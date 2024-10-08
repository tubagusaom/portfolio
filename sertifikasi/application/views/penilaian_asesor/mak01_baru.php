
      <table width="100%" style="border-collapse: collapse;" border="1">
        <tr>
          <td rowspan="2" style="width: 25%; text-align: center; padding: 5px;">Skema Sertifikasi/Klaster Asesmen</td>
          <td style="width: 20%; padding: 5px;">Judul</td>
          <td style="width: 5%; text-align: center; padding: 5px;">:</td>
          <td style="width: 50%; padding: 5px;"><strong><?= $data->skema ?></strong></td>
        </tr>
        <tr>
          <td style="width: 20%; padding: 5px; border-left: 0px;">Nomor</td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><strong><?= $data->kode_skema ?></strong></td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            TUK
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?=$data->tuk?>(<?=$data->jenis_tuk?>)</td>
        </tr>
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Asesor
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?= strtoupper($data->users) ?></td>
        </tr>   
        <tr>
          <td colspan="2" style="width: 45%; padding: 5px;">
            Nama Peserta
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;"><?=strtoupper($data->nama_lengkap) ?></td>
        </tr>   
        <?php if($data->metode_asesmen=='2'){ ;?>
        <tr>
          <td colspan="2" rowspan="3" style="width: 45%; padding: 5px;">
            Bukti yang akan dikumpulkan:
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti TL : Checklist Portofolio</td>
        </tr>                  
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti L : -</td>
        </tr> 
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti T : Daftar Pertanyaan Wawancara</td>
        </tr> 
        <?php }else{?>
        <tr>
          <td colspan="2" rowspan="3" style="width: 45%; padding: 5px;">
            Bukti yang akan dikumpulkan :
          </td>
          <td style="width: 5%; text-align: center;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti TL :</td>
        </tr>                  
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti L : Checklist Observasi</td>
        </tr> 
        <tr>
          <td style="width: 5%; text-align: center; border-left: 0px;">:</td>
          <td style="width: 50%; padding: 5px;">Bukti T : Daftar Pertanyaan Tulisan/Lisan</td>
        </tr> 
        <?php } ?>
        <tr>
          <td colspan="4" width="100%; padding: 5px;">
          <p style="margin-lefT: 10px;">
            <b>
              Pelaksanaan asesmen disepakati pada: 
              <br>
              Hari/Tanggal: <?= tgl_indo($data->tanggal) ?>
              <br>
              Tempat:        <?= $data->tuk ?>
            </b>
           </p>
          </td>
        </tr>
        <tr>
          <td colspan="4" style="width:90%; padding: 5px;">
            <b>
              <p align="justify" style="margin-lefT: 10px;">
              Peserta Sertifikasi: <br>              
              Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja.
              </p>              
            </b> 
          </td>
        </tr> 
        <tr>
          <td colspan="4" style="width: 100%; padding: 5px;">
            <b style="text-align: justify;">
              <p align="justify" style="margin-left: 10px;">
              Asesor: <br>
              Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.
              </p>
            </b> 
          </td>
        </tr>            
      </table>
      
