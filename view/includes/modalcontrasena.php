 <div class="modal fade" id="modalcambiopass" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i>Cambiar Contraseña</h4>
                    </div>
                    <form action= method="post" >
                        <div class="modal-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Usuario:</label>
                                    <input type="text"  name="u" id="u" class="form-control" placeholder="Usuario ..."   required/>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input type="password"  name="c" id="c" class="form-control"  maxlength="10" placeholder="Cotraseña ..." required/>
                                </div>
                                <div class="form-group">
                                    <label>Repetir Contraseña:</label>
                                    <input type="password"  name="rc" id="rc" class="form-control" placeholder="Repetir Contraseña ..."   required/>
                                </div>
                        
                        </div>
                        
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <!--<input type="button" value="Enviar Datos" onclick="insertarajax()">-->
                            <button type="button"  id="updatepass" name="updatepass" class="btn btn-success pull-left" >Actualizar</button>
                        </div>
                        <input type="hidden" id="idusu" name="idusu">
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->