package xyz.raw34.test;

import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.JSONObject;
import org.junit.Test;

import java.util.Map;

public class JsonTest {

    @Test
    public void case1Test(){
        String str = "{\"0\":\"zhangsan\",\"1\":\"lisi\",\"2\":\"wangwu\",\"3\":\"maliu\"}";
        //第一种方式
        Map maps = (Map)JSON.parse(str);
        System.out.println("这个是用JSON类来解析JSON字符串!!!");
        for (Object map : maps.entrySet()){
            System.out.println(((Map.Entry)map).getKey()+"     " + ((Map.Entry)map).getValue());
        }
    }

    @Test
    public void case2Test(){
        String str = "{\"0\":\"zhangsan\",\"1\":\"lisi\",\"2\":\"wangwu\",\"3\":\"maliu\"}";
        //第二种方式
        Map mapTypes = JSON.parseObject(str);
        System.out.println("这个是用JSON类的parseObject来解析JSON字符串!!!");
        for (Object obj : mapTypes.keySet()){
            System.out.println("key为："+obj+"值为："+mapTypes.get(obj));
        }
    }

    @Test
    public void case3Test(){
        String str = "{\"0\":\"zhangsan\",\"1\":\"lisi\",\"2\":\"wangwu\",\"3\":\"maliu\"}";
        //第三种方式
        Map mapType = JSON.parseObject(str,Map.class);
        System.out.println("这个是用JSON类,指定解析类型，来解析JSON字符串!!!");
        for (Object obj : mapType.keySet()){
            System.out.println("key为："+obj+"值为："+mapType.get(obj));
        }
    }

    @Test
    public void case4Test(){
        String str = "{\"0\":\"zhangsan\",\"1\":\"lisi\",\"2\":\"wangwu\",\"3\":\"maliu\"}";
        //第四种方式
        /**
         * JSONObject是Map接口的一个实现类
         */
        Map json = (Map) JSONObject.parse(str);
        System.out.println("这个是用JSONObject类的parse方法来解析JSON字符串!!!");
        for (Object map : json.entrySet()){
            System.out.println(((Map.Entry)map).getKey()+"  "+((Map.Entry)map).getValue());
        }
    }

//    @Test
//    public void case5Test(){
//        //第五种方式
//        /**
//         * JSONObject是Map接口的一个实现类
//         */
//        JSONObject jsonObject = JSONObject.parseObject(str);
//        System.out.println("这个是用JSONObject的parseObject方法来解析JSON字符串!!!");
//        for (Object map : json.entrySet()){
//            System.out.println(((Map.Entry)map).getKey()+"  "+((Map.Entry)map).getValue());
//        }
//    }
//
//    @Test
//    public void case6Test(){
//        //第六种方式
//        /**
//         * JSONObject是Map接口的一个实现类
//         */
//        Map mapObj = JSONObject.parseObject(str,Map.class);
//        System.out.println("这个是用JSONObject的parseObject方法并执行返回类型来解析JSON字符串!!!");
//        for (Object map: json.entrySet()){
//            System.out.println(((Map.Entry)map).getKey()+"  "+((Map.Entry)map).getValue());
//        }
//        String strArr = "{{\"0\":\"zhangsan\",\"1\":\"lisi\",\"2\":\"wangwu\",\"3\":\"maliu\"}," +
//                "{\"00\":\"zhangsan\",\"11\":\"lisi\",\"22\":\"wangwu\",\"33\":\"maliu\"}}";
//        // JSONArray.parse()
//        System.out.println(json);
//    }
}
