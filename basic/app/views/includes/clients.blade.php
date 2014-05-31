             <div id="add-subclient" hidden>
              {{ Form::open(array('url'=>'clients/createsub', 'id'=>'form-createsub', 'class'=>'form-signup')) }}           

                       {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}     
                       {{ Form::text('business', null, array('class'=>'form-control', 'placeholder'=>'Rubro')) }} 
                       {{ Form::hidden('id_parent', null, array('id'=>'id_parent','class'=>'form-control', 'placeholder'=>'Parent')) }} 
                       {{ Form::text('address1', null, array('class'=>'form-control', 'placeholder'=>'Dirección principal')) }}
                       {{ Form::text('phone1', null, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}
                       {{ Form::text('webpage', null, array('class'=>'form-control', 'placeholder'=>'Página web')) }} 
                       {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}   
                       {{ Form::select('id_user', $users, null, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }} 
                    {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                {{ Form::hidden('url', URL::current()) }}

              {{ Form::close() }}
             </div>
             <div class="panel-group" id="accordion">
              @foreach($clients as $client)  
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">  
                    <div class="left row col-2 font-grey"> 
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $client->id }}">{{ $client->name }}</a>
                    </div>
                    <div class="right row col-2 font-grey"> 
                    <a class="popup-add" href="#" class="btn btn-primary" data-toggle="popover" title="Agregar subcliente" ><i class="fa fa-plus-circle"></i></a>  
                    &nbsp;
                    <a data-toggle="collapse" data-parent="#accordion" href="#edit{{ $client->id }}"><i class="fa fa-pencil"></i></a>
                    </div> 
                  </h4>
                </div>
                <div id="edit{{ $client->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                      {{ Form::open(['url'=>'clients/edit/'.$client->id, 'files' => true, 'method' => 'post', 'id'=>'form-edit-'.$client->id, 'class'=>'form-signup']) }} 
                      <div class="perfil no-padding"> 
                       <p class="data-edit">Nombre:</p> 
                       <p class="data-edit">Razon social:</p> 
                       <p class="data-edit">Rif:</p> 
                       <p class="data-edit">Rubro:</p> 
                       <p class="data-edit">Página web:</p> 
                       <p class="data-edit">Imagen</p> 
                      </div>
                      <div class="perfil no-padding client-anchor"> 
                       {{ Form::text('name', $client->name, array('class'=>'form-control', 'placeholder'=>'Nombre')) }} 
                       {{ Form::text('razonsocial', $client->razonsocial, array('class'=>'form-control', 'placeholder'=>'Razon social')) }} 
                       {{ Form::text('rif', $client->rif, array('class'=>'form-control', 'placeholder'=>'Rif')) }}   
                       {{ Form::text('business', $client->business, array('class'=>'form-control', 'placeholder'=>'Rubro')) }} 
                       {{ Form::text('webpage', $client->webpage, array('class'=>'form-control', 'placeholder'=>'Página web')) }} 
                       {{ Form::file('photo', array('class'=>'form-control', 'placeholder'=>'Imagen')) }}  
                      </div> 
                      <div class="perfil no-padding"> 
                       <p class="data-edit">Dirección principal:</p> 
                       <p class="data-edit">Dirección secundaria:</p> 
                       <p class="data-edit">Teléfono principal:</p> 
                       <p class="data-edit">Teléfono secundario:</p> 
                       <p class="data-edit">Correo electrónico:</p>  
                       <p class="data-edit">Responsable por el cliente:</p>  
                      </div>
                      <div class="perfil no-padding client-anchor">   
                       {{ Form::text('address1', $client->address1, array('class'=>'form-control', 'placeholder'=>'Dirección principal')) }} 
                       {{ Form::text('address2', $client->address2, array('class'=>'form-control', 'placeholder'=>'Dirección secundaria')) }} 
                       {{ Form::text('phone1', $client->phone1, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }} 
                       {{ Form::text('phone2', $client->phone2, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}  
                       {{ Form::text('email', $client->email, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}   
                       {{ Form::select('id_user', $users, $client->id_user, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }} 
           
                      </div>                                          
                        {{ Form::hidden('url', URL::current()) }} 
                          <div class="left"> 
                           {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                          </div>

                            {{ Form::hidden('url', URL::current()) }}
                            
                      
                      {{ Form::close() }}
                  </div>
                </div>
                <div id="{{ $client->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="box-client box-img"> 
                        {{ HTML::image("photos/".$client->photo, $client->name, array('class' => 'img-circle img-perfil')) }} 
                    </div>
                    <div class="box-client">
                        <p class="font-orange">Información basica</p>
                        <p class="data">Nombre: {{ $client->name }}</p>
                        <p class="data">Razon social: {{ $client->razonsocial }}</p>
                        <p class="data">Rif: {{ $client->rif }}</p>
                        <p class="data">Rubro: {{ $client->business }}</p>
                        <p class="data">Página web: {{ $client->webpage }}</p> 
                    </div>
                    <div class="box-client">  
                        <p class="data">Dirección principal: {{ $client->address1 }}</p>
                        <p class="data">Dirección secundaria: {{ $client->address2 }}</p>
                        <p class="data">Teléfono principal: {{ $client->phone1 }}</p>
                        <p class="data">Teléfono secundario: {{ $client->phone2 }}</p>
                        <p class="data">Correo eléctronico: {{ $client->email }}</p>
                        <p class="data">Responsable por el cliente: {{ $client->executiveName() }}</p> 
                    </div>
                    <div class="clear"></div><br />
                    @foreach($client->findChildClients($client->id) as $subclient)
                      <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">  
                          <div class="left row col-2 font-grey"> 
                            <a data-toggle="collapse" href="#sub{{ $subclient->id }}">{{ $client->name." - ".$subclient->name }}</a>
                          </div>
                          <div class="right row col-2 font-grey"> 
                          <a data-toggle="collapse" href="#subedit{{ $subclient->id }}"><i class="fa fa-pencil"></i></a>
                          </div> 
                        </h4>
                      </div>
                      <div id="subedit{{ $subclient->id }}" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            {{ Form::open(['url'=>'clients/store/'.$subclient->id, 'files' => true, 'method' => 'post', 'id'=>'form-edit-'.$subclient->id, 'class'=>'form-signup']) }} 
                            <div class="perfil no-padding"> 
                             <p class="data-edit">Nombre:</p>  
                             <p class="data-edit">Rubro:</p> 
                             <p class="data-edit">Página web:</p> 
                             <p class="data-edit">Imagen</p> 
                            </div>
                            <div class="perfil no-padding subclient-anchor"> 
                             {{ Form::text('name', $subclient->name, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}  
                             {{ Form::text('business', $subclient->business, array('class'=>'form-control', 'placeholder'=>'Rubro')) }} 
                             {{ Form::text('webpage', $subclient->webpage, array('class'=>'form-control', 'placeholder'=>'Página web')) }}   
                             {{ Form::file('photo', array('class'=>'form-control', 'placeholder'=>'Imagen')) }}  
                            </div> 
                            <div class="perfil no-padding"> 
                             <p class="data-edit">Dirección:</p>  
                             <p class="data-edit">Teléfono :</p>  
                             <p class="data-edit">Correo electrónico:</p>  
                             <p class="data-edit">Responsable por el cliente:</p>  
                            </div>
                            <div class="perfil no-padding subclient-anchor">   
                             {{ Form::text('address1', $subclient->address1, array('class'=>'form-control', 'placeholder'=>'Dirección principal')) }}  
                             {{ Form::text('phone1', $subclient->phone1, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}  
                             {{ Form::text('email', $subclient->email, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}   
                             {{ Form::select('id_user', $users, $subclient->id_user, array('class'=>'form-control', 'placeholder'=>'Responsable por el cliente')) }} 
                 
                            </div>                                          
                              {{ Form::hidden('url', URL::current()) }} 
                                <div class="left"> 
                                 {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                                </div>

                                  {{ Form::hidden('url', URL::current()) }}
                                  
                            
                            {{ Form::close() }}
                        </div>
                      </div>
                      <div id="sub{{ $subclient->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="box-client box-img"> 
                              {{ HTML::image("photos/".$subclient->photo, $subclient->name, array('class' => 'img-circle img-perfil')) }} 
                          </div>
                          <div class="box-client">
                              <p class="font-orange">Información basica</p>
                              <p class="data">Nombre: {{ $subclient->name }}</p> 
                              <p class="data">Rubro: {{ $subclient->business }}</p>
                              <p class="data">Página web: {{ $subclient->webpage }}</p> 
                          </div>
                          <div class="box-client">  
                              <p class="data">Dirección: {{ $subclient->address1 }}</p> 
                              <p class="data">Teléfono: {{ $subclient->phone1 }}</p> 
                              <p class="data">Correo eléctronico: {{ $subclient->email }}</p>
                              <p class="data">Responsable por el cliente: {{ $subclient->executiveName() }}</p> 
                          </div>
                          <div class="clear"></div> 
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div> 
              @endforeach  
              </div> 