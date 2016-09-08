<option style="display:none;" value="0"  selected>Distrito</option>
<?php  foreach ($ldistrito as $distrito): ?>
 <option value="<?php echo $distrito->id_Uge; ?>"><?php echo utf8_encode($distrito->nombre_Uge)?></option>
<?php endforeach; ?>  

 