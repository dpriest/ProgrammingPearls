#include <stdio.h>
#include <errno.h>
#include <limits.h>
#include <stdlib.h>
#include <time.h>

int randRand(start, end)
{
	int rang = end - start + 1;
	int randNum = rand();
	int randBase = randNum % rang;
	return randBase + start;
}
int main(int argc,  char* argv[])
{
	char *p;

	errno = 0;
	if (argc < 3) {
		printf("argv err\n");
		return 1;
	}
	int n = strtol(argv[1], &p, 10);
	int k = strtol(argv[2], &p, 10);

	// Check for errors: e.g., the string does not represent an integer
	// or the integer is larger than int
	if (errno != 0 || *p != '\0' || n > INT_MAX || k > INT_MAX) {
	    printf("error\n");
	} else {
	    // No error
	    printf("%d %d\n", n, k);
	    int num[n], tmp, random;
	    for (int i = 0; i < n; ++i)
	    {
	    	num[i] = i;
	    }
	    srand(time(NULL));
	    for (int i = 0; i < k; ++i)
	    {
	    	random = randRand(i, n -1);
	    	printf("%d\n", num[random]);
	    	tmp = num[random];
	    	num[random] = num[i];
	    }
	}
	return 0;
}