<?php

class aClass {
    const PATTERN1          = '%%%d%d';
    static public $pattern2 = '%%%d%d';
    protected $pattern3     = '%%%d%d';

    public function check($arg, $handle) {
        $pattern4 = '%%%%%%%d%d';

        /* all function reported */
        echo <error descr="Amount of expected parameters is 3.">printf</error> ($pattern4, $arg);
        echo <error descr="Amount of expected parameters is 3.">sprintf</error> ($pattern4, $arg);
        echo <error descr="Amount of expected parameters is 4.">fprintf</error> ($handle, $pattern4, $arg);
        echo <error descr="Amount of expected parameters is 4.">sscanf</error> ($arg, $pattern4, $arg);
        echo <error descr="Amount of expected parameters is 4.">fscanf</error> ($handle, $pattern4, $arg);

        /* sscanf/fscanf with partially provided containers */
        list($first, $second) = <error descr="Amount of expected parameters is 4.">sscanf</error> ($arg, $pattern4, $first);
        list($first, $second) = <error descr="Amount of expected parameters is 4.">fscanf</error> ($handle, $pattern4, $first);

        /* test resolving string literal */
        echo <error descr="Amount of expected parameters is 3.">sprintf</error> (self::PATTERN1, $arg);
        echo <error descr="Amount of expected parameters is 3.">sprintf</error> (self::$pattern2, $arg);
        echo <error descr="Amount of expected parameters is 3.">sprintf</error> ($this->pattern3, $arg);
        echo sprintf(<error descr="Pattern seems to be not valid.">'%'</error>, $arg);


        /* false-positives */
        echo sprintf($pattern4, $arg, $arg);
        echo sprintf('%d', $arg);
        echo sprintf('%1$d %1$d', $arg);
        echo sprintf("%% %1$'.-9d %1$'.-9d %s", $arg);
        echo sprintf('%% %1$\'.-9d %1$\'.-9d %s', $arg);
        /* sscanf/fscanf without containers returning array */
        list($first, $second) = sscanf($arg, $pattern4);
        $values               = sscanf($arg, $pattern4);
        list($first, $second) = fscanf($handle, $pattern4);
        $values               = fscanf($handle, $pattern4);
    }
}