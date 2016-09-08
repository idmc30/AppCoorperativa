<!-- <input type="radio" name="idpcargo" id="idpcargo" value="<?php echo  $cargopersonal->id_Pca ?>">-->
  <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Cargos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>N°</th>
                        <th>Seleccionar</th>             
                        <th>Cargo</th>                
                      </tr>
                    </thead>
                    <tbody>
                      <?php $c=1; ?>
                         <?php  foreach ($lpercargoxdni as $cargopersonal): ?>
                             <tr id="<?php echo $cargopersonal->id_Pca; ?>">
                                        <td> <?php echo "<b>".$c."</b>";?></td>
                                        <td><input  id="idpcargos" name="idpcargos"  value="<?php echo $cargopersonal->id_Pca; ?>"  type="radio"></td> 
                                        <td> <?php echo $cargopersonal->nombre_Car; ?></td>  
                                      </td>
                              </tr>

                        <?php $c=$c+1 ?>  
                         <?php endforeach; ?>
                      
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

  <script type="text/javascript">
   $("input[name=idpcargos]").click(function () {    
       var tipo=$(this).val();
       $("#idpersonalconcargo").val(tipo);
        
    });
  </script>
          