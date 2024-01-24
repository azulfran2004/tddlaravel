<?php

namespace App\Filters;

use App\Rules\SortableColumn;
use App\Sortable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfessionFilter extends QueryFilter
{
   

    public function filterRules(): array
    {
        return [
            'search2' => 'filled',
            
        ];
    }

    public function search2($query, $search2)
    {
        return $query->where(function ($query) use ($search2) {
            $query->whereRaw('title', 'like', "%{$search2}%");
            $query->whereRaw('secor', 'like', "%{$search2}%");

        });
    }
}
