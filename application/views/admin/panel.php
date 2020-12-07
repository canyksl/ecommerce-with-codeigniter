<?php $this->load->view('admin/include/header');
        $this->load->view('admin/include/leftmenu'); ?>

<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-1"></div>
    <div class="col-md-9">
        <div class="card">
            <div class="box-body">
                <form autocomplete="off" method="post" action="<?php echo base_url('admin/panelpost');?>" enctype='multipart/form-data'>
                    <div class="col-sm-7">
                        <div class="card-header">Admin Ad Soyad</div>
                        <input type="text" name="name" required class="form-control" value="<?php echo $config->name ?>">
                        <input type="hidden" name="id" required class="form-control" value="<?php echo $config->id ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Admin Görsel</div>
                        <input type="file" name="image"  class="form-control">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Mail Adresi</div>
                        <input type="email" name="mail"  class="form-control" value="<?php echo $config->mail ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Şifre</div>
                        <input type="password" name="sifre"  class="form-control" value="<?php echo $config->sifre?>">
                    </div>
                   
                    <br>
                    <div class="form-group"><button class="btn btn-success btn-flat btn-block">Kaydet</button></div>
                  
                    
                </form>

                
            </div>
            
        </div>
        
        <br><br>
    </div>
    
    

    

</div>
</section>


    

 <?php $this->load->view('admin/include/footer');?>