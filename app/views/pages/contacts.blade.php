@extends ('layouts.default')

@section ('content')

    <section id="contacts" class="page white">

        @include('includes.formContact') 

        @include('includes.menu')
        
        @include('includes.perfil') 
        
        <article class="nav revistasbg green "> 
          &nbsp; 
        </article> 

        @include('includes.alerts') 

        <article class="white">
          <br />          
          <div class="orange nav-2">
            <div class="left row col-28"> 
              <table align="left">
                <tr>
                  <td>
                    <i class="fa fa-book"></i> &nbsp; Lista de contactos  
                  </td>
                </tr>
              </table> 
            </div>
            <div class="right row col-22"> 
              <table align="right">
                <tr>
                  <td> 
                    <button type="button" class="btn-sm btn-link" data-toggle="modal" data-target="#formContact">
                        Agregar contacto &nbsp; <i class="fa fa-plus-circle"></i>
                    </button> 
                  </td>
                </tr>
              </table>
            </div> 
          </div>
          <div class="wrap-clients">
            @include('includes.contacts')  
          </div>  
        <div class="grey nav-2 right">
          &nbsp;
        </div> 
          <br />        
        </article>
    </section>    

@stop