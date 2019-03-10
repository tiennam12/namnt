@extends('layouts.app')

@section('content')
<<<<<<< HEAD

=======
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="description" type="" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ App\Product::find($id=1)->category_name}}" required autofocus>
=======
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Total price') }}</label>

                            <div class="col-md-6">
<<<<<<< HEAD
                                <input id="total_price" type="" class="form-control{{ $errors->has('total_price') ? ' is-invalid' : '' }}" name="total_price" value="{{ App\Product::find($id=1)->price}}" required>
=======
                                <input id="total_price" type="total_price" class="form-control{{ $errors->has('total_price') ? ' is-invalid' : '' }}" name="total_price" required>
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a

                                @if ($errors->has('total_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
