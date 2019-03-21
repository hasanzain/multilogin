<?php 

$string = "
        
        <section class=\"content\">
        <div class=\"row\">
         <section class=\"col-lg-12 connectedSortable\">
         <div class=\"box\">
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." List</h2>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-6\">
                <?php echo anchor(site_url('".$c_url."/create'),'Create', 'class=\"btn btn-primary\"'); ?>
            </div>
            <div class=\"col-md-6 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <div class=\"box-body\">
        <table class=\"table table-bordered table-striped\" id=\"example1\">
            <thead>
            <tr>
                <th>No</th>";
                foreach ($non_pk as $row) {
                    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
                }
                $string .= "\n\t\t<th>Action</th>
                            </tr>
                            </thead>
                            <tbody>";
                $string .= "<?php
                            \$start = 0;
                            foreach ($" . $c_url . "_data as \$$c_url)
                            {
                                 ?>
            
            <tr>
            ";

            $string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
            foreach ($non_pk as $row) {
               
                $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
            }


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); "
        . "\n\t\t\t\techo '  '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); "
        . "\n\t\t\t\techo '  '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash-o\"></i>','title=\"delete\" class=\"btn btn-danger btn-sm\" onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr> 
                <?php
            }
            ?>
        </tbody>
        </table>
        </div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                ";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}


$string .= "\n\t 
    </div>
    </section>
    </div>
    </section>    
    
   ";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>