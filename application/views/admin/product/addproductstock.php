<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/urunstokekle/'.$this->uri->segment(3))?>">
            
            <div class="form-group">
                <label><?= Options::find($type->options)->name; ?></label>
                <select  name="subcategory" class="form-control">
                    <?php foreach ($option1 as $option) { ?>
                        <option value="<?= $option->id; ?>"> <?php echo $option->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            <?php if($option2!=null){ ?>
            <div class="form-group">
                <label><?= Options::find($type->options2)->name; ?></label>
                <select  name="subcategory2" class="form-control">
                        
                    <?php foreach ($option2 as $option) { ?>
                        <option value="<?= $option->id; ?>"> <?php echo $option->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            <?php } ?>
            <div class="form-group">
                    <label>Stok Sayısı</label>
                    <input type="number" name="stock" class="form-control" value="1" min="1">
            </div>
            <div class="form-group">
                <button name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
            </div>
            </form>
           
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Ürün Stok Bilgileri</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php foreach ($stocks as $stock) { ?>
                    <li><?php echo Options::find($type->options)->name.' : '.Altsecenekler::find($stock->suboption)->name.' - '.
                    Options::find($type->options2)->name.' : '.Altsecenekler::find($stock->suboption2)->name.' - Stock Sayısı: '.
                    $stock->stock;   ?> </li>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>

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
            <a href="<?php echo base_url('admin/productcontrol/'.$this->uri->segment(3))?>" class="btn btn-block btn-flat btn-success">
            Ürünü Kaydet</a>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>