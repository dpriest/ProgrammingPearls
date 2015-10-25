#define MAXNUM 10000000
#include <stdio.h>
#include <stdlib.h>
int compare (const void * a, const void * b)
{
  return ( *(int*)a - *(int*)b );
}
int nums[MAXNUM];
int main()
{
	int i, n = 0;
	while(scanf("%d", &nums[n]) != EOF)
		n++;
	qsort (nums, n, sizeof(int), compare);
	for (i=0; i<n; i++)
    	printf ("%d\n",nums[i]);
	return 0;
}