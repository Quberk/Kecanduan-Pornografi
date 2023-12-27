<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="{{asset('Login-template/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="{{route('postRegister')}}" method="POST">
			{{ csrf_field() }}
			<h1>Buat Akun</h1>
			<input name = "nama" type="text" placeholder="Nama" />
			<input name = "email" type="email" placeholder="Email" />
			<input name = "password" type="password" placeholder="Password" />
            <input name = "umur" type="number" placeholder="Umur"/>
            <input name = "alamat" type="text" placeholder="Alamat"/>
            <input name = "no_hp" type="number" placeholder="Nomor Hp"/>
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{route('postLogin')}}" method="POST">
             {{ csrf_field() }}
			<h1>Login</h1>
			<input name="email" value="{{Session::get('email')}}" type="email" placeholder="Email" />
			<input name="password" type="password" placeholder="Password" />
			<button>Login</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang Kembali!</h1>
				<p>Untuk tetap terhubung dengan kami silahkan lakukan Login</p>
				<button class="ghost" id="signIn">Login</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Halo Kawan!</h1>
				<p>Masukkan data-datamu dan memulailah bersama kami</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- partial -->
  <script  src="{{asset('Login-template/script.js')}}"></script>

</body>
</html>


