<!-- Modal -->
<div class="modal fade" id="formStatusEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Editar estatus</h4>
      </div>
      <div class="modal-body">

        @include('includes.alerts-box')   

          {{ Form::open(array('url'=>'status/edit', 'class'=>'form-signup', 'id'=>'form-edit-status', 'method' => 'post')) }}  
            {{ Form::hidden('id_status') }}
            <div class="register-form">
                          
                <div class="form-group">  
                  <table class="table-ex">
                    <tr>
                      <td width="1px"><label for="edition" class="control-label">Contacto&nbsp;del&nbsp;cliente:</label></td>
                      <td>&nbsp;</td>
                      <td>{{ Form::select('id_contact', [], null, array('class'=>'form-control', 'placeholder'=>'Contacto del cliente')) }}</td>
                    </tr>
                  </table> 
                </div>  
                <div class="form-group">
                  <table class="table-ex">
                    <tr>
                      <td width="1px"><label for="edition" class="control-label">Estatus:</label></td>
                      <td>&nbsp;</td>
                      <td>{{ Form::text('status', null, array('class'=>'form-control', 'placeholder'=>'Estatus')) }}</td>
                      <td><label for="edition" class="control-label">&nbsp;</label></td>
                      <td > 
                         <div class="box-radio status-green" data-toggle="tooltip" data-placement="top" title="Finalizado">{{ Form::radio('color', '1', true ); }}</div>  
                      </td><td >    
                         <div class="box-radio status-yellow" data-toggle="tooltip" data-placement="top" title="En Proceso">{{ Form::radio('color', '2', false); }}</div>  
                      </td><td > 
                         <div class="box-radio status-red" data-toggle="tooltip" data-placement="top" title="Detenido">{{ Form::radio('color', '3', false); }}</div>   
                      </td>
                    </tr>
                  </table> 
                </div>              
                <div class="form-group">
                  <table class="table-ex">
                    <tr>
                      <td width="1px"><label for="edition" class="control-label">Edición&nbsp;número:</label> </td>
                      <td>&nbsp;</td>
                      <td width="100px">{{ Form::select('edition', $edition, null, array('class'=>'form-control', 'placeholder'=>'Edición')) }}</td>
                      <td>&nbsp;</td>
                      <td width="1px"><label for="magazine" class="control-label">Revista:</label> </td>
                      <td>&nbsp;</td>
                      <td>{{ Form::select('magazine', $magazine, null, array('class'=>'form-control', 'placeholder'=>'Revista')) }}</td>
                    </tr>
                  </table> 
                </div>              
                <div class="form-group">
                  <table class="table-ex">
                    <tr>
                      <td><label for="comments" class="control-label">Comentarios:</label></td>
                      <td>{{ Form::textarea('comments', null, array('class'=>'form-control', 'placeholder'=>'Comentarios')) }}</td>
                    </tr>
                  </table> 
                </div>                 
                <div class="form-group">
               {{ Form::hidden('id_user', Auth::user()->id, array('class'=>'form-control', 'placeholder'=>'Ejecutiva')) }}    
                </div>              
                <div class="form-group"> 
                  {{ Form::hidden('id_client', null, array('class'=>'form-control', 'placeholder'=>'Cliente')) }}  
                </div>         
                <div class="form-group" id="sandbox-container">  
                  <table class="table-ex">
                    <tr>
                      <td><label for="date" class="control-label">Fecha:</label></td>
                      <td>
                        <div id="sandbox-container" class="input-append date"> 
                        <div class="input-group input-group">
                          {{ Form::text('date', null, array('class'=>'form-control span2', 'readonly', 'placeholder'=>'Fecha')) }} 
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div> 
                          <span class="add-on"></span>
                        </div> 
                      </td>
                      <td>&nbsp;</td>
                      <td><label for="time" class="control-label">Hora:</label></td>
                      <td>&nbsp;</td>
                      <td>
                        <div class="input-append"> 
                        <div class="input-group bootstrap-timepicker">
                          {{ Form::text('time', null, array('class'=>'form-control span2 input-small', 'readonly', 'placeholder'=>'Hora', 'id'=>'timepicker')) }} 
                          <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        </div>  
                        </div>
                      </td>
                    </tr>
                  </table>  
                </div>                                     
                {{ Form::hidden('url', URL::current()) }}
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default font-orange" data-dismiss="modal">Cerrar</button>
        {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}}    
      </div>

          {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->