<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header latar text-light">
                    <i class="fa fa-users mr-2"></i> 
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal Post</th>
                                <th>Status</th>
                                <th>Source</th> <!-- Added column for source -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data) && is_array($data)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($item['id_user']); ?></td>
                                        <td><?php echo htmlspecialchars($item['judul']); ?></td>
                                        <td><?php echo htmlspecialchars(strip_tags($item['isi'])); ?></td>
                                        <td><?php echo htmlspecialchars($item['tanggal_post']); ?></td>
                                        <td><?php echo htmlspecialchars($item['status_berita']); ?></td>
                                        <td><?php echo htmlspecialchars($item['source']); ?></td> <!-- Display source column -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">No data available.</td> <!-- Updated colspan to match the number of columns -->
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
