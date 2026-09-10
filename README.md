# sah-typo3-inventory

Eine TYPO3-Website, die als **Lagerverwaltung** rund um die Schmuckmaterialien von Soul Artistry aufgebaut wird. Das Projekt basiert auf der offiziellen TYPO3-Basis-Distribution (v13) und dient als Lernprojekt für das CMS: Composer-Setup, Site-Package, Datenbank-Anbindung und TYPO3-spezifische Konfiguration.

## Stand

- TYPO3 13 installiert und eingrichter (Setup abgeschlossen)
- Site-Konfiguration unter `config/sites/main/config.yaml`
- Datenbank `sah_typo3` mit 65 Tabellen (TYPO3-Kern)
- Lauffähig unter lokalem Apache/XAMPP (natives PHP-Modul)

**Lokal erreichbar unter:** `http://localhost/pu-sah-typo3-inventory/`

## Technologien

- TYPO3 13 (cms-base-distribution, Composer-basiert)
- PHP 8.2+
- MySQL / MariaDB 10.4 (PDO)
- Apache via XAMPP (Junction auf `public/`)

## Einrichtung

```bash
composer install
```

Anschließend das Setup ausführen (einmalig):

```bash
composer exec typo3 setup -- --no-interaction \
    --server-type=apache \
    --driver=pdoMysql \
    --host=127.0.0.1 --dbname=sah_typo3 \
    --username=root --password= \
    --admin-username=admin \
    --project-name="Soul Arthouse Inventory" \
    --create-site="http://localhost/pu-sah-typo3-inventory/"
```

> Der einmalig generierte Admin-Zugang liegt lokal unter
> `typo3conf/admin_password.txt` (außerhalb der Versionsverwaltung zu halten).

## Struktur

```
public/                – Web-Root (DocumentRoot, Junction unter htdocs)
config/system/         – TYPO3-Systemkonfiguration (settings.php)
config/sites/main/     – Site-Konfiguration (config.yaml)
typo3conf/             – lokale TYPO3-Konfiguration
var/                   – Cache & Logs (nicht versionieren)
```

## Nächste Schritte

- Domain-Modell der Lagerverwaltung (Artikel, Bestände) als TYPO3-Extension
- Templates im Site-Package, Backend-Berechtigungen, Suchfunktion