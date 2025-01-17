<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ArMatch') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        #sidebar.reduced .menu-label {
            display: none;
        }

        #sidebar.reduced .menu-icon {
            font-size: 24px;
        }

        #menuButton.reduced {
            padding: 8px;
            width: 50px;
            justify-content: center;
        }
        #userMenuDropdown.hidden {
            display: none;
        }

        #userMenuDropdown {
            display: block;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <div class="flex">
        <!-- Sidebar -->
<!-- Sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-[#252f3f] text-gray-100 flex flex-col transition-all duration-300">
    <!-- Parte Superior com logo e fundo branco -->
    <div class="flex justify-between items-center px-4 py-5 bg-[#1E1E1E]">
        <img src="/img/bestBoost-original.png" alt="Logo" class="w-32 h-auto"> <!-- Logo -->
        <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800 focus:outline-none text-sm">
            &#9776;
        </button>
    </div>
    <!-- Navegação -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="/dashboard" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('dashboard')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('dashboard')) 
                bg-gradient-to-r from-[#1abc9c] to-[#16a085] text-white 
            @endif">
            <i class="fas fa-tachometer-alt mr-2 "></i><span class="menu-label">Dashboard</span> 
        </a>
        <a href="/produtos" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('products.index')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('products.index')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-users-cog mr-2"></i><span class="menu-label">Biblioteca de produtos</span>
        </a>
        <a href="/perfis" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('perfis.index')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('perfis.index')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-users-cog mr-2"></i><span class="menu-label">Gestão de Perfil</span>
        </a>
        <a href="/admin/categorias" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('admin.categories.index')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('admin.categories.index')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-users-cog mr-2"></i><span class="menu-label">Gestão de Categorias</span>
        </a>
        <a href="/admin/lojas" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('admin.stores.index')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('admin.stores.index')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-users-cog mr-2"></i><span class="menu-label">Gestão de Lojas</span>
        </a>
        <a href="/admin/produtos" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('admin.products.index')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('admin.products.index')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-users-cog mr-2"></i><span class="menu-label">Gestão de Produtos</span>
        </a>
        <a href="/profile" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('profile.edit')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2] 
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('profile.edit')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-user-circle mr-2"></i><span class="menu-label">Meu Perfil</span>
        </a>
        <a href="/users" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('users')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2]  
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('users')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-user-friends mr-2"></i> <span class="menu-label">Gestão de Usuários</span>
        </a>
        <a href="/settings" id="menuButton" class="block px-4 py-2 text-gray-200 
            @unless(Route::is('settings')) 
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#1E1E1E] hover:to-[#6affe2]  
            @endunless
            rounded-[10px] text-sm
            @if(Route::is('settings')) 
                bg-gradient-to-r from-[#50a8f2] to-[#6affe2] text-white 
            @endif">
            <i class="fas fa-cogs mr-2"></i> <span class="menu-label">Configurações</span>
        </a>
        <div class="flex items-center">
            <button id="themeToggle" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-sm">
                <i class="fas fa-moon mr-2"></i> <span class="menu-label">ALTERAR TEMA</span>
            </button>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full px-4 py-2 text-gray-200 hover:bg-gradient-to-r hover:from-[#6affe2] hover:to-[#6affe2]  rounded-[10px] text-sm text-left">
                <i class="fas fa-sign-out-alt mr-2"></i>Sair
            </button>
        </form>
    </nav>
</aside>

        <!-- Main Content -->
        <main id="mainContent" class="flex-1 ml-64 transition-all duration-300">
    @if (isset($header))
        <header class="bg-white shadow dark:bg-gray-800 flex items-center justify-between px-4 sm:px-6 lg:px-8 py-6">
            <div>
                {{ $header }}
            </div>
            <!-- Avatar do usuário e menu dropdown -->
            <div class="relative">
            <button id="userMenuButton" class="flex items-center space-x-3 focus:outline-none">
    <div class="relative">
        <img 
            src="{{ asset('/img/user.png') }}" 
            alt="User Avatar" 
            class="w-10 h-10 rounded-full border-inside"
        />
    </div>
    <div class="flex flex-col items-start hidden md:flex">
        <span class="text-[16px] font-medium text-gray-800 dark:text-gray-200">
            {{ Auth::user()->name }}
        </span>
        <span class="text-[13px] text-gray-500 dark:text-gray-400 -mt-2">
            {{ Auth::user()->profile_name ?? 'Perfil Desconhecido' }}
        </span>
    </div>
</button>


                <!-- Dropdown -->
                <div id="userMenuDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-lg z-50">
                    <a href="/account" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Minha Conta
                    </a>
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Alterar Perfil
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>
    @endif

    <div class="py-6 px-4">
        {{ $slot }}
    </div>
</main>
    </div>

    <script>
        // Alternar Sidebar
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarTitle = document.getElementById('sidebarTitle');

        toggleSidebar.addEventListener('click', function () {
    if (sidebar.classList.contains('w-64')) {
        sidebar.classList.remove('w-64');
        sidebar.classList.add('w-20');
        sidebar.classList.add('reduced'); // Adiciona a classe reduzida ao sidebar
        mainContent.classList.add('ml-16');
        mainContent.classList.remove('ml-64');
    } else {
        sidebar.classList.remove('w-20');
        sidebar.classList.add('w-64');
        sidebar.classList.remove('reduced'); // Remove a classe reduzida
        mainContent.classList.add('ml-64');
        mainContent.classList.remove('ml-16');
    }
});
    </script>
 <script>
        document.addEventListener('DOMContentLoaded', () => {
            const htmlElement = document.documentElement; // Elemento <html>
            const themeToggle = document.getElementById('themeToggle');

            // Função para alternar tema
            const toggleTheme = () => {
                if (htmlElement.classList.contains('dark')) {
                    htmlElement.classList.remove('dark'); // Remove o modo escuro
                    localStorage.setItem('theme', 'light'); // Salva a preferência no localStorage
                } else {
                    htmlElement.classList.add('dark'); // Ativa o modo escuro
                    localStorage.setItem('theme', 'dark'); // Salva a preferência no localStorage
                }
            };

            // Verifica o tema salvo no localStorage
            if (localStorage.getItem('theme') === 'dark') {
                htmlElement.classList.add('dark');
            } else {
                htmlElement.classList.remove('dark');
            }

            // Evento para alternar tema
            themeToggle.addEventListener('click', toggleTheme);
        });
    </script>
    <script>
        // SweetAlert Mensagens
        const successMessage = "{{ session('success') ?? '' }}";
        const errorMessage = "{{ session('error') ?? '' }}";

        if (successMessage.trim() !== '') {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: successMessage,
                timer: 3000,
                showConfirmButton: false
            });
        }

        if (errorMessage.trim() !== '') {
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: errorMessage,
                timer: 3000,
                showConfirmButton: false
            });
        }
    </script>

    <script>
        
        // Inicializar Select2
        $(document).ready(function() {
            $('#controllers').select2({
                placeholder: "Selecione controladores",
                allowClear: true
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenuDropdown = document.getElementById('userMenuDropdown');

        userMenuButton.addEventListener('click', () => {
            userMenuDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                userMenuDropdown.classList.add('hidden');
            }
        });
    });
</script>
</body>
</html>



