{{-- resources/views/admin/forms/responses.blade.php --}}

@extends('admin.main')

@section('container')
    <div class="container">
        <h1>Respons untuk {{ $form->nama }}</h1>
        <ul>
            @foreach ($jawabanUsers as $userId => $jawabans)
                @php
                    $user = $jawabans->first()->user ?? null;
                @endphp
                @if ($user)
                    <li>
                        <a href="{{ route('admin.forms.select_angkatan', [$form, $user]) }}">{{ $user->nama }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
