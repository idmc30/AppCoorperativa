 <option style="display:none;" value="0"  selected>Seleccione - Personal</option>                         
       <?php  foreach ($lpersonal as $personal): ?>
         <option value="<?php echo $personal->id_Per."-".$personal->dni_Per; ?>">
        <?php echo   strtoupper($personal->apellidoPat_Per) . "  " . strtoupper($personal->apellidoMat_Per).", ".strtoupper($personal->nombres_Per) ?></option>
                          <?php endforeach; ?>  
 </select>