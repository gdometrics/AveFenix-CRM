@extends ('layouts.default')

@section ('content')
    
    <section id="home" class="white"> 

        @include('includes.alerts')

        <br /> <br /> <br /> 
        <article class="ini-sesion"> 
            <br />
            <div class="title">Iniciar sesión</div> 
            <br /> 
            {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }} 
              <div class="login-form">
                
                <div class="form-group">
                  {{ Form::label('email', 'Correo electrónico') }}
                  {{ Form::text('email', null, array('placeholder' => 'usuario@revistaexclusiva.com', 'class' => 'form-control')) }}
                </div>  
                <div class="form-group">
                  {{ Form::label('password', 'Contraseña') }}
                  {{ Form::password('password', array('placeholder' => '&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;', 'class' => 'form-control')) }}        
                </div>
                
              {{ Form::button('Ingresar', array('type' => 'submit', 'class' => 'btn btn-default font-orange')) }}  
              <a href="{{ url('home/register') }}" class="btn btn-default font-orange"> Nuevo usuario</a>  
              </div>
            {{ Form::close() }}
 
            <br />
        </article>  
        <article class="calendario">
            &nbsp; <br /> &nbsp; <br /> &nbsp;
        </article>
    </section>    

@stop