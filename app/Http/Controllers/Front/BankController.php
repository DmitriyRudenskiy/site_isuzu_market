<?php

namespace App\Http\Controllers\Front;

use App\Repositories\BanksRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BankController extends Controller
{
    /**
     * Список новостей
     */
    public function index(BanksRepository $banksRepository, Request $request)
    {
        $list = $banksRepository->getList();

        $data = array_map(function ($value) {
            return $value * 1;
        }, $request->only(['price', 'period', 'advance']));

        return view(
            'front.bank.index',
            [
                'list' => $list,
                'data' => http_build_query($data)
            ]
        );
    }

    public function downdload(BanksRepository $banksRepository, Request $request)
    {
        $data = array_map(
            function ($value) {
                return $value * 1;
            },
            $request->only(['bank_id', 'price', 'period', 'advance'])
        );

        $bank = $banksRepository->get($data['bank_id']);

        if ($bank === null) {
            throw new NotFoundHttpException();
        }

        $data['period'] *= 12;
        $data['precent'] = $bank->precent;

        $data["payment"] = $this->getInMouth(
            $data['price'],
            $bank->precent,
            $data['period'],
            $data['advance']
        );

        $data["bank"] = $bank;

        return view('front.bank.pdf', $data);
    }

    protected function getInMouth($price, $percent, $period, $advance)
    {
        return round(((($price * ($percent / 100)) * ($period / 12) + $price) -  ($price / 100 * $advance)) / $period);
    }

}
