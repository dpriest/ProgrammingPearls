#include <stdio.h>
#define SMAX 1024
typedef struct 
{
	int row;
	int pointnum;
	struct SPNode *next;
}SPNode, *SPList;
SPList colhead[8] = {NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL};
int main(int argc, char const *argv[])
{
	int i, j;
	SPList first, tmp, p;
	first = (SPList)malloc(sizeof(SPNode));
	first->row = 2;
	first->pointnum = 17;
	tmp = (SPList)malloc(sizeof(SPNode));
	first->next = tmp;
	tmp->row = 5;
	tmp->pointnum = 538;
	tmp->next = NULL;
	colhead[0] = first;
	first = (SPList)malloc(sizeof(SPNode));
	first->row = 1;
	first->pointnum = 98;
	first->next = NULL;
	colhead[1] = first;
	first = (SPList)malloc(sizeof(SPNode));
	first->row = 4;
	first->pointnum = 965;
	first->next = NULL;
	colhead[3] = first;
	first = (SPList)malloc(sizeof(SPNode));
	first->row = 3;
	first->pointnum = 1171;
	first->next = NULL;
	colhead[5] = first;
	first = (SPList)malloc(sizeof(SPNode));
	first->row = 1;
	first->pointnum = 162;
	first->next = NULL;
	colhead[7] = first;
	while(scanf("%d,%d", &i, &j) == 2) {
		for (p = colhead[i]; p != NULL; p = p->next)
		{
			if (p->row == j) 
				printf("%d\n", p->pointnum);
		}
	}
	return 0;
}