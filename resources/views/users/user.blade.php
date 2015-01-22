<h2>Current user is:</h2>
<br/>
{!! $user->name !!}
<br/>
{!! $user->email !!}
<br/><br/>

<a href="{!! url('users/all') !!}">Todos los usuarios</a>