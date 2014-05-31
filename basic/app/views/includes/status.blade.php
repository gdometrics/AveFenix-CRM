             <div class="panel-group" id="accordion">
              @foreach($status as $stat)  
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">   
                    <div class="row row-box font-grey">
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $stat->id }}">

                        <table width="100%">
                          <tr>
                            <td width="1px"><div class="status-circle color-{{ $stat->color }}"></div></td>
                            <td width="1px">&nbsp;</td>
                            <td width="1px">
                              <?php
                              setlocale(LC_ALL,"es_ES");
                              echo utf8_encode(strftime("%A&nbsp;%d&nbsp;de&nbsp;%B&nbsp;",strtotime($stat->date)));  
                              ?> 
                            </td>
                            <td width="1px">&nbsp;</td>
                            <td width="1px">{{ date("H:i",strtotime($stat->time)) }}</td>
                            <td width="1px">&nbsp;</td>
                            <td width="1px" class="inline">{{ $estatus->clientName($stat->id_client) }}</td>
                            <td width="1px">&nbsp;</td>
                            <td>{{ $stat->status }}</td> 
                          </tr>
                        </table>   
                      </a> 
                    </div>   
                  </h4>
                </div>
                <div id="edit{{ $stat->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                      Edit
                  </div>
                </div>
                <div id="{{ $stat->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                    <div class="box-client"> 
                        <p class="data">Contacto: {{ $estatus->contactName($stat->id_contact) }}</p>
                        <p class="data">Revista: {{ $estatus->magazineName($stat->magazine) }}</p>
                        <p class="data">Edición: {{ $stat->edition }}</p>
                        <p class="data">Comentarios: {{ $stat->comments }}</p>
                        <p class="data">Fecha y hora:  
                              <?php
                              setlocale(LC_ALL,"es_ES");
                              echo utf8_encode(strftime("%A&nbsp;%d&nbsp;de&nbsp;%B&nbsp;de&nbsp;%Y",strtotime($stat->date)));  
                              ?> a las {{ date("G:i",strtotime($stat->time)) }}
                        </p>
                        <p class="data">Autor: {{ $estatus->userName($stat->id_user) }}</p> 
                    </div> 
                  </div>
                </div>
              </div> 
              @endforeach  
              </div> 