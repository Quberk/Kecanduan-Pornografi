
<!doctype html>
<html lang="en">

<head>
    @include('Pakar.Template.head')
</head>

<body>

       <!-- ################# Header Starts Here#######################--->

    <header id="menu-jk">
        @include('Pakar.Template.header')
    </header>
     <!--  ************************* Page Title Starts Here ************************** -->
               <div class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2>Daftar Gejala</h2>
                       </div>
                   </div>
               </div>


        <!-- ######## Table ####### -->
         <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <a href="{{route('createGejala')}}" class="btn btn-success" style="margin: 5px">Tambah Gejala</a>
                </thead>

                <thead>
                <tr>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Pertanyaan</th>
                    <th>Nilai CF</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($gejala as $g)

                    <tr>
                        <td>{{$g->kode_gejala}}</td>
                        <td>{{$g->nama_gejala}}</td>
                        <td>{{$g->pertanyaan}}</td>
                        <td>{{$g->nilai_cf}}</td>
                        <td>

                            <a href="{{$g->id}}/editGejala" class="btn btn-success">Edit</a>
                            <form action="/pakar/{{$g->id}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-success-red" value="Delete">
                            </form>
                        </td>
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
