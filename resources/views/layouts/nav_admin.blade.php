<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="#" class="logo"> <img src="{{ asset('imagens/logo1.png') }}" alt="logo"></a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="{{ route('dashboard') }}"><span class="mr-3"><i class="fas fa-home"></i></span> Ínicio</a>
            </li>
            <li>
                <a href="{{ route('exercicios.dashboard') }}"><span class="mr-3"><i class="fas fa-dumbbell"></i></span>Exercícios</a>
            </li>
            <li>
                <a href="{{ route('clientes.index') }}"><span class="mr-3"><i class="fa fa-user"></i></span>Clientes</a>
            </li>
            <li>
                <a href="{{ route("planostreino") }}"><span class="fa fa-sticky-note mr-3"></span>Planos de Treino</a>
            </li>
            <li>
                <a href="{{route("cliente_avaliacao_inicial.index")}}"><span class="fas fa-file-medical-alt mr-3"></span> Avaliações Iniciais</a>
            </li>
            <li>
                <a href="{{route("feedback_clientes.index")}}"><span class="fas fa-file-signature mr-3"></span> Feedbacks Semanais</a>
            </li>
            <li>
                <a href="{{ route("marcacoes.index") }}"><span class="far fa-calendar-alt mr-3"></span> Calendário</a>
            </li>
            <li>
                <a href="{{ route("tarefas.index") }}"><span class="fas fa-clipboard mr-3"></span>Tarefas</a>
            </li>
            <li>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn mt-2" style="background-color:#A50000; color:rgba(255, 255, 255, 0.6); margin-left: 30%" type="submit"><span></span>
                        {{ __('Logout') }}
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

