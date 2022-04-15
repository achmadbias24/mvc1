<div class="container">
  <?php Flasher::flash(); ?>
  <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-success mt-3">Kembali</a>
  <div class="card mt-3">
    <div class="card-header bg-primary text-white">
      Matkul yang Diikuti Mahasiswa
    </div>
    <div class="card-body">
      <form action="<?= BASEURL; ?>/mahasiswa/tambahMatkul" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
        <div class="form-group">
          <label for="jurusan">Mata Kuliah yang Tersedia</label>
          <select class="form-control" id="matkul" name="matkul">
            <option></option>
            <?php foreach ($data['cmkl'] as $cmkl) : ?>
              <option value="<?= $cmkl['ID_MATKUL'] ?>"><?= $cmkl['NAMA_MATKUL']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>