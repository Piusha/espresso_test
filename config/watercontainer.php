<?php

/**
 * Define Water container related configs
 */

return [

   'max_liters_per_container' => (int) env('MAX_LITERS_PER_CONTAINER', 2),
   'default_liters_per_container' => (int)env('DEFAULT_LITERS_PER_CONTAINER', 2),

];
