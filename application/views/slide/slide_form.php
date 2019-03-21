
        <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
        <h2 style="margin-top:0px">Slide <?php echo $button ?></h2>
         <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('slide') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>

        </div>
    </section>
    </div>
    </section>    
    