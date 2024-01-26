<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Daftar Pasien Poli</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Obat</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Obat</h3>

                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'tampilPasien.php' ?>
                                <!-- TAMPILKAN DATA OBAT DI SINI -->

                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- / -->


    <div class="modal fade" id="periksaModal" role="dialog" aria-labelledby="periksaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="periksaModalLabel">Form Periksa Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/poliklinikg/pages/periksa/createPeriksa.php">
                        <input type="hidden" name="id_pasien" id="periksa_id_pasien">
                        <input type="hidden" name="id_daftar_poli" id="id_daftar_poli">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_tanggal_periksa">Tanggal Periksa</label>
                                    <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit_catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="edit_obat">Obat</label>
                            <select name="obat[]" id="obat" class="form-control obatPeriksa" multiple>
                                <?php
                                include 'koneksi.php';
                                $query_obat = "SELECT * FROM obat";
                                $db_obat = mysqli_query($mysqli, $query_obat);

                                while ($obat = mysqli_fetch_assoc($db_obat)) {
                                ?>
                                    <option value="<?= $obat['id'] ?>"><?= $obat['nama_obat'] ?> - <?= $obat['harga'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="submit_periksa">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- ... (existing code) ... -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Update Periksa Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/poliklinikg/pages/periksa/updatePeriksa.php">
                    <input type="hidden" name="id_pasien" id="edit_id_pasien">
                    <input type="hidden" name="id_daftar_poli" id="edit_id_daftar_poli">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_nama">Nama</label>
                                <input type="text" class="form-control" id="edit_nama" name="nama" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_tanggal_periksa">Tanggal Periksa</label>
                                <input type="datetime-local" class="form-control" id="edit_tgl_periksa" name="tgl_periksa" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_catatan">Catatan</label>
                        <textarea class="form-control" id="edit_catatan" name="catatan" rows="3" value="yoiii"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_obat">Obat</label>
                        <select name="obat[]" id="obat" class="form-control obatEdit" multiple>
                            <?php
                            $query_obat = "SELECT * FROM obat";
                            $db_obat = mysqli_query($mysqli, $query_obat);

                            while ($obat = mysqli_fetch_assoc($db_obat)) {
                            ?>
                                <option value="<?= $obat['id'] ?>"><?= $obat['nama_obat'] ?> - <?= $obat['harga'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit_update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Tangkap klik pada tombol "Periksa"
        $('.btn-success').click(function() {
            // Ambil nilai ID pasien dari atribut data-id tombol
            var id_pasien = $(this).data('id');

            // Set nilai ID pasien ke elemen input periksa_id_pasien pada modal
            $('#periksa_id_pasien').val(id_pasien);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Tangkap klik pada tombol "Edit"
        $('.edit-btn').click(function() {
            var id_pasien = $(this).data('id');
            var selectedPasien = <?php echo json_encode($data); ?>;
            var pasien = selectedPasien.find((row) => row.id == id_pasien);

            $('#edit_id_pasien').val(id_pasien);
            $('#edit_id_daftar_poli').val(pasien.id_daftar_poli);
            $('#edit_nama').val(pasien.nama);
            $('#edit_tgl_periksa').val(pasien.tgl_periksa);
            $('#edit_catatan').val(pasien.catatan);


        });

        $('.periksa-btn').click(function() {
            var id_pasien = $(this).data('id');
            var selectedPasien = <?php echo json_encode($data); ?>;
            var pasien = selectedPasien.find((row) => row.id == id_pasien);

            $('#periksa_id_pasien').val(id_pasien);
            $('#id_daftar_poli').val(pasien.id_daftar_poli);
            $('#nama').val(pasien.nama);
            $('#tgl_periksa').val(pasien.tgl_periksa);
            $('#catatan').val(pasien.catatan);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.obatPeriksa').select2({
            placeholder: "Select"
        });
        $('.obatEdit').select2({
            placeholder: "Select"
        });

    });
</script>