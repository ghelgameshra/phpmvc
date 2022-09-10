<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted"><?= $data['mhs']['nim']; ?></h6>
            <p class="list-group-item"><?= $data['mhs']['email']; ?></p>
            <p class="list-group-item"><?= $data['mhs']['jurusan']; ?></p>

            <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>
</div>