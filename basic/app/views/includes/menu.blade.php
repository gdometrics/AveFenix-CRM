<article id="menu" class="nav orange dropmenu"> 
  <?php 
  if(Auth::user()->level==1){
  ?>
  <a href="{{ url('users/manager') }}"><i class="fa fa-home fa-lg"></i></a> &nbsp; &nbsp;
  <a href="{{ url('users/manager/clients') }}"><i class="fa fa-suitcase"></i> &nbsp; Clientes</a> | 
  <a href="{{ url('users/manager/users') }}"><i class="fa fa-users"></i> &nbsp; Usuarios</a> |  
  <a href="{{ url('users/manager/contacts') }}"><i class="fa fa-book"></i> &nbsp; Contactos</a>  |
  <?php 
  }elseif(Auth::user()->level==2){
  ?> 
  <a href="{{ url('users/executive') }}"><i class="fa fa-home fa-lg"></i></a> &nbsp; &nbsp;
  <a href="{{ url('users/executive/clients') }}"><i class="fa fa-suitcase"></i> &nbsp; Clientes</a> |  
  <a href="{{ url('users/executive/contacts') }}"><i class="fa fa-book"></i> &nbsp; Contactos</a>  |
  <?php 
  }
  ?>
  <div class="btn-group"> 
  <a class="btn-link dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-user"></i> &nbsp; {{ Auth::user()->firstname }} &nbsp; <span class="glyphicon glyphicon-cog"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ URL::current() }}" id="view-perfil">Ver perfil</a></li> 
    <li><a id="edit-perfil">Editar perfil</a></li> 
    <li class="divider"></li>
    <li>{{ HTML::link('users/logout', 'logout') }}</li>
  </ul>
 </div>
</article>