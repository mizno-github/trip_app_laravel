<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    protected $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function areas()
    {
        $areas = $this->area->getAll();
        return $areas;
    }
}
