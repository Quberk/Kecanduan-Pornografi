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
        <form id="contact" action="{{route('postCreateKaidah')}}" method="post">
            {{ csrf_field() }}
          <h3>Masukkan Kaidah Aturan</h3>
          <fieldset>
            <input name="no" placeholder="Nomor Kaidah" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input name="kaidah_aturan" placeholder="Kaidah Aturan" type="text" tabindex="2" required>
          </fieldset>
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>


      </div>
</body>
</html>
