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
                <h4>Ürün Seçenekleri Oluştur</h4>
                </div>
              <div class="icon">
                <i class="fa fa-plus"></i>
              </div>
              <a href="<?php echo base_url('admin/productchooseadd')?>" class="small-box-footer">Ekle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-md-9">
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ürün Seçenekleri</h3>

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
                         Seçenek Adı
                      </th>
                      <th style="width: 30%">
                          Seçenek ID
                      </th>
                      
                       
                      <th style="width: 50%">
                      İşlemler
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach($options as $option) { ?>
                   <tr>
                      
                   <td>
                       <a>
                       <?php echo $option->name; ?>
                       </a>
                       
                   </td>
                   
                   <td>
                       <a><?php echo $option->id; ?></a>
                       
                       
                   </td>
                   
                   <td class="project-actions text-right">
                   <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/altsecenekler/'.$option->id);?>">
                           <i class="fas fa-pencil-alt">
                           </i>
                           Alt Seçenekler
                       </a>
                       <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/productchooseedit/'.$option->id);?>">
                           <i class="fas fa-pencil-alt">
                           </i>
                           Düzenle
                       </a>
                       <?php deletebutton('options',$option->id); ?>
                   </td>
               </tr>
              <?php } ?>
                 
                  
                      </tbody></div>
</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>