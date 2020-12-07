<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/productcontrol')?>">
            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" name="product" placeholder="Ürün Adını Giriniz." required class="form-control">
            </div>
            <div class="form-group">
                <label>Ürün Açıklaması</label>
                <textarea name="desc" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Ürün Kategori</label>
                <select  name="category" class="form-control">
                    <option value="1">Erkek</option>
                    <option value="2">Kadın</option>
                    <option value="3">Çocuk</option>
                </select>
            </div>
            <div class="form-group">
                <label>Ürün Alt Kategori</label>
                <select  name="subcategory" class="form-control">
                    <?php foreach ($subcategory as $category) { ?>
                        <option value="<?= $category->id; ?>"> <?php echo $category->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group">
            <div class="col-xs-6">
                <label>Fiyat</label>
                <input type="number" step="any" min="0" max="100" name="price"  required class="form-control">
                </div>
            </div>
            <div class="form-group">
            <div class="col-xs-6">
                <label>İndirimli Fiyat</label>
                <input type="number" step="any" min="0" max="100"  name="discount"  required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Ürün Etiketi</label>
                <input type="text" name="tag" placeholder="Ürün Etiketlerini Giriniz." required class="form-control">
            </div>
            <!-- <div class="form-group">
                <label>Ürünü Yayınla</label>
                <select  name="publish" class="form-control">
                    <option value="0">Yayınlanmamış</option>
                    <option value="1">Yayınla</option>
                    </select>
            </div> -->
            <div class="form-group">
                <button name="step1" value="1" class="btn btn-block btn-flat btn-success">Ekle</button>
            </div>
            </form>
</div>
<div class="col-md-3">
<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">1.AŞAMA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                ÜRÜN BİLGİLERİ
              </div>
              <!-- /.card-body -->
            </div>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>