<table class="table tb-style-1">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Username</th>
            <th scope="col">Lastname</th>
            <th scope="col">Firstname</th>
            <th scope="col">Middlename</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody class="font-10">
        @foreach($data as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->middlename }}</td>
                <td><a href="/user/{{ $user->id }}/registration">Update</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="pagination-list">
    @include('partials.pagination')
</div>