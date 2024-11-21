<?php

if (!function_exists('formatNpwr')) {
    function formatNpwr($npwrd)
    {
        // Format NPWRD seperti R.1.240300001
        return substr($npwrd, 0, 2) . '.' . substr($npwrd, 2, 1) . '.' . substr($npwrd, 3);
    }
    
}
