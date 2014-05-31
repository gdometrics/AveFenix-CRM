@extends ('layouts.default')

@section ('content')
    
    <section id="register" class="white"> 

        <br />  

        @include('includes.alerts')

        <article class="ini-sesion"> 
            <br />
            <div class="title">Registro de perfil</div> 
            <br /> 
            {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }} 
            <div class="register-form">
              
                <div class="form-group">
                  {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Apellido')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}    
                </div>              
                <div class="form-group">
               {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }}    
                </div>              
                <div class="form-group">
               {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirmar contraseña')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('phone1', null, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}    
                </div>              
                <div class="form-group">
               {{ Form::text('phone2', null, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}    
                </div>              
                <div class="form-group" id="sandbox-container">  
                  <div class="input-append date"> 
                  <div class="input-group input-group">
                    {{ Form::text('birthdate', null, array('class'=>'form-control span2', 'readonly', 'placeholder'=>'Fecha de nacimiento')) }} 
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div> 
                    <span class="add-on"><i class="icon-th"></i></span>
                  </div>
                </div>             
                     
                {{ Form::hidden('url', URL::current()) }}

               {{ Form::submit('Registrar', array('class'=>'btn btn-default font-orange'))}}                             
            </div>
          {{ Form::close() }}
 
            <br />
        </article>  
        <article class="calendario">
            &nbsp; <br /> &nbsp; <br /> &nbsp;
        </article>
    </section>    

@stop