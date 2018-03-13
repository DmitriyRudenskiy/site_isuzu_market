<?php

namespace App\Http\Controllers\Front;

use App\Repositories\BanksRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('front.articles.index');
    }
}
