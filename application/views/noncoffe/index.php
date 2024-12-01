<style>
		/* Ensure uniformity in image sizes within cards */
		.card img {
			width: 100%;
			height: 450px; /* Fixed height for consistent display */
			object-fit:fill; /* Ensures the image fits without stretching */
		}
	</style>
<body>
	<div class="container">
		<h1 class="text-center text-white">Noncoffe</h1>	
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			  Tambah Data
			</button>
		<!-- Flash Message -->
		<?php if($this->session->flashdata('flash')) : ?>
			<div class="row mt-3">
				<div class="col-md-8">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data stick <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<!-- Search Bar -->
		<div class="row mt-4">
			<div class="col-md-6">
				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="cari Noncoffe..." name="keyword">
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">Cari</button>	
						</div>
					</div> 
				</form>
			</div>
		</div>

		
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
				 <form action="<?= base_url('Noncoffe') ?>" method="post" enctype="multipart/form-data">
			        <div class="form group">
			        	<label for="nama">noncoffe</label>
			        	<input type="numeric" name="nama" class="form-control" id="nama" placeholder="Masukan noncoffe">
				</div>

			        <div class="form group">
			        	<label for="poto">Foto</label>
			        	<input type="file" name="poto"class="form-control" id="poto" placeholder="Masukan Foto">
			        </div>

			        <div class="form group">
			        	<label for="harga">Harga</label>
			        	<input type="text" name="harga"class="form-control" id="harga" placeholder="Masukan Harga">
			        </div>

				   <div class="modal-footer">
					   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					   <button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
				 </div>
			      </form>
			    </div>
			  </div>

		<!-- Card List for Noncoffes -->

		<div class="row mt-4">
			<?php foreach($Noncoffe as $N): ?>
				<div class="col-md-4 mb-4">
					<div class="card bg-secondary text-white" style="width: 100%;">
						<img src="assets/images/<?php echo $N['poto']; ?>" class="card-img-top" alt="<?= $N['nama']; ?>">
						<div class="card-body">
							<h5 class="card-title"><?= $N['nama']; ?></h5>
							<h6 class="card-text">Rp. <?= number_format((float) $N['harga'], 0, ',', '.'); ?></h6>	
							<a href="<?= base_url(); ?>Noncoffe/hapus/<?= $N['id']; ?>" class="badge bg-danger float-end" onclick="return confirm('Anda yakin?');">Hapus</a>
							<a type="button" class="badge bg-warning float-end" data-bs-toggle="modal" data-bs-target="#editModal<?=$N['id'];?>">
							  Ubah
							</a>
							<a type="button" class="badge bg-primary float-end add-to-cart" 
   							data-id="<?= $N['id']; ?>" 
						   	data-nama="<?= $N['nama']; ?>" 
						   	data-harga="<?= $N['harga']; ?>">
			   				<i class="fas fa-shopping-cart"></i>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>							
	</div>

	
<!-- awal modal edit -->
<?php $no = 0 ; foreach ($Noncoffe as $N): $no++; ?>
    <div class="modal fade" id="editModal<?=$N['id'];?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="editModalLabel">form Edit Data</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
				 <form action="<?= base_url('noncoffe/ubah') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?=$N['id']; ?>">
			        <div class="form group">
			        	<label for="nama">noncoffe</label>
			        	<input type="numeric" name="nama" class="form-control" value="<?=$N['nama']; ?>" id="nama" placeholder="Masukan noncoffe">
			        </div>

			        <div class="form group">
			        	<label for="poto">Foto</label>
			        	<input type="file" name="poto"class="form-control" value="<?=$N['poto']; ?>"id="poto" placeholder="Masukan Foto">
			        </div>

			        <div class="form group">
			        	<label for="harga">Harga</label>
			        	<input type="numeric" name="harga" class="form-control" value="<?=$N['harga']; ?>"id="harga" placeholder="Masukan Harga">
			        </div>

				   <div class="modal-footer">
					   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					   <button type="submit" class="btn btn-primary">Ubah</button>
					</div>
				</div>
				 </div>
			    </form>
			    </div>
			  </div>
			</div>
		<?php endforeach;  ?>

<!-- akhir modal edit -->


	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(".add-to-cart").click(function () {
        const NoncoffeData = {
            id: $(this).data("id"),
            nama: $(this).data("nama"),
            harga: $(this).data("harga"),
            jumlah: 1 // default jumlah awal
        };

        $.ajax({
            url: "<?= base_url('keranjang/tambahkeranjangNoncoffe') ?>",
            type: "POST",
            data: NoncoffeData,
            success: function (response) {
                alert("Noncoffe berhasil ditambahkan ke keranjang!");
                console.log(response); // Debugging
            },
            error: function (xhr, status, error) {
                alert("Terjadi kesalahan, coba lagi.");
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
</body>

