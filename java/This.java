public class This {
    public static String name = "randy";
    public String sex = "man";

    public String getSex() {
        return sex;
    }

    public String getSexUseThis() {
        return this.sex;
    }

    public static void main(String args[])
    {
        This t = new This();
        
        System.out.println("name = " + name + " sex = " + t.getSex());
        
        name = "stan";
        
        System.out.println("name = " + name + " sex = " + t.getSexUseThis());
    }
}