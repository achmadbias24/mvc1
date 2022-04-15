<?php

class Mahasiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT a.*,b.NAMA_JURUSAN FROM mahasiswa a join jurusan b on a.ID_JURUSAN=b.ID_JURUSAN');
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT a.*,b.NAMA_JURUSAN FROM mahasiswa a join jurusan b on a.ID_JURUSAN=b.ID_JURUSAN WHERE ID=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                  (null, :ID_JURUSAN, :NAMA, :NRP, :EMAIL )";

        $this->db->query($query);
        $this->db->bind('ID_JURUSAN', $data['jurusan']);
        $this->db->bind('NAMA', $data['nama']);
        $this->db->bind('NRP', $data['nrp']);
        $this->db->bind('EMAIL', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE ID = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    ID_JURUSAN = :jurusan,
                    NAMA = :nama,
                    NRP = :nrp,
                    EMAIL = :email
                  WHERE ID = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT a.*,b.NAMA_JURUSAN FROM mahasiswa a join jurusan b on a.ID_JURUSAN=b.ID_JURUSAN WHERE NAMA LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function tambahDataMatkul($data)
    {
        $query = "INSERT INTO detail
                    VALUES
                  (:ID_MATKUL, :ID)";

        $this->db->query($query);
        $this->db->bind('ID_MATKUL', $data['matkul']);
        $this->db->bind('ID', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMatkul($id)
    {
        $this->db->query('SELECT c.ID_MATKUL, c.NAMA_MATKUL FROM mahasiswa a join jurusan b on a.ID_JURUSAN=b.ID_JURUSAN join matkul c on b.ID_JURUSAN=c.ID_JURUSAN WHERE a.ID=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
}
