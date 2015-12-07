<?php

namespace Gaaarfild\LaravelTitle;

use Illuminate\Support\Traits\Macroable;

/**
 * Class Title.
 */
class Title
{
    use Macroable;

    /**
     * Contains parts of entire title.
     * We assembling title by merging this parts together
     */    
    private $segments = [];

    /**
     * Create new instance of Title class.
     */
    public function __construct()
    {

    }

    /**
     * Append another segment to title.
     *
     * @param $segment
     */
    public function append($segment)
    {
        $this->segments[] = $segment;
    }


    /**
     * Prepend another segment to title.
     *
     * @param $segment
     */
    public function prepend($segment)
    {
        array_unshift($this->segments, $segment);
    }


 
    /**
     * Implode all segments into one string.
     */
    public function render()
    {
        if ($this->has()) {
            return config('laravel-title.prefix')
            . implode(config('laravel-title.delimiter'), $this->segments)
            . config('laravel-title.suffix');
        } else {
            return config('laravel-title.on_empty');
        }

    }


 
    /**
     * Get segments as raw array 
     */
    public function get()
    {
        return $this->segments;
    }

 
    /**
     * Check if any segments added 
     */
    public function has()
    {
        return count($this->segments) != 0;
    }
       
       
}
