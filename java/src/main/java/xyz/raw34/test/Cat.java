package xyz.raw34.test;

public class Cat extends Animal {
    public void eat() {
        System.out.println("cat eat");
    }

//    public void work(){
//        System.out.println("cat work");
//    }

    public void work(String tool) {
        System.out.println("cat work with tool");
    }

    public void sleep() {
        System.out.println("cat sleep");
    }
}
