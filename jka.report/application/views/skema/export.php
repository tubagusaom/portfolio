<style type="text/css">
    .kode_skema{
        width: 20%;
    }
    .skema{
        width: 50%;
    }
    .kode_unit{
        width: 20%;
    }
    .unit{
        width: 50%;
    }
    .elemen{
        width: 50%;
    }
    .kuk{
        width: 50%;
    }
</style>
<?php
// header("Content-type: application/vnd.ms-excel");
// header("Content-Disposition: attachment;Filename=".$title.".xls");
header("Content-Type:  application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=".$title.".xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$header = '<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>';

echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
echo $header;
echo '<body>';
echo $data;
echo '</body>';
echo '</html>';

exit;
?>