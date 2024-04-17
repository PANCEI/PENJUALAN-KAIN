<?= $this->extend('layouts/index');  ?>
<?= $this->section('content');  ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMerah">
  Tambah Data
</button>
<!-- akhir buttopn trigger modak -->
<!-- Modal -->
<div class="modal fade " id="modalMerah" tabindex="-1" aria-labelledby="modalMerahLabel" aria-hidden="true">
  <div class="modal-dialog bg-secondary">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMerahLabel">Tambah Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-secondary">
            <div class="col-sm-12 col-xl-12">
        <form >
                        <div class="bg-secondary rounded h-100 p-4">
                     
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Masukan Menu">
                                <label for="floatingInput">Masukan menu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingPassword"
                                    placeholder="Urutan Menu">
                                <label for="floatingPassword">Urutan Menu</label>
                            </div>
                           
                        </div>
                    </div>
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </div>
    </form>
  </div>
</div>
<?= $this->endSection();  ?>
<?= $this->section('js');  ?>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
// $('#modalMerah').find('form').submit(function(e) {
//     e.preventDefault(); // Mencegah form dari submit biasa
//     Swal.fire({
//         title: 'Berhasil!',
//         text: 'Data telah berhasil disimpan.',
//         icon: 'success',
//         confirmButtonText: 'OK'
//     });
// });

</script>
<?= $this->endSection();  ?> 