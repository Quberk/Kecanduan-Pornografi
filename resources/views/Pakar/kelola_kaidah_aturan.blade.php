
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
                           <h2>Daftar Kaidah Aturan</h2>
                       </div>
                   </div>
               </div>


        <!-- ######## Table ####### -->
         <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <a href="{{route('createKaidah')}}" class="btn btn-success" style="margin: 5px">Tambah Kaidah</a>
                </thead>

                <thead>
                <tr>
                    <th>No</th>
                    <th>Kaidah Aturan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($kaidah as $k)

                    <tr>
                        <td>{{$k->no}}</td>
                        <td>{{$k->kaidah_aturan}}</td>
                        <td>

                            <a href="{{$k->id}}/editKaidah" class="btn btn-success">Edit</a>
                            <form action="/pakar/{{$k->id}}/kaidah" method="post">
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
