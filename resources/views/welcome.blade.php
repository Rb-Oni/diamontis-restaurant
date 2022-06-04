@extends('layouts.app')


@section('title')
Diamontis Restaurant
@endsection

@section('content')

<div class="bg-header lg:bg-cover bg-center h-full px-4 lg:py-16">
    <h1 class="text-6xl text-white font-bold text-center my-8 drop-shadow-2xl">Découvrez la cuisine de Diamontis</h1>

    <div class="container mx-auto py-16">

        <section class="grid gap-4 grid-cols-1 xl:grid-cols-2">
            <div class="bg-white bg-opacity-70 p-6">
                <h2 class="text-6xl font-bold pb-4">Entrées</h2>
                @foreach ($starters as $starter)
                <div class="text-xl pb-4">
                    <p class="font-bold text-slate-500">{{ $starter->name }}</p>
                    <div class="flex justify-between">
                        <p>{{ $starter->description }}</p>
                        <p class="font-bold">{{ $starter->price }}€</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white bg-opacity-70 p-6">
                <h2 class="text-6xl font-bold pb-4">Plats</h2>
                @foreach ($dishes as $dish)
                <div class="text-xl pb-4">
                    <p class="font-bold text-slate-500">{{ $dish->name }}</p>
                    <div class="flex justify-between">
                        <p>{{ $dish->description }}</p>
                        <p class="font-bold">{{ $dish->price }}€</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white bg-opacity-70 p-6">
                <h2 class="text-6xl font-bold pb-4">Désserts</h2>
                @foreach ($desserts as $dessert)
                <div class="text-xl pb-4">
                    <p class="font-bold text-slate-500">{{ $dessert->name }}</p>
                    <div class="flex justify-between">
                        <p>{{ $dessert->description }}</p>
                        <p class="font-bold">{{ $dessert->price }}€</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white bg-opacity-70 p-6">
                <h2 class="text-6xl font-bold pb-4">Boissons</h2>
                @foreach ($drinks as $drink)
                <div class="text-xl pb-4">
                    <p class="font-bold text-slate-500">{{ $drink->name }}</p>
                    <div class="flex justify-between">
                        <p>{{ $drink->description }}</p>
                        <p class="font-bold">{{ $drink->price }}€</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>

@endsection