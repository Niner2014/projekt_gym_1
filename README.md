# Projekt Gym Management System

## Opis projektu
Aplikacja webowa stworzona w ramach pracy inżynierskiej, której celem jest zarządzanie siłownią. System umożliwia obsługę klientów, zarządzanie sprzedażą, prowadzenie grafiku zajęć oraz komunikację pomiędzy pracownikami.

---

## Funkcjonalności

1. **Obsługa klientów:**
   - Rejestracja nowych klientów.
   - Podgląd szczegółowych danych klientów.
   - Zarządzanie danymi klientów, w tym edycja i aktualizacja informacji.

2. **Model logowania i rejestracji:**
   - Uwierzytelnianie użytkowników za pomocą Laravel Sanctum.
   - Rozróżnienie ról użytkowników na podstawie unikalnego kodu admina.

3. **Zarządzanie produktami:**
   - Dodawanie i edycja produktów w magazynie.
   - Wyświetlanie stanu magazynowego oraz aktualizacji ilości dostępnych produktów.

4. **Moduł sprzedaży:**
   - Kalkulator sprzedaży.
   - Generowanie szczegółowych rejestrów transakcji w formacie PDF.

5. **Forum dla pracowników:**
   - Wewnętrzne forum umożliwiające wymianę informacji pomiędzy pracownikami.

6. **Moduł grafiku:**
   - Tworzenie i edycja grafiku miesięcznego.
   - Zabezpieczenie zmian kodem admina.

---

## Technologie

- **Frontend:**
  - HTML5, CSS3
  - Tailwind CSS
  - JavaScript (AJAX)

- **Backend:**
  - Laravel 10.0
  - PHP 8.1

- **Baza danych:**
  - MySQL 8.0.36

- **Inne narzędzia:**
  - Composer 2.7.6
  - GitHub (wersjonowanie kodu)

---

## Wymagania systemowe

- **Serwer:**
  - PHP w wersji 8.1 lub wyższej.
  - Serwer MySQL w wersji 8.0 lub wyższej.
  - Composer do zarządzania zależnościami.

- **Przeglądarka:**
  - Najnowsze wersje Google Chrome, Mozilla Firefox lub Microsoft Edge.

---

## Instalacja

1. Sklonuj repozytorium:
   ```bash
   git clone https://github.com/Niner2014/projekt_gym_1.git
   ```

2. Przejdź do folderu projektu:
   ```bash
   cd projekt_gym_1
   ```

3. Zainstaluj zależności:
   ```bash
   composer install
   ```

4. Skonfiguruj plik `.env`:
   - Skopiuj plik `.env.example` i zmień jego nazwę na `.env`.
   - Uzupełnij dane dostępu do bazy danych (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. Wykonaj migracje bazy danych:
   ```bash
   php artisan migrate
   ```

6. Uruchom serwer lokalny:
   ```bash
   php artisan serve
   ```

7. Otwórz aplikację w przeglądarce pod adresem:
   ```
http://127.0.0.1:8000
   ```

---

## Struktura projektu

- `resources/views` - Pliki widoków (frontend).
- `routes/web.php` - Główne trasy aplikacji.
- `app/Models` - Modele danych (np. Klient, Produkt).
- `app/Http/Controllers` - Kontrolery odpowiedzialne za logikę aplikacji.

---

## Autor
- **Imię i nazwisko:** Szymon Pawlak
- **E-mail:** szymi_2001@wp.pl

---


## Podziękowania
Dziękuję wszystkim, którzy wspierali mnie podczas pracy nad tym projektem.
