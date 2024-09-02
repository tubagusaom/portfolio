
const terabytee = document.getElementById("teraBytee");
const demo = document.getElementById('demo');

// const tbdiv = document.getElementById("tbDiv");
var tbDate = document.createElement('terabytee');
var tbText1 = document.createElement('terabytee');
var tbText2 = document.createElement('terabytee');



// terabytee.removeChild(terabytee.firstChild);

// tbdiv.remove();
// tb.innerHTML = '<p style="color:black">This is some HTML code</p>';

// cache.reset();
// cache.delete();
// localStorage.clear();

// alert('ok');

// Tetapkan tanggal kita menghitung mundur
var tanggalAwal   = new Date("12 October 2023 19:00:00").getTime();
var tanggalAkhir  = new Date("13 October 2023 12:00:00").getTime();

// var xxx =  new Date("13 October 2023 02:26:00").getTime();

// Perbarui hitungan mundur setiap 1 detik
var x = setInterval(function () {

  // Dapatkan tanggal dan waktu hari ini
  var sekarang = new Date().getTime();

  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var jarak = tanggalAwal - sekarang;

  var berlangsung = tanggalAkhir - sekarang;

  // Perhitungan waktu untuk hari, jam, menit dan detik
  var hari = Math.floor(jarak / (1000 * 60 * 60 * 24));
  var jam = Math.floor((jarak % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var menit = Math.floor((jarak % (1000 * 60 * 60)) / (1000 * 60));
  var detik = Math.floor((jarak % (1000 * 60)) / 1000);

  // tbDate.textContent = hari + " Hari " + jam + " Jam " +menit + " Menit " + detik + " Detik ";

  // var tb = terabytee.appendChild(tbDate);
  // tb.setAttribute("id", "tbDate");

  // const tbdiv = document.getElementById("tbDiv");
  // tbdiv.innerHTML = hari + " Hari " + jam + " Jam " +menit + " Menit " + detik + " Detik ";

  // Tampilkan hasilnya di elemen dengan id="demo"
  // const mySet = document.getElementById("demo").innerHTML = hari + " Hari " + jam + " Jam " +menit + " Menit " + detik + " Detik ";
  demo.innerHTML = "<terabyte>" + hari + " Hari " + jam + " Jam " +menit + " Menit " + detik + " Detik </terabyte>";

  // tbdiv.remove();
  // terabytee.removeChild(terabytee.firstElementChild);


  // terabytee.removeChild(tbDate);

  // tb.remove();
  // terabytee.removeChild(terabytee);
  // const newNode = document.createTextNode(tbDate);

  // terabytee.innerHTML = hari + " Hari " + jam + " Jam " +menit + " Menit " + detik + " Detik ";

  // alert('ok');

  // document.getElementById("tbDate").innerHTML = "Awal = " + tanggalAwal + "<br> Akhir = " + tanggalAkhir + "<br> berlangsung = " + berlangsung + "<br> jarak =" + jarak;

  // Jika hitungan mundur selesai, tulis beberapa teks
  if (jarak < 0 && berlangsung > 0) {

    // myId.removeChild(myId.firstChild);
    // myId.appendChild(b);

    // var terabytee = document.createElement('terabytee');
    // terabytee.textContent = 'terabytee';
    // myId.appendChild(terabytee);
    // new Set(terabytee);

    // alert('ok');
    // myId.innerHTML = 'terabytee';
    // document.getElementById("demo").createElement('<h5 class="mb-0 text-black my-3" id="demo">terabytee</h5>');

      // const mySet = document.getElementById("demo").innerHTML = "<font style='color:#aaa'>ACARA BERLANGSUNG</font>";
      // new Set('terabytee');

      // tb.remove();
      // demo.remove();

      demo.innerHTML = "<terabyte style='color:#aaa'>ACARA BERLANGSUNG</terabyte>";

      // tbText1.textContent = "ACARA BERLANGSUNG";
      //
      // var text1 = terabytee.appendChild(tbText1);
      // text1.setAttribute("id", "tbDate");
      // text1.setAttribute("style", "color:#aaa");
      // const node = document.createAttribute("class");
      // node.value = "democlass";

      // alert('ok');

  }
  else if (jarak < berlangsung) {
      clearInterval(x);

      // const mySet = document.getElementById("demo").innerHTML = "<font style='color:#bbb'>ACARA SELESAI</font>";
      // new Set(mySet);

      demo.innerHTML = "<terabyte style='color:#bbb'>ACARA SELESAI</terabyte>";

      // tbText1.remove();
      //
      // tbText2.textContent = "ACARA SELESAI";
      //
      // var text2 = terabytee.appendChild(tbText2);
      // text2.setAttribute("id", "tbDate");
      // text2.setAttribute("style", "color:#bbb");

      // tbDate.textContent = "ACARA SELESAI";
      // tb.setAttribute("style", "color:#bbb");
  }

}, 1000);
