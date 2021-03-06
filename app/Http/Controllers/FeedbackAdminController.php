<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FeedbackAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {
            return view("admin.feedback.feedbacks_semanais",
                [
                    "feedbacks" => $avaliacaoHandler->getFeedbacks()
                ]
            );
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
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param AvaliacaoHandler $avaliacaoHandler
     * @return Application|Factory|View|Response
     */
    public function show(int $id, AvaliacaoHandler $avaliacaoHandler)
    {
        if(Auth::user()->admin == 1) {

            return view("admin.feedback.feedback_semanal",
                [
                    "feedback" => $avaliacaoHandler->getFeedback($id)
                ]
            );
        } else {
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
