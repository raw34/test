#include<unistd.h>
#include<sys/types.h>
#include<stdio.h>
#include<errno.h>
/*
#define SLEEP_TIME 2
#define SLEEP_TIME1 3
extern int errno;
int main(void)
{
    pid_t child;
    int i=0;
    //使用系统调用fork创建一个子进程
    //创建失败的话，返回-1
    if((child=fork())==-1)
    {
        printf("Firk Eroor :%s\n",strerror(errno));
        return -1;
    }
    //对于子进程,fork返回0
    else if(child==0)
    {
        int j;
        printf("I am the child :%ld\n",getpid());
        for(j=0;j<5;j++,i++)
        {
            printf("child_pro: %d\n",i);
            sleep(SLEEP_TIME);
        }
        printf("Child exit with:%d\n",i);
    }
    //对于父进程fork返回子进程的ID
    else
    {
        int j;
        printf("I'm the parent :%ld\n",getpid());
        for(j=0;j<5;j++,i--)
        {
            printf("parent_pro: %d\n",i);
            sleep(SLEEP_TIME1);
        }
        printf("Parent exit with:%d\n",i);
    }
    printf("Who am I :%d\n",i);
    return 0;
}
*/

int globVar = 5;
int main(void)
{
    pid_t  pid;
    int    var = 1, i;
    printf("fork is diffirent with vfork \n");
    pid = fork();
    /*pid = vfork()*/
    switch(pid)
    {
        case 0:
            i = 3;
            while(i-- > 0)
            {
                printf("Child process is running \n");
                globVar++;
                var++;
                sleep(1);
            }
            printf("Child's globVar = %d, var = %d\n",globVar, var);
            break;
        case -1:
            perror("Process creation failed \n");
            exit(0);
        default:
            i = 5;
            while(i-- > 0)
            {
                printf("Parent process is runnig \n");
                globVar++;
                var++;
                sleep(1);
            }
            printf("Parent's globVar = %d, var = %d\n", globVar, var);
            exit(0);
    }
    exit(0);
}
