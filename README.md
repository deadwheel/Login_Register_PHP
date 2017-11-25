# Zadanie 

Stw�rz prost� aplikacj� internetow� (stron� www) umo�liwiaj�c� rejestracj� u�ytkownika
a nast�pnie jego zalogowanie. Aplikacja powinna sk�ada� si� z nast�puj�cych element�w:

1. Strona g��wna z mo�liwo�ci� rejestracji i logowania

2. Strona dost�pna po zalogowaniu (z informacj�, i� u�ytkownik zosta� poprawnie
    zalogowany oraz wy�wietlon� ilo�ci� dni pozosta�� do urodzin u�ytkownika �Do twoich urodzin pozosta�o X dni � )

3. Formularz rejestracji zawieraj�cy:
    a. Adres e-mail u�ytkownika
    b. Has�o
    c. Wska�nik si�y has�a oceniaj�cym poziom trudno�ci wg algorytmu za��czonego
       jako za�. 1.
    d. Dat� urodzenia u�ytkownika
    e. Walidacj� wype�nionych p�l

4. Formularz logowania zawieraj�cy:
    a. Adres e-mail u�ytkownika
    b. Has�o

Zar�wno rejestracja jak i logowanie powinny by� wykonane przy u�yciu PHP (mo�na
u�ywa� pomocniczo JavaScriptu i HTML/HTML5 do walidacji formularzy). Tabela _user_ w
bazie danych powinna zawiera� nast�puj�ce pola:

- ID u�ytkownika
- Adres email u�ytkownika
- Has�o u�ytkownika
- Dat� urodzenia



**Za�. 1. Algorytm liczenia z�o�ono�ci has�a**
_score - wskazuje rzeczywist� si�� has�a
conditionsMeet - wskazuj� liczb� spe�nionych warunk�w_

_1. Czy has�o ma co najmniej 6 znak�w?
TAK: score += pod�oga (password.length / 2)
conditionsMeet++

2. Czy has�o zawiera wielkie litery?
TAK: score += 6
conditionsMeet++

3. Czy has�o zawiera cyfry?
TAK: score += 8
conditionsMeet++

4. Czy has�o zawiera znaki specjalne?
TAK: score += 13
conditionsMeet++

5. Czy conditionsMeet > 0?
TAK: score += (conditionsMeet * 4)_

_Wynik si�y has�a (score) na poziomie 50 powinien odpowiada� 100% na wska�niku si�y
z�o�ono�ci has�a. Mniejszy wynik powinien by� wskazany proporcjonalnie mniej. W
przypadku osi�gni�cia score powy�ej 50, pokazujemy 100%._


