## 📂 Estructura del Projecte

```plaintext
backend/
├── app/                 # Lògica de l'aplicació (Models, Controllers, Middleware)
├── bootstrap/           # Configuració d'arrencada del framework
├── config/              # Fitxers de configuració
├── database/            # Migracions i seeders de la BD
├── public/              # Punt d'entrada (index.php) i assets estàtics
├── resources/           # Vistes (Blade) i recursos frontend
├── routes/              # Definició de rutes web i API
├── storage/             # Logs, memòria cau i fitxers generats
├── docker-compose.yml   # Configuració dels contenidors Docker
├── Dockerfile           # Definició de la imatge PHP/Apache
└── vhost.conf           # Configuració del servidor web Apache
```

---

## 🐳 Entorn Docker

El projecte utilitza Docker per aïllar les dependències i facilitar el desplegament.

### Serveis principals

El fitxer `docker-compose.yml` defineix dos serveis principals:

* **laravel-app:** Contenidor PHP amb Apache que serveix l'aplicació Laravel.
* **db:** Contenidor MySQL encarregat de l'emmagatzematge persistent de les dades.

### Volums

Les carpetes locals estan muntades dins dels contenidors per permetre el desenvolupament en temps real (**hot-reloading**) i facilitar la persistència de dades.

---

## ⚙️ Funcionalitat Principal

El backend gestiona l'autenticació, l'autorització i la seguretat de l'aplicació mitjançant diversos mecanismes:

### 🔒 Control d'Accés

* **AdminMiddleware:** Restringeix l'accés a funcionalitats exclusives per a administradors.
* **RoleMiddleware:** Gestiona els permisos segons el rol assignat a cada usuari.

### 🌐 Adaptació a HTTPS

Per garantir la compatibilitat amb el Proxy Invers i les connexions segures:

* S'utilitza la configuració **trustProxies** de Laravel.
* Es processen correctament les capçaleres HTTP enviades pel Proxy Invers.
* Es garanteix el funcionament correcte de les redireccions i URLs sota HTTPS.

---

## 🚀 Tecnologies Utilitzades

* Laravel
* PHP
* Apache
* MySQL
* Docker
* Docker Compose
