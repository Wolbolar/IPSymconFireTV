# IPSymconFireTV

Modul für IP-Symcon ab Version 4. Ermöglicht die Kommunikation mit einem Amazon FireTV.
Beta Test

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguartion)  
6. [Anhang](#6-anhang)  

## 1. Funktionsumfang

Mit dem Modul lassen sich Remote Befehle über adb an ein Amazon FireTV in IP-Symcon (ab Version 4) senden. 

### Befehle an FireTV senden:  

 - Up, Down, Left, Right, Enter, Back, Home, Menu, Media Play/Pause, Media Previous, Media Next
 

## 2. Voraussetzungen

 - IPS 4.x
 - Installiertes ADB (Android Debug Bridge) auf dem Betriebssystem.

## 3. Installation

### a. Installation von ADB, Vorbereitung FireTV

   Auf dem FireTV die IP Adresse aufschreiben und im FireTV ADB debugging aktivieren.
   ADB installieren und starten.
   
   Beispiel Anleitung:
   http://www.aftvnews.com/how-to-connect-to-a-fire-tv-or-fire-tv-stick-via-adb/
   
   Beispiel Konfiguartion auf einem Raspberry:
   
   sudo apt-get install android-tools-adb
   
   adb start-server
   
   adb connect 192.168.X.X
   
   adb devices

### b. Laden des Moduls

   Über das 'Modul Control' in IP-Symcon (Ver. 4.x) folgende URL hinzufügen:
	
    `https://github.com/Wolbolar/IPSymconFireTV`  

### c. Einrichtung in IPS

	In IP-Symcon Instanz hinzufügen auswählen unter der Kategorie
	unter der man den FireTV hinzufügen will und Amazon FireTV auswählen.
	Die IP Adresse vom FireTV ist im Konfigurationsformular zu ergänzen.
	Nach Übernehmen auf Server starten drücken.


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

#### Doorbird:

GUID: `{EDB1C780-21F5-4BB3-A4E0-0F67A2927495}` 




