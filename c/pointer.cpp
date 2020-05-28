#include <iostream>

using namespace std;

int basic()
{
    int var = 20; // 实际变量的声明
    int *ip;      // 指针变量的声明

    ip = &var; // 在指针变量中存储 var 的地址

    cout << "Value of var variable: ";
    cout << var << endl;

    // 输出在指针变量中存储的地址
    cout << "Address stored in ip variable: ";
    cout << ip << endl;

    // 访问指针中地址的值
    cout << "Value of *ip variable: ";
    cout << *ip << endl;

    return 0;
}

int arr()
{
    const int MAX = 3;
    int var[MAX] = {10, 100, 200};
    int *ptr;

    // 指针中的数组地址
    ptr = var;
    for (int i = 0; i < MAX; i++)
    {
        cout << "var[" << i << "]的内存地址为 ";
        cout << ptr << endl;

        cout << "ptr var[" << i << "] 的值为 ";
        cout << *ptr << endl;

        cout << "arr var[" << i << "] 的值为 ";
        cout << var[i] << endl;

        // 移动到下一个位置
        ptr++;
    }

    return 0;
}

int main()
{
    basic();
    cout << "=========================" << endl;
    arr();

    return 0;
}