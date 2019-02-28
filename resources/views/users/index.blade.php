@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
                <div class="card-header">User List</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                            <tr class="row_{{ $user->id }}">
                              <th scope="row">{{ $user->id }}</th>
                                <td>
                                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                                </td>
                              <td>{{ $user->email }}</td>
                              <td>
                                  <a href="users/{{ $user->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                  <a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $user->id }}">Delete</a>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-del-user').click(function() {
            if (confirm('You are sure?')) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var userId = $(this).data('user-id');
                var url = '/users/' + userId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        if (result.status) {
                            $('.row_' + userId).remove();
                        } else {
                            alert(result.msg);
                        }
                    },
                    error: function() {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
