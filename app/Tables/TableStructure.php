<?php

namespace App\Tables;

abstract class TableStructure
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
