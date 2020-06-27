package xyz.raw34.test;

import org.junit.Test;
import sun.security.util.ArrayUtil;

import java.lang.String;
import java.util.List;
import java.util.ArrayList;
        
public class ListTest
{
    @Test
    public void case1Test()
    {
        List<String> list = new ArrayList<>();
        list.add("xxxx");

        System.out.println("list size = " + list.size());
        System.out.println("list[0] = " + list.get(0));

        List<Integer> ids = new ArrayList<>();
        ids.add(1);
        ids.add(2);
        ids.add(3);
        ids.add(4);

        List<Integer> idsSource = new ArrayList<>();
        idsSource.add(3);
        idsSource.add(4);
        idsSource.add(5);
        idsSource.add(6);

        List<Integer> idsCopy1 = new ArrayList<>(ids);
        List<Integer> idsSourceCopy1 = new ArrayList<>(idsSource);

        List<Integer> idsInter = new ArrayList<>(ids);
        List<Integer> idsDiff1 = new ArrayList<>(ids);
        List<Integer> idsDiff2 = new ArrayList<>(idsSource);

        idsInter.retainAll(idsSource);
        idsDiff1.removeAll(idsSourceCopy1);
        idsDiff2.removeAll(idsCopy1);

        System.out.println(idsInter);
        System.out.println(idsDiff1);
        System.out.println(idsDiff2);

        System.out.println(idsInter.contains(1));
        System.out.println(idsInter.contains(3));
    }
} 

