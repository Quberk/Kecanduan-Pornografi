<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Psycholog Medical Hospital Website Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="{{asset('Medical-Template/assets/images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('Medical-Template/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Medical-Template/assets/css/fontawsom-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Medical-Template/assets/plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('new-CSS/newcss.css')}}" />
</head>
<body>
    <div class="container">
        <form id="contact" action="{{route('postCreateGejala')}}" method="post">
            {{ csrf_field() }}
          <h3>Masukkan Gejala</h3>
          <fieldset>
            <input name="kode_gejala" placeholder="Kode Gejala" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input name="nama_gejala" placeholder="Nama Gejala" type="text" tabindex="2" required>
          </fieldset>
          <fieldset>
            <input name="pertanyaan" placeholder="Pertanyaan" type="text" tabindex="3" required>
          </fieldset>
          <fieldset>
            <input name="nilai_cf" placeholder="Nilai Cf" type="number" step="0.01" tabindex="4" required>
          </fieldset>
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>


      </div>
</body>
</html>
