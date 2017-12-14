<?php
namespace Framework;

abstract class Entity implements \ArrayAccess
{
  protected $InputErrors = [],
            $id;

  public function __construct(array $datas = [])
  {
    if (!empty($datas))
    {
      $this->hydrate($datas);
    }
  }

  public function isNew()
  {
    return empty($this->id);
  }

  public function InputErrors()
  {
    return $this->InputErrors;
  }

  public function id()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function hydrate(array $datas)
  {
    foreach ($datas as $attribute => $value)
    {
      $methode = 'set'.ucfirst($attribute);

      if (is_callable([$this, $methode]))
      {
        $this->$methode($value);
      }
    }
  }

  public function offsetGet($var)
  {
    if (isset($this->$var) && is_callable([$this, $var]))
    {
      return $this->$var();
    }
  }

  public function offsetSet($var, $value)
  {
    $method = 'set'.ucfirst($var);
    if (isset($this->$var) && is_callable([$this, $method]))
    {
      $this->$method($value);
    }
  }

  public function offsetExists($var)
  {
    return isset($this->$var) && is_callable([$this, $var]);
  }

  public function offsetUnset($var)
  {
    throw new \Exception('You can not delete this value');
  }
}