<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller {

    public $theme;
    public $themes
        = [
            "royal",
            "pizelex",
            "frozen",
        ];

    public function countThemes()
    {
        $total = count($this->themes);

        return $total;
    }

    public function getRandomTheme()
    {
        $i = rand(0, $this->countThemes() - 1);

        $this->theme = $this->themes[$i];

        return $this->theme;
    }

    public function setTheme()
    {
        $final = $this->getRandomTheme();

        $final = "";

        return $final;
    }
}
