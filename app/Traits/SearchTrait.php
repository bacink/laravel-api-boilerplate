<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Symfony\Component\VarDumper\VarDumper;

/**
 * 
 * Search
 */
trait SearchTrait
{

    /**
     * @param \Illuminate\Database\Eloquent\Builder|static  $query
     * @param string  $keyword
     * @param boolean  $matchAllFields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeSearch($query, $keyword, $matchAllFields = false, $filter = null, $filterAble = false)
    {
        return static::where(function ($query) use ($keyword, $filter, $filterAble, $matchAllFields) {

            foreach (static::getSearchableFields() as $field) {
                if ($matchAllFields) {
                    $query->where($field, 'LIKE', "%$keyword%");
                } else {
                    $query->orWhere($field, 'LIKE', "%$keyword%");
                }
            }
            if ($filterAble) {
                foreach (static::getFilterableFields() as $filterBy) {


                    $query->where($filterBy, '=', $filter);
                }
            }
        });
    }

    /**
     * Get all searchable fields
     *
     * @return array
     */
    public static function getSearchableFields()
    {
        $model = new static;
        $fields = $model->search;
        if (empty($fields)) {
            $fields = Schema::getColumnListing($model->getTable());

            $ignoredColumns = [
                $model->getKeyName(),
                $model->getUpdatedAtColumn(),
                $model->getCreatedAtColumn(),
            ];

            if (method_exists($model, 'getDeletedAtColumn')) {
                $ignoredColumns[] = $model->getDeletedAtColumn();
            }

            $fields = array_diff($fields, $model->getHidden(), $ignoredColumns);
        }

        return $fields;
    }

    /**
     * Get all searchable fields
     *
     * @return array
     */
    public static function getFilterableFields()
    {
        $model = new static;
        $filters = $model->filter;
        if (empty($filters)) {
            $filters = Schema::getColumnListing($model->getTable());

            $ignoredColumns = [
                $model->getKeyName(),
                $model->getUpdatedAtColumn(),
                $model->getCreatedAtColumn(),
            ];

            if (method_exists($model, 'getDeletedAtColumn')) {
                $ignoredColumns[] = $model->getDeletedAtColumn();
            }

            $filters = array_diff($filters, $model->getHidden(), $ignoredColumns);
        }

        return $filters;
    }
}
