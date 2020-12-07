<?php 
$this->load->view('admin/include/header');
$this->load->view('admin/include/leftmenu');
?>
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-9">

            <form method="POST" action="<?php echo base_url('admin/editproductstock/'.$this->uri->segment(3))?>">
            
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
           
           
            

</div>


</div>
</div>
</div>






<?php $this->load->view('admin/include/footer');  ?>