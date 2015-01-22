<h1>Getting all Users:</h1>
<br/>
@forelse($users as $user)
<li><a href=" {!! $user->name !!}"> {!! $user->name !!} </a></li>
@empty
      <p>No users</p>
@endforelse