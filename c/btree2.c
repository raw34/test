#include<stdio.h>
#include<stdbool.h>
#include<stdlib.h>

#define M 3

//节点结构体
typedef struct BtreeNode
{
    int num;
    struct BtreeNode *p[2*M];
    int key[2*M-1];
    bool isleaf;
}BtreeNode;

BtreeNode * BtreeCreate();
void BtreeSplitChild(BtreeNode *father,BtreeNode *child,int k);
void BtreeInsertNotFull(BtreeNode *x,int keyword);
BtreeNode * BtreeInsert(BtreeNode *TestNode,int keyword);
BtreeNode *BtreeSearch(BtreeNode *TestNode,int keyword);

//////
void BtreeMergeChild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z);
BtreeNode *BtreeDelete(BtreeNode *root, int keyword);
void BtreeDeleteNotFull(BtreeNode *root, int keyword);
int BtreeSearchPrevious(BtreeNode *root);
int BtreeSearchNext(BtreeNode *root);
void BtreeChangeToRchild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z);
void BtreeChangeToLchild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z);

/**********************************************************\
函数功能：创建节点
输入：无
输出：新节点
\**********************************************************/
BtreeNode * BtreeCreate()
{
    BtreeNode *node=(BtreeNode *)malloc(sizeof(BtreeNode));
    if(NULL==node)
        return NULL;
    node->isleaf=true;
    node->num=0;
    for(int i=0;i<2*M;i++)
        node->p[i]=NULL;
    for(int i=0;i<2*M-1;i++)
        node->key[i]=0;
    return node;
}
//////////////////////////////插入部分///////////////////////////////////////////
/**********************************************************\
函数功能：节点分裂，防止违反B树的性质
输入： 父节点father ,子节点child，k表示子节点为父节点的哪个孩子
输出：无
\**********************************************************/
void BtreeSplitChild(BtreeNode *father,BtreeNode *child,int k)
{
    BtreeNode *newchild=(BtreeNode *)malloc(sizeof(BtreeNode));
    newchild->isleaf=child->isleaf;//newchild为child的右节点，即child分裂为child和newchild
    newchild->num=M-1;
    for(int i=0;i<M-1;i++)
        newchild->key[i]=child->key[i+M];
    if(!child->isleaf)//当child不是叶子时，还要把指针赋给newchild
    {
        for(int j=0;j<M;j++)
            newchild->p[j]=child->p[j+M];
    }

    child->num=M-1;//child的个数由2M-1变为M-1

    for(int i=father->num;i>=k+1;i--)//改变父节点的内容
    {
        father->p[i+1]=father->p[i];
    }
    father->p[k+1]=newchild;
    for(int j=father->num-1;j>=k;j--)
        father->key[j+1]=father->key[j];
    father->key[k]=child->key[M-1];//将child的中间节点提升到父节点
    father->num=father->num+1;


}

/**********************************************************\
函数功能：x节点不是满的情况下，插入keyword
输入：B树的根，要插入的关键字
输出：无
\**********************************************************/
void BtreeInsertNotFull(BtreeNode *x,int keyword)
{
    int i=x->num;
    if(x->isleaf)//当x为叶子时，keyword插入到该节点中
    {
        while(i>=1&&keyword<x->key[i-1])
        {
            x->key[i]=x->key[i-1];
            i=i-1;
        }
        x->key[i]=keyword;
        x->num=x->num+1;
    }
    else//当x不是叶子时，找到keyword要插入的节点并插入
    {
        i=x->num;
        while(i>=1&&keyword<x->key[i-1])
        {
            i=i-1;
        }

        if(x->p[i]->num==2*M-1)//当节点为满节点时，需要分裂
        {
            BtreeSplitChild(x,x->p[i],i);
            if(keyword>x->key[i])
                i=i+1;

        }
        BtreeInsertNotFull(x->p[i],keyword);
    }
}

/**********************************************************\
函数功能：插入关键值
输入：B树的根，关键字
输出：B树的根
\**********************************************************/
BtreeNode * BtreeInsert(BtreeNode *TestNode,int keyword)
{
    if(TestNode->num==2*M-1)//当根节点为满时，唯一增加高度的情况
    {

        BtreeNode *newroot=(BtreeNode *)malloc(sizeof(BtreeNode));
        newroot->isleaf=false;//产生新的根
        newroot->num=0;
        newroot->p[0]=TestNode;
        BtreeSplitChild(newroot,TestNode,0);
        BtreeInsertNotFull(newroot,keyword);
        return newroot;
    }
    else
    {

        BtreeInsertNotFull(TestNode,keyword);
        return TestNode;
    }

}

/**********************************************************\
函数功能：查找关键字所在的节点
输入：    树的根，关键字
输出：    关键字所在的节点
\**********************************************************/
BtreeNode *BtreeSearch(BtreeNode *TestNode,int keyword)
{
    int i=0;
    while(i<TestNode->num&&keyword>TestNode->key[i])
        i=i+1;
    if(i<=TestNode->num&&keyword==TestNode->key[i])
        return TestNode;
    if(TestNode->isleaf)
    {
        printf("Not founded!\n");
        return NULL;
    }
    else
    {
        return BtreeSearch(TestNode->p[i],keyword);
    }
}




///////////////////////////删除部分//////////////////////////////////////////
/**********************************************************\
函数功能：合并左右子节点
输入：根，左右子节点，左节点是父节点的第pos个节点
输出：无
\**********************************************************/
void BtreeMergeChild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z)
{
    // 将z中节点拷贝到y的后半部分
    y->num = 2 * M - 1;
    for(int i = M; i < 2 * M - 1; i++)
    {
        y->key[i] = z->key[i-M];
    }
    y->key[M-1] = root->key[pos]; // 将root->key[pos]下降为y的中间节点


    if(false == z->isleaf)// 如果z是内节点即非叶子，需要拷贝指向子节点的指针p
    {
        for(int i = M; i < 2 * M; i++)
        {
            y->p[i] = z->p[i-M];
        }
    }


    for(int j = pos + 1; j < root->num; j++) // root->key[pos]下降到y中，更新root中key和p
    {
        root->key[j-1] = root->key[j];
        root->p[j] = root->p[j+1];
    }

    root->num -= 1;
    free(z);
}

/**********************************************************\
函数功能：删除关键字keyword
输入：树的根，关键字
输出：树的根
\**********************************************************/
BtreeNode *BtreeDelete(BtreeNode *root, int keyword)
{

    // 唯一能降低树高的情形
    if(1 == root->num) // 当根只有一个关键字，两个子女
    {
        BtreeNode *y = root->p[0];
        BtreeNode *z = root->p[1];
        if(NULL != y && NULL != z &&M - 1 == y->num && M - 1 == z->num)//两个子女的关键字个数都为M-1时，合并根与两个子女
        {
            BtreeMergeChild(root, 0, y, z);
            free(root);//注意释放空间
            BtreeDeleteNotFull(y, keyword);
            return y;
        }
        else
        {
            BtreeDeleteNotFull(root, keyword);
            return root;
        }
    }
    else
    {
        BtreeDeleteNotFull(root, keyword);
        return root;
    }
}

/**********************************************************\
函数功能： root至少有个M个关键字时删除关键字
输入：   树的根，关键字
输出：   无
\**********************************************************/
void BtreeDeleteNotFull(BtreeNode *root, int keyword)
{
    if(true == root->isleaf) // 如果在叶子节点，直接删除,情况1
    {
        int i = 0;
        while(i < root->num && keyword > root->key[i]) i++;
        if(keyword == root->key[i])
        {
            for(int j = i + 1; j < 2 * M - 1; j++)
            {
                root->key[j-1] = root->key[j];
            }
            root->num -= 1;
        }
        else
        {
            printf("keyword not found\n");
        }
    }
    else
    {  // 在分支中
        int i = 0;
        BtreeNode *y = NULL, *z = NULL;
        while(i < root->num && keyword > root->key[i]) i++;
        if(i < root->num && keyword == root->key[i])
        { // 如果在分支节点找到keyword
            y = root->p[i];
            z = root->p[i+1];
            if(y->num > M - 1)
            {
              // 如果左分支关键字多于M-1，则找到左分支的最右节点pre，替换keyword
                // 并在左分支中递归删除prev,情况2a
                int pre = BtreeSearchPrevious(y);
                root->key[i] = pre;
                BtreeDeleteNotFull(y, pre);//递归处理
            }
            else if(z->num > M - 1)
            {
                // 如果右分支关键字多于M-1，则找到右分支的最左节点next，替换keyword
                // 并在右分支中递归删除next,情况2b
                int next = BtreeSearchNext(z);
                root->key[i] = next;
                BtreeDeleteNotFull(z, next);
            }
            else // 两个分支节点数都为M-1，则合并至y，并在y中递归删除keyword,情况2c
            {

                BtreeMergeChild(root, i, y, z);
                BtreeDelete(y, keyword);
            }
        }
        else// 分支中没有，在分支的子节点中的情况
        {
            y = root->p[i];
            if(i < root->num)
            {
                z = root->p[i+1];//y的右兄弟
            }
            BtreeNode *p = NULL;//初始化
            if(i > 0)
            {
                p = root->p[i-1];//y的左兄弟
            }

            if(y->num == M - 1)
            {
                if(i > 0 && p->num > M - 1)
                {
                    // 左兄弟节点关键字个数大于M-1,情况3a
                    BtreeChangeToRchild(root, i-1, p, y);
                }
                else if(i < root->num && z->num > M - 1)
                {
                    // 右兄弟节点关键字个数大于M-1,情况3a
                    BtreeChangeToLchild(root, i, y, z);
                }
                else if(i > 0)
                {
                    BtreeMergeChild(root, i-1, p, y);  //左右兄弟节点都不大于M-1，情况3b
                    y = p;
                }
                else //没有左兄弟的情况
                {
                    BtreeMergeChild(root, i, y, z);
                }
                BtreeDeleteNotFull(y, keyword);
            }
            else
            {
                BtreeDeleteNotFull(y, keyword);
            }
        }

    }
}

/**********************************************************\
函数功能：寻找以root为根的最大关键字
输入：    树的根
输出：    最大关键字
\**********************************************************/
int BtreeSearchPrevious(BtreeNode *root)
{
    BtreeNode *y = root;
    while(false == y->isleaf)
    {
        y = y->p[y->num];
    }
    return y->key[y->num-1];
}

/**********************************************************\
函数功能：寻找以root为根的最小关键字
输入：树的根
输出：最小关键字
\**********************************************************/
int BtreeSearchNext(BtreeNode *root)
{
    BtreeNode *z = root;
    while(false == z->isleaf)
    {
        z = z->p[0];
    }
    return z->key[0];
}


/**********************************************************\
函数功能：z向y借节点，将root->key[pos]下降至z，将y的最大关键字上升至root的pos处
输入：根，左右子节点，左节点是父节点的第pos个节点
输出：无
\**********************************************************/
void BtreeChangeToRchild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z)
{
    z->num += 1;
    for(int i = z->num -1; i > 0; i--)
    {
        z->key[i] = z->key[i-1];
    }
    z->key[0]= root->key[pos];
    root->key[pos] = y->key[y->num-1];

    if(false == z->isleaf)
    {
        for(int i = z->num; i > 0; i--)
        {
            z->p[i] = z->p[i-1];
        }
        z->p[0] = y->p[y->num];
    }

    y->num -= 1;
}


/**********************************************************\
函数功能：y向借节点，将root->key[pos]下降至y，将z的最小关键字上升至root的pos处
输入：根，左右子节点，左节点是父节点的第pos个节点
输出：无
\**********************************************************/
void BtreeChangeToLchild(BtreeNode *root, int pos, BtreeNode *y, BtreeNode *z)
{
    y->num += 1;
    y->key[y->num-1] = root->key[pos];
    root->key[pos] = z->key[0];

    for(int j = 1; j < z->num; j++)
    {
        z->key[j-1] = z->key[j];
    }

    if(false == z->isleaf)
    {
        y->p[y->num] = z->p[0];
        for(int j = 1; j <= z->num; j++)
        {
            z->p[j-1] = z->p[j];
        }
    }

    z->num -= 1;
}


//按层次遍历B树
void Print(BtreeNode *root)
{
    int front,rear;
    int num=0;
    int num1=0;
    int flag=0;
    BtreeNode *queue[100];
    BtreeNode *s;
    if(root!=NULL)
    {
        rear=1;
        front=0;
        queue[rear]=root;
        while(front<rear)
        {
            front++;

            s=queue[front];

            if(!s->isleaf)
            {
                for(int j=0;j<=s->num;j++)
                {
                    if(s->p[j]!=NULL)
                    {
                        rear++;
                        queue[rear]=s->p[j];

                    }
                }
            }

        }
            for(int k=1;k<=rear;k++)//使输出简单易看
            {
                for(int i=0;i<queue[k]->num;i++)
                    printf("%d ",queue[k]->key[i]);
                printf("| ");
                if(k>num)
                {

                    while(flag<k)
                    {
                    num=num+queue[flag+1]->num+1;
                    flag++;
                    }
                printf("\n");
                flag=k;
                }

            }



    }
}


////////////////////////////////////////////////////////////////////////////
void main()
{
/**************************初始化**************************/
    BtreeNode *TestNode=BtreeCreate();
    BtreeNode *Node1=BtreeCreate();
    BtreeNode *Node2=BtreeCreate();
    BtreeNode *Node3=BtreeCreate();
    BtreeNode *Node4=BtreeCreate();
    BtreeNode *Node5=BtreeCreate();
    BtreeNode *root=BtreeCreate();

    BtreeNode *SearchNode=BtreeCreate();
    TestNode->isleaf=false;
    TestNode->num=4;
    TestNode->key[0]=7;
    TestNode->key[1]=13;
    TestNode->key[2]=16;
    TestNode->key[3]=24;
    TestNode->p[0]=Node1;
    TestNode->p[1]=Node2;
    TestNode->p[2]=Node3;
    TestNode->p[3]=Node4;
    TestNode->p[4]=Node5;

    Node1->isleaf=true;
    Node1->num=4;
    Node1->key[0]=1;
    Node1->key[1]=3;
    Node1->key[2]=4;
    Node1->key[3]=5;

    Node2->isleaf=true;
    Node2->num=2;
    Node2->key[0]=10;
    Node2->key[1]=11;


    Node3->isleaf=true;
    Node3->num=2;
    Node3->key[0]=14;
    Node3->key[1]=15;


    Node4->isleaf=true;
    Node4->num=5;
    Node4->key[0]=18;
    Node4->key[1]=19;
    Node4->key[2]=20;
    Node4->key[3]=21;
    Node4->key[4]=22;


    Node5->isleaf=true;
    Node5->num=2;
    Node5->key[0]=25;
    Node5->key[1]=26;
    root=TestNode;
/*******************************初始化结束***********************/
    printf("原始B树：\n");
    Print(root);
    root=BtreeInsert(root,2);
    printf("\n插入关键字为2后的B树：\n");
    Print(root);
    root=BtreeInsert(root,17);
    printf("\n插入关键字为17后的B树：\n");
    Print(root);
    root=BtreeInsert(root,12);
    printf("\n插入关键字为12后的B树：\n");
    Print(root);
    root=BtreeInsert(root,6);
    printf("\n插入关键字为6后的B树：\n");
    Print(root);
    printf("\n\n");
    //删除操作
    root=BtreeDelete(root,6);
    printf("\n删除关键字为6后的B树：\n");
    Print(root);

    root=BtreeDelete(root,13);
    printf("\n删除关键字为13后的B树：\n");
    Print(root);

    root=BtreeDelete(root,7);
    printf("\n删除关键字为7后的B树：\n");
    Print(root);

    root=BtreeDelete(root,4);
    printf("\n删除关键字为4后的B树：\n");
    Print(root);


    root=BtreeDelete(root,2);
    printf("\n删除关键字为2后的B树：\n");
    Print(root);

}
