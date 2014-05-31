    @if(Session::has('message')) 
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  
         <strong>¡Importante!</strong> {{ Session::get('message') }} 
             <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
             </ul>     
    </div>    
    @endif     
    @if(Session::has('confirmation')) 
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  
         <strong>¡Muy bien!</strong> {{ Session::get('confirmation') }} 
    </div>    
    @endif 