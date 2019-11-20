<?php

namespace EugMerkeleon\Support\AutoDoc\Traits;

use ReflectionFunctionAbstract;
use ReflectionMethod;
use ReflectionParameter;

trait GetDependenciesTrait
{
    public function getDependencies(ReflectionFunctionAbstract $reflector)
    {
        return array_map(function ($parameter) {
            return $this->transformDependency($parameter);
        }, $reflector->getParameters());
    }

    protected function resolveClassMethodDependencies(array $parameters, $instance, $method)
    {
        if (!method_exists($instance, $method))
        {
            return $parameters;
        }

        return $this->getDependencies(
            new ReflectionMethod($instance, $method)
        );
    }

    protected function transformDependency(ReflectionParameter $parameter)
    {
        $class = $parameter->getClass();

        if (empty($class))
        {
            return null;
        }

        return $class->name;
    }
}
