<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/back/');?>dropzone/dropzone.css">
<script src="<?php echo base_url('assets/back/');?>dropzone/dropzone.js"></script>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">

            <form method="POST" action="<?php echo base_url('admin/productedit/'.$product->id); ?>">
            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" value="<?php echo $product->title; ?>" name="product" placeholder="Ürün Adını Giriniz." required class="form-control">
            </div>
            <div class="form-group">
                <label>Ürün Açıklaması</label>
                <textarea name="desc"  rows="3" class="form-control"><?php echo $product->description; ?></textarea>
            </div>
            <div class="form-group">
                <label>Ürün Kategori</label>
                <select  name="topcategory" class="form-control">
                    <option <?php if ($product->category==1) {echo "selected";} ?> value="1">Erkek</option>
                    <option <?php if ($product->category==2) {echo "selected";} ?>  value="2">Kadın</option>
                    <option <?php if ($product->category==3) {echo "selected";} ?>  value="3">Çocuk</option>
                </select>
            </div>
            <div class="form-group">
                <label>Ürün Alt Kategori</label>
                <select  name="subcategory" class="form-control">
                    <?php foreach ($subcategory as $category) { ?>
                        <option <?php if($product->subcategory==$category->id){echo "selected";} ?> value="<?= $category->id; ?>"> <?php echo $category->name; ?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group">
            <div class="col-xs-6">
                <label>Fiyat</label>
                <input type="number" step="any" min="0" max="100" name="price" value="<?php echo $product->price; ?>"   required class="form-control">
                </div>
            </div>
            <div class="form-group">
            <div class="col-xs-6">
                <label>İndirimli Fiyat</label>
                <input type="number" step="any" min="0" max="100"  name="discount" value="<?php echo $product->discount; ?>" required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Ürün Etiketi</label>
                <input type="text" name="tag" placeholder="Ürün Etiketlerini Giriniz." value="<?php echo $product->tag; ?>" required class="form-control">
            </div>
            <!-- <div class="form-group">
                <label>Ürünü Yayınla</label>
                <select  name="publish" class="form-control">
                    <option value="0">Yayınlanmamış</option>
                    <option value="1">Yayınla</option>
                    </select>
            </div> -->
            <div class="form-group">
                <button name="step1" value="1" class="btn btn-block btn-flat btn-success">Güncelle</button>
            </div>
            </form>
</div>
<div class="col-md-6">
<div class="card card-outline card-solid">
              <div class="card-header">
                <h3 class="card-title">Ürün Resimleri</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="row">
              <?php foreach ($images as $image) { ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                    
                    
                            
                        <img class="img-thumbnail" src="<?php echo base_url($image->path) ; ?>" style="width:100%">
                        <div class="container-fluid">
                        <a href="<?php echo base_url('admin/delproductimg/'.$image->id) ?>" class="btn btn-block btn-outline btn-danger"><i class="fa fa-trash"></i>Sil</a>
                        <?php if($image->master==0) { ?>
                        <a href="<?php echo base_url('admin/masterproductimg/'.$image->id) ?>" class="btn btn-block btn-outline btn-success"><i class="fa fa-camera"></i>Kapak Fotoğrafı Yap</a>
                        <?php } ?>
                        </div>
                       
                    
                   
                    </div>
                    
                </div>
                <?php  }  ?>
               
              
</div>
<hr>
<form class="dropzone" method="post" action="<?php echo base_url('admin/addimgproduct/'.$product->id);?>" enctype="multipart/form-data">
            </form>

</div>

</div>


</div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Stok Bilgileri</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                  
                    <tr>
                      <th><?php echo Options::find($type->options)->name; ?></th>
                      <th><?php echo Options::find($type->options2)->name; ?></th>
                      <th>stok Sayısı</th>
                      <th>İşlemler</th>
                      
                    </tr>
                  </thead>
                  <?php foreach ($stocks as $stock) { ?>
                  <tbody>
                    <tr>
                      <td><?php echo Altsecenekler::find($stock->suboption)->name; ?></td>
                      <td><?php echo Altsecenekler::find($stock->suboption2)->name; ?></td>
                      <td><?php echo $stock->stock; ?></td>
                      <td> <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/editproductstock/'.$product->id);?>">
                           <i class="fas fa-pencil-alt">
                           </i>
                           Düzenle
                       </a>
                       <?php deletebutton('stock',$stock->id); ?>
                       </td>
                       <?php } ?>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>






<?php $this->load->view('admin/include/footer');  ?>