<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<section class="content">
<div class="container-fluid">
<div class="row">
   <div class="col-md-1"></div>
    <div class="col-md-9">
        <div class="card">
            <div class="box-body">
                <form autocomplete="off" method="post" action="<?php echo base_url('admin/ayarlarpost');?>" enctype='multipart/form-data'>
                    <div class="col-sm-7">
                        <div class="card-header">Site Adı</div>
                        <input type="text" name="title" required class="form-control" value="<?php echo $config->title ?>">
                        <input type="hidden" name="id" required class="form-control" value="<?php echo $config->id ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Mail Adresi</div>
                        <input type="email" name="mail"  class="form-control" value="<?php echo $config->mail ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Telefon Numarası</div>
                        <input type="tel" name="tel"  class="form-control" value="<?php echo $config->telefon ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Adres Bilgisi</div>
                        <textarea name="info" rows="3" class="form-control" ><?php echo $config->info ?></textarea>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Logo Url</div>
                        <input type="file" name="logo"  class="form-control">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Site İcon Url</div>
                        <input type="file" name="icon"  class="form-control">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">İnstagram</div>
                        <input type="text" name="instagram"  class="form-control" value="<?php echo $config->instagram ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Facebook</div>
                        <input type="mail" name="face"  class="form-control" value="<?php echo $config->facebook ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Twitter</div>
                        <input type="mail" name="twitter"  class="form-control" value="<?php echo $config->twitter ?>">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-header">Youtube</div>
                        <input type="mail" name="youtube"  class="form-control" value="<?php echo $config->youtube ?>">
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

<?php $this->load->view('admin/include/footer');  ?>
