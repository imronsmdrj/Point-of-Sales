
<div class="container">
<!-- <div class="row">
<div class="col-md-12"> -->
        <div class="card card-body">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                <a class="nav-item nav-link active" id="nav-MenuBarang-tab" data-toggle="tab" href="#MenuBarang" role="tab" aria-controls="nav-MenuBarang" aria-selected="true">Barang</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-item nav-link" id="nav-MenuKategori-tab" data-toggle="tab" href="#MenuKategori" role="tab" aria-controls="nav-MenuKategori" aria-selected="false">Kategori</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-item nav-link" id="nav-MenuSupplier-tab" data-toggle="tab" href="#MenuSupplier" role="tab" aria-controls="nav-MenuSupplier" aria-selected="false">Supplier</a>
                    </li>
                   <li class="nav-item">
                <a class="nav-item nav-link" id="nav-MenuPegawai-tab" data-toggle="tab" href="#MenuPegawai" role="tab" aria-controls="nav-MenuPegawai" aria-selected="false">Pegawai</a>
                    </li>
                </ul>
            </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="MenuBarang" role="tabpanel" aria-labelledby="nav-MenuBarang-tab">
                        <?php $this->load->view('content/master_barang')?>
                    </div>
                    <div class="tab-pane fade" id="MenuKategori" role="tabpanel" aria-labelledby="nav-MenuKategori-tab">
                        <?php $this->load->view('content/master_kategori')?>
                     </div>
                    <div class="tab-pane fade" id="MenuSupplier" role="tabpanel" aria-labelledby="nav-MenuSupplier-tab">
                        <?php $this->load->view('content/master_supplier')?>
                    </div>
                    <div class="tab-pane fade" id="MenuPegawai" role="tabpanel" aria-labelledby="nav-MenuPegawai-tab">
                        <?php $this->load->view('content/master_pegawai')?>
                    </div>

               </div>
        </div>
</div>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#MenuBarang">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<!--     </div>
</div> -->

<!-- <script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script> -->


