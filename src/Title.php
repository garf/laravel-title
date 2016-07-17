<?php

namespace Garf\LaravelTitle;

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
    public function render($delimiter = null, $no_additions = false)
    {
        $delimiter = is_null($delimiter) ? config('laravel-title.delimiter') : $delimiter;
        $suffix = $no_additions ? '' : config('laravel-title.suffix');
        $prefix = $no_additions ? '' : config('laravel-title.prefix');
        $on_empty = $no_additions ? '' : config('laravel-title.on_empty');

        return $this->make($this->segments, $delimiter, $suffix, $prefix, $on_empty);
    }


    /**
     * Implode all segments into one string in reversed order.
     */
    public function renderr($delimiter = null, $no_additions = false)
    {
        $delimiter = is_null($delimiter) ? config('laravel-title.delimiter') : $delimiter;
        $suffix = $no_additions ? '' : config('laravel-title.suffix');
        $prefix = $no_additions ? '' : config('laravel-title.prefix');
        $on_empty = $no_additions ? '' : config('laravel-title.on_empty');
        $segments = array_reverse($this->segments);

        return $this->make($segments, $delimiter, $suffix, $prefix, $on_empty);
    }


    /**
     * Get segments as raw array 
     */
    public function get()
    {

        return $this->segments;
    }

    /**
     * Get segments as JSON-object
     */
    public function toJson()
    {

        return json_encode($this->segments);
    }

 
    /**
     * Check if any segments added
     */
    public function has()
    {

        return count($this->segments) != 0;
    }


    /**
     * Clear segments
     */
    public function clear()
    {

        return $this->segments = [];
    }

    /**
     * Check if any segments added
     *
     * @param array $segments - array of segment pieces
     * @param string $delimiter - delimiter for implosion
     * @param string $suffix - addition to the end
     * @param string $prefix - addition to beginning
     * @param string $on_empty - print if segments is empty
     * @return string
     */
    public function make(array $segments, $delimiter = ' - ', $suffix = '', $prefix = '', $on_empty = '')
    {
        $result = implode($delimiter, $segments);

        if ($this->has()) {

            return $prefix . $result . $suffix;
        } else {

            return $on_empty;
        }
    }
}
