#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>
#include <sys/time.h>
#include <math.h>

void test_second(){
    struct timeval tv;
    gettimeofday(&tv, NULL);
    printf("second:%ld\n", tv.tv_sec); //秒
    printf("millisecond:%ld\n", tv.tv_sec * 1000 + tv.tv_usec / 1000); //毫秒
    printf("microsecond:%ld\n", tv.tv_sec * 1000000 + tv.tv_usec); //微秒
}

void test_add(int x, int y){
    int z =  x + y;
}

void test_sub(int x, int y){
    int z =  x - y;
}

void test_mul(int x, int y){
    int z =  x * y;
}

void test_div(int x, int y){
    int z =  x / y;
}

void test_add_double(double x, double y){
    double z =  x + y;
}

void test_sub_double(double x, double y){
    double z =  x - y;
}

void test_mul_double(double x, double y){
    double z =  x * y;
}

void test_div_double(double x, double y){
    double z =  x / y;
}

void test_int2double(int x){
    double y = x;
}

void test_double2int(double x){
    int y = x;
}

void test_sin(int x){
    double y = sin(x);
}

void test_pow(int x, int y){
    double z = pow(x, y);
}

void test_log(int x){
    double y = log(x);
}

void test_sqrt(int x){
    double y = sqrt(x);
}

int main(){
    // test_second();

    struct timeval tv;
    int n = 100000000;

    gettimeofday(&tv, NULL);
    long start =  tv.tv_sec * 1000000 + tv.tv_usec;

    for (int i = 0; i < n; i++)
    {
        // int i1 = 1 + 2;
        // test_add(1, 2);
        // test_sub(1, 2);
        // test_mul(1, 2);
        // test_div(1, 2);
        // test_add_double(1.1, 2.2);
        // test_sub_double(1.1, 2.2);
        // test_mul_double(1.1, 2.2);
        // test_div_double(1.1, 2.2);
        // test_int2double(2);
        // test_double2int(2.2);
        // test_sin(15);
        // test_pow(2, 3);
        // test_log(2);
        // test_sqrt(100);
    }

    gettimeofday(&tv, NULL);
    long end =  tv.tv_sec * 1000000 + tv.tv_usec;

    printf("microsecond:%ld\n", end - start); //微秒
}