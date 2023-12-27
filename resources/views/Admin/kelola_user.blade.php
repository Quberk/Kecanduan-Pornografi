
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
                           <h2>Daftar User</h2>
                       </div>
                   </div>
               </div>


        <!-- ######## Table ####### -->
         <div class="table-wrapper">
            <table class="fl-table">
                <!--<thead>
                    <a href="{{route('createGejala')}}" class="btn btn-success" style="margin: 5px">Tambah User</a>
                </thead>-->

                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($user as $u)

                    <tr>
                        <td>{{$u->nama}}</td>
                        <td>{{$u->umur}}</td>
                        <td>{{$u->alamat}}</td>
                        <td>{{$u->nomor_hp}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->password}}</td>
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
