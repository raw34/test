import java.util.logging.Logger;

public class GenericTest{
    private final static Logger log = Logger.getLogger(GenericTest.class.getName());

    public static void main(String args[])
    {
        Generic<Integer> genericInteger = new Generic<Integer>(123456);
        Generic<String> genericString = new Generic<String>("key_vlaue");
        
        Generic genericFloat = new Generic(55.55);
        Generic genericBoolean = new Generic(false);

        log.info("泛型测试" + " key is " + genericInteger.getKey());
        log.info("泛型测试" + " key is " + genericString.getKey());
        log.info("泛型测试" + " key is " + genericFloat.getKey());
        log.info("泛型测试" + " key is " + genericBoolean.getKey());
    }
}