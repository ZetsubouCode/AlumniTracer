<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Tracer Alumni</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-secondary">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    
  </header>

  <main class="px-5">

    <div class="row">
        <div class="col-sm-5" style="margin-left:120px;">
          <div class="card border-light">
            <div class="card-body text-dark bg-info border-dark">
              <h5 class="card-title">Admin</h5>
              <p class="card-text">Silakan pilih opsi ini jika anda memiliki akun admin.</p>
              <a href="{{url('/login_admin')}}" class="btn btn-primary">Login Page</a>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="card border-light">
            <div class="card-body text-dark bg-info border-dark">
              <h5 class="card-title">Prodi</h5>
              <p class="card-text">Silakan pilih opsi ini jika anda memiliki akun prodi.</p>
              <a href="{{url('/login_prodi')}}" class="btn btn-primary">Login Page</a>
            </div>
          </div>
        </div>
        <center>
        <div class="col-sm-5" style="margin-top:10px;">
          <div class="card border-light">
            <div class="card-body text-dark bg-info border-dark">
              <h5 class="card-title">Cari Alumni</h5>
              <p class="card-text">Silakan pilih opsi ini jika anda ingin mencari data alumni.</p>
              <a href="{{url('/search')}}" class="btn btn-primary">Search Page</a>
            </div>
          </div>
        </div>
        </center>
      </div>
  </main>

  <footer class="mt-auto text-white-50">
    
  </footer>
</div>


    
  </body>
</html>
