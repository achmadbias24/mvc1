<div class="container mt-3">
  <?php Flasher::flash(); ?>
  <div class="row mb-3">
    <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </div>
    </form>
  </div>

  <h3>Daftar Mahasiswa</h3>
  <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
    Tambah Data Mahasiswa
  </button>

  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">NRP</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($data['mhs'] as $mhs) : ?>
        <tr>
          <th scope="row"><?= $no; ?>
          </th>
          <td><?= $mhs['NAMA']; ?></td>
          <td><?= $mhs['NRP']; ?></td>
          <td><?= $mhs['NAMA_JURUSAN']; ?></td>
          <td class="d-flex justify-content-center">
            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['ID']; ?>" class="btn btn-danger float-right mr-2" onclick="return confirm('yakin?');">Hapus</a>
            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['ID']; ?>" class="btn btn-success float-right tampilModalUbah mr-2" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['ID']; ?>">Ubah</a>
            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['ID']; ?>" class="btn btn-primary float-right mr-2">Detail</a>
            <form action="<?= BASEURL; ?>/mahasiswa/cariMatkul" method="POST">
              <button class="btn btn-warning float-right mr-2" type="submit" name="pilih" value="<?= $mhs['ID'] ?>">Tambah Data Matkul</button>
            </form>
            <!-- <a href="<?= BASEURL; ?>/mahasiswa/cariMatkul/<?= $mhs['ID']; ?>" class="btn btn-warning float-right mr-2">Tambah Data Matkul</a> -->
          </td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nrp">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
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