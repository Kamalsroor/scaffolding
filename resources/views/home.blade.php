@extends('layouts.apptest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
{{-- <table>
  <tbody>

    @foreach ($Admins as $admin)
    <tr>
    <td>{{$admin->name}}</td>
    <td>{{$admin->email}}</td>
    <td>{{$admin->password}}</td>
    <td>{{$admin->getRoleNames()->first()}}</td>
    <td>
      <ul>

        @foreach ($admin->getPermissionsViaRoles() as $Permission)
          <li>{{$Permission->name}}</li>
        @endforeach
      </ul>
    </td>

    </tr>


    @endforeach
  </tbody>
</table>
--}}
{{-- {{ $Admins->links() }} --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
