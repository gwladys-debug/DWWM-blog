@extends('layouts.app')
@section('title', 'Créer un compte')

@section('content')
    <div class="max-w-md mx-auto my-10">
        <h1 class="text-3xl font-bold mb-6 text-black text-center">Créer un compte</h1>

        <form action="{{ route('register') }}" method="POST" class="border border-black p-6 bg-white">
            @csrf

            {{-- Nom --}}
            <div class="mb-4">
                <label for="lastname" class="block text-xs font-bold uppercase tracking-wider text-black mb-2">Nom *</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" required
                    class="w-full border @error('lastname') border-red-500 @else border-gray-400 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Prénom --}}
            <div class="mb-4">
                <label for="firstname" class="block text-xs font-bold uppercase tracking-wider text-black mb-2">Prénom
                    *</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required
                    class="w-full border @error('firstname') border-red-500 @else border-gray-400 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('firstname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-black mb-2">Adresse Email
                    *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full border @error('email') border-red-500 @else border-gray-400 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Mot de passe --}}
            <div class="mb-4">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-black mb-2">Mot de passe
                    *</label>
                <input type="password" name="password" id="password" required
                    class="w-full border @error('password') border-red-500 @else border-gray-400 @enderror p-2.5 text-sm focus:outline-none focus:border-black">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmation du mot de passe --}}
            <div class="mb-6">
                <label for="password_confirmation"
                    class="block text-xs font-bold uppercase tracking-wider text-black mb-2">Confirmer le mot de passe
                    *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full border border-gray-400 p-2.5 text-sm focus:outline-none focus:border-black">
            </div>

            <button type="submit"
                class="w-full bg-black text-white py-3 text-xs font-bold uppercase tracking-wider hover:bg-zinc-800 transition-colors">
                S'inscrire
            </button>
        </form>
    </div>
@endsection
