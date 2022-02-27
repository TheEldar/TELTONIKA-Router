[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Modul%20Version-1.0-blue.svg)]()
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
[![Version](https://img.shields.io/badge/Symcon%20Version-5.1%20%3E-green.svg)](https://www.symcon.de/forum/threads/30857-IP-Symcon-5-1-%28Stable%29-Changelog)


# TELTONIKA RUT955 <!-- omit in toc -->  

## Inhaltsverzeichnis <!-- omit in toc -->

- [1. Funktionsumfang](#1-funktionsumfang)
- [2. Voraussetzungen](#2-voraussetzungen)
- [3. Software-Installation](#3-software-installation)
- [4. Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
  - [1. Bekannte BUGs](#1-bekannte-bugs)
- [5. Statusvariablen und Profile](#5-statusvariablen-und-profile)
- [6. PHP-Befehlsreferenz](#6-php-befehlsreferenz)
- [7. Anhang](#7-anhang)
  - [1. Changelog](#1-changelog)
  - [2. Roadmap](#2-roadmap)
  - [3. Spenden](#3-spenden)
- [8. Lizenz](#8-lizenz)

## 1. Funktionsumfang

Ermöglicht die einfache Einbindung von Routern des Typs RUT955 der Firma TELTONIKA Networks. 

## 2. Voraussetzungen

 - IPS 5.1 oder höher  
 - RUT955 Router mit 'ModBus-Interface'
 - Firmware version	RUT9XX_R_00.06.08.6 oder höher
 

## 3. Software-Installation

Dieses Modul ist Bestandteil der TELTONIKA Router Library.

**IPS 5.1:**  
   Bei privater Nutzung:
     Über den 'Module-Store' in IPS.  
   **Bei kommerzieller Nutzung (z.B. als Errichter oder Integrator) wenden Sie sich bitte an den Autor.** 

## 4. Einrichten der Instanzen in IP-Symcon

Das Modul ist im Dialog 'Instanz hinzufügen' unter dem Hersteller 'TELTONIKA Networks' zu finden.  

Es wird automatisch eine 'ModBus Gateway' als Splitter-Instanz, sowie ein 'Client Socket' als dessen I/O-Instanz erzeugt.  Bei der I/O-Instanz die Verbindungsdaten des RUT955 angeben.

![Modbus RUT955](..\img\modbus_config.JPG) 


In dem sich öffnenden Konfigurationsformular muss der Abfrage-Intervall eingestellt werden. Der Intervall sollte in der Produktion nicht zu gering gewählt werden.
In der Praxis haben sich bei mir 2 bis 5 Minuten bewährt. Wer das GPS Signal häufiger prüfen möchte kann sich meinen Fork des [NMEA-GPS Modul](https://github.com/TheEldar/NMEA-GPS) anschauen. Dieses Modul untersützt neben USB Geräten auch Webhooks.

![Modbus Instanz](..\img\modbus_instanz.JPG) 


Über den Button 'Gateway konfigurieren' oder das Zahnrad hinter der Übergeordneten Instanz wird das Konfigurationsformular des 'ModBus Gateway' geöffnet.  
Hier muss jetzt der Modus passend zur Hardwareanbindung (TCP /RTU) sowie die Geräte-ID des Zählers eingestellt und übernommen werden.  


![Modbus Splitter](..\img\modbus_gateway.JPG) 

Anschließend sollte eine Liste mit allen untersützten Parametern angezeugt werden.

![Modbus Liste](..\img\modbus_liste.JPG)

### 1. Bekannte BUGs

Aktuelle wir die WAN IP-Adresse noch nicht korrekt umgewandelt. Du Umwandlung ist [hier](https://wiki.teltonika-networks.com/view/Monitoring_via_Modbus#WAN_IP_address) bei Teltonika Networks beschrieben. 

## 5. Statusvariablen und Profile

Folgende Statusvariablen werden automatisch angelegt.  

|              Name               |  Typ  |       Ident       |   Profil    |
| :-----------------------------: | :---: | :---------------: | :---------: |
|System uptime|INTEGER|System uptime||
|Mobile signal strength|INTEGER|Mobile signal strength|RSSI|
|System temperature|Flow|System temperature|~Temperature|
|System hostname|STRING|System hostname||
|GSM operator name|STRING|GSM operator name||
|Router serial number|STRING|Router serial number||
|LAN MAC address|STRING|LAN MAC address||
|Router name|STRING|Router name||
|Currently active SIM card slot|STRING|Currently active SIM card slot||
|Network registration info|STRING|Network registration info||
|Network type|STRING|Network type||
|Digital input DIN1 state|INTEGER|Digital input DIN1 state||
|Digital galvanically isolated input DIN2 state|INTEGER|Digital galvanically isolated input DIN2 state||
|Current WAN IP address|INTEGER|Current WAN IP address||
|Analog input PIN 9 value|INTEGER|Analog input PIN 9 value||
|GPS latitude coordinate|FLOAT|GPS latitude coordinate|GPSCords|
|GPS longitude coordinate|FLOAT|GPS longitude coordinate|GPSCords|
|GPS fix time|STRING|GPS fix time||
|GPS date and time|STRING|GPS date and time||
|GPS speed|INTEGER|GPS speed||
|GPS satellite count|INTEGER|GPS satellite count||
|GPS accuracy|INTEGER|GPS accuracy||
|Mobile data received today SIM1|INTEGER|Mobile data received today SIM1||
|Mobile data sent today SIM1|INTEGER|Mobile data sent today SIM1||
|Mobile data received this week SIM1|INTEGER|Mobile data received this week SIM1||
|Mobile data sent this week SIM1|INTEGER|Mobile data sent this week SIM1||
|Mobile data received this month SIM1|INTEGER|Mobile data received this month SIM1||
|Mobile data sent this month SIM1|INTEGER|Mobile data sent this month SIM1||
|Mobile data received last 24h SIM1|INTEGER|Mobile data received last 24h SIM1||
|Mobile data sent last 24h SIM1|INTEGER|Mobile data sent last 24h SIM1||
|Galvanically isolated open collector output status|INTEGER|Galvanically isolated open collector output status||
|Relay output status|INTEGER|Relay output status||
|Active SIM card|INTEGER|Active SIM card||
|Mobile data received last week SIM1|INTEGER|Mobile data received last week SIM1||
|Mobile data sent last week SIM1|INTEGER|Mobile data sent last week SIM1||
|Mobile data received last month SIM1|INTEGER|Mobile data received last month SIM1||
|Mobile data sent last month SIM1|INTEGER|Mobile data sent last month SIM1||
|Mobile data received today SIM2|INTEGER|Mobile data received today SIM2||
|Mobile data sent today SIM2|INTEGER|Mobile data sent today SIM2||
|Mobile data received this week SIM2|INTEGER|Mobile data received this week SIM2||
|Mobile data sent this week SIM2|INTEGER|Mobile data sent this week SIM2||
|Mobile data received this month SIM2|INTEGER|Mobile data received this month SIM2||
|Mobile data sent this month SIM2|INTEGER|Mobile data sent this month SIM2||
|Mobile data received last 24h SIM2|INTEGER|Mobile data received last 24h SIM2||
|Mobile data sent last 24h SIM2|INTEGER|Mobile data sent last 24h SIM2||
|Mobile data received last week SIM2|INTEGER|Mobile data received last week SIM2||
|Mobile data sent last week SIM2|INTEGER|Mobile data sent last week SIM2||
|Mobile data received last monthSIM2|INTEGER|Mobile data received last monthSIM2||
|Mobile data sent last month SIM2|INTEGER|Mobile data sent last month SIM2||
|Digital non isolated input 4 PIN connector|INTEGER|Digital non isolated input 4 PIN connector||
|Digital open collector output 4 PIN connector|INTEGER|Digital open collector output 4 PIN connector||
|Modem ID|STRING|Modem ID||
|IMSI|STRING|IMSI||
|Unix timestamp|INTEGER|Unix timestamp|~UnixTimestamp|
|Local ISO time|STRING|Local ISO time||
|UTC time|STRING|UTC time||


Folgende Profile werden automatisch angelegt.  

|    Name     |  Typ  |
| :---------: | :---: |
| RSSI  | integer |
|     GPSPos      | integer |


Darstellung in der Console.  


## 6. PHP-Befehlsreferenz

```php
bool RUT955_RequestRead(int $InstanzID);
```
Ließt alle Werte des Routers.  
Bei Erfolg wird `true` und im Fehlerfall wird `false` zurückgegeben und eine Warnung erzeugt.  


## 7. Anhang

### 1. Changelog

[Siehe hier](../README.md) 

### 2. Roadmap

- Anpassung der Status Variablen auf Bool
- Schaltbar machen der Relay Ausgänge
- Booten des Routers über ModBus

### 3. Spenden  
  
Die Library ist für die nicht kommerzielle Nutzung kostenlos. Präsente als Unterstützung für den Autor werden hier akzeptiert:  
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MBVXFVK8WED4C" target="_blank"><img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" /></a>

![Spende](..\img\QR-Code.png) 


## 8. Lizenz

  IPS-Modul:  
  [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)  
 
