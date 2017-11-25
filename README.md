# Zadanie 

Stwórz prost¹ aplikacjê internetow¹ (stronê www) umo¿liwiaj¹c¹ rejestracjê u¿ytkownika
a nastêpnie jego zalogowanie. Aplikacja powinna sk³adaæ siê z nastêpuj¹cych elementów:

1. Strona g³ówna z mo¿liwoœci¹ rejestracji i logowania

2. Strona dostêpna po zalogowaniu (z informacj¹, i¿ u¿ytkownik zosta³ poprawnie
    zalogowany oraz wyœwietlon¹ iloœci¹ dni pozosta³¹ do urodzin u¿ytkownika „Do twoich urodzin pozosta³o X dni ” )

3. Formularz rejestracji zawieraj¹cy:
    a. Adres e-mail u¿ytkownika
    b. Has³o
    c. WskaŸnik si³y has³a oceniaj¹cym poziom trudnoœci wg algorytmu za³¹czonego
       jako za³. 1.
    d. Datê urodzenia u¿ytkownika
    e. Walidacjê wype³nionych pól

4. Formularz logowania zawieraj¹cy:
    a. Adres e-mail u¿ytkownika
    b. Has³o

Zarówno rejestracja jak i logowanie powinny byæ wykonane przy u¿yciu PHP (mo¿na
u¿ywaæ pomocniczo JavaScriptu i HTML/HTML5 do walidacji formularzy). Tabela _user_ w
bazie danych powinna zawieraæ nastêpuj¹ce pola:

- ID u¿ytkownika
- Adres email u¿ytkownika
- Has³o u¿ytkownika
- Datê urodzenia



**Za³. 1. Algorytm liczenia z³o¿onoœci has³a**
_score - wskazuje rzeczywist¹ si³ê has³a
conditionsMeet - wskazujê liczbê spe³nionych warunków_

_1. Czy has³o ma co najmniej 6 znaków?
TAK: score += pod³oga (password.length / 2)
conditionsMeet++

2. Czy has³o zawiera wielkie litery?
TAK: score += 6
conditionsMeet++

3. Czy has³o zawiera cyfry?
TAK: score += 8
conditionsMeet++

4. Czy has³o zawiera znaki specjalne?
TAK: score += 13
conditionsMeet++

5. Czy conditionsMeet > 0?
TAK: score += (conditionsMeet * 4)_

_Wynik si³y has³a (score) na poziomie 50 powinien odpowiadaæ 100% na wskaŸniku si³y
z³o¿onoœci has³a. Mniejszy wynik powinien byæ wskazany proporcjonalnie mniej. W
przypadku osi¹gniêcia score powy¿ej 50, pokazujemy 100%._


