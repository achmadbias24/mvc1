<div class="container">

  <?php Flasher::flash(); ?>

  <h3 class="mt-3">Daftar Mata Kuliah</h3>
  <button type="button" class="btn btn-primary tombolTambahData mt-3 mb-2" data-toggle="modal" data-target="#formModal">
    Tambah Data Mata Kuliah
  </button>
  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Matkul</th>
        <th scope="col">Jurusan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($data['mkl'] as $mkl) : ?>
        <tr>
          <th scope="row"><?= $no; ?></th>
          <td><?= $mkl['NAMA_MATKUL']; ?></td>
          <td><?= $mkl['NAMA_JURUSAN']; ?></td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</div>

<!-- modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/matkul/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <option value="1">Teknik Informatika</option>
              <option value="2">Teknik Mesin</option>
              <option value="3">Teknik Industri</option>
              <option value="4">Teknik Pangan</option>
              <option value="5">Teknik Planologi</option>
              <option value="6">Teknik Lingkungan</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>