<footer class="main-footer">
        <div class="footer-left">
          <a href="#">&copy;   <b>Aptika DKISP</b></a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
 
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <!-- Script Luar -->

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>

<script>
		$('.tombol-hapus').on('click', function(e) {
		const href = $(this).attr('href');
		e.preventDefault();
			Swal.fire({
				title: 'Informasi',
				text: "Apa anda yakin ingin menghapus data ini ?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus data ini !'
				}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			})
		});
</script>
<?php if($this->session->flashdata('msg') == 'success'): ?>
		<script>
		 Swal.fire(
				'Informasi',
				'Data Berhasil Ditambahkan !',
				'success'
			);	
  		</script>
	<?php elseif($this->session->flashdata('msg') == 'success-hapus'): ?>
		<script>
			Swal.fire(
				'Informasi',
				'Data Berhasil Dihapus !',
				'success'
			);
		</script>
	<?php elseif($this->session->flashdata('msg') == 'role'): ?>
		<script>
			Swal.fire(
				'Informasi',
				'Hak Akses Anda Tidak Mencukupi !',
				'warning'
			);
		</script>
	<?php elseif($this->session->flashdata('msg') == 'info'): ?>
		<script>
			Swal.fire(
				'Informasi',
				'Data Berhasil Diubah !',
				'success'
			);
		</script>
	<?php elseif($this->session->flashdata('msg') == 'error'): ?>
		<script>
			Swal.fire(
				'Informasi',
				'Maaf Data Anda Gagal Disimpan !',
				'error'
			);
		</script>
		<?php else: ?>
	<?php endif;  ?>