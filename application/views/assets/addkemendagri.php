<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-tags mr-2"></i> Entri Kategori
  </div>
  <div class="card-body">
    <form action="admin/savekemendagri" method="post">
        <div class="form-group ">
          <label for="a">Lokasi</label>
          <input type="text" name="lokasi" required id="a" class="form-control"  aria-describedby="helpId">
        </div>
		<div class="form-group ">
          <label for="a">Total Balita</label>
          <input type="text" name="totalbalita" required id="a" class="form-control"  aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Stunting Pendek</label>
          <input type="text" name="stuntingpendek" required id="a" class="form-control"  aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Stunting Sangat Pendek</label>
          <input type="text" name="stuntingsangatpendek" required id="a" class="form-control"  aria-describedby="helpId">
        </div>
		  <div class="form-group ">
          <label for="a">Prevalensi</label>
          <input type="text" name="prevalensi" required id="a" class="form-control" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/kemendagri" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>