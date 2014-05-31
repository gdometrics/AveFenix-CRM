@extends ('layouts.default')

@section ('content')

    <section id="status" class="page white"> 

        @include('includes.menu')
        
        @include('includes.perfil') 
         
        <article class="nav revistasbg green"> 
          &nbsp; 
        </article> 

        @include('includes.alerts')  

        <article class="white"> 
          <br />          
          <div class="orange nav-2">
            <div class="left row col-1"> 
              <table>
                <tr>
                  <td><i class="fa fa-file-text-o"></i> &nbsp; Estatus</td>
                  <td>
                    <div id="sandbox-container" class="input-append date filter"> 
                      <div class="input-group input-group">
                        {{ Form::text('date-ini', null, array('class'=>'form-control input-sm clear')) }}  
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      </div> 
                      <span class="add-on"></span>
                    </div> 
                  </td>
                  <td>
                    <div id="sandbox-container" class="input-append date filter"> 
                      <div class="input-group input-group">
                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {{ Form::text('date-end', null, array('class'=>'form-control input-sm clear')) }}  
                      </div> 
                      <span class="add-on"></span>
                    </div> 
                  </td>
                  <td>
                    {{ Form::select('sort', array('DESC'=>'Descendente' , 'ASC'=>'Ascendente'), null, array('class'=>'form-control input-sm', 'placeholder'=>'Orden')) }}                             
                  </td>
                  <td id="magazine-input"> 
                    {{ Form::select('magazines', $magazine, null,array('class'=>'form-control input-sm')) }}  
                  </td> 
                  <td id="edition-input">  
                    {{ Form::select('editions', array(''=>''), null,array('class'=>'form-control input-sm hidden', 'id'=>'edition' )) }}  
                  </td> 
                  <td id="clients-input">  
                    {{ Form::select('clients', $clients, null,array('class'=>'form-control input-sm', 'id'=>'clients' )) }}  
                  </td> 
                  <td id="executive-input">  
                    {{ Form::select('executive', $executive, null,array('class'=>'form-control input-sm', 'id'=>'Responsable por el cliente' )) }}  
                  </td> 
                  <td>  
                    {{ Form::select('color', array('0'=>'Todos','1'=>'Verde','2'=>'Amarillo','3'=>'Rojo',), null,array('class'=>'form-control input-sm', 'id'=>'Color' )) }}  
                  </td> 
                </tr>
              </table> 
            </div> 
          </div>
          <div class="wrap-clients">
            @include('includes.status')
          </div>
          <div class="grey nav-2 right">
            &nbsp;
          </div> 
          <br />       
        </article>
    </section>    

@stop