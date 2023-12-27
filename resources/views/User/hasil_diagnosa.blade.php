
<!doctype html>
<html lang="en">

<head>
    @include('Template/head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/diagnosa.js') }}"></script>
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
               <h2>Hasil Diagnosa</h2>
           </div>
       </div>
    </div>

    <!----Pertanyaan yang muncul dari Javascript-------------------->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col" id ="keterangan-container">
                    <div>
                        Nama
                    </div><br>
                    <div>
                        Umur
                    </div><br>
                    <div>
                        Kepastian
                    </div><br>
                    <div>
                        Tingkat Kecanduan
                    </div><br>
                    <div>
                        Solusi
                    </div>

                </div>

                <div class="col" id="data-container">
                    <div id="nama">
                        : Marten
                    </div><br>
                    <div id="umur">
                        : 18
                    </div><br>
                    <div id="kepastian">
                        : 89%
                    </div><br>
                    <div id="tingkat_kecanduan">
                        : Berat
                    </div><br>
                    <div id="solusi">
                        : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="copy">
        <div class="container">
            <a href="https://www.smarteyeapps.com/">2015 &copy; All Rights Reserved | Designed and Developed by Smarteyeapps</a>

            <span>
            <a><i class="fab fa-github"></i></a>
            <a><i class="fab fa-google-plus-g"></i></a>
            <a><i class="fab fa-pinterest-p"></i></a>
            <a><i class="fab fa-twitter"></i></a>
            <a><i class="fab fa-facebook-f"></i></a>
    </span>
        </div>

</div>

</body>


@include('Template/scripts')


</html>
