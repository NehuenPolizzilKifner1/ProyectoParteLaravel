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

## 🌐 Desplegament HTTPS (Proxy Invers)

L'aplicació es serveix sota **HTTPS** utilitzant **Nginx Proxy Manager (NPM)** com a punt d'entrada al servidor.

### 🏗 Arquitectura

El flux de les peticions és el següent:

1. **Nginx Proxy Manager (NPM)** gestiona els certificats SSL generats amb **Let's Encrypt** i rep les connexions segures pel port **443**.
2. Un cop validada la connexió HTTPS, NPM actua com a **Proxy Invers**.
3. La petició es reenvia al contenidor **laravel-app**, que escolta internament pel port **80**.
4. Laravel processa la petició i retorna la resposta a través del mateix flux.

---

### 🔒 Gestió de Seguretat (TrustProxies)

Com que Laravel rep les peticions després que el trànsit HTTPS hagi estat gestionat pel Proxy Invers, és necessari indicar-li que confiï en les capçaleres enviades pel proxy.

Per això s'ha configurat el fitxer `bootstrap/app.php` de la següent manera:

```php id="r5epmv"
$middleware->trustProxies(at: '*');
```

Aquesta configuració permet que Laravel:

* Generi correctament les URLs amb el protocol `https://`.
* Detecti adequadament les connexions segures.
* Gestioni les sessions i cookies de forma segura.
* Respecti les capçaleres enviades pel Proxy Invers.
* Eviti problemes de redireccions o contingut mixt (*mixed content*).

---

### ✅ Beneficis

* Certificats SSL gestionats automàticament amb Let's Encrypt.
* Renovació automàtica dels certificats.
* Separació clara entre la capa de seguretat (Nginx Proxy Manager) i l'aplicació (Laravel).
* Comunicacions segures mitjançant HTTPS.
* Compatibilitat completa amb desplegaments Docker darrere d'un Proxy Invers.

---

## 🚀 Tecnologies Utilitzades

* Laravel
* PHP
* Apache
* MySQL
* Docker
* Docker Compose
