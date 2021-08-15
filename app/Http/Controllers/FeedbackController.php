<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\UserHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    const CANSACO = "cansaco";
    const FOME = "fome";
    const SONO = "sono";
    const HUMOR = "humor";
    const MOTIVACAO = "motivacao";
    const STRESS = "stress";
    const SATISFACAO = "satisfacao";
    const OPINIAO_1 = "opiniao1";
    const OPINIAO_2 = "opiniao2";
    const OPINIAO_3 = "opiniao3";
    const OPINIAO_4 = "opiniao4";
    const OPINIAO_5 = "opiniao5";
    const OPINIAO_6 = "opiniao6";
    const OPINIAO_7 = "opiniao7";
    const OPINIAO_8 = "opiniao8";
    const OPINIAO_9 = "opiniao9";
    const OUTRA_OPINIAO = "outra_opiniao";
    const RECOMENDACAO = "recomendacao";
    const SATISFACAO_TREINO = "satisfacao_treino";
    const FEEDBACK = "feedback";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if(Auth::user()->admin == 0) {
            return view('cliente.feedback.feedback_semanal');
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, UserHandler $userHandler)
    {
        if(Auth::user()->admin == 0) {

            $validator = $this->validate(request(),
                [
                    self::MOTIVACAO => "required",
                    self::CANSACO => "required",
                    self::FOME => 'required',
                    self::HUMOR => 'required',
                    self::RECOMENDACAO => "required",
                    self::SATISFACAO => "required",
                    self::SATISFACAO_TREINO => "required",
                    self::SONO => "required",
                    self::STRESS => "required",
                    self::FEEDBACK => "required"
                ]);

            $opiniao = $userHandler->criarOpiniao(
                request(self::OPINIAO_1),
                request(self::OPINIAO_2),
                request(self::OPINIAO_3),
                request(self::OPINIAO_4),
                request(self::OPINIAO_5),
                request(self::OPINIAO_6),
                request(self::OPINIAO_7),
                request(self::OPINIAO_8),
                request(self::OPINIAO_9),
                request(self::OUTRA_OPINIAO)
            );
            $userHandler->criarFeedback(
                request(self::CANSACO),
                request(self::FOME),
                request(self::SONO),
                request(self::HUMOR),
                request(self::MOTIVACAO),
                request(self::STRESS),
                request(self::SATISFACAO),
                $opiniao,
                request(self::RECOMENDACAO),
                request(self::SATISFACAO_TREINO),
                request(self::FEEDBACK),
                Auth::user()->id
            );

            return redirect("/");
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Feedback $feedback
     * @return Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feedback $feedback
     * @return Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
