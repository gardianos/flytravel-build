@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-5">

            <form action="{{ route('percentage.update') }}" method="post">

                @csrf
                <div class="form-group">
                    <label class="form-label">Percentage</label>
                    <input class="form-control" name="percentage" type="number" value="{{ $percentage }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</div>

@endsection
