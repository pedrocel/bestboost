<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BestBoost - O Poder da IA para Afiliados</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-gradient {
      background: linear-gradient(90deg, #1abc9c, #16a085);
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-gradient text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">BestBoost</h1>
        <!-- Menu de Navegação Responsivo -->
        <nav class="hidden md:flex items-center space-x-4">
            <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
            <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
            <a href="#pricing" class="px-4 hover:underline">Planos</a>

            <!-- Botões de Login e Cadastro -->
            <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-[#1abc9c] to-[#16a085] text-white rounded-full hover:bg-gradient-to-l hover:from-[#16a085] hover:to-[#1abc9c] transition duration-300">
                Login
            </a>
        </nav>

        <!-- Hamburguer Menu para Mobile -->
        <div class="md:hidden">
            <button id="hamburger" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobileMenu" class="md:hidden hidden bg-gradient text-white py-4">
        <nav class="flex flex-col items-center space-y-4">
            <a href="#benefits" class="px-4 hover:underline">Benefícios</a>
            <a href="#how-it-works" class="px-4 hover:underline">Como Funciona</a>
            <a href="#pricing" class="px-4 hover:underline">Planos</a>

            <!-- Botões de Login e Cadastro -->
            <a href="{{ route('login') }}" class="px-6 py-2 bg-gradient-to-r from-[#1abc9c] to-[#16a085] text-white rounded-full hover:bg-gradient-to-l hover:from-[#16a085] hover:to-[#1abc9c] transition duration-300">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-6 py-2 border-2 border-white text-white rounded-full hover:bg-white hover:text-gradient-to-r hover:from-[#1abc9c] hover:to-[#16a085] transition duration-300">
                Cadastro
            </a>
        </nav>
    </div>
</header>

 <!-- Hero Section -->
<section class="bg-gradient text-white py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
    <!-- Left Column (Copy, Headline, CTA) -->
    <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0">
      <h2 class="text-5xl font-bold">Domine o Mercado com o Poder da IA</h2>
      <p class="mt-4 text-lg">
        Apresente-se ao BestBoost, o robô inteligente que analisa mais de 200 TB de dados para encontrar
        os produtos mais vendidos em marketplaces globais. Ideal para afiliados que desejam crescer.
      </p>
      <a href="#pricing" class="mt-6 inline-block bg-gradient text-white px-6 py-3 rounded shadow hover:bg-gray-200">
        Comece agora e aumente suas vendas
      </a>
    </div>
    <!-- Right Column (Image) -->
    <div class="md:w-1/2 text-center">
      <img src="/img/capturar.png" alt="Imagem Promocional" class="cursor-pointer transition-transform transform hover:scale-110 duration-300 rounded-lg shadow-lg">
    </div>
  </div>
</section>

  <!-- Benefits Section -->
  <section id="benefits" class="py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Por que escolher o BestBoost?</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Tecnologia de Ponta</h4>
          <p class="mt-2 text-gray-600">Nosso robô IA analisa milhares de marketplaces em tempo real.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Análises Inteligentes</h4>
          <p class="mt-2 text-gray-600">Mais de 200 TB de aprendizado processados para identificar produtos quentes.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Resultados Garantidos</h4>
          <p class="mt-2 text-gray-600">Economize tempo e foque nos produtos que realmente vendem.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section id="how-it-works" class="bg-gray-200 py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Como o BestBoost Funciona?</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">1</div>
          <h4 class="font-bold mt-4">Acesse a Plataforma</h4>
          <p class="mt-2 text-gray-600">Registre-se e tenha acesso instantâneo ao painel intuitivo.</p>
        </div>
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">2</div>
          <h4 class="font-bold mt-4">Descubra Produtos Quentes</h4>
          <p class="mt-2 text-gray-600">Receba recomendações com base em dados de vendas reais.</p>
        </div>
        <div class="text-center">
          <div class="bg-turquoise-500 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center">3</div>
          <h4 class="font-bold mt-4">Venda com Precisão</h4>
          <p class="mt-2 text-gray-600">Use insights para criar campanhas de afiliados irresistíveis.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section id="pricing" class="py-16">
    <div class="container mx-auto">
      <h3 class="text-3xl font-bold text-center mb-8">Planos que Impulsionam Seus Resultados</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Básico</h4>
          <p class="mt-4 text-gray-600">Ideal para afiliados iniciantes.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$29/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Profissional</h4>
          <p class="mt-4 text-gray-600">Para quem deseja expandir seu alcance.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$59/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-lg">
          <h4 class="font-bold text-lg">Premium</h4>
          <p class="mt-4 text-gray-600">Para afiliados de alto desempenho.</p>
          <p class="mt-4 text-turquoise-500 text-2xl font-bold">R$99/mês</p>
          <a href="#" class="mt-6 inline-block bg-turquoise-500 text-white px-6 py-3 rounded shadow hover:bg-turquoise-600">Assinar Agora</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
      <p>© 2025 BestBoost. Todos os direitos reservados.</p>
    </div>
  </footer>

</body>
</html>
