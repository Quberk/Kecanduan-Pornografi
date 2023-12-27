$(document).ready(function() {

    const urlParams = new URLSearchParams(window.location.search);
    const email = urlParams.get('email');
    const nama = urlParams.get('nama');
    const kepastian = urlParams.get('kepastian');
    const tingkatKecanduan = urlParams.get('tingkat_kecanduan');
    const umur = urlParams.get('umur');

    const namaElement = document.getElementById("nama");
    const umurElement = document.getElementById("umur");
    const kepastianElement = document.getElementById("kepastian");
    const tingkatKecanduanElement = document.getElementById("tingkat_kecanduan");
    const solusiElement = document.getElementById("solusi");

    namaElement.innerHTML = ': '+nama;
    umurElement.innerHTML = ': '+umur;
    kepastianElement.innerHTML = ': '+kepastian;
    tingkatKecanduanElement.innerHTML = ': '+tingkatKecanduan;

    //Tinggi Apa solusinya
    if (tingkatKecanduan == 'Tinggi'){
        solusiElement.innerHTML = ': Lakukan Kegiatan Positif seperti memperbanyak waktu bersama keluarga contohnya, menonton film di TV bersama atau berjalan-jalan ke taman bersama. Hal yang terpenting adalah dapat menciptakan keadaan yang nyaman dan menyenangkan dengan begitu perlahan-lahan kecanduan terhadap pornografi dapat hilang';
    }
    //Sedang Apa solusinya
    else if (tingkatKecanduan == 'Sedang'){
        solusiElement.innerHTML = ': Lakukan hal positif karena anda kecanduang Sedang';
    }
    //Rendah Apa solusinya
    else if (tingkatKecanduan == 'Rendah'){
        solusiElement.innerHTML = ': Tidak Perlu Khawatir';
    }
});




