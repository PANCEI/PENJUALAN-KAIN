<?= $this->extend('layouts/index');  ?>
<?= $this->section('content');  ?>
<div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Sub Menu</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sub Menu</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                    <?php foreach ($sub_menu as $sb): ?> 
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $sb['nama_sub_menu'] ?></td>
                                            <td><?= $sb['url'] ?></td>
                                            <td><?= $sb['icon'] ?></td>
                                            <td>
                                            <?php if($sb['active']==1): ?>
                                            <button type="button" class="btn btn-success rounded-pill m-2">Active</button>
                                            <?php elseif($sb['active']==0): ?>
                                            <button type="button" class="btn btn-danger rounded-pill m-2">Danger</button>
                                             <?php endif;?>   
                                            </td>
                                            <td><?= $sb['nama_menu'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-square btn-primary m-2 delete-menu" data-id="<?= $sb ['id_sub_user_menu']?>"><i class="fa fa-trash"></i></button>
                                            <button type="button" class="btn btn-square btn-primary m-2 delete-menu" data-id="<?= $sb['id_sub_user_menu']?>" data-bs-toggle="modal" data-bs-target="#EditSub<?= $sb['id_sub_user_menu'] ?>"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
<div class="modal fade " id="EditSub<?= $sb['id_sub_user_menu'] ?>" tabindex="-1" aria-labelledby="EditSubLabel<?= $sb['id_sub_user_menu'] ?>" aria-hidden="true">
  <div class="modal-dialog bg-secondary">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h5 class="modal-title" id="EditSubLabel">Edit Sub Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-secondary">
            <div class="col-sm-12 col-xl-12">
        <form  method="POST" action="/menu/editSubMenu">
                        <div class="bg-secondary rounded h-100 p-4">
                     <input type="hidden" value="<?= $sb['id_sub_user_menu'] ?>" name="id_sub_user_menu">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_sub_menu"
                                    placeholder="Masukan Nama Sub Menu" required name="nama_sub_menu" value="<?= $sb['nama_sub_menu'] ?>">
                                <label for="nama_sub_menu">Sub Menu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="url"
                                    placeholder="Masukan Url" required name="url" value="<?= $sb['url'] ?>">
                                <label for="url">Url</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="icon"
                                    placeholder="Masukan Icon" required name="icon" value="<?= $sb['icon'] ?>">
                                <label for="icon">Icon</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="urutan_menu" required name="id_menu">
                                <option value="<?= $sb['id_user_menu'] ?>"><?= $sb['nama_menu'] ?></option>
                                    <?php foreach ($menu as $m): ?>
                                        <?php if($m['id_user_menu'] != $sb['id_user_menu']): ?>
                                            <option value="<?= $m['id_user_menu'] ?>"><?= $m['nama_menu'] ?></option>
                                        <?php endif; ?>
                                
                                        <?php endforeach; ?>
                                    <!-- Add more options as needed -->
                                </select>
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
<!-- akhir modal -->
                                        <?php $no++ ?>
                                        <?php endforeach; ?>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?= $this->endSection();  ?>
<?= $this->section('js');  ?>
<script>
    
</script>
<?= $this->endSection();  ?> 