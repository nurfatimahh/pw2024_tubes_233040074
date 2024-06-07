// //ambil elemen-elemen yang dibutuhkan 
// var keyword = document.getElementById("keyword");
// var tombolCari = document.getElementById("tombol-cari");
// var container = document.getElementById("container");

// //tambahkan event ketika keyword ditulis
// keyword.addEventListener("keyup", function() {
//  //membuat objex ajax
//  var xhr = new XMLHttpRequest();

//  //cek status request
//  xhr.onreadystatechange = function() {
//   if (xhr.readyState == 4 && xhr.status == 200) {
//    container.innerHTML = xhr.responseText;
//   }
//  };

//  //kirim request
//  xhr.open("GET", "ajax/ajaxuser.php?keyword=" + keyword.value, true);
//  xhr.send();

// });

const tombolCari = document.querySelector ('.tombo;-cari');
const keyword = document.querySelector ('keyword');
const container = document.querySelector ('.container');

keyword.addEventListener('keyup', function() {

});
