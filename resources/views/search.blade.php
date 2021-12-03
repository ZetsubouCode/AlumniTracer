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
        <center>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-dark">
              <h5 class="card-title mb-3">Masukan Data Anda</h5>
              <form action="/search_result" method="post">
              @csrf
                <div class="row mb-3">
                  <label for="inputNim" class="col-sm-2 col-form-label ">NIM</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nim" name="nim">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNama" class="col-sm-2 col-form-label">NAMA</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputProdi" class="col-sm-2 col-form-label">PRODI</label>
                  
                  <div class="col-sm-3">
                    <select name="prodi" id="prodi" required> 
                    <option value="">-</option>
                    <?php
                    foreach($data as $key => $value){
                    
                          print("<option value='{$value->id}'>{$value->nama}</option>");
                        }
                    ?>
                    </select>
                  </div>
                </div>
                
                <a href="/"><button type="button" class="btn btn-danger col-sm-3 fw-bold fs-5 font-monospace">Kembali</button></a>
                <button type="submit" class="btn btn-primary col-sm-3 fw-bold fs-5 font-monospace">Cari</button>
              </form>
              
            </div>
          </div>
        </div>
        </center>
      </div>
  </main>

  <footer class="mt-auto text-white-50">
    <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
  </footer>
</div>


    
  </body>
</html>
