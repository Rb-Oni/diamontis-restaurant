@extends('layouts.app')


@section('title')
Diamontis Restaurant
@endsection

@section('content')

<div class="bg-header lg:bg-cover bg-center h-full px-4 lg:pb-16">

    <div class="container mx-auto py-16">

        <div class="text-white text-center py-16">
            <h1 class="text-5xl lg:text-6xl font-bold drop-shadow-2xl uppercase pb-2">Découvrez la cuisine de Diamontis</h1>
            <p class="text-2xl">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, quidem praesentium!</p>
        </div>

        <section class="bg-white bg-opacity-70">
            <h2 class="text-4xl lg:text-6xl text-yellow-500 text-center font-bold uppercase py-6 lg:py-8 bg-neutral-900">Menu</h2>
            <div class="grid gap-4 grid-cols-1 xl:grid-cols-2 p-2">
                <div class="p-2 lg:p-6">
                    <h3 class="text-4xl lg:text-6xl font-bold mb-8 uppercase"><span class="border-b-8 border-yellow-500">Entrées</span></h3>
                    @foreach ($starters as $starter)
                    <div class="text-xl pb-4">
                        <p class="font-bold">{{ $starter->name }}</p>
                        <div class="flex justify-between">
                            <p>{{ $starter->description }}</p>
                            <p class="font-bold">{{ $starter->price }}€</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-2 lg:p-6">
                    <h3 class="text-4xl lg:text-6xl font-bold mb-8 uppercase"><span class="border-b-8 border-yellow-500">Plats</span></h3>
                    @foreach ($dishes as $dish)
                    <div class="text-xl pb-4">
                        <p class="font-bold">{{ $dish->name }}</p>
                        <div class="flex justify-between">
                            <p>{{ $dish->description }}</p>
                            <p class="font-bold">{{ $dish->price }}€</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-2 lg:p-6">
                    <h3 class="text-4xl lg:text-6xl font-bold mb-8 uppercase"><span class="border-b-8 border-yellow-500">Désserts</span></h3>
                    @foreach ($desserts as $dessert)
                    <div class="text-xl pb-4">
                        <p class="font-bold">{{ $dessert->name }}</p>
                        <div class="flex justify-between">
                            <p>{{ $dessert->description }}</p>
                            <p class="font-bold">{{ $dessert->price }}€</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-2 lg:p-6">
                    <h3 class="text-4xl lg:text-6xl font-bold mb-8 uppercase"><span class="border-b-8 border-yellow-500">Boissons</span></h3>
                    @foreach ($drinks as $drink)
                    <div class="text-xl pb-4">
                        <p class="font-bold">{{ $drink->name }}</p>
                        <div class="flex justify-between">
                            <p>{{ $drink->description }}</p>
                            <p class="font-bold">{{ $drink->price }}€</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>

@endsection