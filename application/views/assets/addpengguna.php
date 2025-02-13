<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-tags mr-2"></i> Tambah Pengguna Baru
  </div>
  <div class="card-body">
    <form action="admin/savepengguna" method="post">
        <div class="form-group ">
          <label for="a">Nama Pribadi</label>
          <input type="text" name="nama" required id="a" class="form-control" placeholder="Nama Pribadi" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Username</label>
          <input type="text" name="username" required id="a" class="form-control" placeholder="Username" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Password (Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar)</label>
          <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Minimal 8 digit password, Harus mengandung 1 angka dan 1 huruf kecil dan huruf besar" required id="a" class="form-control" placeholder="Password" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Level</label>
          <input type="text" name="level" required id="a" class="form-control" placeholder="Level 1/2 (1 = Admin, 2= Pengguna)" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/datapengguna" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>