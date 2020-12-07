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
                <h4>Kategori Oluştur</h4>
                </div>
              <div class="icon">
                <i class="fa fa-plus"></i>
              </div>
              <a href="<?php echo base_url('admin/categoryadd')?>" class="small-box-footer">Ekle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
</div>
<div class="col-md-9">
<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategoriler</h3>

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
                         Kategori Adı
                      </th>
                      <th style="width: 30%">
                          Üst Kategori
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                          ID
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach($categories as $category) { ?>
                   <tr>
                      
                   <td>
                       <a>
                       <?php echo $category->name; ?>
                       </a>
                       
                   </td>
                   
                   <td>
                       <a>
                       <?php if($category->topcategory==1){echo "Erkek";}elseif ($category->topcategory==2) {
                           echo "Kadın";
                       }else {
                           echo "Çocuk";
                       }; ?>
                       </a>
                       
                   </td>
                   <td class="project-state">
                       <span class="badge badge-success"><?php echo $category->id; ?></span>
                   </td>
                   <td class="project-actions text-right">
                       
                       <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/categoryedit/'.$category->id);?>">
                           <i class="fas fa-pencil-alt">
                           </i>
                           Edit
                       </a>
                       <?php deletebutton('category',$category->id); ?>
                   </td>
               </tr>
              <?php } ?>
                 
                  
                      </tbody></div>
</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>