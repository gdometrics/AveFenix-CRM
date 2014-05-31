
<article id="perfil" class="ini-sesion">
    <br />
    <div class="perfil">
      {{ HTML::image("photos/".$client["photo"], $client["name"], array('class' => 'img-circle img-perfil')) }} 
    </div>
    <div class="perfil">
      <p class="name font-orange">{{ $client["name"] }}</p>
      <p class="data">Razon social: {{ $client["razonsocial"] }}</p>
      <p class="data">Rubro: {{ $client["business"] }}</p> 
      @if(!$client["rif"])
        <p class="data">Rif: {{ $client->findRif($client) }}</p>
      @else
        <p class="data">Rif: {{ $client["rif"] }}</p> 
      @endif  
      <p class="data">Página web: {{ $client["webpage"] }}</p> 
      <p class="data">Correo electrónico: {{ $client["email"] }}</p> 
    </div>
    <div class="perfil">
      <p class="font-orange">Información basica</p>
      <p class="data">Dirección principal: {{ $client["address1"] }}</p>
      <p class="data">Dirección secundaria: {{ $client["address2"] }}</p>
      <p class="data">Teléfono principal: {{ $client["phone1"] }}</p> 
      <p class="data">Teléfono secundario: {{ $client["phone2"] }}</p> 
    </div>  
    <br /><br />
</article>
 