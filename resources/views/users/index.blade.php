<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Gerenciamento de Usuários
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <form method="GET" action="{{ route('controllers.index') }}" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 w-full md:w-auto">
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ request('name') }}" 
                        placeholder="Filtrar por nome" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="ip" 
                        value="{{ request('ip') }}" 
                        placeholder="Filtrar por IP" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="device_id" 
                        value="{{ request('device_id') }}" 
                        placeholder="Filtrar por ID do dispositivo" 
                        class="border border-gray-300 rounded px-3 py-2 w-full"
                    >
                </div>
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto"
                >
                    Filtrar
                </button>
                <a 
                    href="{{ route('controllers.index') }}" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded w-full md:w-auto"
                >
                    Limpar Filtros
                </a>
            </form>
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded w-full md:w-auto">
            Adicionar Novo Usuário
            </a>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full border-collapse table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nome</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-600">Editar</a> |
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</x-app-layout>

