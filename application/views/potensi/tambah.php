  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-newspaper"></i> <?= $title; ?></h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
          </div>
          <div class="card-body">
              <form action="<?php base_url('potensi/tambah/'); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Nama Potensi</label>
                      <input type="text" name="nama_potensi" class="form-control">
                      <?= form_error('nama_potensi', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <!-- <div class="form-group">
                      <label>Kategori Potensi</label>
                      <input type="text" name="kategori_potensi" class="form-control">
                      <?= form_error('kategori_potensi', '<small class="text-danger">', '</small>'); ?>
                  </div> -->

                  <div class="form-group">
                      <label for="id_kategori">Kategori Potensi</label>
                      <select class="form-control" name="id_kategori">
                          <option value="">---Pilih Kategori---</option>
                          <?php foreach ($kategori->result() as $ktgri) : ?>
                              <option value="<?= $ktgri->id_kategori; ?>"><?= $ktgri->jenis_kategori; ?></option>
                          <?php endforeach ?>
                      </select>
                      <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <!-- <div class="form-group">
                      <label>Wilayah Potensi</label>
                      <input type="text" name="wilayah_potensi" class="form-control">
                      <?= form_error('wilayah_potensi', '<small class="text-danger">', '</small>'); ?> -->
                  <div class="form-group">
                      <label for="id_wilayah">Wilayah Potensi</label>
                      <!-- <input type="text" class="form-control" id="wilayah_potensi" name="wilayah_potensi" value="<?php echo $potensi['wilayah_potensi']; ?>">
                            <?= form_error('wilayah_potensi', '<small class="text-danger">', '</small>'); ?> -->
                      <select class="form-control" name="id_wilayah">
                          <option value="">---Pilih Wilayah---</option>
                          <?php foreach ($wilayah as $wil) : ?>
                              <option value="<?= $wil['id_wilayah']; ?>"><?= $wil['nama_wilayah']; ?></option>
                          <?php endforeach ?>
                      </select>
                      <?= form_error('id_wilayah', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <!-- </div> -->
                  <div class="form-group">
                      <label>Video Potensi</label>
                      <input type="text" name="video_potensi" class="form-control">
                      <?= form_error('video_potensi', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <label>Tentang Potensi</label>
                          </div>
                          <div class="panel-body">
                              <textarea class="ckeditor" id="editor-custom" name="tentang_potensi"></textarea>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <label>Sejarah Potensi</label>
                          </div>
                          <div class="panel-body">
                              <textarea class="ckeditor" id="editor-custom" name="sejarah_potensi"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col">
                          <label>Pilih Foto Potensi</label>
                          <input type="file" name="foto_potensi" class="custom-file-input" id="file">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      <?= form_error('foto_potensi', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>


                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Tambah</button>
                  <a href="<?php echo base_url() . 'potensi' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
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
  <!-- setup selector -->
  <script>
      $('textarea.texteditor').ckeditor();
  </script>
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
  <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
      CKEDITOR.replace('editor-custom', {
          uiColor: '#537fbb'
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function() {

          $('#id_kategori').change(function() {
              var id = $(this).val();
              $.ajax({
                  url: "<?= base_url('kategori/tampilData'); ?>",
                  method: "POST",
                  data: {
                      id: id
                  },
                  async: true,
                  dataType: 'json',
                  success: function(data) {

                      var html = '';
                      var i;
                      for (i = 0; i < data.length; i++) {
                          html += '<option value=' + data[i].id_kategori + '>' + data[i].jenis_kategori + '</option>';
                      }
                      $('#sub_category').html(html);

                  }
              });
              return false;
          });

      });
  </script>