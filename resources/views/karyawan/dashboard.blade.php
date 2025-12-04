@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4 text-center">Dashboard</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">

                <h6 class="mb-3">STATUS</h6>

                @if ($status == 'DITUGASKAN')
                    {{-- BAR HIJAU FULL --}}
                    <button class="btn btn-success w-100">
                        {{ $status }}
                    </button>
                    <div class="mt-2 text-success">
                        <i class="fa fa-check"></i>
                    </div>
                @else
                    <button class="btn btn-danger w-100">
                        {{ $status }}
                    </button>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection
