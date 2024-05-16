let hargaKamar = 0 ;            // Variabel ini menyimpan harga kamar per malam.
let durasiMenginap = 0 ;        // Variabel ini menyimpan durasi hari yang diinginkan untuk menginap.
let hargaBreakfast = 0;         // Variabel ini menyimpan harga tambahan untuk sarapan per hari.
let isDiskon = false;           // Variabel boolean yang menunjukkan apakah diskon berlaku atau tidak. Jika true, diskon akan diberikan.
let totalHargaKamar = 0;        // Variabel ini menyimpan total harga kamar ( harga kamar * durasi )
let totalHargaBreakfast = 0;    // Variabel ini menyimpan total harga breakfast ( harga breakfast * durasi )
let totalHargaDiskon = 0;       // Variabel ini menyimpan total Diskon ( Total harga kamar  * 10 % )


/*
    Objek formatter digunakan untuk memformat nilai angka
    menjadi format mata uang Indonesia (IDR)
    dengan menggunakan standar internasional.
*/

const formatter = new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
});


function handleTipeKamar(element){

/*
    Fungsi handleTipeKamar(element)
    Fungsi ini bertanggung jawab untuk menangani perubahan tipe kamar yang dipilih oleh pengguna.
    Ketika pengguna memilih tipe kamar, harga kamar akan disesuaikan sesuai dengan pilihan tersebut.

    Parameter:
    * element: Objek elemen HTML yang dipilih oleh pengguna, seperti <select>.
    
    Algoritma:
    * Fungsi ini akan dilankan jika nilai element select tipe-kamar diubah oleh user.
    * Jika nilai sesuai dengan salah satu kasus ("family", "deluxe", atau "standard"),
      maka variabel hargaKamar akan diperbarui sesuai dengan harga kamar yang sesuai.
    * Lalu Memanggil fungsi updateAll ()

*/

    switch(element.value){
        case "family":
            hargaKamar = 1000000;
            break;
        case "deluxe":
            hargaKamar = 750000;
            break;
        case "standart":
            hargaKamar = 750000;
            break;
        default:
            hargaKamar = 0;
            break;
    }
    updateAll();

}

function handleDurasiMenginap(element){

/*
    Fungsi handleDurasiMenginap(element)
    Fungsi ini digunakan untuk menangani perubahan durasi menginap yang dipilih oleh pengguna.
    Ketika pengguna memilih durasi menginap tertentu, fungsi ini akan mengubah nilai durasiMenginap
    dan menyesuaikan status diskon sesuai dengan aturan yang ditentukan.

    Parameter:
    * element: Objek elemen HTML yang dipilih oleh pengguna, seperti inputan teks.
    
    Algoritma:
    1. Fungsi ini mengatur nilai durasiMenginap menjadi nilai yang dipilih oleh pengguna.
    2. Fungsi ini juga memeriksa apakah durasi menginap lebih dari 3 malam. Jika iya, maka diskon sebesar 10% diberikan. Jika tidak, diskon diatur menjadi tidak aktif.
    3. Selanjutnya, fungsi akan memperbarui nilai diskon yang ditampilkan di dalam elemen HTML dengan ID "diskon".
    4. fungsi memanggil fungsi updateAll() untuk memperbarui nilai-nilai terkait.
*/

    durasiMenginap = element.value;

    if(Number(element.value) > 3 ){
        isDiskon = true;
        document.getElementById("diskon").innerHTML = "10";
        console.log(document.getElementById("diskon"))
    }else{
        isDiskon = false;
        document.getElementById("diskon").innerHTML = "0";
    }
    updateAll();
}

function handleBreakfast(element){

/*
    Fungsi handleBreakfast(element)
    Fungsi ini bertanggung jawab untuk menangani pilihan sarapan pengguna.
    Ketika pengguna memilih atau membatalkan pilihan sarapan, 
    fungsi ini akan mengubah nilai hargaBreakfast sesuai dengan keputusan pengguna.

    Parameter:
    * element: Objek elemen HTML yang dipilih oleh pengguna, seperti checkbox.

    Algoritma:
    1. Fungsi ini memeriksa apakah kotak centang untuk sarapan (element) dicentang.
    2. Jika dicentang, maka nilai hargaBreakfast diatur ke harga sarapan yang ditentukan.
    3. Jika tidak dicentang, maka nilai hargaBreakfast diatur menjadi 0.
    4. Setelah itu, fungsi memanggil updateAll() untuk memperbarui nilai-nilai terkait.
*/

    if(element.checked){
        hargaBreakfast = 80000;
    }else{
        hargaBreakfast = 0;
    }
    updateAll();
}

function updateHargaKamar(){

/*
    Fungsi updateHargaKamar()
    Fungsi ini bertugas untuk memperbarui tampilan harga kamar dalam elemen input HTML dengan ID "harga-kamar".
    Harga kamar akan diformat menggunakan objek formatter sebelum ditampilkan.

    Algoritma:
    1. Fungsi ini mengambil elemen input HTML dengan ID "harga-kamar" menggunakan document.getElementById().
    2. Nilai hargaKamar akan diformat menjadi format mata uang IDR menggunakan objek formatter.
    3. Nilai yang diformat akan diatur sebagai nilai dari elemen input tersebut.
*/

    hargaKamarInputElement = document.getElementById("harga-kamar");
    hargaKamarInputElement.value = formatter.format(hargaKamar);
}


function updateTotalHargaKamar(){

/*
    Fungsi updateTotalHargaKamar()
    Fungsi ini bertugas untuk menghitung dan memperbarui total harga kamar berdasarkan harga kamar per malam (hargaKamar)
    dan durasi menginap (durasiMenginap). Hasil perhitungan akan diformat menggunakan objek formatter sebelum ditampilkan 
    di dalam elemen input HTML dengan ID "total-harga-kamar".

    Algoritma:
    1. Fungsi ini mengambil elemen input HTML dengan ID "total-harga-kamar" menggunakan document.getElementById().
    2. Total harga kamar dihitung dengan mengalikan hargaKamar dengan durasiMenginap.
    3. Nilai total harga kamar yang telah diformat akan diatur sebagai nilai dari elemen input tersebut.
*/

    totalHargaKamarInputElement = document.getElementById("total-harga-kamar");
    totalHargaKamar = hargaKamar * durasiMenginap;
    totalHargaKamarInputElement.value = formatter.format(totalHargaKamar);
}


function updateTotalHargaBreakfast(){
/*
    Fungsi updateTotalHargaBreakfast()
    Fungsi ini bertugas untuk menghitung dan memperbarui total harga sarapan berdasarkan harga sarapan per orang (hargaBreakfast)
    dan durasi menginap (durasiMenginap). Hasil perhitungan akan diformat menggunakan objek formatter sebelum ditampilkan 
    di dalam elemen input HTML dengan ID "total-harga-breakfast".

    Algoritma:
    Fungsi ini mengambil elemen input HTML dengan ID "total-harga-breakfast" menggunakan document.getElementById().
    Total harga sarapan dihitung dengan mengalikan hargaBreakfast dengan durasiMenginap.
    Nilai total harga sarapan yang telah diformat akan diatur sebagai nilai dari elemen input tersebut.
*/
    totalHargaBreakfestElement = document.getElementById("total-harga-breakfast");
    totalHargaBreakfast = hargaBreakfast * durasiMenginap;
    totalHargaBreakfestElement.value = formatter.format(totalHargaBreakfast);
}

function updateTotalHargaDiskon(){
/*
    Fungsi updateTotalHargaDiskon()
    Fungsi ini bertugas untuk menghitung dan memperbarui total harga dengan diskon.
    Jika diskon berlaku (isDiskon bernilai true), maka total harga diskon akan dihitung sebagai 10%
    dari total harga kamar (totalHargaKamar). Hasil perhitungan akan diformat menggunakan objek formatter
    sebelum ditampilkan di dalam elemen input HTML dengan ID "total-harga-diskon".

    Algoritma:
    1. Fungsi ini mengambil elemen input HTML dengan ID "total-harga-diskon" menggunakan document.getElementById().
    2. Total harga diskon dihitung dengan menggunakan operator ternary: jika diskon berlaku (isDiskon bernilai true),
       maka total harga diskon adalah 10% dari total harga kamar (totalHargaKamar), jika tidak,total harga diskon diatur menjadi 0.
    3. Nilai total harga diskon yang telah diformat akan diatur sebagai nilai dari elemen input tersebut.
*/
    totalHargaDiskonElement = document.getElementById("total-harga-diskon");
    totalHargaDiskon = (isDiskon) ? totalHargaKamar * 0.1 : 0;
    totalHargaDiskonElement.value = formatter.format(totalHargaDiskon);
}

function updateTotalTagihan(){
/*
    Fungsi updateTotalTagihan()
    Fungsi ini bertugas untuk menghitung dan memperbarui total tagihan akhir yang harus dibayarkan oleh pengguna.
    Total tagihan dihitung berdasarkan total harga kamar (totalHargaKamar), total harga sarapan (totalHargaBreakfast),
    dan total harga diskon (totalHargaDiskon). Hasil perhitungan akan diformat menggunakan objek formatter
    sebelum ditampilkan di dalam elemen input HTML dengan ID "total-tagihan".

    Algoritma:
    1. Fungsi ini mengambil elemen input HTML dengan ID "total-tagihan" menggunakan document.getElementById().
    3. Total tagihan dihitung dengan menjumlahkan total harga kamar (totalHargaKamar), total harga sarapan (totalHargaBreakfast), dan mengurangkan total harga diskon (totalHargaDiskon).
    4. Nilai total tagihan yang telah diformat akan diatur sebagai nilai dari elemen input tersebut.
*/

    totalTagihanElement = document.getElementById("total-tagihan");
    totalTagihanElement.value = formatter.format(totalHargaKamar + totalHargaBreakfast - totalHargaDiskon) ;
}

function updateAll(){
/*
    Fungsi updateAll()
    Fungsi ini bertugas untuk memperbarui semua nilai terkait dengan perhitungan harga kamar hotel. Fungsi ini memanggil fungsi-fungsi updateHargaKamar(), updateTotalHargaKamar(), updateTotalHargaBreakfast(), dan updateTotalHargaDiskon() secara berurutan.

    Algoritma:
    1. Fungsi ini memanggil fungsi updateHargaKamar() untuk memperbarui tampilan harga kamar.
    2. Selanjutnya, fungsi memanggil fungsi updateTotalHargaKamar() untuk menghitung dan memperbarui total harga kamar.
    3. Kemudian, fungsi memanggil fungsi updateTotalHargaBreakfast() untuk menghitung dan memperbarui total harga sarapan.
    4. Setelah itu, fungsi memanggil fungsi updateTotalHargaDiskon() untuk menghitung dan memperbarui total harga diskon.
*/

    updateHargaKamar();
    updateTotalHargaKamar();
    updateTotalHargaBreakfast();
    updateTotalHargaDiskon();
}

function handleHitungButton(){
/*
    Fungsi handleHitungButton()
    Fungsi ini bertanggung jawab untuk menangani penggunaan tombol "Hitung" yang bertujuan untuk menghitung total tagihan akhir
    berdasarkan semua nilai yang telah dimasukkan atau diubah oleh pengguna.

    Algoritma:
    1. Ketika pengguna menekan tombol "Hitung", fungsi ini akan dipanggil.
    2. Fungsi kemudian memanggil fungsi updateTotalTagihan() untuk menghitung total tagihan akhir
    berdasarkan semua nilai yang telah dimasukkan atau diubah oleh pengguna.
*/

    updateTotalTagihan();
}

function handleLengthID(element){
/*
    Fungsi handleLengthID(element)
    Fungsi ini bertanggung jawab untuk menangani validasi panjang ID yang dimasukkan oleh pengguna.
    Jika panjang ID yang dimasukkan kurang dari 16 karakter atau bukan merupakan angka, maka nilai input akan dihapus.

    Parameter:
    * element: Objek elemen HTML yang dipilih oleh pengguna, seperti input teks.
    
    Algoritma:
    1. Fungsi ini mengambil nilai dari elemen input dan menyimpannya dalam variabel value.
    2. Fungsi memeriksa apakah nilai value bukan merupakan angka (diperiksa dengan isNaN()) atau panjangnya kurang dari 16 karakter.
    3. Jika salah satu kondisi terpenuhi, nilai input (element.value) akan diatur menjadi string kosong (""), sehingga menghapus nilai yang dimasukkan oleh pengguna.
*/
    let value = element.value;
    if(isNaN(value) || value.length < 16){
        element.value = "";
    }
}

function handleInvalidID(element){
/*
    Fungsi handleInvalidID(element)
    Fungsi ini bertanggung jawab untuk menangani validasi ID yang dimasukkan oleh pengguna yang tidak memenuhi syarat. 
    Jika ID yang dimasukkan tidak tepat, pesan kesalahan akan ditampilkan kepada pengguna.

    Parameter:
    * element: Objek elemen HTML yang dipilih oleh pengguna, seperti input teks.
    
    Algoritma:
    1. Fungsi ini menggunakan metode setCustomValidity() dari elemen input untuk menetapkan pesan kesalahan kustom.
    2. Pesan kesalahan yang ditetapkan adalah "isian salah..data harus 16 digit", yang menunjukkan kepada pengguna bahwa
       data yang dimasukkan harus memiliki panjang 16 digit.
*/
    element.setCustomValidity(" isian salah..data harus 16 digit");
}

function handleCancelButton(){
/*
    Fungsi handleCancelButton()
    Fungsi ini bertanggung jawab untuk menangani penggunaan tombol "Batal". 
    Ketika tombol "Batal" ditekan, pengguna akan dialihkan kembali ke halaman utama web hotel (misalnya, http://localhost/web-hotel).

    Algoritma:
    1. Ketika pengguna menekan tombol "Batal", fungsi ini akan dipanggil.
    2. Fungsi menggunakan window.location.href untuk mengatur URL halaman saat ini ke URL yang ditentukan,
       dalam hal ini, halaman utama web hotel.
*/
    window.location.href = 'http://localhost/web-hotel';
}