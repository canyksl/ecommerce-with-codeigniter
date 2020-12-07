<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/urunstoktipiekle/'.$this->uri->segment(3))?>">
            
            <div class="form-group">
                <label>Ürün 1.Seçeneğini belirleyiniz</label>
                <select  name="subcategory" class="form-control">
                    <?php foreach ($options as $option) { ?>
                        <option value="<?= $option->id; ?>"> <?php echo $option->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group">
                <label>Ürün 2.Seçeneğini belirleyiniz</label>
                <select  name="subcategory2" class="form-control">
                        <option value='0'>Seçim Yapınız</option>
                    <?php foreach ($options as $option) { ?>
                        <option value="<?= $option->id; ?>"> <?php echo $option->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            
            <div class="form-group">
                <button name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
            </div>
            </form>
</div>
<div class="col-md-3">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">3.AŞAMA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                ÜRÜN STOK BİLGİLERİ
              </div>
              <!-- /.card-body -->
            </div>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>