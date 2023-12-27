$(document).ready(function() {

    let questions = [];
    let kodeGejala = [];
    let namaGejala = [];
    let nilaiCfPakar = [];
    let nilaiCfUser = [];
    let answers = [];
    let persentaseKepastian = 0;
    let tingkatKecanduan = 'Rendah';
    let namaUser = 'dwda';
    let emailUser = 'mdwdwaa@gmail.com'
    let umurUser = 10;

    //Mengambil data dari url yang dikirim Controller
    $.ajax({
        url: "/user/getPertanyaan",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);

          questions = data[0];
          kodeGejala = data[1];
          namaGejala = data[2];
          nilaiCfPakar = data[3];

          updateQuestion();
        }
    });

    //Mengambil Session
    $.ajax({
        type: "GET",
        url: "/session",
        success: function (response) {
            console.log(response);

            emailUser = response.session_email;
            namaUser = response.session_nama.nama;
            umurUser = response.session_umur.umur;

        },
        error: function (xhr) {
            console.log(xhr.responseText);
            // tampilkan pesan error pada halaman
        }
    });


    let currentQuestionIndex = 0;// variabel untuk menyimpan nomor pertanyaan saat ini

    // elemen HTML untuk menampilkan pertanyaan
    const questionElement = document.getElementById("pertanyaan");

    //Elemen Jawaban
    const answerTYElement = document.getElementById("jawaban-tidakyakin");
    const answerSeYElement = document.getElementById("jawaban-sedikityakin");
    const answerCYElement = document.getElementById("jawaban-cukupyakin");
    const answerYElement = document.getElementById("jawaban-yakin");
    const answerSYElement = document.getElementById("jawaban-sangatyakin");

    // elemen HTML untuk tombol
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    const submitButton = document.getElementById("submit");


    //Mengaktifkan Next button diawal, Prev & Submit nonaktif
    nextButton.style.display = 'block';
    prevButton.style.display = 'none';
    submitButton.style.display = 'none';

    //Menambahkan Listener untuk Button"
    prevButton.addEventListener("click", prevQuestion);
    nextButton.addEventListener("click", nextQuestion);

    answerTYElement.addEventListener("click", checkingAnswers);
    answerSeYElement.addEventListener("click", checkingAnswers);
    answerCYElement.addEventListener("click", checkingAnswers);
    answerYElement.addEventListener("click", checkingAnswers);
    answerSYElement.addEventListener("click", checkingAnswers);

    submitButton.addEventListener("click", prosesDiagnosa);

    //Mengakses H2 Konsultasi pada HTML
    const divElement = document.getElementById("pertanyaan-container");
    const konsultasiKeElement = divElement.querySelector("h2");

    // fungsi untuk menampilkan pertanyaan berikutnya
    function nextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            updateQuestion();
            prevNextButton();
        }
    }

    // fungsi untuk menampilkan pertanyaan sebelumnya
    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            updateQuestion();
            prevNextButton();
        }
    }

    //Mengecek Jawaban sebelumnya
    function checkAnswer(){

        if (answers[currentQuestionIndex] == "Tidak Yakin"){
            answerTYElement.checked = true;
            return;
        }
        else if (answers[currentQuestionIndex] == "Sedikit Yakin"){
            answerSeYElement.checked = true;
            return;
        }
        else if (answers[currentQuestionIndex] == "Cukup Yakin"){
            answerCYElement.checked = true;
            return;
        }
        else if (answers[currentQuestionIndex] == "Yakin"){
            answerYElement.checked = true;
            return;
        }
        else if (answers[currentQuestionIndex] == "Sangat Yakin"){
            answerSYElement.checked = true;
            return;
        }
    }

    //Memasukkan jawaban sekarang
    function answering(){
        if (answerTYElement.checked){//Tidak Yakin
            answers[currentQuestionIndex] = 'Tidak Yakin';
            nilaiCfUser[currentQuestionIndex] = 0.2;
        }
        else if (answerSeYElement.checked){//Sedikit Yakin
            answers[currentQuestionIndex] = 'Sedikit Yakin';
            nilaiCfUser[currentQuestionIndex] = 0.4;
        }
        else if (answerCYElement.checked){//Cukup yakin
            answers[currentQuestionIndex] = 'Cukup Yakin';
            nilaiCfUser[currentQuestionIndex] = 0.6;
        }
        else if (answerYElement.checked){//Yakin
            answers[currentQuestionIndex] = 'Yakin';
            nilaiCfUser[currentQuestionIndex] = 0.8;
        }
        else if (answerSYElement.checked){//Sangat Yakin
            answers[currentQuestionIndex] = 'Sangat Yakin';
            nilaiCfUser[currentQuestionIndex] = 1;
        }
        else{
            answers[currentQuestionIndex] = null;
            nilaiCfUser[currentQuestionIndex] = null;
        }
    }

    //Fungsi untuk mengecek apakah semua jawaban telah dijawab
    function checkingAnswers(){

        answering();

        let allNonNull = answers.every(function(element) {
            return element !== null;
        });

        //Jika sudah berada di akhir pertanyaan & semua pertanyaan sudah terjawab
        if ((currentQuestionIndex == (questions.length - 1)) && (allNonNull == true) && (answers.length > 0)
             && (answers.length == questions.length)){
            submitButton.style.display = 'block';
        }
        else{
            submitButton.style.display = 'none';
        }
    }

    function resetAnswers(){
        answerTYElement.checked = false;
        answerSeYElement.checked = false;
        answerCYElement.checked = false;
        answerYElement.checked = false;
        answerSYElement.checked = false;
    }

    //Mengatur Visibilitas Button Next & Previous beserta Button Submit
    function prevNextButton(){

        checkingAnswers();

        nextButton.style.display = 'block';
        prevButton.style.display = 'block';

        //Sembunyikan Button ketika sudah Max pertanyaan
        if (currentQuestionIndex == questions.length - 1){
            nextButton.style.display = 'none';
        }

        //Sembunyikan Button ketika sudah Min pertanyaan
        else if (currentQuestionIndex == 0){
            prevButton.style.display = 'none';
        }

    }

    // fungsi untuk memperbarui tampilan pertanyaan
    function updateQuestion() {
        questionElement.innerHTML = questions[currentQuestionIndex];
        konsultasiKeElement.innerText = 'Konsultasi ' +(currentQuestionIndex + 1) +'-'+questions.length;
        resetAnswers();
        checkAnswer();
    }

    //Fungsi untuk melakukan diagnosa berdsarkan kaidah"
    function prosesDiagnosa(){

        let hasilPerkalianCf = [];

        //Lakukan perkalian untuk tiap CF user dan CF Pakar sesuai dengan kode Gejala
        for(let i = 0; i < kodeGejala.length; i++){
            hasilPerkalianCf[i] = nilaiCfPakar[i] * nilaiCfUser[i];
        }

        console.log(hasilPerkalianCf);

        //Melakukan pengulangan untuk mecari nilai CF Combine dengan rumus
        // CF Combine = CF[H,E]old + CF[H,E]new * (1 - CF[H,E]old)
        cfOld = hasilPerkalianCf[0];
        for(let j = 1; j < kodeGejala.length; j++){
            cfOld = cfOld + (hasilPerkalianCf[j] * (1 - cfOld));
            console.log(cfOld);
        }

        console.log(cfOld);

        let cfPersentase = cfOld * 100;

        console.log(cfPersentase);

        //Memasukkan data yang akan dikirim ke Url PHP
        persentaseKepastian = cfPersentase+"%";

        if (cfPersentase <= 40){
            tingkatKecanduan = "Rendah";
        }
        else if (cfPersentase <= 80){
            tingkatKecanduan = "Sedang";
        }
        else{
            tingkatKecanduan = "Tinggi";
        }

        submitAnswers();

    }


    // fungsi untuk mengirim jawaban ke server untuk disimpan ke dalam database
    function submitAnswers() {
        $.ajax({
            type: 'POST',
            url: '/user/store-data',
            data: {
                email: emailUser,
                nama: namaUser,
                kepastian: persentaseKepastian,
                tingkat_kecanduan: tingkatKecanduan,
                umur: umurUser
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // tampilkan pesan sukses dan reset jawaban ke nilai awal
                alert('Data Berhasil dimasukkan ke server');

                window.location.href = '/user/hasilDiagnosa?email=' + emailUser + '&nama=' + namaUser + '&kepastian=' + persentaseKepastian + '&tingkat_kecanduan=' + tingkatKecanduan  + '&umur=' + umurUser;
            },
            error: function(xhr) {
                // tampilkan pesan error jika terjadi kesalahan saat mengirim jawaban
                alert(xhr.responseText);
            }
        });
    }
});
