  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-mountain"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('galeri/tambah/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-row">
                      <div class="col">
                          <label><strong>Plih Gambar (maksimal ukuran gambar 2Mb)</strong></label>
                          <div class="custom-file">
                              <input type="file" name="foto_galeri" class="custom-file-input" id="file">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              <?= form_error('foto_galeri', '<small class="text-danger pl-3">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                              <label><strong>Keterangan Foto Galeri</strong></label>
                              <input type="text" name="keterangan_galeri" class="form-control">
                              <?= form_error('keterangan_galeri', '<small class="text-danger">', '</small>'); ?>
                          </div>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                          <a href="<?php echo base_url() . 'galeri' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i> Kembali</a>
              </form>

          </div>
      </div>
  </div>
  <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <!-- panggil jquery -->
  <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

  <!-- panggil ckeditor.js -->
  <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
  <!-- panggil adapter jquery ckeditor -->
  <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>

  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>
  <script type="text/javascript">
      var uploadField = document.getElementById("file");
      uploadField.onchange = function() {
          if (this.files[0].size > 2000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
              alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
              this.value = "";
          };
      };
  </script>
  <script>
      var resizefunc = [];
  </script>