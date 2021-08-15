<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="{{ route('homeUser') }}" class="logo"> <img src="{{ asset('imagens/logo1.png') }}" alt="logo"></a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
                <a><p> Bem-vindo, {{ Auth::user()->name }}</p></a>
            </li>
            <li>
                <a href="{{ route('homeUser') }}"><span class="fa fa-home mr-3"></span> Ínicio</a>
            </li>
            <li>
                <a href="{{ route('planoTreino') }}"><span class="fas fa-dumbbell mr-3"></span> Plano de Treino</a>
            </li>
            @if(Auth::user()->avaliacao_inicial_id == null)
                <li>
                    <a href="{{ route('avaliacao_inicial.index') }}"><span class="fa fa-user mr-3"></span> Avaliação Física</a>
                </li>
            @endif
            <li>
                <a href="{{ route('marcacao') }}"><span class="fas fa-calendar-alt mr-4"></span> Marcações</a>
            </li>
            @if(\Carbon\Carbon::now()->isSunday() or \Carbon\Carbon::now()->isSaturday() or \Carbon\Carbon::now()->isFriday() or \Carbon\Carbon::now()->isMonday())
                <li>
                    <a href="{{ route('feedback.index') }}"><span class="fa fa-sticky-note mr-3"></span> Feedback Semanal</a>
                </li>
            @endif
            <li>
                <a href="{{ route("avaliacao_fisica") }}"><span class="fas fa-heartbeat mr-3"></span> Progresso</a>
            </li>
            <li>
                <a href="{{ route('conta') }}"><span class="fa fa-cogs mr-3"></span> Conta</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn mt-2"  style="background-color:#A50000; color:rgba(255, 255, 255, 0.6); margin-left: 30%" type="submit"><span></span>
                        {{ __('Logout') }}
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
