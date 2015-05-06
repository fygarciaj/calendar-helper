<?php

namespace Stevebauman\CalendarHelper\Objects;

abstract class AbstractApiObject
{
    /*
     * Stores the viewer object of the event
     */
    protected $viewer;
    
    /*
     * Stores the fillable attributes on event
     */
    protected $fillable = [];
    
    /*
     * Stores the attributes of the event
     */
    public $attributes = [];
    
    /*
     * Stores the Event API object
     *
     * @var DriverInterface
     */
    public $apiObject;
    
    /**
     * Dynamically retrieve the attribute on the current event
     * 
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }
    
    /**
     * Dynamically sets the specified attribute key to the inputted value
     * 
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
    
    /**
     * Fills the attribute array if they key is available
     * 
     * @param array $attributes
     */
    public function fill(array $attributes = [])
    {
        foreach($attributes as $key => $value)
        {
            if($this->isFillable($key))
            {
                $this->setAttribute($key, $value);
            }
        }
    }
    
    /**
     * Returns true or false if key trying to
     * be set is available in the event attributes.
     * 
     * @param string $key
     *
     * @return bool
     */
    public function isFillable($key)
    {
        if(array_key_exists($key, $this->fillable)) return true;
        
        return false;
    }
    
    /**
     * Returns an attribute from the attributes array.
     * 
     * @param string $key
     *
     * @return mixed|null
     */
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->attributes))
        {
            return $this->attributes[$key];
        }

        return null;
    }
    
    /**
     * Sets an attribute in the array
     * 
     * @param string $key
     * @param mixed $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }
}
