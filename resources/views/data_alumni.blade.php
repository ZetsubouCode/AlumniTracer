<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["level"])){
return redirect("/");
}
?>
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

    .centering {
      margin: 0;
      position: absolute;
      top: 50%;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">

    </header>
    <main class="px-3" style="  margin: 0;width:80%;
                              position: absolute;
                              top: 50%; left:25%;
                              -ms-transform: translateY(-50%);
                              transform: translateY(-50%);">

      <div class="row">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body text-dark">
              <h5 class="card-title mb-3">Data Alumni</h5>

              <form action="/" method="get">
                <center>
                  <table style="width: 100%;">
                    <tr>
                      <td>
                        NIM
                      </td>
                      <td>
                        <?php echo $data->nim; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        No ijazah
                      </td>
                      <td>
                        <?php echo $data->no_ijasah; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Nama
                      </td>
                      <td>
                        <?php echo $data->nama; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Prodi
                      </td>
                      <td>
                        <?php echo $data->prodi; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fakultas
                      </td>
                      <td>
                        <?php echo $data->fakultas; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Tanggal Lulus
                      </td>
                      <td>
                        <?php echo $data->tanggal_lulus; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Histori
                      </td>
                      <td>
                        <?php echo $data->histori; ?>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <center><button type="submit" class="btn btn-primary col-sm-3 fw-bold fs-5 font-monospace">OK</button></center>
                      </td>
                    </tr>
                  </table>
                </center>
            </div>



            </form>

          </div>
        </div>
      </div>
  </div>
  </main>

  <footer class="mt-auto text-white-50">

  </footer>
  </div>



</body>

</html>