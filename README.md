# LIZAK v4
4. Legnickie Informatyczne Zawody Algorytmiczno-Kombinatoryczne

## Instalacja
0. Serwis działa tylko na systemie Windows
1. Pobierz i zainstaluj XAMPP
2. Pobierz to repozytorium i umieść jego zawartość w folderze `xampp/htdocs/lizak`
3. Uruchom usługi *Apache* i *MySQL*
4. Zaloguj się do panelu *phpmyadmin* poprzez stronę `localhost/phpmyadmin/`
5. Dodaj bazę danych o nazwie `lizak` i zaimportuj do niej plik *lizak.sql*
6. Dla bezpieczeństwa możesz zmienić hasło do *phpmyadmin*, jednak wtedy musisz je uzupełnić w plikach `functions/connect.php` i `admin/connect.php`

### Panel admina
Dostępny jest pod adresem `lizak/admin`. Domyślne dane logowania to `admin` i hasło `admin`.

## Zasady
Drużyny logują się na stronę konkursu i rejestrują się. Po rejestracji dostają od systemu __kod dostępu__, który muszą zapisać sobie w pewnym miejscu.
Logują się za pomocą otrzymanego kodu. To od organizatorów zależy ile trwa konkurs. Wygrywa drużyna, która rozwiąże jak najwięcej zadań, używając łącznie jak najmniej znaków w dobrych rozwiązaniach, używając języka BAP.

## BAP
Język BAP to zmodyfikowany Brainf\*ck.

