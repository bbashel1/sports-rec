<?php

namespace App\Http\Controllers;

use App\Model\Ranking\Ranking;
use App\Repositories\RankingRepository;
use App\Repositories\TeamsRepository;
use App\User;
use Illuminate\Http\Request;

/**
 * Class TeamController
 * @package App\Http\Controllers
 */
class TeamController extends Controller
{
    /**
     * @var TeamsRepository
     */
    protected $repository;

    /**
     * @var RankingRepository
     */
    protected $rankingRepository;

    /**
     * TeamController constructor.
     * @param TeamsRepository $repository
     * @param RankingRepository $rankingRepository
     */
    public function __construct(TeamsRepository $repository, RankingRepository $rankingRepository)
    {
        $this->repository = $repository;
        $this->rankingRepository = $rankingRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $players = User::with('ranking')->get();

        $teams = $this->repository->fetchTeams($players);

    	return view('teams', compact('teams'));
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function update(User $user, Request $request)
    {
        return response()->json($this->rankingRepository->create($user, $request->value));
    }
}
