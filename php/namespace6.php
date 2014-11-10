<?php
namespace Test\Bar\subnamespace;

echo "namespace = ", __NAMESPACE__, "\n";

const FOO = "const in namespace3\n";
function foo() {
    echo "function in namespace3\n";
}
class foo
{
    static function staticmethod() {
        echo "method in namespace3\n";
    }
}
