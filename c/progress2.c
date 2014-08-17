#include<unistd.h>
#include<sys/types.h>
#include<stdlib.h>
#include<stdio.h>
#include<string.h>
#include<errno.h>
int globVar = 5;
int main(void)
{
    pid_t  pid;
    int    var = 1, i;
    printf("fork is diffirent with vfork \n");
    //pid = fork();
    pid = vfork();
    printf("pid is %d\n", pid);
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
