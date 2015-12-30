<ul>
@forelse($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <li>No users</li>
@endforelse
</ul>
