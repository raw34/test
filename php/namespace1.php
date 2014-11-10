<?php
namespace Foo\Bar\subnamespace;

echo "namespace = ", __NAMESPACE__, "\n";

const FOO = "const in namespace1\n";
function foo() {
    echo "function in namespace1\n";
}
class foo
{
    static function staticmethod() {
        echo "method in namespace1\n";
    }
}
