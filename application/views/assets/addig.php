<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-tags mr-2"></i> Entri Url Instagram Post
  </div>
  <div class="card-body">
    <form action="admin/saveig" method="post">
        <div class="form-group ">
          <label for="a">Judul</label>
          <input type="text" name="judul" required id="judul" class="form-control" placeholder="Ketik Judul" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Kode Sematkan (Embed Code) Instagram Post </label>
          <input type="text" name="link_ig" required id="link_ig" class="form-control" placeholder="Paste link embed" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/instagram_post" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>