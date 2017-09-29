<?
// Modul für FireTV

class FireTV extends IPSModule
{

    public function Create()
    {
//Never delete this line!
        parent::Create();
		
		//These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
		
        $this->RegisterPropertyString("IPFireTV", "");
		$this->RegisterPropertyInteger("system", 0);
		$this->RegisterPropertyString("folder", "C:\\adb-tools\\");
        $this->RegisterPropertyBoolean("alternative_menu", false);
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
		// $this->RegisterVariableString("FireTV_Remote", "Remote", "~HTMLBox", 2);
        // $this->EnableAction("FireTV_Remote");
        // $this->SetFireTV_Remote();
        // $this->RegisterVariableString("FireTV_Keyboard", "Keyboard", "~HTMLBox", 3);
        // $this->EnableAction("FireTV_Keyboard");
        // $this->SetFireTV_Keyboard();
		
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

	protected function SetFireTV_Remote()
    {
        $FireTV_Remote_objid = $this->GetIDForIdent("FireTV_Remote");
        $FireTV_Remote = GetValue($FireTV_Remote_objid);
        if($FireTV_Remote == "")
        {
            SetValue($FireTV_Remote_objid, "");
        }
    }

    protected function SetFireTV_Keyboard()
    {
        $FireTV_Keyboard_objid = $this->GetIDForIdent("FireTV_Keyboard");
        $FireTV_Keyboard = GetValue($FireTV_Keyboard_objid);
        if($FireTV_Keyboard == "")
        {
            SetValue($FireTV_Keyboard_objid, "");
        }
    }

	public function StartADB()
	{
		$ip = $this->ReadPropertyString('IPFireTV');
		$os = $this->ReadPropertyInteger('system');
		$folder = $this->ReadPropertyString('folder');
		if ($os == 0)
		{
			shell_exec("adb start-server");  //Start Server
			IPS_Sleep(1500);
			shell_exec("adb connect ".$ip);  //Connect FireTV 
		}
		elseif ($os == 1)//Windows
		{
			shell_exec($folder."adb start-server");  //Start Server
			IPS_Sleep(1500);
			shell_exec($folder."adb connect ".$ip);  //Connect FireTV 
		}
	}
	
	protected function GetOS()
	{
		
	}
	
	public function Up()
	{
        $command = "19"; // Up
        $this->Send_Key($command);
    }
	
	public function Down()
	{
        $command = "20"; // Down
        $this->Send_Key($command);
    }
	
	public function Left()
	{
        $command = "21"; // Left
        $this->Send_Key($command);
    }
	
	public function Right()
	{
        $command = "22"; // Right
        $this->Send_Key($command);
    }
	
	public function Enter()
	{
        $command = "66"; // Enter
        $this->Send_Key($command);
    }
	
	public function Back()
	{
        $command = "4"; // Back
        $this->Send_Key($command);
    }
	
	public function Home()
	{
        $command = "3"; // Home
        $this->Send_Key($command);
    }
	
	public function Menu()
	{
        $alternative_menu = $this->ReadPropertyBoolean("alternative_menu");
        if($alternative_menu)
        {
            $command = "1";
        }
        else
        {
            $command = "82";
        }
        $this->Send_Key($command);
	}
	
	public function Play()
	{
        $command = "85"; // Play / Pause
        $this->Send_Key($command);
	}
	
	public function Previous()
	{
        $command = "88"; // Previous
        $this->Send_Key($command);
	}
	
	public function Next()
	{
        $command = "87"; // Next
        $this->Send_Key($command);
	}

    public function Soft_Right()
    {
        $command = "2"; // Soft Right
        $this->Send_Key($command);
    }

    public function Call()
    {
        $command = "5"; // Call
        $this->Send_Key($command);
    }

    public function Endcall()
    {
        $command = "6"; // Endcall
        $this->Send_Key($command);
    }

    public function Key_0()
    {
        $command = "7"; // Keycode 0
        $this->Send_Key($command);
    }

    public function Key_1()
    {
        $command = "8"; // Keycode 1
        $this->Send_Key($command);
    }

    public function Key_2()
    {
        $command = "9"; // Keycode 2
        $this->Send_Key($command);
    }

    public function Key_3()
    {
        $command = "10"; // Keycode 3
        $this->Send_Key($command);
    }

    public function Key_4()
    {
        $command = "11"; // Keycode 4
        $this->Send_Key($command);
    }

    public function Key_5()
    {
        $command = "12"; // Keycode 5
        $this->Send_Key($command);
    }

    public function Key_6()
    {
        $command = "13"; // Keycode 6
        $this->Send_Key($command);
    }

    public function Key_7()
    {
        $command = "14"; // Keycode 7
        $this->Send_Key($command);
    }

    public function Key_8()
    {
        $command = "15"; // Keycode 8
        $this->Send_Key($command);
    }

    public function Key_9()
    {
        $command = "16"; // Keycode 9
        $this->Send_Key($command);
    }

    public function Key_Star()
    {
        $command = "17"; // Star
        $this->Send_Key($command);
    }

    public function Key_Pound()
    {
        $command = "18"; // Pound
        $this->Send_Key($command);
    }

    public function Center()
    {
        $command = "23"; // Center
        $this->Send_Key($command);
    }

    public function Volume_Up()
    {
        $command = "24"; // Volume up
        $this->Send_Key($command);
    }

    public function Volume_Down()
    {
        $command = "25"; // Volume down
        $this->Send_Key($command);
    }

    public function Power()
    {
        $command = "26"; // Power
        $this->Send_Key($command);
    }

    public function Camera()
    {
        $command = "27"; // Camera
        $this->Send_Key($command);
    }

    public function Clear()
    {
        $command = "28"; // Clear
        $this->Send_Key($command);
    }

    public function Key_A()
    {
        $command = "29"; // Keycode A
        $this->Send_Key($command);
    }

    public function Key_B()
    {
        $command = "30"; // Keycode B
        $this->Send_Key($command);
    }

    public function Key_C()
    {
        $command = "31"; // Keycode C
        $this->Send_Key($command);
    }

    public function Key_D()
    {
        $command = "32"; // Keycode D
        $this->Send_Key($command);
    }

    public function Key_E()
    {
        $command = "33"; // Keycode E
        $this->Send_Key($command);
    }

    public function Key_F()
    {
        $command = "34"; // Keycode F
        $this->Send_Key($command);
    }

    public function Key_G()
    {
        $command = "35"; // Keycode G
        $this->Send_Key($command);
    }

    public function Key_H()
    {
        $command = "36"; // Keycode H
        $this->Send_Key($command);
    }

    public function Key_I()
    {
        $command = "37"; // Keycode I
        $this->Send_Key($command);
    }

    public function Key_J()
    {
        $command = "38"; // Keycode J
        $this->Send_Key($command);
    }

    public function Key_K()
    {
        $command = "39"; // Keycode K
        $this->Send_Key($command);
    }

    public function Key_L()
    {
        $command = "40"; // Keycode L
        $this->Send_Key($command);
    }

    public function Key_M()
    {
        $command = "41"; // Keycode M
        $this->Send_Key($command);
    }

    public function Key_N()
    {
        $command = "42"; // Keycode N
        $this->Send_Key($command);
    }

    public function Key_O()
    {
        $command = "43"; // Keycode O
        $this->Send_Key($command);
    }

    public function Key_P()
    {
        $command = "44"; // Keycode P
        $this->Send_Key($command);
    }

    public function Key_Q()
    {
        $command = "45"; // Keycode Q
        $this->Send_Key($command);
    }

    public function Key_R()
    {
        $command = "46"; // Keycode R
        $this->Send_Key($command);
    }

    public function Key_S()
    {
        $command = "47"; // Keycode S
        $this->Send_Key($command);
    }

    public function Key_T()
    {
        $command = "48"; // Keycode T
        $this->Send_Key($command);
    }

    public function Key_U()
    {
        $command = "49"; // Keycode U
        $this->Send_Key($command);
    }

    public function Key_V()
    {
        $command = "50"; // Keycode V
        $this->Send_Key($command);
    }

    public function Key_W()
    {
        $command = "51"; // Keycode W
        $this->Send_Key($command);
    }

    public function Key_X()
    {
        $command = "52"; // Keycode X
        $this->Send_Key($command);
    }

    public function Key_Y()
    {
        $command = "53"; // Keycode Y
        $this->Send_Key($command);
    }

    public function Key_Z()
    {
        $command = "54"; // Keycode Z
        $this->Send_Key($command);
    }

    public function Key_Comma()
    {
        $command = "55"; // Keycode Comma
        $this->Send_Key($command);
    }

    public function Key_Period()
    {
        $command = "56"; // Keycode Period
        $this->Send_Key($command);
    }

    public function Key_Alt_Left()
    {
        $command = "57"; // Keycode Alt Left
        $this->Send_Key($command);
    }

    public function Key_Alt_Right()
    {
        $command = "58"; // Keycode Alt Right
        $this->Send_Key($command);
    }

    public function Key_Shift_Left()
    {
        $command = "59"; // Keycode Shift Left
        $this->Send_Key($command);
    }

    public function Key_Shift_Right()
    {
        $command = "60"; // Keycode Shift Right
        $this->Send_Key($command);
    }

    public function Key_Tab()
    {
        $command = "61"; // Keycode Tab
        $this->Send_Key($command);
    }

    public function Key_Space()
    {
        $command = "62"; // Keycode Space
        $this->Send_Key($command);
    }

    public function Key_Sym()
    {
        $command = "63"; // Keycode Sym
        $this->Send_Key($command);
    }

    public function Key_Explorer()
    {
        $command = "64"; // Keycode Explorer
        $this->Send_Key($command);
    }

    public function Key_Envelope()
    {
        $command = "65"; // Keycode Envelope
        $this->Send_Key($command);
    }

    public function Key_Enter()
    {
        $command = "66"; // Keycode Enter
        $this->Send_Key($command);
    }

    public function Key_Del()
    {
        $command = "67"; // Keycode Del
        $this->Send_Key($command);
    }

    public function Key_Grave()
    {
        $command = "68"; // Keycode Grave
        $this->Send_Key($command);
    }

    public function Key_Minus()
    {
        $command = "69"; // Keycode Minus
        $this->Send_Key($command);
    }

    public function Key_Equals()
    {
        $command = "70"; // Keycode Equals
        $this->Send_Key($command);
    }

    public function Key_Left_Bracket()
    {
        $command = "71"; // Keycode Left Bracket
        $this->Send_Key($command);
    }

    public function Key_Right_Bracket()
    {
        $command = "72"; // Keycode Right Bracket
        $this->Send_Key($command);
    }

    public function Key_Backslash()
    {
        $command = "73"; // Keycode Backslash
        $this->Send_Key($command);
    }

    public function Key_Semicolon()
    {
        $command = "74"; // Keycode Semicolon
        $this->Send_Key($command);
    }

    public function Key_Apostrophe()
    {
        $command = "75"; // Keycode Apostrophe
        $this->Send_Key($command);
    }

    public function Key_Slash()
    {
        $command = "76"; // Keycode Slash
        $this->Send_Key($command);
    }

    public function Key_At()
    {
        $command = "77"; // Keycode At
        $this->Send_Key($command);
    }

    public function Key_Num()
    {
        $command = "78"; // Keycode Num
        $this->Send_Key($command);
    }

    public function Key_Headsethook()
    {
        $command = "79"; // Keycode Heatsethook
        $this->Send_Key($command);
    }

    public function Key_Focus()
    {
        $command = "80"; // Keycode Focus
        $this->Send_Key($command);
    }

    public function Key_Plus()
    {
        $command = "81"; // Keycode Plus
        $this->Send_Key($command);
    }

    public function Key_Notification()
    {
        $command = "83"; // Keycode Notification
        $this->Send_Key($command);
    }

    public function Key_Search()
    {
        $command = "84"; // Keycode Search
        $this->Send_Key($command);
    }

    public function Tag_Last_Keycode()
    {
        $command = "85"; // tag last keycode
        $this->Send_Key($command);
    }

    protected function Send_Key($command)
    {
        $os = $this->ReadPropertyInteger('system');
        $folder = $this->ReadPropertyString('folder');
        if ($os == 0)
        {
            shell_exec("adb shell input keyevent ".$command);
        }
        elseif($os == 1)
        {
            shell_exec($folder."adb shell input keyevent ".$command);
        }
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