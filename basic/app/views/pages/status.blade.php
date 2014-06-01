@extends ('layouts.default')

@section ('content')

    <section id="status" class="page white">

        @include('includes.formStatusEdit') 

        @include('includes.formStatus') 

        @include('includes.menu')
        
        @include('includes.perfilClient') 
         
        <article class="nav revistasbg green"> 
          &nbsp; 
        </article> 

        @include('includes.alerts')  

        <article class="white"> 
        <div class="search"> 
          <div class="input-group">
            {{ Form::text('search', null, array('class'=>'form-control input-sm','name'=>'search')) }} 
            <span class="input-group-btn">
              <button id="send-search" class="btn btn-default input-sm" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>  
          <div class="orange nav-2">
            <div class="left row col-28">
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
                    {{ Form::select('magazines', $magazine, null,array('class'=>'form-control input-sm', 'placeholder'=>'Revista')) }}  
                  </td> 
                  <td id="edition-input">  
                    {{ Form::select('editions', array(''=>''), null,array('class'=>'form-control input-sm hidden', 'id'=>'edition' )) }}  
                  </td>  
                  <td>   
                    {{ Form::select('color', ['0'=>'Estado','1'=>'Finalizado','2'=>'En Proceso','3'=>'Detenido'], null,array('class'=>'form-control input-sm', 'id'=>'Color' )) }}  
                  </td> 
                </tr>
              </table>   
            </div>
            <div class="right row col-22"> 
              <table width="100%">
                <tr>
                  <td>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#formStatus">
                        Agregar estatus &nbsp; <i class="fa fa-plus-circle"></i>
                    </button> 
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