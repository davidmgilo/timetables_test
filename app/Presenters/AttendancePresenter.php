<?php

namespace App\Presenters;

use App\Transformers\AttendanceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AttendancePresenter
 *
 * @package namespace App\Presenters;
 */
class AttendancePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AttendanceTransformer();
    }
}
