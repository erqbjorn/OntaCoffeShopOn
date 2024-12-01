<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total = 0;
        foreach ($keranjang as $item): 
            $total += $item['harga'] * $item['jumlah'];
        ?>
        <tr>
            <td><?= $item['id']; ?></td>
            <td><?= $item['nama']; ?></td>
            <td>Rp. <?= number_format((float) $item['harga'], 0, ',', '.'); ?></td>
            <td><?= $item['jumlah']; ?></td>
            <td><a href="<?= base_url(); ?>keranjang/hapus/<?= $item['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 id="checkoutModalLabel">Checkout</h5></div>
            <div class="modal-body">
            <div class="form group">
			        	<P>Apakah pesanan anda sudah benar?</P>
                <p>Total Belanja: Rp. <span id="total-belanja"><?= number_format($total, 0, ',', '.'); ?></span></p>
                <a href="<?= base_url(); ?>keranjang/hapus_semua/<?= $item['id']; ?>" class="btn btn-primary" >Pesan</a>
        
            </div>
        </div>
    </div>
</div>
</div>

<div class="text-end mt-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkoutModal">
        Pesan
    </button>
</div>
<script>
document.getElementById("pesan-button").addEventListener("click", function() {
  // Hapus semua item dari keranjang
  fetch("<?= base_url(); ?>keranjang/hapus_semua", {
    method: "POST"
  })
  .then(response => response.json())
  .then(data => {
    // Tampilkan notifikasi pesanan akan diantar
    alert("Pesanan Anda akan segera diantar ke meja Anda. Terima kasih.");
    
    // Refresh halaman atau lakukan tindakan lain sesuai kebutuhan
    location.reload();
  })
  .catch(error => {
    console.error("Error:", error);
    alert("Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.");
  });
});</script>