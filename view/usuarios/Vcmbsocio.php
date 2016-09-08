 <option style="display:none;" value="0"  selected>Seleccione - Socio</option>                         
       <?php  foreach ($lsocio as $socio): ?>
         <option value="<?php echo $socio->id_Soc."-".$socio->dni_Soc; ?>">
        <?php echo   strtoupper($socio->apellidoPat_Soc) . "  " . strtoupper($socio->apellidoMat_Soc).", ".strtoupper($socio->nombres_Soc) ?></option>
                          <?php endforeach; ?>  
 </select>