<?php

if (! function_exists('setting')) {
    function setting()
    {
        $setting = \App\Models\Setting::get();
        $result = [];
        foreach ($setting as $s) {
            $result[$s->code] = $s->value;
        }
        return (object)$result;
    }
}
