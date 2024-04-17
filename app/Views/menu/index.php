<?= $this->extend('layouts/index');  ?>
<?= $this->section('content');  ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMerah">
  Tambah Data
</button>
<!-- akhir buttopn trigger modak -->
<!-- awal table -->
<div class="col-sm-12 col-xl-12 mt-3">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Tuble Menu</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Urutan Menu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; ?>
                                  <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $m['nama_menu']; ?></td>
                                        <td><?= $m['urutan_menu']; ?></td>
                                        <td>
                                        <button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!-- akhir table -->
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
        <form  method="POST" action="/menu/tambahMenu">
                        <div class="bg-secondary rounded h-100 p-4">
                     
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_menu"
                                    placeholder="Masukan Menu" required name="nama_menu">
                                <label for="nama_menu">Masukan menu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="urutan_menu"
                                    placeholder="Urutan Menu" required name="urutan_menu">
                                <label for="urutan_menu">Urutan Menu</label>
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
$('#modalMerah').find('form').submit(function(e) {
e.preventDefault();
let namaMenu = $('#nama_menu').val();
let urutanMenu = $('#urutan_menu').val();
if(namaMenu == '' || urutanMenu == ''){
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Nama menu dan urutan menu tidak boleh kosong!',
      });
}else{
$.ajax({
    type: "POST",
    url: "<?= base_url('/menu/tambahMenu'); ?>",
    data: {
        nama_menu: namaMenu,
        urutan_menu: urutanMenu
    },
    success: function(response) {
      if(response == 'berhasil'){
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Menu berhasil ditambahkan!',
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        });
      }else if(response == 'gagal'){
        Swal.fire({
            icon: 'error',
            title: 'Gagal Di Masukan Database',
            text: 'Menu gagal!',
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        });
      }else{
        Swal.fire({
            icon: 'error',
            title: 'Gagal Verfikasi',
            text: 'Menu gagal verifikasi!',
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload(); // Reload halaman untuk melihat perubahan
            }
        });
      }

        console.log(response);
    },
    error: function(xhr, ajaxOptions, thrownError) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Terjadi kesalahan, menu tidak berhasil ditambahkan!',
        });
    }
});

}

});

</script>
<?= $this->endSection();  ?> 