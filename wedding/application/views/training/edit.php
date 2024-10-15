<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform" action="<?php $url ?>">
          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Dokumen Bukti Pendukung</a></li>
              </ol>
          </div>

          <table class="table-data">

              <?php
              $buktiPendukung = str_replace('"', '|', $data->document_pendukung); ?>
              <input type="hidden" value="<?= $buktiPendukung; ?>" name="dokumen_pendukung">
              <?php
              $bukti_pendukung = json_decode($data->document_pendukung);
              if (!empty($bukti_pendukung)) {
                  foreach ($bukti_pendukung as $key => $pendukung) {
                      foreach ($pendukung as $dt) {
                          ?>
                          <tr>
                              <td style="width: 150px; text-align: left"><?= str_replace('_',' ',strtoupper($key)) ?> </td>
                              <td>
                                  : <a target="_blank" href="<?=base_url().'assets/files/document/'.$dt?>"><?= @$dt; ?></a>
                              </td>
                          </tr>
                          <?php
                      }
                  }
              }
              ?>

          </table>

          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Data Diri</a></li>
              </ol>
          </div>
            <table class="">
                <tr>
                    <td style="width: 200px;">Nama Lengkap</td>
                    <td>
                        : <?php echo $data->nama ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">NIK</td>
                    <td>
                        : <?php echo $data->no_identitas ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Jenis Klamin</td>
                    <td>
                        <?php
                          $j_k = $data->jenis_klamin;
                          if ($j_k == 1 ) {
                            $jk="Laki-Laki";
                          }elseif ($j_k == 2) {
                            $jk="Perempuan";
                          }else {
                            $jk="-";
                          }
                        ?>
                        : <?php echo $jk ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Usia</td>
                    <td>
                        : <?php echo $data->usia ?> Thn
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Pendidikan</td>
                    <td>
                        : <?php echo $data->pendidikan ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">jurusan</td>
                    <td>
                        : <?php echo $data->jurusan ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Jabatan</td>
                    <td>
                        : <?php echo $data->jabatan ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Lama Menjabat</td>
                    <td>
                        : <?php echo $data->lama_menjabat ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Departemen / Divisi</td>
                    <td>
                        : <?php echo $data->divisi ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Email</td>
                    <td>
                        : <?php echo $data->email ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">No HP</td>
                    <td>
                        : <?php echo $data->no_hp ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Nama Perusahaan</td>
                    <td>
                        : <?php echo $data->nama_perusahaan ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Alamat Perusahaan</td>
                    <td>
                        : <?php echo $data->alamat ?>
                    </td>
                </tr>
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Data Pelatihan</a></li>
                </ol>
            </div>
            <table class="">
                <tr>
                    <td style="width: 200px;">Jadwal Pelatihan</td>
                    <td>:</td>
                    <td>
                        <?php
                          $tgl_akhir = $jadual->tanggal_akhir;

                          echo $jadual->jadual;
                        ?>
                        <hr style="margin-top:5px;margin-bottom:5px"> Tanggal <b> <?php echo tgl_indo($jadual->tanggal); ?> </b> s/d <b> <?php echo tgl_indo($tgl_akhir); ?> </b>
                    </td>
                </tr>
            </table>

            <div id="tips">
                <ol class="rounded-list">
                    <li><a href="javascript: void(0)">Metode Pembayaran</a></li>
                </ol>
            </div>
            <table class="">
                <tr>
                    <td style="width: 200px;">tipe pembayaran</td>
                    <td>
                        : <?php echo $data->pembayaran ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;">Invoice ditujukan ke alamat</td>
                    <td>
                        : <?php echo $data->alamat_invoice ?>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
