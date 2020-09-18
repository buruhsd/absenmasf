@inject('model', '\App\Peserta')

@extends('frontend.layouts.app')

@section('title', __('Create User'))

@section('content')
    <x-forms.post :action="route('frontend.peserta.confirm')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="body">
                <div >
                    

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Perusahaan</label>

                        <div class="col-md-10">
                            <input type="text" name="nama_perusahaan" class="form-control" placeholder="Perusahaan" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">No Hp</label>

                        <div class="col-md-10">
                            <input type="text" name="no_hp" class="form-control" placeholder="no hp" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                        
                   
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">Konfirmasi</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
