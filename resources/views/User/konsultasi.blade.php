
<!doctype html>
<html lang="en">

<head>
    @include('Template/head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/konsultasi.js') }}"></script>
</head>

<body>

       <!-- ################# Header Starts Here#######################--->

    <header id="menu-jk">
        @include('Template/header_user')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </header>

     <!--  ************************* Page Title Starts Here ************************** -->

     <div class="page-nav no-margin row">
       <div class="container">
           <div class="row">
               <h2>Konsultasi</h2>
           </div>
       </div>
    </div>

    <!----Pertanyaan yang muncul dari Javascript-------------------->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col" id ="pertanyaan-container">
                    <h2>Konsultasi 1 - 14</h2><br>

                    <div id="pertanyaan">Siapakah</div><br>

                    <form>
                        <input type="radio" id="jawaban-tidakyakin" name="jawaban" value="tidakYakin">
                        <label for="jawaban-tidakyakin">Tidak yakin</label><br>

                        <input type="radio" id="jawaban-sedikityakin" name="jawaban" value="sedikitYakin">
                        <label for="jawaban-sedikityakin">Sedikit yakin</label><br>

                        <input type="radio" id="jawaban-cukupyakin" name="jawaban" value="cukupYakin">
                        <label for="jawaban-cukupyakin">Cukup yakin</label><br>

                        <input type="radio" id="jawaban-yakin" name="jawaban" value="yakin">
                        <label for="jawaban-yakin">Yakin</label><br>

                        <input type="radio" id="jawaban-sangatyakin" name="jawaban" value="sangatYakin">
                        <label for="jawaban-sangatyakin">Sangat yakin</label><br>
                    </form>

                    <div class="buttons">
                        <button id="prev" class="btn btn-success">Sebelumnya</button>
                        <button id="next" class="btn btn-success">Selanjutnya</button>
                        <button id="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>


@include('Template/scripts')


</html>
