<?php

class Dto {

	public function bindXml($app)	{
		$body = $app->request()->getBody();
        $xml = simplexml_load_string($body);
        $className = new ReflectionClass($this);
		return $this->bindXmlData($xml,$className->getShortName(),$className->getMethods());
	}

	public function bindXmlData($xml,$objClass,$objMthods)	{
		$obj = new $objClass();
		foreach ($objMthods as $medthod)	{
			$methodName = $medthod->getName();
			$displayName = strtolower(ucwords(substr($methodName,3,strlen($methodName) - 3)));
			$getterName = 'get'.substr($methodName,3);
			if (substr($methodName,0,3) == "set")	{
				if (is_array($obj->$getterName())) {
					$dtoName = trim(substr($methodName,3),"s")."Dto";
					$dtoXmlName = strtolower($dtoName);
					$child = new $dtoName();
					$className = new ReflectionClass($child);
					$data = array();
					foreach($xml->$displayName->$dtoXmlName as $childXml)	{
						array_push($data,$this->bindXmlData($childXml,$className->getShortName(),$className->getMethods()));
					}
				} else if($obj->$getterName() instanceof Dto)	{
					$className = new ReflectionClass($obj->$getterName());
					$displayName = $displayName."dto";
					$data = $this->bindXmlData($xml->$displayName,$className->getShortName(),$className->getMethods());
				} else if($obj->$getterName() instanceof DateTime)	{
					$data = new DateTime($xml->$displayName);
				} else {
					$data = (string)$xml->$displayName;
				}
				$obj->$methodName($data);
			}
		}
		return $obj;
	}

	public function printData($app)	{
		if (true)	{
			$this->printXml($app);
		} else {
			$this->printJson($app);
		}
	}

	public function printXml($app)	{
		$res = $app->response();
		$res['Content-Type'] = 'text/xml';

		$reflect = new \ReflectionClass($this);
		$className = $reflect->getShortName();
		$classVars = $reflect->getMethods();
		$displayClassName = strtolower($className);

		echo "<$displayClassName>";
		foreach ($classVars as $classVar)	{
			$methodName = $classVar->getName();
			if (substr($methodName,0,3) == "get")	{
				$displayName = substr($methodName,3,strlen($methodName) - 3);
				$methodValue = $this->$methodName();
				$displayName = strtolower($displayName);
				if ($methodValue == null)	{
					echo "<$displayName>null</$displayName>";
				} else if (is_array($methodValue)) {
					echo "<$displayName>";
					foreach ($methodValue as $item) {
						$item->printXml($app);
					}
					echo "</$displayName>";
				} elseif ($methodValue instanceof DateTime)	{
					$displayMethodValue = $methodValue->format('Y-m-d H:i:s.0 T');
					echo "<$displayName>$displayMethodValue</$displayName>";
				} elseif ($methodValue instanceof Dto)	{
					$methodValue->printXml($app);
				}  else 	{
					echo "<$displayName>$methodValue</$displayName>";
				}
			}
			
		}
		echo "</$displayClassName>";
	}

	public function printJson($app)	{
		$res = $app->response();
		$res['Content-Type'] = 'text/json';
		$class_name = get_class($this);
		$class_vars = get_class_vars($class_name);
		echo "{";
		foreach ($class_vars as $name => $value) {
			$this_value = $this->$name;
			if ($this_value instanceof dto)	{
				$sub_class_name = get_class($this->$name);
				echo "$sub_class_name : ";
				$this->$name->print_json($app);
				echo ",";
			} else 	{
				echo "$name : '$this_value',";
			}
		}
		echo "}";
	}

}

?>