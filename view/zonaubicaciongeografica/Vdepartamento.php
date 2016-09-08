<?php  foreach ($ldepartamento as $departamento): ?>
<!--<option style="display:none;" value=""  selected>Departamento</option>  -->
 <option value="<?php echo $departamento->id_Uge; ?>">
<?php echo utf8_encode($departamento->nombre_Uge)?></option>
<?php endforeach; ?>  

 