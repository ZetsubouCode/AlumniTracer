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
  <title>TRACER ALUMNI | ADMIN</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-5" href="#">UKSW</a>
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
              <a class="nav-link" href="admin">
                <span data-feather="home"></span>
                PROFIL
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="file"></span>
                DATA
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin_prodi">
                <span data-feather="file"></span>
                PRODI
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <div class="btn-toolbar mb-2 mb-md-0">
            <form action="/search_data" method="post">
              @csrf
              <input type="text" placeholder="Search.." name="search">
              <select name="filter" id="sort" required>
                <option value="">Filter by</option>
                <option value='nim'>Nim</option>
                <option value='no_ijasah'>No. Ijasah</option>
                <option value='nama'>Nama</option>
                <option value='tanggal_lulus'>Tanggal Lulus</option>
                <option value='histori'>Histori</option>

              </select>
              <button type="submit"><i class="material-icons">&#xE8B6;</i></button>
            </form>
          </div>
        </div>

        <h2>
          Data Alumni
          <a href="{{url('/admin_data/add')}}">
            <button class="btn btn-success" style="width:100px">
              <i class="material-icons" style="margin-left:-45px;">&#xe146;</i>
              <div style="margin-top:-30px; margin-left:15px;">Add</div>
            </button>
          </a>
        </h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">NIM</th>
                <th scope="col">No Ijasah</th>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Tanggal lulus</th>
                <th scope="col">Histori</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $key => $value) {

                print("<tr>
            <td>{$value->nim}</td>
            <td>{$value->no_ijasah}</td>
            <td>{$value->nama}</td>
            <td>{$value->prodi}</td>
            <td>{$value->fakultas}</td>
            <td>{$value->tanggal_lulus}</td>
            <td>{$value->histori}</td>
            <td>
            <a href=\"/admin_data/update/$value->nim\" class=\"edit\" title=\"Edit\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE254;</i></a>
            <a href=\"/admin_data/delete/$value->nim\" class=\"delete\" title=\"Delete\" data-toggle=\"tooltip\"><i class=\"material-icons\">&#xE872;</i></a>
            </td>
          </tr>");
              }
              ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>


  <script src="../js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>