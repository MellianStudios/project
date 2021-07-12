<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class AnnouncementController extends Controller
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Announcement');
    }
}
