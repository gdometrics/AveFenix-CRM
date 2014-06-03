             <div class="panel-group" id="accordion">
              @foreach($users as $user)  
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">  
                    <div class="left row col-2 font-grey"> 
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $user->id }}">
                        <table width="100%" >
                          <tr>
                            <td>{{ $user->fullname() }}</a></td>
                          </tr>
                        </table> 
                    </div>
                    <div class="right row col-2 font-grey"> 
                    <a data-toggle="collapse" data-parent="#accordion" href="#edit{{ $user->id }}"><i class="fa fa-pencil"></i></a>
                    </div>
                  </h4>
                </div> 
                <div id="edit{{ $user->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                      {{ Form::open(array('url'=>'users/edit/'.$user->id, 'id'=>'form-edit-'.$user->id, 'class'=>'form-signup')) }} 
                    <div class="perfil">
                        {{ HTML::image("photos/".$user->photo, $user->fullname(), array('class' => 'img-circle img-perfil')) }} 
                      </div>
                      <div class="perfil">
                        <p class="font-orange">Información editable</p>  
                        <p class="data">{{ Form::text('job', $user->job, array('class'=>'form-control', 'placeholder'=>'Cargo')) }}</p> 
                        <p class="data">
                          {{ Form::select('level', User::$level , $user->level, array('class'=>'form-control', 'placeholder'=>'Estado del usuario')) }}
                        </p> 
                      </div>
                      <div class="perfil"> 
                        <p class="font-orange">Información basica</p>
                        <p class="data">Nombre y Apellido: {{ $user->fullname() }}</p>
                        <p class="data">Fecha de nacimiento: {{ $user->lastname }}</p>
                        <p class="data">Fecha de nacimiento:
                          <?php
                          setlocale(LC_ALL,"es_ES");
                          echo utf8_encode(strftime("%A %d de %B de %Y",strtotime($user->birthdate)));  
                          ?> 
                        </p>
                        <p class="data">Teléfono principal: {{ $user->phone1 }}</p> 
                        <p class="data">Teléfono secundario: {{ $user->phone2 }}</p> 
                        <p class="data">Correo electrónico: <a href="{{ 'mailto:'.$user->email }}">{{ $user->email }}</a></p> 
                      </div>   

                        {{ Form::hidden('url', URL::current()) }}
                        <div class="right"> 
                        {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                        </div>    
                      
                      {{ Form::close() }}
                  </div>
                </div>
                <div id="{{ $user->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                      <div class="perfil">
                        {{ HTML::image("photos/".$user->photo, $user->fullname(), array('class' => 'img-circle img-perfil')) }} 
                      </div>
                      <div class="perfil">
                        <p class="font-orange">Información basica</p>
                        <p class="name data">Nombre y apellido: {{ $user->fullname() }}</p>
                        <p class="data">Cargo: {{ $user->job }}</p> 
                        <p class="data">Nivel de usuario: {{ $user->level() }}</p> 
                      </div>
                      <div class="perfil"> 
                        <p class="font-orange">&nbsp;</p>
                        <p class="data">Fecha de nacimiento:
                          <?php
                          setlocale(LC_ALL,"es_ES");
                          echo utf8_encode(strftime("%A %d de %B de %Y",strtotime($user->birthdate)));  
                          ?>
                        </p>
                        <p class="data">Teléfono principal: {{ $user->phone1 }}</p> 
                        <p class="data">Teléfono secundario: {{ $user->phone2 }}</p> 
                        <p class="data">Correo electrónico: <a href="{{ 'mailto:'.$user->email }}">{{ $user->email }}</a></p> 
                      </div>   
                  </div>
                </div>
              </div> 
              @endforeach  
              </div> 