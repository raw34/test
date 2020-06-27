package xyz.raw34.test;

import org.junit.Test;

import java.util.logging.Logger;

public class GenericTest{
    private final static Logger logger = Logger.getLogger(GenericTest.class.getName());

    @Test
    public void case1Test()
    {
        Generic<Integer> genericInteger = new Generic<Integer>(123456);
        Generic<String> genericString = new Generic<String>("key_vlaue");
        
        Generic genericFloat = new Generic(55.55);
        Generic genericBoolean = new Generic(false);

        logger.info("泛型测试" + " key is " + genericInteger.getKey());
        logger.info("泛型测试" + " key is " + genericString.getKey());
        logger.info("泛型测试" + " key is " + genericFloat.getKey());
        logger.info("泛型测试" + " key is " + genericBoolean.getKey());

        logger.info(GenericTest.class.getName());
    }
}