             <div class="panel-group" id="accordion">
              @foreach($status as $stat)  
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">   
                    <div class="row  col-2 row-box font-grey">
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $stat->id }}"> 
                        <table width="100%" >
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
                    <div class="right row col-2 font-grey"> 
                    <a class="editStatus" data-toggle="modal" data-target="#formStatusEdit" href="#edit{{ $stat->id }}" ><i class="fa fa-pencil"></i></a>
                    </div>  
                  </h4>
                </div>
                <div class="panel-collapse collapse">
                    {{ Form::open(array('id'=>'edit'.$stat->id)) }} 
                      {{ Form::text('id_status', $stat->id) }}
                      {{ Form::text('id_contact', $stat->id_contact) }}
                      {{ Form::text('status', $stat->status) }}
                      {{ Form::text('edition', $stat->edition) }}
                      {{ Form::text('magazine', $stat->magazine) }}
                      {{ Form::text('comments', $stat->comments) }}
                      {{ Form::text('id_user', Auth::user()->id) }}
                      {{ Form::text('id_client', $stat->id_client) }}
                      {{ Form::text('date', date("d-m-Y",strtotime($stat->date))) }}
                      {{ Form::text('time', date("G:i",strtotime($stat->time))) }} 
                      {{ Form::text('color', $stat->color) }}
                    {{ Form::close() }} 
                </div>
                <div id="{{ $stat->id }}" class="panel-collapse collapse">
                  <div class="panel-body"> 
                    <div class="box-client"> 
                        <p class="data">Cliente: <a href="{{ url('users/'.Auth::user()->level().'/clients#'.$stat->id_client) }}">{{ $estatus->clientName($stat->id_client) }}</a></p>
                        <p class="data">Contacto: <a href="{{ url('users/'.Auth::user()->level().'/contacts#'.$stat->id_contact) }}">{{ $estatus->contactName($stat->id_contact) }}</a></p>
                        <p class="data">Revista: {{ $estatus->magazineName($stat->magazine) }}</p>
                        <p class="data">Edición: {{ $stat->edition }}</p>
                        <p class="data">Comentarios: {{ $stat->comments }}</p>
                        <p class="data">Fecha y hora:  
                              <?php
                              setlocale(LC_ALL,"es_ES");
                              echo utf8_encode(strftime("%A&nbsp;%d&nbsp;de&nbsp;%B&nbsp;de&nbsp;%Y",strtotime($stat->date)));  
                              ?> a las {{ date("G:i",strtotime($stat->time)) }}
                        </p>
                        <p class="data">Autor: <a href="{{ url('users/'.Auth::user()->level().'/users#'.$stat->id_user) }}">{{ $estatus->userName($stat->id_user) }}</a></p> 
                    </div> 
                  </div>
                </div>
              </div> 
              @endforeach  
              </div> 