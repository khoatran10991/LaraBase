<?php
if(!function_exists('activeClass')){
    function activeClass(string $url){
        if($url == url()->current()){
            return 'active';
        }
        return '';
    }
}
if (! function_exists('str_replace_array')) {
    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param  string  $search
     * @param  array  $replace
     * @param  string  $subject
     * @return string
     */
    function str_replace_array(string $search, array $replace, string $subject): ?string
    {
        return \Illuminate\Support\Str::replaceArray($search, $replace, $subject);
    }
}