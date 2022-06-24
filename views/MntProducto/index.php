<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../../mainhead.php"); ?>
  <title>Mantenimiento de Producto</title>
</head>

<body>

  <?php require_once("../../mainheader.php"); ?>
  <?php require_once("../../mainaside.php"); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Producto</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Mantenimiento</li>
          <li class="breadcrumb-item active">Producto</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mantenimiento de producto</h5>
              <p><button type="button" id="btn-nuevo" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo registro</button></p>    

              <!-- Table with producto rows -->
              <table id="producto-data" class="table responsive" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <!-- End Table with producto rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Modal mantenimiento -->
  <?php require_once("modalmantenimiento.php"); ?>

  <?php require_once("../../mainjs.php"); ?>

  <script type="text/javascript" src="mntproducto.js"></script>

</body>

</html>