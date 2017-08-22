<?php namespace Domain\Api\CoR;

abstract class AbstractHandler
{
    public $nextHandler = null;

    public function setSucessor($request)
    {
        if ($this->nextHandler == null) {
            $this->nextHandler = $request;
        } else {
            $this->setSucessor($request);
        }
    }

    public function handle($request)
    {
    }

    abstract public function process(Request $request);
}
