@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link
                        @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'home')
                            active
                        @endif" href="{{ route('home') }}">Все контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                        @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'favorites')
                            active
                        @endif" href="{{ route('favorites') }}">Избранные</a>

                    </li>
                </ul>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Email</th>
                        <th scope="col">Избраное</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->first_name }}</td>
                        <td>{{ $contact->last_name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            @if (auth()->user()->contacts->contains($contact))
                                <a href="{{ route('delete.favorite', ['contact' => $contact]) }}" class="btn btn-light">
                                    -
                                </a>
                            @else
                                <a href="{{ route('add.favorite', ['contact' => $contact]) }}" class="btn btn-light">
                                    +
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
