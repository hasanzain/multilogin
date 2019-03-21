<?php 

$string = "
        
        <section class=\"content\">
        <div class=\"row\">
         <section class=\"col-lg-12 connectedSortable\">
         <div class=\"box\">
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <div class=\"box-body\">
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
        </div>

        </div>
    </section>
    </div>
    </section>    
    
        ";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>