package xyz.raw34.test;

import org.junit.Test;

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
    }
} 

