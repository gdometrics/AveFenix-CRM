@extends ('layouts.default')

@section ('content')

    <section id="users" class="page white"> 

        @include('includes.menu')
        
        @include('includes.perfil') 

        <article class="nav revistasbg green "> 
          &nbsp; 
        </article> 
        
        @include('includes.alerts') 

        <article class="white">
          <br />          
          <div class="orange nav-2">
            <div class="left row col-1">
              <table>
                 <tr>
                   <td>
                    <i class="fa fa-users"></i> &nbsp; Lista de usuarios 
                   </td>
                 </tr>
               </table>   
            </div>  
          </div>
          <div class="wrap-clients">
            @include('includes.users') 
          </div>
          <div class="grey nav-2 right">
            &nbsp;
          </div> 
          <br />        
        </article>
    </section>    

@stop