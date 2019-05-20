# IPSymconFireTV
[![Version](https://img.shields.io/badge/Symcon-PHPModule-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-%3E%205.1-green.svg)](https://www.symcon.de/en/service/documentation/installation/)

Module for IP-Symcon version 5.1 or higher enables communication with an Amazon FireTV.

## Documentation

**Table of Contents**

1. [Features](#1-features)
2. [Requirements](#2-requirements)
3. [Installation](#3-installation)
4. [Function reference](#4-functionreference)
5. [Configuration](#5-configuration)
6. [Annex](#6-annex)

## 1. Features

With the module, remote commands can be sent via adb to an Amazon FireTV in IP Symcon (version 5 or higher).

### Send commands to a FireTV:  

 - Up, Down, Left, Right, Enter, Back, Home, Menu, Media Play/Pause, Media Previous, Media Next

## 2. Requirements

 - IPS 5.1
 - Installed ADB (Android Debug Bridge) on the operating system.

## 3. Installation

### a. Installation von ADB, Vorbereitung FireTV


Write down the IP address on the FireTV and enable debugging in the FireTV ADB.
Install and start ADB.
   
Example instructions:
[How to connect to a fire tv or fire tv stick via adb](http://www.aftvnews.com/how-to-connect-to-a-fire-tv-or-fire-tv-stick-via-adb/ "Connect FireTV with ADB")
   
   
   Example configuration on a Raspberry:
   
   sudo apt-get install android-tools-adb
   
   adb start-server
   
   adb connect 192.168.X.X
   
   adb devices

### b. Loading the module

Open the IP Console's web console with _http://<IP-Symcon IP>:3777/console/_.

Then click on the module store (IP-Symcon > 5.1) icon in the upper right corner.

![Store](img/store_icon.png?raw=true "open store")

In the search field type

```
FireTV
```  


![Store](img/module_store_search_en.png?raw=true "module search")

Then select the module and click _Install_

![Store](img/install_en.png?raw=true "install")


#### Install alternative via Modules instance

_Open_ the object tree.

![Objektbaum](img/object_tree.png?raw=true "object tree")	

Open the instance _'Modules'_ below core instances in the object tree of IP-Symcon (>= Ver 5.x) with a double-click and press the _Plus_ button.

![Modules](img/modules.png?raw=true "modules")	

![Plus](img/plus.png?raw=true "Plus")	

![ModulURL](img/add_module.png?raw=true "Add Module")
 
Enter the following URL in the field and confirm with _OK_:


```	
https://github.com/Wolbolar/IPSymconFireTV
```
    
and confirm with _OK_.    
    
Then an entry for the module appears in the list of the instance _Modules_

By default, the branch _master_ is loaded, which contains current changes and adjustments.
Only the _master_ branch is kept current.

![Master](img/master.png?raw=true "master") 

If an older version of IP-Symcon smaller than version 5.1 (min 4.3) is used, click on the gear on the right side of the list.
It opens another window,

![SelectBranch](img/select_branch_en.png?raw=true "select branch") 

here you can switch to another branch, for older versions smaller than 5.1 (min 4.3) select _Old-Version_ .

### c.  Setup in IP-Symcon

In IP-Symcon _add Instance_ (_rightclick -> add object -> instance_) under the category under which you want to add the FireTv instance,
and select _Amazon FireTV_.
The IP address of the FireTV is to be completed in the configuration form. Press Apply to start server.


## 4. Function reference

### FireTV:

Sends the commands via functions or the web front of IP-Symcon to the FireTV.
Available commands:

Up, Down, Left, Right, Enter, Back, Home, Menu, Media Play/Pause, Media Previous, Media Next

## 5. Configuration:

### FireTV:

| Property    | Type    | Value        | Description                               |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| IPFireTV    | string  |              | IP Adresse FireTV                         |


## 6. Annex

###  a. Functions:

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


###  b. GUIDs and data exchange:

#### FireTV:

GUID: `{EDB1C780-21F5-4BB3-A4E0-0F67A2927495}` 