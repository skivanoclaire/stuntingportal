<div class="main-content">
        <section class="section">
          <div class="section-body">

<div class="card">
  <div class="card-header text-light latar">
    <i class="fa fa-tags mr-2"></i> Entri Url Video
  </div>
  <div class="card-body">
    <form action="admin/savevideo" method="post">
        <div class="form-group ">
          <label for="a">Judul Video</label>
          <input type="text" name="judul" required id="judul" class="form-control" placeholder="Ketik Judul Video" aria-describedby="helpId">
        </div>
        <div class="form-group ">
          <label for="a">Link/Url Video (Contoh : https://www.youtube.com/embed/i0uuNx2ftjw)</label>
          <input type="text" name="link_video" required id="link_video" class="form-control" placeholder="Paste link embed video" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="a"></label>
          <a href="admin/video" class="btn btn-warning"><i class="fas fa-sync"></i> Kembali</a>
          <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i> Simpan</button>
        </div>
    </form>
  </div>
</div>


          </div>
        </section>
</div>