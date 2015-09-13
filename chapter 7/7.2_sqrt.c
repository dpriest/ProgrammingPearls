#include <errno.h>
#include <limits.h>
#include <stdlib.h>
#include <stdio.h>
#include <math.h>
struct node { int i; struct node *p; };
int main(int argc, char *argv[]) {
    int i, n = 1000000;
    float fa;
    if (argc > 1) {
        char *p;
        errno = 0;
        long conv = strtol(argv[1], &p, 10);
        if (errno != 0 || *p != '\0' || conv > INT_MAX) {
            printf("argv err, errno=%d, *p = %s", errno, p);
            return 0;
        }
        n = conv;
    }
    printf("%d", n);
    for (i = 0; i < n; i++)
        fa = sqrt(10.0);
    return 0;
}

