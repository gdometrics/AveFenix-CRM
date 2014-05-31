<!-- Modal -->
<div class="modal fade" id="formClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Cliente</h4>
      </div>
      <div class="modal-body">

        @include('includes.alerts-box') 
        
          {{ Form::open(array('url'=>'clients/create', 'class'=>'form-signup')) }} 
            <div class="register-form">
              
                <div class="form-group">
                  {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('razonsocial', null, array('class'=>'form-control', 'placeholder'=>'Razon social')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('business', null, array('class'=>'form-control', 'placeholder'=>'Rubro')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('address1', null, array('class'=>'form-control', 'placeholder'=>'Dirección principal')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('address2', null, array('class'=>'form-control', 'placeholder'=>'Direccion secundaria')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('phone1', null, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('phone2', null, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('rif', null, array('class'=>'form-control', 'placeholder'=>'RIF')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('webpage', null, array('class'=>'form-control', 'placeholder'=>'Página web')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}    
                </div>       
                <div class="form-group">       
               Crear sub cliente: {{ Form::radio('subclient', 1, array( 'class'=>'form-control')) }} 
               Sin sub clientes: {{ Form::radio('subclient', 0, array('class'=>'form-control')) }} 
                </div>     
                <div id="subclients" hidden class="form-group">   
                <blockquote>   
                  <table id="inputsubclient0" class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name0', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user0', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>   
                  <table id="inputsubclient1" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name1', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user1', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>   
                  <table id="inputsubclient2" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name2', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user2', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>   
                  <table id="inputsubclient3" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name3', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user3', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>   
                  <table id="inputsubclient4" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name4', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user4', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>  
                  <table id="inputsubclient5" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name5', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user5', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>  
                  <table id="inputsubclient6" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name6', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user6', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>  
                  <table id="inputsubclient7" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name7', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user7', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table>  
                  <table id="inputsubclient8" hidden class="table-cl">
                    <tr>
                      <td>Nombre de sub cliente: </td>
                      <td>{{ Form::text('sub-cl-name8', null, array('class'=>'form-control', 'placeholder'=>'Nombre de sub cliente')) }}</td>
                    </tr>
                    <tr>
                      <td>Responsable por el cliente: </td>
                      <td>{{ Form::select('id_user8', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}</td>
                    </tr>
                  </table> 
                  </blockquote> 
                    <button id="addsubclient" type="button" class="btn btn-default font-orange" >
                      Agregar <i class="fa fa-plus-circle"></i>
                    </button> 
                    <button id="deletesubclient" type="button" class="btn btn-default font-orange" >
                      Eliminar <i class="fa fa-minus-circle"></i>
                    </button> 
                </div>
                <div class="form-group">   
               {{ Form::select('id_user', $users, $users, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }}  
                </div>                                          
                {{ Form::hidden('url', URL::current()) }}
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default font-orange" data-dismiss="modal">Cerrar</button>
        {{ Form::submit('Registrar', array('class'=>'btn btn-default font-orange'))}}    
      </div>

          {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->