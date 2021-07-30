<?php

namespace App\Tables\Admin;

use App\Tables\TableStructure;

class ItemTableStructure extends TableStructure
{
    public function addFiltersFromRequest()
    {
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}
