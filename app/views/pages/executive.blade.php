@extends ('layouts.default')

@section ('content')

    <section id="dashboard" class="page white">

        @include('includes.alerts')  

        @include('includes.menu')
        
        @include('includes.perfil') 
         
        <article class="nav revistasbg green"> 
          &nbsp; 
        </article> 
        <article class="white">
          <br /> 
          <div class="list-clients"> 
             <br />
              <p> Seleccione un cliente <br />
              ...
              </p> 
              @foreach($clients as $client) 
              <div class="row circle">
                <div> 
                  <a href="{{ url('users/executive/status/'.$client['id']) }}"> 
                    {{ HTML::image("photos/".$client['photo'], $client['name'] , array('class' => 'img-circle grey-cicle')) }} 
                  </a> 
                </div>
                {{ $client['name'] }} 
              </div> 
              @endforeach   
            <br />  
          </div>
          <br />        
        </article>
    </section>    

@stop