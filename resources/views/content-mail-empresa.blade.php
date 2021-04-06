Bienvenido {{$email_data['name']}}
<br><br>
Welcome to my Website!
<br>
Por favor click en el enlace para verificar tu correo
<br><br>

<a href="{{route('empresa.verifyUser'). '?code=' . $email_data['verification_code'] }}">Click Here!</a>


<br><br>
Thank you!
<br>