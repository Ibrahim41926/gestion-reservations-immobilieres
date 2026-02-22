@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 py-12">

    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-3xl p-10">

        <h1  class="bg-blue-600 !text-white font-semibold px-6 py-3 rounded-xl shadow-md transition duration-200 hover:bg-blue-700">
            Modifier le profil
        </h1>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label class="block text-sm font-medium mb-2 text-gray-600">
                    Nom
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name', auth()->user()->name) }}"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2 text-gray-600">
                    Email
                </label>
                <input type="email"
                       name="email"
                       value="{{ old('email', auth()->user()->email) }}"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <div class="flex justify-between items-center mt-8">

                <a href="{{ route('profile.edit') }}"
                   class="text-gray-600 hover:text-gray-900 transition">
                    Annuler
                </a>

                <button type="submit"
                     class="bg-blue-600 !text-white font-semibold px-6 py-3 rounded-xl shadow-md transition duration-200 hover:bg-blue-700">
                         Enregistrer les modifications
                </button>
            </div>

        </form>

    </div>
</div>
@endsection