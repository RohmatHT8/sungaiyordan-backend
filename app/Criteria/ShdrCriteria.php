<?php

namespace App\Criteria;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ShdrCriteria.
 *
 * @package namespace App\Criteria;
 */
class ShdrCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereNotIn('id', DB::table('shdrs')->where('deleted_at',NULL)->pluck('user_id'));
    }
}