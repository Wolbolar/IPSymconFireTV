<?
// Modul für Doorbird

class FireTV extends IPSModule
{

    public function Create()
    {
//Never delete this line!
        parent::Create();
		
		//These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
		
        $this->RegisterPropertyString("IPFireTV", "");
    }

    public function ApplyChanges()
    {
	//Never delete this line!
        parent::ApplyChanges();
		
		
		$FireTVAss =  Array(
				Array(0, "Up",  "", -1),
				Array(1, "Down",  "", -1),
				Array(2, "Left",  "", -1),
				Array(3, "Right",  "", -1),
				Array(4, "Enter",  "", -1),
				Array(5, "Back",  "", -1),
				Array(6, "Home",  "", -1),
				Array(7, "Menu",  "", -1),
				Array(8, "Play",  "", -1),
				Array(9, "Previous",  "", -1),
				Array(10, "Next",  "", -1)				
				);
		$this->RegisterProfileIntegerFireTVAss("Amazon.FireTVRemote", "Execute", "", "", 0, 0, 0, 0, $FireTVAss);
		$this->RegisterVariableInteger("AmazonFireTVRemote", "Amazon FireTV Remote", "Amazon.FireTVRemote", 1);
		$this->EnableAction("AmazonFireTVRemote");	
		
		$this->ValidateConfiguration();	
	
    }

		/**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        *
        */
		
	private function ValidateConfiguration()
	{
		$change = false;
		
		
		$ip = $this->ReadPropertyString('IPFireTV');
				
		//IP prüfen
		if (!filter_var($ip, FILTER_VALIDATE_IP) === false)
			{
				//IP ok
			}
		else
			{
			$this->SetStatus(203); //IP Adresse ist ungültig 
			}
		$change = false;	
		//User und Passwort prüfen
		if ($ip == "")
			{
				$this->SetStatus(202); //Felder dürfen nicht leer sein
			}
		elseif ($ip !== "" &&  (!filter_var($ip, FILTER_VALIDATE_IP) === false))
			{
				$change = true;
				//$this->StartADB();		
				
				// Status Aktiv
				$this->SetStatus(102);	
			}
	}
			
	public function StartADB()
	{
		$ip = $this->ReadPropertyString('IPFireTV');
		shell_exec("adb start-server");  //Start Server
		IPS_Sleep(1500);
		shell_exec("adb connect ".$ip);  //Connect FireTV 
	}
	
	protected function GetOS()
	{
		
	}
	
	public function Up()
	{
		shell_exec("adb shell input keyevent 19");  //Up
	}
	
	public function Down()
	{
		shell_exec("adb shell input keyevent 20");  //Down
	}
	
	public function Left()
	{
		shell_exec("adb shell input keyevent 21");  //Left
	}
	
	public function Right()
	{
		shell_exec("adb shell input keyevent 22");  //Right
	}
	
	public function Enter()
	{
		shell_exec("adb shell input keyevent 66");  //Enter
	}
	
	public function Back()
	{
		shell_exec("adb shell input keyevent 4");  //Back
	}
	
	public function Home()
	{
		shell_exec("adb shell input keyevent 3");  //Home
	}
	
	public function Menu()
	{
		shell_exec("adb shell input keyevent 1");  //Menu
	}
	
	public function Play()
	{
		shell_exec("adb shell input keyevent 85");  //Play / Pause
	}
	
	public function Previous()
	{
		shell_exec("adb shell input keyevent 88");  //Previous
	}
	
	public function Next()
	{
		shell_exec("adb shell input keyevent 87");  //Next
	}
	
	public function RequestAction($Ident, $Value)
    {
        switch($Ident) {
            case "AmazonFireTVRemote":
                SetValue($this->GetIDForIdent($Ident), $Value); 
      
				if ($Value == 0)
					{
						$this->Up(); //Up      
					}
				elseif($Value == 1)
					{		    
						$this->Down();  //Down    
					}
				elseif($Value == 2)
					{		    
						$this->Left();  //Left    
					}
				elseif($Value == 3)
					{		    
						$this->Right();  //Right    
					}
				elseif($Value == 4)
					{		    
						$this->Enter();  //Enter    
					}
				elseif($Value == 5)
					{		    
						$this->Back();  //Back    
					}	
				elseif($Value == 6)
					{		    
						$this->Home();  //Home    
					}	
				elseif($Value == 7)
					{		    
						$this->Menu();  //Menu    
					}
				elseif($Value == 8)
					{		    
						$this->Play();  //Play / Pause    
					}
				elseif($Value == 9)
					{		    
						$this->Previous();  //Previous   
					}
				elseif($Value == 10)
					{		    
						$this->Next();  //Next    
					}
				break;	
            default:
                throw new Exception("Invalid ident");
        }
    }
	
	//Profile
	protected function RegisterProfileIntegerFireTV($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 1);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 1)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize); // string $ProfilName, float $Minimalwert, float $Maximalwert, float $Schrittweite
        
    }
	
	protected function RegisterProfileIntegerFireTVAss($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
	{
        if ( sizeof($Associations) === 0 ){
            $MinValue = 0;
            $MaxValue = 0;
        } 
		/*
		else {
            //undefiened offset
			$MinValue = $Associations[0][0];
            $MaxValue = $Associations[sizeof($Associations)-1][0];
        }
        */
        $this->RegisterProfileIntegerFireTV($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits);
        
		//boolean IPS_SetVariableProfileAssociation ( string $ProfilName, float $Wert, string $Name, string $Icon, integer $Farbe )
        foreach($Associations as $Association) {
            IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
        }
        
    }
	
}

?>