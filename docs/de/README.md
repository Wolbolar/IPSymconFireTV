# IPSymconFireTV
[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-%3E%205.1-green.svg)](https://www.symcon.de/service/dokumentation/installation/)

Modul für IP-Symcon ab Version 5.1 ermöglicht die Kommunikation mit einem Amazon FireTV.

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguration)  
6. [Anhang](#6-anhang)  


## 1. Funktionsumfang

Mit dem Modul lassen sich Remote Befehle über adb an ein Amazon FireTV in IP-Symcon (ab Version 5) senden. 

### Befehle an FireTV senden:  

 - Up, Down, Left, Right, Enter, Back, Home, Menu, Media Play/Pause, Media Previous, Media Next
 

## 2. Voraussetzungen

 - IPS 5.1
 - Installiertes ADB (Android Debug Bridge) auf dem Betriebssystem.



## 3. Installation

### a. Installation von ADB, Vorbereitung FireTV

   Auf dem FireTV die IP Adresse aufschreiben und im FireTV ADB debugging aktivieren.
   ADB installieren und starten.
   
   Beispiel Anleitung:
   [How to connect to a fire tv or fire tv stick via adb](http://www.aftvnews.com/how-to-connect-to-a-fire-tv-or-fire-tv-stick-via-adb/ "Connect FireTV with ADB")
   
   
   Beispiel Konfiguartion auf einem Raspberry:
   
   sudo apt-get install android-tools-adb
   
   adb start-server
   
   adb connect 192.168.X.X
   
   adb devices

### b. Laden des Moduls

Die Webconsole von IP-Symcon mit _http://<IP-Symcon IP>:3777/console/_ öffnen. 


Anschließend oben rechts auf das Symbol für den Modulstore (IP-Symcon > 5.1) klicken

![Store](img/store_icon.png?raw=true "open store")

Im Suchfeld nun

```
FireTV
```  

eingeben

![Store](img/module_store_search.png?raw=true "module search")

und schließend das Modul auswählen und auf _Installieren_

![Store](img/install.png?raw=true "install")

drücken.


#### Alternatives Installieren über Modules Instanz

Den Objektbaum _Öffnen_.

![Objektbaum](img/objektbaum.png?raw=true "Objektbaum")	

Die Instanz _'Modules'_ unterhalb von Kerninstanzen im Objektbaum von IP-Symcon (>=Ver. 5.x) mit einem Doppelklick öffnen und das  _Plus_ Zeichen drücken.

![Modules](img/Modules.png?raw=true "Modules")	

![Plus](img/plus.png?raw=true "Plus")	

![ModulURL](img/add_module.png?raw=true "Add Module")
 
Im Feld die folgende URL eintragen und mit _OK_ bestätigen:

```
https://github.com/Wolbolar/IPSymconFireTV
```  
	
Anschließend erscheint ein Eintrag für das Modul in der Liste der Instanz _Modules_    

Es wird im Standard der Zweig (Branch) _master_ geladen, dieser enthält aktuelle Änderungen und Anpassungen.
Nur der Zweig _master_ wird aktuell gehalten.

![Master](img/master.png?raw=true "master") 

Sollte eine ältere Version von IP-Symcon die kleiner ist als Version 5.1 (min 4.3) eingesetzt werden, ist auf das Zahnrad rechts in der Liste zu klicken.
Es öffnet sich ein weiteres Fenster,

![SelectBranch](img/select_branch.png?raw=true "select branch") 

hier kann man auf einen anderen Zweig wechseln, für ältere Versionen kleiner als 5.1 (min 4.3) ist hier
_Old-Version_ auszuwählen. 


### c. Einrichtung in IP-Symcon
	
In IP-Symcon nun _Instanz hinzufügen_ (_Rechtsklick -> Objekt hinzufügen -> Instanz_) auswählen unter der Kategorie, unter der man den FireTV hinzufügen will,
und _Amazon FireTV_ auswählen.
Die IP Adresse vom FireTV ist im Konfigurationsformular zu ergänzen. Nach Übernehmen auf Server starten drücken.

## 4. Funktionsreferenz

### FireTV:
Sendet die Befehle über Funktionen oder den Webfront von IP-Symcon an den FireTV.
Verfügbare Befehle:

Up, Down, Left, Right, Enter, Back, Home, Menu, Media Play/Pause, Media Previous, Media Next


## 5. Konfiguration:

### FireTV:

| Eigenschaft | Typ     | Standardwert | Funktion                                  |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| IPFireTV    | string  |              | IP Adresse FireTV                         |


## 6. Anhang

###  a. Funktionen:

#### FireTV:

`FireTV_Up(integer $InstanceID)`

Up

`FireTV_Down(integer $InstanceID)`

Down

`FireTV_Left(integer $InstanceID)`

Left

`FireTV_Right(integer $InstanceID)`

Right

`FireTV_Enter(integer $InstanceID)`

Enter       

`FireTV_Back(integer $InstanceID)`

Back 

`FireTV_Home(integer $InstanceID)`

Home 

`FireTV_Menu(integer $InstanceID)`

Menu 

`FireTV_Play(integer $InstanceID)`

Media Play / Pause 

`FireTV_Previous(integer $InstanceID)`

Previous 

`FireTV_Next(integer $InstanceID)`

Next 

`FireTV_Down(integer $InstanceID)`

Down 

###  b. GUIDs und Datenaustausch:

#### FireTV:

GUID: `{EDB1C780-21F5-4BB3-A4E0-0F67A2927495}` 