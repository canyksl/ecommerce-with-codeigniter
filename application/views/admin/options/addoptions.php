<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" autocomplete="off" action="<?php echo base_url('admin/Productchooseadd')?>">
            <div class="form-group">
                <label>Ürün Seçenek Adı</label>
                <input type="text" name="name" placeholder="Seçenek Adını Giriniz." required class="form-control">
            </div>
            
            <div class="form-group">
                <button class="btn btn-block btn-flat btn-success">Ekle</button>
            </div>
            </form>
</div>

</div>
</div>
</div>