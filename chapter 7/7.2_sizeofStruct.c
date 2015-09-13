#include <stdio.h>
struct node { int i; struct node *p; };
int main(void) {
    printf("sizeof(struct node)=%ld\n", sizeof(struct node));
	return 0;
}

