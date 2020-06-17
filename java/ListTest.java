import java.lang.String;
import java.util.List;
import java.util.ArrayList;
        
public class ListTest
{
    public static void main(String args[])
    {
        List<String> list = new ArrayList<>();
        list.add("xxxx");

        System.out.println("list size = " + list.size());
        System.out.println("list[0] = " + list.get(0));
    }
} 

