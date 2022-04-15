<div class="container">
  <h3 class="mt-3 mb-3">Daftar Mata Kuliah yang Diikuti Mahasiswa</h3>
  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Matkul yang Diikuti</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php $no = 1;
        foreach ($data['mkmhs'] as $mkmhs) : ?>
          <th scope="row">1</th>
          <td><?= $mkmhs['NAMA']; ?></td>
          <td><?= $mkmhs['NAMA_MATKUL']; ?></td>
        <?php $no++;
        endforeach; ?>
      </tr>
    </tbody>
  </table>
</div>