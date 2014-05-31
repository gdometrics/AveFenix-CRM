             <div class="panel-group" id="accordion">
              @foreach($contacts as $contact)  
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">   
                    <div class="left row col-2 font-grey"> 
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $contact->id }}">{{ $contact->firstname." ".$contact->lastname }}</a>
                    </div>
                    <div class="right row col-2 font-grey"> 
                    <a data-toggle="collapse" data-parent="#accordion" href="#edit{{ $contact->id }}"><i class="fa fa-pencil"></i></a>
                    </div> 
                  </h4>
                </div>
                <div id="edit{{ $contact->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                      {{ Form::open(array('url'=>'contacts/edit/'.$contact->id, 'id'=>'form-edit-'.$contact->id, 'class'=>'form-signup')) }} 
                      <div class="perfil no-padding"> 
                        <table>
                          <tr>
                            <td><p class="data-edit">Nombre:</p></td>
                            <td>{{ Form::text('firstname', $contact->firstname, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Apellido:</p></td>
                            <td>{{ Form::text('lastname', $contact->lastname, array('class'=>'form-control', 'placeholder'=>'Apellido')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Departamento:</p></td>
                            <td>{{ Form::text('department', $contact->department, array('class'=>'form-control', 'placeholder'=>'Departamento')) }} </td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Cargo:</p></td>
                            <td>{{ Form::text('job', $contact->job, array('class'=>'form-control', 'placeholder'=>'Cargo')) }}</td>
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
                                  {{ Form::text('birthdate', date('d-m-Y',strtotime($contact->birthdate)), array('class'=>'form-control span2', 'readonly', 'placeholder'=>'Fecha de nacimiento')) }} 
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div> 
                                  <span class="add-on"></span>
                                </div>
                              </div>  
                            </td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Teléfono principal:</p></td>
                            <td>{{ Form::text('phone1', $contact->phone1, array('class'=>'form-control', 'placeholder'=>'Teléfono principal')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Teléfono secundario:</p></td>
                            <td>{{ Form::text('phone2', $contact->phone2, array('class'=>'form-control', 'placeholder'=>'Teléfono secundario')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Correo electrónico:</p></td>
                            <td>{{ Form::text('email', $contact->email, array('class'=>'form-control', 'placeholder'=>'Correo electrónico')) }}</td>
                          </tr>
                          <tr>
                            <td><p class="data-edit">Cliente:</p></td> 
                              <td>{{ Form::select('id_client', $clients, $contact->id_client, array('class'=>'form-control', 'placeholder'=>'Cliente')) }}</td>  
                          </tr>
                        </table> 
                      </div>                                          
                        {{ Form::hidden('url', URL::current()) }} 
                      
                        <div class="right"> 
                           {{ Form::submit('Guardar', array('class'=>'btn btn-default font-orange'))}} 
                        </div>

                            {{ Form::hidden('url', URL::current()) }}
                            
                      
                      {{ Form::close() }}
                  </div>
                </div>
                <div id="{{ $contact->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                    <div class="perfil">
                        <p class="font-orange">Información basica</p>
                        <p class="data">Nombre y apellido: {{ $contact->firstname." ".$contact->lastname }}</p>
                        <p class="data">Departamento: {{ $contact->department }}</p>
                        <p class="data">Cargo: {{ $contact->job }}</p> 
                        <p class="data">Cliente: {{ $contacto->clientName($contact) }}</p>  
                    </div> 
                    <div class="perfil"> 
                        <p class="data">Cumpleaños: 
                        <?php
                        setlocale(LC_ALL,"es_ES");
                        echo utf8_encode(strftime("%A %d de %B de %Y",strtotime($contact->birthdate)));  
                        ?>
                        </p>
                        <p class="data">Teléfono 1: {{ $contact->phone1 }}</p>
                        <p class="data">Teléfono 2: {{ $contact->phone2 }}</p>
                        <p class="data">Correo eléctronico: {{ $contact->email }}</p> 
                    </div>
                  </div>
                </div>
              </div> 
              @endforeach  
             </div>  