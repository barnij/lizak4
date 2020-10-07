//Bartosz Jaskiewicz
#include <iostream>
#include <conio.h>
#include <windows.h>
using namespace std;

 void WypiszArgumentyWierszaPolecen (int argc, char *argv[]);

 int main (int argc, char *argv[]) {

    string kod = argv[1];
    cout<<kod.size();

    return 0;
 }
