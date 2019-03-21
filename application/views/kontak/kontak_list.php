
        
        <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
        <h2 style="margin-top:0px">Kontak List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <?php echo anchor(site_url('kontak/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-6 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <div class="box-body">
        <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Email</th>
		<th>No Tlp</th>
		<th>Action</th>
                            </tr>
                            </thead>
                            <tbody><?php
                            $start = 0;
                            foreach ($kontak_data as $kontak)
                            {
                                 ?>
            
            <tr>
            
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kontak->username ?></td>
			<td><?php echo $kontak->nama ?></td>
			<td><?php echo $kontak->alamat ?></td>
			<td><?php echo $kontak->email ?></td>
			<td><?php echo $kontak->no_tlp ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kontak/read/'.$kontak->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo '  '; 
				echo anchor(site_url('kontak/update/'.$kontak->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo '  '; 
				echo anchor(site_url('kontak/delete/'.$kontak->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr> 
                <?php
            }
            ?>
        </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                
		<?php echo anchor(site_url('kontak/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('kontak/word'), 'Word', 'class="btn btn-primary"'); ?>
	 
    </div>
    </section>
    </div>
    </section>    
    
   