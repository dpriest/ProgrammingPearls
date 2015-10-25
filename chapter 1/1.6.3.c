#define MAXNUM 10000000
#include <stdio.h>
#include <stdlib.h>
int compare (const void * a, const void * b)
{
  return ( *(int*)a - *(int*)b );
}
int numMappers[MAXNUM];
int main()
{
	int i, num;
	for (i = 0; i < num; i++) {
		numMappers[i] = 0;
	}
	while(scanf("%d", &num) != EOF)
		numMappers[num] = 1;
	for (i=0; i<num; i++) {
		if (numMappers[i] > 0)
    		printf ("%d\n",i);
	}
	return 0;
}