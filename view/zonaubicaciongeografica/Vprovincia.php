 
 <option style="display:none;" value="0"  selected>Provincia</option> 
<?php  foreach ($lprovincia as $provincia): ?>
   <option value="<?php echo $provincia->id_Uge; ?>">
<?php echo utf8_encode($provincia->nombre_Uge)?></option>
<?php endforeach; ?>  
   