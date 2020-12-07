<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/back/');?>dropzone/dropzone.css">
<script src="<?php echo base_url('assets/back/');?>dropzone/dropzone.js"></script>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form class="dropzone" method="post" action="<?php echo base_url('admin/addimgproduct/'.$this->uri->segment(3))?>" enctype="multipart/form-data">
            </form>
            <a href="<?php echo base_url('admin/urunstoktipiekle/'.$this->uri->segment(3));?>" class="btn btn-success btn-flat btn-block">Ürün Seçenekleri ve Stok Bilgilierini Ekle</a>
            </div>

<div class="col-md-3">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">2.AŞAMA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                ÜRÜN RESİMLERİ
              </div>
              <!-- /.card-body -->
            </div>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>