<!--<option style="display:none;" value="0"  selected>Distrito</option>
<?php  //foreach ($ldistrito as $distrito): ?>
 <option value="<?php //echo $distrito->id_Uge; ?>"><?php //echo utf8_encode($distrito->nombre_Uge)?></option>
<?php //endforeach; ?>-->


 <option style="display:none;" value="0"  selected>Seleccione Numero de Cuenta - Socio</option>                         
                        <?php  foreach ($lmovimiento as $movimiento): ?>
                         
                            <option value="<?php echo $movimiento->id_Cah; ?>">
                           <?php echo  "N° de Cuenta: ".$movimiento->nroAhorro_Cah." - ". strtoupper($movimiento->apellidoPat_Soc) . "  " . strtoupper($movimiento->apellidoMat_Soc).",".strtoupper($movimiento->nombres_Soc) ?></option>
                          <?php endforeach; ?>  
                 </select>