<select class="form-control" id="cboSocio"  name="cboSocio">                        
   <option style="display:none;" value="<? echo $socio->mes; ?>"  selected>Seleccione Socio

   <?php  foreach ($lsocio as $socio): ?>
   <option value="<?php echo $socio->id_Soc."|".$socio->mes."|".$socio->anio; ?>">
   <?php echo utf8_encode(strtoupper($socio->apellidoPat_Soc).' ' .strtoupper($socio->apellidoMat_Soc .' ' . strtoupper($socio->nombres_Soc ))) ?></option>
   <?php endforeach; ?>
   </option>
</select>

