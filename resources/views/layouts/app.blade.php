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

        @media (max-width: 768px) {
    #sidebar {
        width: 0;
        opacity: 0;
    }

    /* Mostrar o sidebar quando ele estiver ativo */
    #sidebar.open {
        width: 16rem;
        opacity: 1;
    }

    /* Mostrar o botão de seta para expandir */
    #expandSidebar {
        display: block;
    }

    /* Esconder o botão de expandir quando a sidebar estiver visível */
    #sidebar.open #expandSidebar {
        display: none;
    }
}
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-[#252f3f] text-gray-100 flex flex-col transition-all duration-300" id="sidebarComponent">
    <div class="flex justify-between items-center px-4 py-5 bg-[#1E1E1E]">
        <img src="/img/ecommerce.png" alt="Logo" class="w-32 h-auto"> <!-- Logo -->
        <button id="toggleSidebar" class="text-gray-600 hover:text-gray-800 focus:outline-none text-sm">
            &#9776;
        </button>
    </div>

    <!-- Navegação -->
    @if(auth()->check())
        @if(auth()->user()->adm())
            @include('layouts.menu.adm')
        @elseif(auth()->user()->cliente())
            @include('layouts.menu.cliente')
        @else
        @endif
    @endif

    <!-- Botão para mobile -->
    <button id="expandSidebar" class="absolute bottom-4 left-4 text-white bg-[#252f3f] p-3 rounded-full hidden md:block">
        &#8594; <!-- Seta para expandir -->
    </button>
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

    // Função para atualizar a margem dependendo do tamanho da tela e do estado do sidebar
    function updateMainContentMargin() {
        if (window.innerWidth >= 640) {
            // Se o sidebar estiver expandido, adicionar a margem ml-64
            if (sidebar.classList.contains('w-64')) {
                mainContent.classList.add('ml-64');
            } else {
                mainContent.classList.remove('ml-64');
            }
        } else {
            // Em telas pequenas, remover a margem ml-64
            mainContent.classList.remove('ml-64');
        }
    }

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
        
        // Atualizar a margem após a mudança no estado do sidebar
        updateMainContentMargin();
    });

    // Chamar a função no carregamento para garantir que a margem esteja correta
    window.addEventListener('resize', updateMainContentMargin);
    updateMainContentMargin();
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



