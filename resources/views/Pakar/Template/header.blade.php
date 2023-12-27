<header id="menu-jk">
    <nav  class="">
        <div class="container">
            <div class="row nav-ro">
               <div class="col-lg-3 col-md-4 col-sm-12">
                   <img src="{{asset('Medical-Template/assets/images/Logo_Kecanduan.png')}}" alt="">
                   <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
               </div>
               <div id="menu" class="col-lg-7 col-md-8 d-none d-md-block no-padding">
                   <ul>
                        <li><a href="{{route('beranda')}}">Beranda</a></li>
                        <li><a href="{{route('kelolagejala')}}">Kelola Gejala</a></li>
                        <li><a href="{{route('kelolaKaidah')}}">Kelola Kaidah</a></li>
                    </ul>
               </div>
               <div class="col-sm-2 d-none d-lg-block">
                <form id="logout-form" action="{{ route('postLogout') }}" method="POST">
                    {{ csrf_field() }}
                   <button class="btn btn-success">Logout</button>
                </form>
               </div>
            </div>
        </div>
    </nav>
</header>
