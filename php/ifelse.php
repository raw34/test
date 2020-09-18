<?php
/**
 * Class ifelse
 * @author Randy Chang
 */
class ifelse
{
    public function ie(bool $a, bool $b, bool $c) :bool
    {
        if ($a && $this->select1()) {
            return true;
        }

        if ($b && $this->select2()) {
            return true;
        }

        if ($c && $this->select3()) {
            return true;
        }

        return false;
    }

    public function ieie(bool $a, bool $b, bool $c) :bool
    {
        if (($a && $this->select1()) || ($b && $this->select2()) || ($c && $this->select3())) {
            return true;
        }

        return false;
    }

    private function select1()
    {
        echo __METHOD__, "\n";

        return true;
    }

    private function select2()
    {
        echo __METHOD__, "\n";

        return true;
    }

    private function select3()
    {
        echo __METHOD__, "\n";

        return true;
    }
}

$service = new ifelse();


var_dump(true === $service->ie(true, false, false));
var_dump(true === $service->ie(true, true, false));
var_dump(true === $service->ie(true, true, true));
var_dump(true === $service->ie(true, false, false));
var_dump(true === $service->ie(false, true, false));
var_dump(true === $service->ie(false, false, true));

var_dump(true === $service->ieie(true, false, false));
var_dump(true === $service->ieie(true, true, false));
var_dump(true === $service->ieie(true, true, true));
var_dump(true === $service->ieie(true, false, false));
var_dump(true === $service->ieie(false, true, false));
var_dump(true === $service->ieie(false, false, true));
