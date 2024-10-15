<style>
#table_mak02 td,th{
    padding: 1mm;
}
</style>
<table id="table_mak02" style="width:97.5%;font-size: 11px;border-collapse: collapse;" border="1">
                <tr style="text-align:center;">
                <th style="width: 70%;">Jawablah dengan Ya atau Tidak pertanyaan-pertanyaan berikut ini :</th>
                <th style="width: 10%;text-align: center;">Y</th>
                <th style="width: 10%;text-align: center;">N</th>
                </tr>
	<tr>
		<td style="width: 78%;"> Apakah Proses Banding telah dijelaskan kepada Anda? </td>
        <td  style="width: 10%;text-align: center;"><input type="radio" name="mak02[0]" value="1" <?=(isset($mak02[0]) && $mak02[0]=='1'?'checked':'')?>/></td>
        <td  style="width: 10%;text-align: center;"><input type="radio" name="mak02[0]" value="0" <?=(isset($mak02[0]) && $mak02[0]=='0'?'checked':'')?>/></td>
    </tr>
    <tr>
		<td> Apakah Anda telah mendiskusikan Banding dengan Asesor? </td>
        <td style="width: 10%;text-align: center;"><input type="radio" name="mak02[1]" value="1" <?=(isset($mak02[1]) && $mak02[1]=='1'?'checked':'')?>/></td>
        <td style="width: 10%;text-align: center;"><input type="radio" name="mak02[1]" value="0" <?=(isset($mak02[1]) && $mak02[1]=='0'?'checked':'')?>/></td>
    </tr>
    <tr>
		<td> Apakah Anda mau melibatkan 'orang lain' membantu Anda dalam Proses Banding? </td>
        <td style="width: 10%;text-align: center;"><input type="radio" name="mak02[2]" value="1" <?=(isset($mak02[2]) && $mak02[2]=='1'?'checked':'')?>/></td>
        <td style="width: 10%;text-align: center;"><input type="radio" name="mak02[2]" value="0" <?=(isset($mak02[2]) && $mak02[2]=='0'?'checked':'')?>/></td>
    </tr>
    <tr>
		<td colspan="3"> Banding ini diajukan atas Keputusan Asesmen yang dibuat terhadap Unit Kompetensi berikut : </td>
    </tr>
     <tr>
	 <td colspan="3">
            <select name="mak02a[]" style="width: auto;" multiple>
                <?php
                
                    foreach($unit_kompetensi as $key=>$value){
                        echo('<option '.(in_array($value->id_unit_kompetensi,$mak02a)?'selected':'').' value="'.$value->id_unit_kompetensi.'">'.($key+1).'. '.$value->unit_kompetensi.'</option>');        
                    }
                ?>
            </select><br /> Hint : Tekan tombol control(Ctrl) pada keyboard untuk memilih lebih dari satu
        </td>
        <tr>
		<td colspan="3"> Banding ini diajukan atas alasan sebagai berikut : </td>
        </tr>
        <td colspan="3" style="width:100%;"><textarea name="mak02b" style="width: 100%;height: 100%;"><?=(isset($mak02b)?$mak02b:'')?></textarea></td>
        </tr>
</table>