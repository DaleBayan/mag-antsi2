@extends('layouts.backend.app')

@section('content')
<x-backend.alert-success />
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
           
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fa-solid fa-user-group me-2"></i>SYSTEM USERS</h5>
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Create an Account</a>
            </div>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">User Role</th>
                  <th scope="col">Email</th>
                  <th scope="col">Username</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->user_role }}</td>
                    <td>{{ Str::mask($user->email, '*', 0, 5) }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>
                    <td>
                        <a href="{{ route('users.edit', Crypt::encryptString($user->id)) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('password.edit', Crypt::encryptString($user->id)) }}" class="btn btn-sm btn-success">Reset Password</a>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{$user->id}}">Delete</button>
                    </td>
                </tr>

                {{-- [START] - Delete User Modal --}}
                <div class="modal fade" id="deleteUserModal{{$user->id}}" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete <b>{{ $user->username }}</b>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('users.destroy', Crypt::encryptString($user->id)) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-success">Confirm</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- [END] - Delete User Modal --}}

                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection