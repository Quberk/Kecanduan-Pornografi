
<!doctype html>
<html lang="en">

<head>
    @include('Admin.Template.head')
</head>

<body>

       <!-- ################# Header Starts Here#######################--->

    <header id="menu-jk">
        @include('Admin.Template.header')
    </header>
     <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Histori Diagnosa</h2>
                       </div>
                   </div>
               </div>


        <!-- ######## Table ####### -->
         <div class="table-wrapper">
            <table class="fl-table">

                <thead>
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Kepastian</th>
                    <th>Tingkat Kecanduan</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($hasil as $h)

                    <tr>
                        <td>{{$h->email}}</td>
                        <td>{{$h->nama}}</td>
                        <td>{{$h->kepastian}}</td>
                        <td>{{$h->tingkat_kecanduan}}</td>
                    </tr>

                    @endforeach


                <tbody>
            </table>
        </div>

        <!-- ################# Our Session Starts Here#######################--->
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
