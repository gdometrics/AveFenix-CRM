<article id="perfil" class="ini-sesion">
    <br />
    <div class="perfil">
      {{ HTML::image("photos/".Auth::user()->photo, Auth::user()->firstname.''.Auth::user()->lastname, array('class' => 'img-circle img-perfil')) }} 
    </div>
    <div class="perfil">
      <p class="name font-orange">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</p>
      <p class="data">{{ Auth::user()->job }}</p>
      <p class="data">{{ Auth::user()->dpto }}</p> 
    </div>
    <div class="perfil">
      <p class="font-orange">Información basica</p>
      <p class="data">Fecha de nacimiento:  
        <?php
        setlocale(LC_ALL,"es_ES");
        echo utf8_encode(strftime("%A %d de %B de %Y",strtotime(Auth::user()->birthdate)));  
        ?> 
      </p>
      <p class="data">Teléfono principal: {{ Auth::user()->phone1 }}</p> 
      <p class="data">Teléfono secundario: {{ Auth::user()->phone2 }}</p> 
      <p class="data">Correo electrónico: {{ Auth::user()->email }}</p> 
    </div>  
    <br /><br />
</article>
<article id="perfilEdit" class="ini-sesion" hidden>
    <br />
                  {{ Form::open(array('url'=>'users/store/'.Auth::user()->id.'/true', 'files' => true, 'method' => 'post', 'id'=>'form-edit-'.Auth::user()->id, 'class'=>'form-signup')) }} 
                      <div class="perfil no-padding"> 
                        <table>
                          <tr>
                            <td><p class="data-edit">Nombre:</p></td>
                            <td>{{ Form::text('firstname', Auth::user()->firstname, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Apellido:</p></td>
                            <td>{{ Form::text('lastname', Auth::user()->lastname, array('class'=>'form-control', 'placeholder'=>'Apellido')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Contraseña:</p></td>
                            <td>{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }} </td>
                          </tr> 
                          <tr>
                            <td><p class="data-edit">Contraseña:</p></td>
                            <td>{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirmar contraseña')) }} </td>
                          </tr>  
                          <tr>
                            <td><p class="data-edit">Imagen</p></td>
                            <td> {{ Form::file('photo', array('class'=>'form-control', 'placeholder'=>'Imagen')) }}  </td>
                          </tr>  
                        </table> 
                      </div>
                      <div class="perfil no-padding"> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </div>
                      <div class="perfil no-padding"> 
                        <table>
                          <tr>
                            <td>
                              <p class="data-edit">Fecha de nacimiento:</p>
                            </td>
                            <td>
                              <div id="sandbox-container">  
                                <div class="input-append date"> 
                                <div class="input-group input-group-sm">
                                  {{ Form::text('birthdate', date('d-m-Y',strtotime(Auth::user()->birthdate)), array('class'=>'form-control span2', 'readonly', 'placeholder'=>'Fecha de nacimiento')) }} 
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div> 
                                  <span class="add-on"></span>
                                </div>
                              </div>  
                            </td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Correo electrónico:</p></td>
                            <td>{{ Form::text('email', Auth::user()->email, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}</td>
                          </tr> 
                          <tr>
                            <td><p class="data-edit">Teléfono principal:</p></td>
                            <td>{{ Form::text('phone1', Auth::user()->phone1, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Teléfono secundario:</p></td>
                            <td>{{ Form::text('phone2', Auth::user()->phone2, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}</td>
                          </tr>
                        </table> 
                      </div>  
                      <div class="wrap"> 
                        <div class="right"> 
                           {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                        </div>
                      </div>                                        
                        {{ Form::hidden('url', URL::current()) }} 
                      
                        

                            {{ Form::hidden('url', URL::current()) }}
                            
                      
                      {{ Form::close() }} 
    <br />
</article>