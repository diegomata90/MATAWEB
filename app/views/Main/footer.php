        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Diego Mata 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Esta seguro que desea salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Logout" si usted esta seguro cerrar seción.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= FOLDER_PATH . '/main/logout' ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>	 

  <!-- Bootstrap core JavaScript-->
	<script src="<?= PATH_ASSETS . '/vendor/jquery/jquery.min.js' ?>"></script>
  <script src="<?= PATH_ASSETS . '/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= PATH_ASSETS . '/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= PATH_ASSETS . '/js/sb-admin-2.min.js' ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= PATH_ASSETS . '/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?= PATH_ASSETS . '/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>
  <script src="<?= PATH_ASSETS . '/vendor/chart.js/Chart.min.js' ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= PATH_ASSETS . '/js/demo/datatables-demo.js' ?>"></script>
  <script src="<?= PATH_ASSETS . '/js/demo/chart-area-demo.js' ?>"></script>
  <script src="<?= PATH_ASSETS . '/js/demo/chart-pie-demo.js' ?>"></script>



</body>

</html>