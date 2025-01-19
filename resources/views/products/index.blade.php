<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Biblioteca de Produtos
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <!-- Cabeçalho com Filtros e Busca -->
        <div class="mb-6 flex flex-wrap justify-between items-center">
            <h2 class="text-lg font-medium text-white">Produtos</h2>

            <form method="GET" action="{{ route('cliente.products.index') }}" class="flex flex-wrap gap-4 items-center w-full sm:w-auto">
                <!-- Filtros -->
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

                <!-- Barra de Busca -->
                <div class="relative w-full sm:w-auto">
                    <input type="text" id="search" name="search" placeholder="Buscar por nome" value="{{ request('search') }}" class="p-2 w-full sm:w-48 bg-gray-800 text-gray-200 border border-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <!-- Botão de Filtro -->
                <button type="submit" class="btn-filter bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Filtrar
                </button>
            </form>
        </div>

        <!-- Listagem de Produtos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden hover:scale-105 transform transition duration-300">
                    <!-- Imagem do Produto -->
                    <a href="{{ route('cliente.products.detail', $product->id) }}">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 sm:h-64 object-cover cursor-pointer">
                    </a>

                    <div class="p-4">
                        <!-- Nome do Produto -->
                        <h3 class="text-lg font-semibold text-white">{{ $product->name }}</h3>

                        <!-- Descrição do Produto -->
                        <p class="text-gray-400 mt-2">
                            {{ Str::limit($product->description, 150, '...') }}
                        </p>

                        <!-- Preço e Status -->
                        <div class="mt-4 flex justify-between items-center">
                            @if($product->is_trending)
                                <span class="text-green-500 font-bold">Em Alta</span>
                            @endif
                            <span class="text-lg font-semibold text-gray-300">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
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
