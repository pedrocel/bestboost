<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Biblioteca de Produtos
        </h2>
    </x-slot>
    <div class="container mx-auto mt-6 px-4">
        <div class="mb-6 flex flex-wrap justify-between items-center">
            <h2 class="text-lg font-medium text-white">Produtos</h2>
            <form method="GET" action="{{ route('cliente.products.index') }}" class="flex flex-wrap gap-4 items-center w-full sm:w-auto">
    <div class="relative w-full sm:w-auto">
        <select id="category" name="category" class="mt-1 block w-full sm:w-48 p-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">Todas as Categorias</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="relative w-full sm:w-auto">
        <select id="store" name="store" class="mt-1 block w-full sm:w-48 p-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">Todas as Lojas</option>
            @foreach($stores as $store)
                <option value="{{ $store->id }}" {{ request('store') == $store->id ? 'selected' : '' }}>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="relative w-full sm:w-auto">
        <input type="text" id="search" name="search" placeholder="Buscar por nome" value="{{ request('search') }}" class="p-2 w-full sm:w-48 bg-gray-800 text-gray-200 border border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
    </div>
    <button type="submit" class="btn-filter bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Filtrar
    </button>
</form>

        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden hover:scale-105 transform transition duration-300">
            <a href="{{ route('cliente.products.detail', $product->id) }}">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 sm:h-64 object-cover cursor-pointer">
            </a>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-white">{{ $product->name }}</h3>
                <p class="text-gray-400 mt-2">
                    {{ Str::limit($product->description, 150, '...') }}
                </p>

                <div class="mt-4 flex justify-between items-center">
    @if($product->is_trending)
        <span class="flex items-center text-green-500 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#f97316" viewBox="0 0 24 24" stroke="none" class="w-5 h-5 mr-1">
                <path d="M12 2C9.65 2 8.17 4.08 8.17 6.56c0 1.08.28 2.1.78 3.01C8.26 9.92 7 8.74 7 7.3 7 5.13 8.78 3 11 3c.37 0 .72.06 1.07.16.54-.95.94-1.7.94-1.7zM15.75 9.73c.4.62.75 1.39.75 2.25 0 3.38-3.21 5.42-3.87 5.85-.68-.43-3.87-2.47-3.87-5.85 0-.69.12-1.38.35-2.03.2.32.46.61.76.85C9.9 9.93 9 9.55 9 9c0-1.57 1.65-2.86 2.58-3.6.53-.42.87-.77 1.13-1.19.15.56.65 1.47 1.5 1.85.45.2.87.42 1.24.69-.26.5-.48 1.06-.7 1.66z" />
            </svg>
            Em Alta
        </span>
    @endif
    <div class="text-right ml-auto">
        <!-- Mostrar o preço -->
        <span class="text-lg font-semibold text-gray-300">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
        <br>
        <!-- Mostrar a possibilidade de lucro -->
        <span class="text-sm text-gray-400">
            Lucro: 
            R$ {{ number_format($product->possible_profit - $product->price, 2, ',', '.') }}
        </span>
    </div>
</div>


                <!-- Informações Adicionais -->
                <div class="mt-2 flex justify-between items-center">
                    <span class="text-sm text-gray-400">Vendas: {{ $product->sales_count }}</span>

                    <!-- Botão Ver Detalhes -->
                    <a href="{{ route('cliente.products.detail', $product->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Ver Detalhes
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>


        <!-- Paginação -->
        <div class="mt-6 text-gray-300">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
