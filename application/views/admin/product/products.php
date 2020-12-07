<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">
<div class="small-box bg-red">
              <div class="inner">
                <h4>Ürün Oluştur</h4>
                </div>
              <div class="icon">
                <i class="fa fa-plus"></i>
              </div>
              <a href="<?php echo base_url('admin/addproduct')?>" class="small-box-footer">Ekle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-md-9">
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ürünler</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects"  id="category">
              <thead>
                  <tr>
                      
                      <th style="width: 20%">
                         Ürün Adı
                      </th>
                      <th style="width: 10%">
                          Ürün Kategori
                      </th>
                      
                      <th style="width: 20%" class="text-center">
                          Ürün Açıklaması
                      </th>
                      <th style="width: 10%">
                          Fiyat
                      </th>
                      
                      <th style="width: 20%">
                          Ürün Etiketleri
                      </th>
                      <th style="width: 30%">
                         İşlemler
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
              <?php foreach($products as $product) { ?>
                   <tr>
                      
                   <td>
                       <a>
                       <?php echo $product->title; ?>
                       </a>
                       
                   </td>
                   <td>
                       <a>
                       <?php if($product->category==1){echo "Erkek";}elseif ($product->category==2) {
                           echo "Kadın";
                       }else {
                           echo "Çocuk";
                       }; ?>
                       <a>
                       <?php echo Kategori::find($product->subcategory)->name; ?>
                       </a>
                       </a>
                       </td>
                     <td>
                       <a>
                       <?php echo $product->description; ?>
                       </a>
                       
                   </td>
                   <td>
                       <a>
                       <?php if($product->discount!=null)
                       { echo "<sub><del class='text-red'>".$product->price." TL<br> </del></sub>".$product->discount." TL";
                       }else{
                           echo $product->price;
                           } ?>
                       </a>
                       
                   </td>
                  
                   <td>
                       <a>
                       <?php echo $product->tag; ?>
                       </a>
                       
                   </td>
                   
                   <td class="project-actions text-right">
                       
                       <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/productedit/'.$product->id);?>">
                           <i class="fas fa-pencil-alt">
                           </i>
                           Düzenle
                       </a>
                      <?php deletebutton('product',$product->id); ?>
                   </td>
               </tr>
              <?php } ?>
                 
                  
                      </tbody></div>
</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>