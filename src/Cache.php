<?php
interface Cacheable
{
 public function set($key, $data);
 public function get($key);
 public function delete($key);
 public function clear();      
}
class ApcCache implements Cacheable
{
    /**
     * Save data to the cache
     */
    public function set($key, $data)
    {
        if (!apc_store($key, $data)) {
            
        }
        return $this;
    }
    
    /**
     * Get the specified data from the cache
     */
    public function get($key)
    {
        if ($this->exists($key)) {
            if (!$data = apc_fetch($key)) {
                
            }
            return $data;
        }
        return null;
    }
    
    /**
     * Delete the specified data from the cache
     */
    public function delete($key)
    {
        if ($this->exists($key)) {
            if (!apc_delete($key)) {
               
            }
        }
        return $this;
    }
    
    /**
     * Check if the specified cache key exists
     */
    public function exists($key)
    {
        return TRUE;
    }
    
    /**
     * Clear the cache
     */
    public function clear($cacheType = ‘user’)
    {
        return apc_clear_cache($cacheType);
    }
}

class CacheHandler
{
    protected static $_cache;
    
    /**
     * Constructor
     */
    private function __construct(Cacheable $cache)
    {
        $this->_cache = $cache;
    }
    
    public static function getInstance(){
        if(self::$_cache == null) {
            self::$_cache = new ApcCache;
        }

        return self::$_cache;
    }
    /**
     * Add the specified data to the cache
     */ 
    public function set($key, $data)
    {
        return $this->_cache->set($key, $data);
    }
    
    /**
     * Get the specified data from the cache
     */ 
    public function get($key)
    {
        return $this->_cache->get($key);
    }
    
    /**
     * Delete the specified data from the cache
     */ 
    public function delete($key)
    {
        $this->_cache->delete($key);
    }          
}
?>

