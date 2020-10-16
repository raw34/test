package xyz.raw34.test;

import org.junit.Test;

public class PolymorphismTest {
    @Test
    public void testCase1(){
        Animal cat = new Cat();
        cat.eat();
        cat.work();
        cat.sleep();
    }
}

