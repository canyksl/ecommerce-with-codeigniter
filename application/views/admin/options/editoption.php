<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/productchooseedit/'.$options->id);?>">
            <div class="form-group">
                <label>Ürün Seçeneği</label>
                <input type="text" name="name" value="<?= $options->name;?>" required class="form-control">
            </div>
          
            <div class="form-group">
                <button class="btn btn-block btn-flat btn-success">Güncelle</button>
            </div>
            </form>
</div>

</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>