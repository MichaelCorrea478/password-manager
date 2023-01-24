<div class="table-responsive">
    <table class="table" id="passwords-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Url</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Observation</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($passwords as $password)
            <tr>
                <td>{{ $password->name }}</td>
            <td>{{ $password->url }}</td>
            <td>{{ $password->user_name }}</td>
            <td>{{ $password->password }}</td>
            <td>{{ $password->observation }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['passwords.destroy', $password->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('passwords.show', [$password->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('passwords.edit', [$password->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
