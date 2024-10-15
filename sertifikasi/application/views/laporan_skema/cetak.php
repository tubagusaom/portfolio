<style>
td,th{
    padding: 1mm;
}
</style>

<page backtop="12mm" backbottom="10mm" backleft="5mm" backright="15mm">
    <page_header>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 5%"><img src="<?php echo base_url().'assets/img/logo48.png';?>" /></td>
                <td style="text-align: left;    width: 44%;font-weight: lighter;"><?=$konfigurasi->nama_unit?></td>

            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: 0px;">
            <tr>
                <td style="text-align: left;    width: 10%"><?=$konfigurasi->singkatan_unit?> :
                </td>
                <td style="text-align: left;    width: 45%"> <?=$konfigurasi->alamat?> <?=$konfigurasi->no_telpon?></td>
                <td style="text-align: right;    width: 45%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
</page>
