@extends('backend.layouts.app')

@section('title', __('View User'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                

                <tr>
                    <th>@lang('Avatar')</th>
                    <td><img src="https://gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?s=80&d=mp" class="user-profile-image" /></td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $peserta->name }}</td>
                </tr>

                <tr>
                    <th>@lang('E-mail Address')</th>
                    <td>{{ $peserta->email }}</td>
                </tr>

               

                <tr>
                    <th>No Hp</th>
                    <td>{{ $peserta->no_hp ?? __('N/A') }}</td>
                </tr>

               

              

                
              
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Account Created'):</strong> @displayDate($peserta->created_at) ({{ $peserta->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($peserta->updated_at) ({{ $peserta->updated_at->diffForHumans() }})

                
            </small>
        </x-slot>
    </x-backend.card>
@endsection
