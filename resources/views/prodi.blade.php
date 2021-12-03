<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["level"])){
return redirect("/");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>TRACER ALUMNI | PRODI</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



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
  <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4" href="#">UKSW</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-4" href="/logout">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                PROFIL
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="prodi_data">
                <span data-feather="file"></span>
                DATA
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="container">
          <h3 class="text-dark mb-4">Profile</h3>
          <div class="row mb-3">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-3">
                    <div class="card-header py-3">
                      <p class="text-primary m-0 font-weight-bold"></p>
                    </div>
                    <div class="card-body">
                      <form action="/update_prodi" method="post">
                        @csrf
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group"><label for="idadmin"><strong>ID</strong></label>
                              <input class="form-control" name="id" type="text" value="<?php echo $data->id; ?>" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group"><label for="username"><strong>Username</strong></label>
                              <input class="form-control" name="username" value="<?php echo $data->username; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group"><label for="email"><strong>Email</strong></label>
                              <input class="form-control" name="email" type="text" value="<?php echo $data->email; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group"><label for="password"><strong>Password</strong></label>
                              <input type="password" class="form-control" name="password" value="<?php echo $data->password; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <div class="form-group"><label for="name"><strong>Nama Prodi</strong></label>
                              <input class="form-control" name="name" type="text" value="<?php echo $data->prodi; ?>" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="editprofile">Simpan Perubahan</button></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      </main>
    </div>
  </div>


  <script src="../js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>