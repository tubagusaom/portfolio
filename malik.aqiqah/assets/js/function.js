function myFunction1() { 

var isi = $("#myInput1").val();
var $temp = $("<input>");
$("body").append($temp);
$temp.val(isi).select();
document.execCommand("copy");
$temp.remove();        

    alert("Nomor Rekening Tersalin :" + isi);
}

function myFunction2() { 

var isi = $("#myInput2").val();
var $temp = $("<input>");
$("body").append($temp);
$temp.val(isi).select();
document.execCommand("copy");
$temp.remove();        

alert("Nomor Rekening Tersalin :" + isi);
}