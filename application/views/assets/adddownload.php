<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-tags mr-2"></i> Entri Kategori
  </div>
  <div class="card-body">
  <form action="admin/savedownload" method="post"  enctype="multipart/form-data">
        <div class="form-group ">
          <label for="a">Judul File</label>
          <input type="text" name="judul" required id="a" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">File </label>
          <input type="file" name="file" required id="a" class="form-control" placeholder="" aria-describedby="helpId">
          <br>
            <span class="badge badge-warning">Upload Hanya Bisa Bertype pdf,xls,word</span>
        </div>
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/download" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>