# LCPhotographer

Sistema web per portfolio fotografico realizzato con Laravel, pensato per mostrare immagini in gallerie pubbliche e set di portfolio protetti da codice di accesso.

## Descrizione

LCPhotographer è un progetto di portfolio fotografico che combina:

- landing page pubblica con presentazione del brand
- modulo di contatto con invio email
- galleria fotografica
- portfolio a set, con anteprima e accesso protetto da codice
- download di tutti i file di un set in un archivio ZIP
- area amministrativa riservata per la gestione dei contenuti
- autenticazione e sicurezza con Laravel Fortify

## Stack tecnologico

- PHP 8.3
- Laravel 13
- Composer
- Vite
- Bootstrap 5
- Tailwind CSS
- Laravel Fortify
- Pest per test

## Funzionalità principali

### Frontend pubblico
- Homepage con presentazione del fotografo/progetto
- pagina di contatto con form che invia un'email tramite Laravel Mail
- galleria foto pubblica
- pagina portfolio con elenco di set disponibili
- accesso a singoli set tramite codice d'accesso
- download completo di un set in ZIP

### Area admin
- creazione e gestione di foto
- creazione di set portfolio con più immagini
- caricamento immagini in storage pubblico
- gestione autorizzazioni tramite middleware `is_admin`
- accesso protetto agli endpoint amministrativi

### Sicurezza
- autenticazione utente con Laravel Fortify
- supporto per autenticazione a due fattori e passkey (configurazione prevista dal provider Fortify)
- rate limiting per login e passkey
- controllo admin per vie di amministrazione

## Requisiti

Prima di iniziare assicurati di avere installato:

- PHP >= 8.3
- Composer
- Node.js e npm
- un database supportato da Laravel (SQLite, MySQL, PostgreSQL, ecc.)

## Installazione

1. Clona il repository:

   ```bash
   git clone <url-del-repository>
   cd LCPhotographer
   ```

2. Installa le dipendenze PHP:

   ```bash
   composer install
   ```

3. Copia il file di ambiente:

   ```bash
   cp .env.example .env
   ```

4. Genera la chiave dell'applicazione:

   ```bash
   php artisan key:generate
   ```

5. Installa le dipendenze frontend:

   ```bash
   npm install
   ```

6. Esegui le migration del database:

   ```bash
   php artisan migrate
   ```

7. Avvia l'applicazione:

   ```bash
   composer run dev
   ```

In alternativa, puoi avviare separatamente il backend e il frontend:

```bash
php artisan serve
npm run dev
```

## Comandi utili

### Avvio locale

```bash
composer run dev
```

### Build frontend

```bash
npm run build
```

### Test

```bash
php artisan test
```

### Setup rapido

```bash
composer run setup
```

Questo script esegue installazione dipendenze, creazione `.env`, chiave app, migration e build frontend.

## Struttura del progetto

```text
app/
  Http/
    Controllers/
    Middleware/
  Models/
  Providers/
config/
public/
resources/
routes/
storage/
tests/
```

## Gestione admin

Per accedere alle aree riservate, il tuo utente deve avere il campo `is_admin` impostato a `1`.

Esempio SQL:

```sql
UPDATE users SET is_admin = 1 WHERE email = 'tuo@email.com';
```

Le route amministrative sono protette dal middleware `is_admin`.

## Variabili di ambiente

Il file `.env` va configurato con i parametri del database e della mail. In particolare, per il form di contatto:

```env
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="LCPhotographer"
```

Se usi SQLite locale, puoi impostare:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```

## Licenza

Questo progetto è distribuito con licenza MIT.

## Note

Questo repository è stato pensato come soluzione completa per un sito fotografico professionale con gestione semplificata dei contenuti e accesso protetto ai set portfolio.
