//ambil elemen-elemen yang dibutuhkan 
var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var conhome = document.getElementById("conhome");

//tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function() {
 //membuat objex ajax
 var xhr = new XMLHttpRequest();

 //cek status request
 xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
   conhome.innerHTML = xhr.responseText;
  }
 };

 //kirim request
 xhr.open("GET", "ajax/ajaxtampilan.php?keyword=" + keyword.value, true);
 xhr.send();

});
