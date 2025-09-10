
<div class="form-panel" style="margin-left: 20px;margin-top: 20px; margin-bottom: 30px;">
    <div class="x-panel-bwrap">
        <form id="myform">
          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Datail Kendaraan</a></li>
              </ol>
          </div>

          <table width="95%" border="0" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
              <td style="width: 25%">Mobil</td>
              <th style="width: 150px; padding: 5px ">:
                <?=$detail_kendaraan->merek_mobil ?>
                <?=$detail_kendaraan->model_mobil ?>
                <?=$detail_kendaraan->transmisi_mobil ?>
                <?=$detail_kendaraan->tahun_mobil ?>
              </th>
            </tr>

            <tr>
              <td style="width: 25%">Harga Awal</td>
              <th style="width: 150px; padding: 5px ">:
                Rp. <?=$hasil_rupiah = number_format($data->harga_kendaraan,0,',','.'); ?>
              </th>
            </tr>
          </table>

          <div id="tips">
              <ol class="rounded-list">
                  <li><a href="javascript: void(0)">Datail Bidding</a></li>
              </ol>
          </div>

          <table width="95%" border="0" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
              <td style="width: 25%">Total Bidding</td>
              <th style="width: 150px; padding: 5px ">:
                <?=$total_bidding ?> ( <?=$terbilang ?> )
              </th>
            </tr>
            <tr>
              <td style="width: 25%">Harga Akhir</td>
              <th style="width: 150px; padding: 5px ">:
                Rp. <?php
                  $harga_akhir=$data->harga_kendaraan+($total_bidding*500000);
                  echo $hasil_rupiah = number_format($harga_akhir,0,',','.');
                ?>
              </th>
            </tr>
          </table>

          <table width="95%" border="1" style="border-collapse: collapse; margin-bottom:15px" align="center">
            <tr>
              <th width="5%" style="padding: 5px; background: #ddd; text-align: center">No</th>
              <th style="padding: 5px; background: #ddd;">DEALER</th>
              <th width="30%" style="padding: 5px; background: #ddd;">WAKTU BIDDING</th>
            </tr>

            <?php
              date_default_timezone_set('Asia/Jakarta');
              $jam_sekarang=date("Y-m-d H:i:s");
              $nodokumen=1;
              $nilai = array();
              foreach ($detail_lelang as $key => $bidding) {
                $timeFirst  = strtotime($bidding->jam_bidding);
                $timeSecond = strtotime($jam_sekarang);
                $differenceInSeconds = $timeSecond - $timeFirst;

                $nilai[$key] = $differenceInSeconds;
                $nilaimin=min($nilai);

                if ($differenceInSeconds == $nilaimin) {
                  $background="rgba(0, 128, 0, 0.5)";
                }else {
                  $background="";
                }

            ?>

            <tr style="background-color: <?=$background ?>">
              <th style="padding: 5px; text-align: center "><?=$nodokumen ?>.</th>
              <td style="padding: 5px "><?=$bidding->nama_dealer ?></td>
              <td style="padding: 5px "><?=$bidding->jam_bidding ?></td>
            </tr>

            <?php $nodokumen++;} ?>

          </table>




        </form>
    </div>
</div>

<script type="text/javascript">

</script>
