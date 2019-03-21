
        <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
        <h2 style="margin-top:0px">Setting <?php echo $button ?></h2>
         <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Config <?php echo form_error('config') ?></label>
            <input type="text" class="form-control" name="config" id="config" placeholder="Config" value="<?php echo $config; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Cp <?php echo form_error('cp') ?></label>
            <input type="text" class="form-control" name="cp" id="cp" placeholder="Cp" value="<?php echo $cp; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>

        </div>
    </section>
    </div>
    </section>    
    