<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-şemibold text-xl text-gray-800 leading-tight">
                    <span class="text-slate-500 font-bold">{{ $categories->total() }}</span> Catégories
                </h2>
            </div>
            <div>
                <a href="{{ route('admin.categories.create') }}" class="inline-block px-4 py-2.5 bg-green-500 text-white font-bold text-md leading-tight rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg><span class="align-middle">Ajouter</span></a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="w-full lg:w-5/6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-validation-errors />
            <x-success-message />
        </div>

        @if($categories->isEmpty())
        <h1 class="font-bold font-times text-4xl text-center mt-12">Aucune catégorie</h1>
        @else
        <div class="w-full lg:w-5/6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-yellow-500 text-white uppercase text-md leading-normal">
                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black text-md">

                        @foreach($categories as $category)
                        <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-bold text-lg lg:text-2xl">{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 hover:text-orange-500">
                                        <a href="{{ route('admin.categories.edit', $category) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 hover:text-red-500" x-data="{ showModal : false }">
                                        <a href="#" @click="showModal = !showModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </a>

                                        <div x-show="showModal" class="fixed w-full flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                                            <!-- Modal -->
                                            <div x-show="showModal" class="bg-white rounded-md shadow-2xl p-6 xl:w-3/12 sm:w-2/3 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                                <!-- Title -->
                                                <span class="block text-black text-2xl mb-3">Souhaitez vous supprimer la catégorie ?</span>
                                                <span class="text-2xl font-bold text-slate-500">{{ $category->name }}</span>
                                                <!-- Buttons -->
                                                <div class="text-right mt-5">
                                                    <button @click="showModal = !showModal" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                                                        </svg><span class="align-middle">Annuler</span></button>
                                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md" value="Supprimer"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg><span class="align-middle">Supprimer</span></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
        @endif

    </div>
</x-app-layout>