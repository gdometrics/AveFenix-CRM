<!--  Modal -->
<div class="modal fade" id="formContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar contacto</h4>
      </div>
      <div class="modal-body">

        @include('includes.alerts-box') 
        
          {{ Form::open(array('url'=>'contacts/create', 'class'=>'form-signup')) }} 
            <div class="register-form">
              
                <div class="form-group">
                  {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Apellido')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('job', null, array('class'=>'form-control', 'placeholder'=>'Cargo')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('department', null, array('class'=>'form-control', 'placeholder'=>'Departamento')) }}    
                </div>         
                <div class="form-group">
               {{ Form::text('phone1', null, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('phone2', null, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}    
                </div>              
                <div class="form-group">   
               {{ Form::select('id_client', $clients, $clients, array('class'=>'form-control', 'placeholder'=>'Cliente')) }}   
                </div>     
                <div class="form-group" id="sandbox-container">  
                  <div id="sandbox-container" class="input-append date"> 
                  <div class="input-group input-group">
                    {{ Form::text('birthdate', null, array('class'=>'form-control span2', 'readonly', 'placeholder'=>'Fecha de nacimiento')) }} 
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div> 
                    <span class="add-on"><i class="icon-th"></i></span>
                  </div>
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